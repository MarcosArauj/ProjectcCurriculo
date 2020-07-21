<?php


namespace Source\App;

use Source\App\Pages\PageCurriculum;
use Source\App\Pages\PageWeb;
use Source\Models\Curriculum;
use Source\Models\Formation;
use Source\Models\Login;
use Source\Models\PersonalData;
use Source\Models\Professional;
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
     * Carrega Tela de Area de Trabalho Principal
     */
    public function dashboard():void {

        $page = new PageCurriculum();

        $curriculum = new Curriculum();

        $curriculum->getCurriculum($this->user_logado->getid_usuario());

        $page->setTpl("dashboard", array(
            "curriculum" => $curriculum->getValues()
        ));

    }


    /**
     * Carrega Tela de Cadastro dos Dados Pessoais
     */
    public function savePersonalData():void {

        $page = new PageCurriculum();

        $page->setTpl("create_ personal_data", array(
            "user" => $this->user_logado->getValues(),
            "countries"=> PersonalData::listcountries(),
            "uf" => StatesCity::listuf()

        ));

    }

    /**
     * Carrega Tela de Cadastro dos Contato e Endereço
     */
    public function saveContact():void {

        $page = new PageCurriculum();

        $page->setTpl("create_contact", array(
            "user" => $this->user_logado->getValues(),
            "countries"=> PersonalData::listcountries()
        ));

    }


    /**
     * Carrega Tela de Cadastro de Deficiência
     */
    public function saveDeficiency():void {

        $page = new PageCurriculum();

        $page->setTpl("create_deficiency", array(
            "user" => $this->user_logado->getValues()
        ));

    }

    /**
     * Carrega Tela de Cadastro da Formação Acadêmica
     */
    public function saveAcademicFormation():void {

        $page = new PageCurriculum();

        $page->setTpl("create_academic_formation", array(
            "user" => $this->user_logado->getValues()
        ));

    }

    /**
     * Carrega Tela de Cadastro da Outros Cursos
     */
    public function saveOtherCourses():void {

        $page = new PageCurriculum();

        $page->setTpl("create_other_courses", array(
            "user" => $this->user_logado->getValues(),
            "courses"=>Formation::getOtherCourses($this->user_logado->getid_usuario())
        ));

    }

    /**
     * Carrega Tela de Cadastro de Idiomas
     */
    public function saveLanguages():void {

        $page = new PageCurriculum();

        $page->setTpl("create_languages", array(
            "user" => $this->user_logado->getValues(),
            "languages"=>Formation::getLanguages($this->user_logado->getid_usuario()),
            "lang_cad"=>Formation::languages()
        ));

    }

    /**
     * Carrega Tela de Cadastro de Experiência Profissional
     */
    public function saveProfessional():void {

        $page = new PageCurriculum();

        $page->setTpl("create_professional", array(
            "user" => $this->user_logado->getValues(),
            "professional"=>Professional::getExProfessional($this->user_logado->getid_usuario()),
        ));

    }

    /**
     * Carrega Tela de Finalizar Curriculo
     */
    public function saveCurriculum():void {

        if(Curriculum::checkCurriculum($this->user_logado->getid_usuario())) {

            $this->router->redirect("app.start");
            return;
        }

        $page = new PageCurriculum();

        $page->setTpl("finish_curriculum", array(
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