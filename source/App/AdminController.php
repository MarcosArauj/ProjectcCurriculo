<?php


namespace Source\App;

use Source\App\Pages\PageAdmin;
use Source\App\Pages\PageCurriculum;
use Source\App\Pages\PageWeb;
use Source\Models\Admin;
use Source\Models\Curriculum;
use Source\Models\Formation;
use Source\Models\Login;
use Source\Models\PersonalData;
use Source\Models\Professional;
use Source\Models\Contact;
use Source\Models\Search;
use Source\Models\Support\Support;
use Source\Models\User;

/**
 * Class AppController
 * @package Source\App
 */
class AdminController extends Controller {

    private $user_logado;
    private $data_user;
    private $search_users;
    private $reset_pass;

    /**
     * AppController constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);

        if(!Login::verifyLogin()) {
            flash("error","Acesso negado, favor logar-se");
            Login::logout();
            $this->router->redirect("web.home");
        } else {
            $this->user_logado = Login::getFromSession();
            if(Login::checkLogin()) {
                $this->data_user = new User();
                $this->data_user->getUser($this->user_logado->getid_usuario());
                $this->reset_pass = new Support();
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
        $pageAdmin->setTpl("dashboard_admin", array(
            "title" =>"Bem Vindo(a) " . site("name"),
            "user" =>$this->user_logado->getValues()
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


    public function userResetPassword($data):void {

        try{

            $this->reset_pass->getEmailResetPass($data["email"]);
            
            $this->data_user->getUser($data["id_usuario"]);

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
}