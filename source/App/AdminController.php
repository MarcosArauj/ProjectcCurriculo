<?php


namespace Source\App;

use Source\App\Pages\PageAdmin;
use Source\Models\Login;
use Source\Models\Search;
use Source\Models\Support\Support;
use Source\Models\User;


/**
 * Class AdminController
 * @package Source\App
 */
class AdminController extends Controller {

    private $user_logado;
    private $data_user;
    private $search_users;
    private $support;

    /**
     * AppController constructor.
     * @param $router
     * @throws \Exception
     */
    public function __construct($router) {
        parent::__construct($router);

        if(!Login::verifyLogin()) {
            Login::logout();
            $this->router->redirect("web.home");
        } else {
            $this->user_logado = Login::getFromSession();
            if(Login::checkLogin()) {
                $this->data_user = new User();
                $this->support = new Support();
                $this->search_users = new Search();

            } else {
                $this->router->redirect("web.home");
            }
        }

    }

    /**
     * Carrega tela Area de trabalho do Administrador
     *
     * */
    public function dashboardAdmin():void {

        $pageAdmin = new PageAdmin();

        $this->data_user->getUser($this->user_logado->getid_usuario());
        $user_admin = $this->data_user->getValues();

        $pageAdmin->setTpl("dashboard_admin", array(
            "title" =>"Bem Vindo(a) " . site("name"),
            "user" =>$user_admin
        ));

    }

    /**
     * Carrega tela Lista Usuario
     *
     * */
    public function users():void {

        $pagination = null;
        $pages = array();

        $search = (isset($_GET['search'])) ? $_GET['search'] : "";
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

        if($search != ''){
            $pagination = $this->search_users->getPageSearchUser($search);
        } else {
            $pagination = $this->search_users->getPageUser($page);
        }


        if (!$pagination['data']) {
            flash("error","Nenhum registro encontrado!");
        } else {
            for ($cont = 0; $cont < $pagination['pages']; $cont++) {
                array_push($pages, array(
                    'href' => '/admin/users?' . http_build_query(array(
                            'page' => $cont + 1,
                            'search' => $search
                        )),
                    'text' => $cont + 1
                ));
            }

        }

        $pageAdmin = new PageAdmin();

        $pageAdmin->setTpl("users", array(
            "title"=> site("name_complete"),
            "users" => $pagination['data'],
            "search" => $search,
            "pages" => $pages
        ));

    }

    public function detailUser($data):void {
        $page = new PageAdmin();

        $this->data_user->getUser((int)$data["id_usuario"]);

        $page->setTpl("user_detail", array(
            "title" => site("name"). " | Usuário",
            "user" => $this->data_user->getValues()
        ));
    }

    public function updateEmailPage($data):void{

        $page = new PageAdmin();

        $this->data_user->getUser((int)$data["id_usuario"]);

        $page->setTpl("update_email", array(
            "title" => site("name"). " | Usuário",
            "user" => $this->data_user->getValues()
        ));

    }

    public function updateEmail($data):void{

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $this->data_user->getUser($data["id_usuario"]);
            
            $this->data_user->setData($data);

            $this->data_user->updateEmail();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("admin.detailUser", ["id_usuario" => $data['id_usuario']])
            ]);
            flash("success","E-mail Alterado Com Sucesso");
            return;

        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" =>$e->getMessage()
            ]);
            return;
        }

    }


    public function userResetPassword($data):void {

        try{

            $this->support->getEmailResetPass($data["email"]);
            
            $this->data_user->getUser((int)$data["id_usuario"]);

            $this->data_user->setsenha("12345678");

            $this->data_user->updatePassword();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("admin.users")
            ]);
            flash("success","Sucesso ao resetar senha");
            return;

        } catch ( \Exception $e){
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" =>$e->getMessage()
            ]);
            return;
        }

    }

    public function requests():void {

        $pagination = null;
        $pages = array();

        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

        $pagination = $this->support->getPageSolicitation($page);

        if (!$pagination['data']) {
            flash("error","Nenhum registro encontrado!");
        } else {
            for ($cont = 0; $cont < $pagination['pages']; $cont++) {
                array_push($pages, array(
                    'href' => '/admin/requests?' . http_build_query(array(
                            'page' => $cont + 1
                        )),
                    'text' => $cont + 1
                ));
            }

        }

        $pageAdmin = new PageAdmin();

        $pageAdmin->setTpl("requests", array(
            "title"=> site("name_complete"),
            "requests" => $pagination['data'],
            "pages" => $pages
        ));

    }

    public function detailRequest($data):void {
        $page = new PageAdmin();

        $this->support->getRequest((int)$data["id_solicitacoes"]);

        $page->setTpl("requests_detail", array(
            "title" => site("name"). " | Solicitação",
            "solicitacao" => $this->support->getValues()
        ));
    }

    public function finishFinish($data):void{
        try {

            $this->support->getRequest((int)$data["id_solicitacoes"]);

            $this->support->setid_solicitacoes($data["id_solicitacoes"]);

            if ($this->support->getsituacao() == "pendente") {
                $this->support->setsituacao("finalizada");
                flash("success","Solicitação finalizada com Sucesso");
            } else {
                $this->support->setsituacao("pendente");
                flash("success","Sucesso ao abrir Solicitação");
            }

            $this->support->updateSolicitation();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("admin.requests")
            ]);
            return;

        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" =>$e->getMessage()
            ]);
            return;
        }
    }

    public function deleteUser($data): void{

        try {

            $this->data_user->getUser($data["id_usuario"]);

            $this->data_user->deleteUserCurriculum();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("admin.users")

            ]);
            flash("success","Usuário Excluido com Sucesso!");
            return;

        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" =>$e->getMessage()
            ]);
            return;
        }

    }
}