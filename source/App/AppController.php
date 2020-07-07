<?php


namespace Source\App;

use Source\App\Pages\PageCurriculum;
use Source\App\Pages\PageWeb;
use Source\Models\Login;
use Source\Models\StatesCity;

/**
 * Class AppController
 * @package Source\App
 */
class AppController extends Controller {

    /**
     * @var \Source\Models\User
     * Pegar Usuario logado
     */
    private $user_logado;

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
        }

    }


    /**
     * Carrega tela de Inicio de Cadastro no Sistema
     */
    public function start():void {

        $access = Login::checkLogin();

        if ($access == false) {
            $page = new PageWeb();

            $page->setTpl("start", array(
                "user" => $this->user_logado->getValues()
            ));

        } else {
            $page = new PageWeb();

            $page->setTpl("home");
        }

    }


    /**
     * Carrega Tela de Cadastro dos Dados Pessoais
     */
    public function personalDataSave():void {

        $page = new PageCurriculum();

        $page->setTpl("create_ personal_data", array(
            "user" => $this->user_logado->getValues(),
            "uf" => StatesCity::listuf()

        ));

    }

    /**
     * Carrega Tela de Cadastro dos Contato e Endereço
     */
    public function contactSave():void {

        $page = new PageCurriculum();

        $page->setTpl("create_contact", array(
            "user" => $this->user_logado->getValues()

        ));

    }

    /**
     * Carrega rota de Logout
     */
    public function logout():void{

        Login::logout();

        $this->router->redirect("web.home");

    }


}