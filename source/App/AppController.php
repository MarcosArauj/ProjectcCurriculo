<?php


namespace Source\App;

use Source\App\Pages\PageCurriculum;
use Source\App\Pages\PageWeb;
use Source\Models\Curriculum;
use Source\Models\Formation;
use Source\Models\Login;
use Source\Models\PersonalData;
use Source\Models\Professional;
use Source\Models\Contact;
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

        if(!Login::verifyLogin()) {
            flash("error","Acesso negado, favor logar-se");
            Login::logout();
            $this->router->redirect("web.home");
        } else {
            $this->user_logado = Login::getFromSession();
            $this->data_user = new User();
            $this->data_user->getUser($this->user_logado->getid_usuario());

            $this->personalData = new PersonalData();
            $this->contact = new Contact();
            $this->formation = new Formation();
            $this->professional = new Professional();

            $this->curruculum = new Curriculum();
            $this->curruculum->getCurriculum($this->user_logado->getid_usuario());
        }

    }

    /**
     * Carrega tela de Inicio de Cadastro no Sistema
     */
    public function start():void {

        $access = Login::checkLogin();
        $page = new PageWeb();

        if ($access == false) {
            $page->setTpl("start", array(
                "user" => $this->user_logado->getValues()
            ));

        } else {
            $page->setTpl("home");
        }

    }

    /**
     * Carrega Tela de Area de Trabalho Principal
     */
    public function dashboard():void {

        $page = new PageCurriculum();

        $page->setTpl("dashboard", array(
            "curriculum" => $this->curruculum->getValues()
        ));

    }

    /**
     * Carrega Tela Pefil
     */
    public function profile():void {

        $page = new PageCurriculum();

        $page->setTpl("profile", array(
            "user" => $this->data_user->getValues()
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

        $page->setTpl("create_deficiency", array(
            "user" => $this->data_user->getValues()
        ));

    }

    /**
     * Carrega Tela de Atualiza de Deficiência
     */
    public function updateDeficiency():void {

        $page = new PageCurriculum();

        $page->setTpl("update_deficiency", array(
            "user" => $this->data_user->getValues()
        ));

    }

    /**
     * Carrega Tela de Cadastro da Formação Acadêmica
     */
    public function saveAcademicFormation():void {

        $page = new PageCurriculum();

        $page->setTpl("create_academic_formation", array(
            "user" => $this->data_user->getValues()
        ));

    }

    /**
     * Carrega Tela de Atualização da Formação Acadêmica
     */
    public function updateAcademicFormation():void {

        $page = new PageCurriculum();

        $page->setTpl("update_academic_formation", array(
            "user" => $this->data_user->getValues()
        ));

    }

    /**
     * Carrega Tela Outros Cursos
     */
    public function otherCourses():void {

        $page = new PageCurriculum();

        $page->setTpl("other_courses", array(
            "courses"=>$this->formation->getOtherCoursesUser($this->user_logado->getid_usuario())
        ));

    }

    /**
     * Carrega Tela de Cadastro de Outros Cursos
     */
    public function saveOtherCourses():void {

        $page = new PageCurriculum();

        $page->setTpl("create_other_courses", array(
            "user" => $this->data_user->getValues(),
            "courses"=>$this->formation->getOtherCoursesUser($this->user_logado->getid_usuario())
        ));

    }

    /**
     * Carrega Tela de Ataluzação de Outros Cursos
     */
    public function updateOtherCourses($data):void {

        $page = new PageCurriculum();

        $this->formation->getOtherCourses($data["id_cursos"]);

        $page->setTpl("update_other_courses", array(
            "user" => $this->data_user->getValues(),
            "courses"=>$this->formation->getValues()
        ));
    }

    /**
     * Carrega Tela de Detalhar de Outros Cursos
     */
    public function detailOtherCourses($data):void {

        $page = new PageCurriculum();

        $this->formation->getOtherCourses($data["id_cursos"]);

        $page->setTpl("detail_other_courses", array(
            "user" => $this->data_user->getValues(),
            "courses"=>$this->formation->getValues()
        ));

    }

    /**
     * Carrega Tela de Idiomas
     */
    public function languages():void {

        $page = new PageCurriculum();

        $page->setTpl("languages", array(
            "languages"=>$this->formation->getLanguagesUser($this->user_logado->getid_usuario())
        ));
    }

    /**
     * Carrega Tela de Cadastro de Idiomas
     */
    public function saveLanguages():void {

        $page = new PageCurriculum();

        $page->setTpl("create_languages", array(
            "user" => $this->data_user->getValues(),
            "languages"=>$this->formation->getLanguagesUser($this->user_logado->getid_usuario()),
            "lang_cad"=>$this->formation->languages()
        ));
    }

    /**
     * Carrega Tela de Atualização de Idiomas
     */
    public function updateLanguages($data):void {

        $page = new PageCurriculum();

        $this->formation->getLanguages($data["id_idiomac"]);

        $page->setTpl("update_languages", array(
            "user" => $this->data_user->getValues(),
            "languages" =>$this->formation->getValues(),
            "lang_cad"=>$this->formation->languages()
        ));
    }

    /**
     * Carrega Tela de Experiência Profissional
     */
    public function professional():void {

        $page = new PageCurriculum();

        $page->setTpl("professional", array(
            "professional"=>$this->professional->getExProfessionalUser($this->user_logado->getid_usuario())
        ));
    }

    /**
     * Carrega Tela de Cadastro de Experiência Profissional
     */
    public function saveProfessional():void {

        $page = new PageCurriculum();

        $page->setTpl("create_professional", array(
            "user" => $this->data_user->getValues(),
            "professional"=>$this->professional->getExProfessionalUser($this->user_logado->getid_usuario()),
        ));

    }

    /**
     * Carrega Tela de Atualização de Experiência Profissional
     */
    public function updateProfessional($data):void {

        $page = new PageCurriculum();

        $this->professional->getExProfessional($data["id_profissional"]);

        $page->setTpl("update_professional", array(
            "user" => $this->data_user->getValues(),
            "professional"=>$this->professional->getValues()
        ));
    }

    /**
     * Carrega Tela de Detalahr de Experiência Profissional
     */
    public function detailProfessional($data):void {

        $page = new PageCurriculum();

        $this->professional->getExProfessional($data["id_profissional"]);

        $page->setTpl("detail_professional", array(
            "user" => $this->data_user->getValues(),
            "professional"=>$this->professional->getValues()
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

        $page->setTpl("finish_curriculum", array(
            "user" => $this->data_user->getValues()
        ));

    }

    /**
     * Carrega Tela Alterar Senha
     */
    public function updatePassword():void {

        $page = new PageCurriculum();

        $page->setTpl("update_password", array(
            "user" => $this->data_user->getValues()
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