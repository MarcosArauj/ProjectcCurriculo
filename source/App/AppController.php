<?php


namespace Source\App;

use Source\App\Pages\PageCurriculum;
use Source\App\Pages\PageWeb;
use Source\Models\Curriculum;
use Source\Models\Formation;
use Source\Models\Login;
use Source\Models\PersonalData;
use Source\Models\Professional;
use Source\Models\Address;
use Source\Models\User;

/**
 * Class AppController
 * @package Source\App
 */
class AppController extends Controller {

    /**
     * @var \User
     * Pegar Usuario logado
     */
    private $user_logado;
    private $data_user;
    private $personalData;
    private $contact;
    private $formation;
    private $professional;
    private $curruculum;

    /**
     * AppController constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);

        if(!User::verifyLogin()) {
            flash("error","Acesso negado, favor logar-se");
            User::logout();
            $this->router->redirect("web.home");
        } else {
            $this->user_logado = User::getFromSession();
            $this->data_user = new User();
            $this->personalData = new PersonalData();
            $this->contact = new Address();
            $this->formation = new Formation();
            $this->professional = new Professional();
            $this->curruculum = new Curriculum();
        }

    }

    /**
     * Carrega tela de Inicio de Cadastro no Sistema
     */
    public function start():void {

        $access = User::checkLogin();

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


        $page->setTpl("create_personal_data", array(
            "user" => $this->user_logado->getValues(),
            "countries"=> $this->contact->listcountries(),
            "uf" => $this->contact->listuf()

        ));

    }

    /**
     * Carrega Tela de Atualização dos Dados Pessoais
     */
    public function updatePersonalData():void {

        $page = new PageCurriculum();

        $this->data_user->getUser($this->user_logado->getid_usuario());

        $page->setTpl("update_personal_data", array(
            "user" => $this->data_user->getValues(),
            "countries"=> $this->contact->listcountries(),
            "uf" => $this->contact->listuf()

        ));

    }

    /**
     * Carrega Tela de Cadastro dos Contato e Endereço
     */
    public function saveContact():void {

        $page = new PageCurriculum();

        $this->data_user->getUser($this->user_logado->getid_usuario());

        $page->setTpl("create_contact", array(
            "user" => $this->data_user->getValues(),
            "countries"=> $this->contact->listcountries()
        ));

    }

    /**
     * Carrega Tela de Atualizar dos Contato e Endereço
     */
    public function updateContact():void {

        $page = new PageCurriculum();

        $this->data_user->getUser($this->user_logado->getid_usuario());

        $page->setTpl("update_contact", array(
            "user" => $this->data_user->getValues(),
            "countries"=> $this->contact->listcountries()
        ));

    }


    /**
     * Carrega Tela de Cadastro de Deficiência
     */
    public function saveDeficiency():void {

        $page = new PageCurriculum();

        $this->data_user->getUser($this->user_logado->getid_usuario());

        $page->setTpl("create_deficiency", array(
            "user" => $this->data_user->getValues()
        ));

    }

    /**
     * Carrega Tela de Cadastro da Formação Acadêmica
     */
    public function saveAcademicFormation():void {

        $page = new PageCurriculum();

        $this->data_user->getUser($this->user_logado->getid_usuario());

        $page->setTpl("create_academic_formation", array(
            "user" => $this->data_user->getValues()
        ));

    }

    /**
     * Carrega Tela de Cadastro da Outros Cursos
     */
    public function saveOtherCourses():void {

        $page = new PageCurriculum();

        $this->data_user->getUser($this->user_logado->getid_usuario());

        $page->setTpl("create_other_courses", array(
            "user" => $this->data_user->getValues(),
            "courses"=>$this->formation->getOtherCourses($this->user_logado->getid_usuario())
        ));

    }

    /**
     * Carrega Tela de Cadastro de Idiomas
     */
    public function saveLanguages():void {

        $page = new PageCurriculum();

        $this->data_user->getUser($this->user_logado->getid_usuario());

        $page->setTpl("create_languages", array(
            "user" => $this->data_user->getValues(),
            "languages"=>$this->formation->getLanguages($this->user_logado->getid_usuario()),
            "lang_cad"=>$this->formation->languages()
        ));

    }

    /**
     * Carrega Tela de Cadastro de Experiência Profissional
     */
    public function saveProfessional():void {

        $page = new PageCurriculum();

        $this->data_user->getUser($this->user_logado->getid_usuario());

        $page->setTpl("create_professional", array(
            "user" => $this->data_user->getValues(),
            "professional"=>$this->professional->getExProfessional($this->user_logado->getid_usuario()),
        ));

    }

    /**
     * Carrega Tela de Finalizar Curriculo
     */
    public function saveCurriculum():void {

        if($this->curruculum->checkCurriculum($this->user_logado->getid_usuario())) {

            $this->router->redirect("app.start");
            return;
        }

        $page = new PageCurriculum();

        $this->data_user->getUser($this->user_logado->getid_usuario());

        $page->setTpl("finish_curriculum", array(
            "user" => $this->data_user->getValues()
        ));

    }

    /**
     * Carrega rota de Logout
     */
    public function logout():void{

        User::logout();

        $this->router->redirect("web.home");

    }


}