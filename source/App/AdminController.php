<?php


namespace Source\App;

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
use Source\Models\User;

/**
 * Class AppController
 * @package Source\App
 */
class AdminController extends Controller {

    private $user_logado;
    private $data_user;
    private $search_users;

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
            $this->data_user = new User();
            $this->data_user->getUser($this->user_logado->getid_usuario());

            $this->search_users = new Search();
        }

    }

    /**
     * Carrega tela Area de trabalho do Administrador
     *
     * */
    public function admin():void {

        $access = Login::checkLogin();

        if ($access) {


        } else {
            $page = new PageCurriculum();
            $page->setTpl("dashboard", array(
                "title" =>"Bem Vindo(a) " . site("name"),
                "curriculum" => $this->curruculum->getValues()
            ));
        }

    }

    /**
     * Carrega tela Lista Usuario
     *
     * */
    public function users():void {

        $access = Login::checkLogin();

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
                    'href' => '/user/users?' . http_build_query(array(
                            'page' => $cont + 1,
                            'search' => $search
                        )),
                    'text' => $cont + 1
                ));
            }

        }


        if ($access) {

        } else {
            $this->router->redirect("app.dashboard");
        }

    }

}