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

        $head = $this->seo->optimize(
            "Bem Vindo(a) " . site("name"),
            site("desc"),
            $this->router->route("web.home"),
            routeImage("Home")
        )->render();

        if ($access == false) {

            echo $this->view->render("theme/web/start",[
                "head" =>$head,
                "user" => (object)$this->data_user->getValues()
            ]);

        } else {
            echo $this->view->render("theme/web/home",[
                "head" =>$head
            ]);
        }

    }

    /**
     * Carrega Tela de Area de Trabalho Principal
     */
    public function dashboard():void {

        $head = $this->seo->optimize(
            "Bem Vindo(a) " . site("name"),
            site("desc"),
            $this->router->route("app.dashboard"),
            routeImage("Dashboard")
        )->render();

        echo $this->view->render("theme/curriculum/dashboard",[
            "head" =>$head,
            "user" => (object)$this->curruculum->getValues()
        ]);

    }

    /**
     * Carrega Tela Pefil
     */
    public function profile():void {

        $head = $this->seo->optimize(
            "Perfil " . getNameUser(),
            site("desc"),
            $this->router->route("app.profile"),
            routeImage("Profile")
        )->render();

        echo $this->view->render("theme/curriculum/profile",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues()
        ]);

    }

    /**
     * Carrega Tela de Cadastro dos Dados Pessoais
     */
    public function savePersonalData():void {

        $head = $this->seo->optimize(
            "Dados Pessoais - " . site("name"),
            site("desc"),
            $this->router->route("app.savePersonalData"),
            routeImage("Personal Data")
        )->render();

        echo $this->view->render("theme/curriculum/create_personal_data",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues(),
            "countries"=> (object)$this->contact->listcountries(),
            "uf" => (object)$this->contact->listuf()
        ]);

    }

    /**
     * Carrega Tela de Atualização dos Dados Pessoais
     */
    public function updatePersonalData():void {

        $head = $this->seo->optimize(
            "Dados Pessoais - " . site("name"),
            site("desc"),
            $this->router->route("app.updatePersonalData"),
            routeImage("Personal Data Update")
        )->render();

        echo $this->view->render("theme/curriculum/update_personal_data",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues(),
            "countries"=> (object)$this->contact->listcountries(),
            "uf" => (object)$this->contact->listuf()
        ]);

    }

    /**
     * Carrega Tela de Cadastro dos Contato e Endereço
     */
    public function saveContact():void {

        $head = $this->seo->optimize(
            "Contato - " . site("name"),
            site("desc"),
            $this->router->route("app.saveContact"),
            routeImage("Contact")
        )->render();

        echo $this->view->render("theme/curriculum/create_contact",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues(),
            "countries"=> (object)$this->contact->listcountries()

        ]);

    }

    /**
     * Carrega Tela de Atualizar dos Contato e Endereço
     */
    public function updateContact():void {

        $head = $this->seo->optimize(
            "Contato - " . site("name"),
            site("desc"),
            $this->router->route("app.updateContact"),
            routeImage("Contact")
        )->render();

        echo $this->view->render("theme/curriculum/update_contact",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues(),
            "countries"=> (object)$this->contact->listcountries()

        ]);

    }

    /**
     * Carrega Tela de Cadastro de Deficiência
     */
    public function saveDeficiency():void {

        $head = $this->seo->optimize(
            "Deficiência - " . site("name"),
            site("desc"),
            $this->router->route("app.saveDeficiency"),
            routeImage("Deficiency")
        )->render();

        echo $this->view->render("theme/curriculum/create_deficiency",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues()
        ]);

    }

    /**
     * Carrega Tela de Atualiza de Deficiência
     */
    public function updateDeficiency():void {

        $head = $this->seo->optimize(
            "Deficiência - " . site("name"),
            site("desc"),
            $this->router->route("app.updateDeficiency"),
            routeImage("Deficiency")
        )->render();

        echo $this->view->render("theme/curriculum/update_deficiency",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues()
        ]);

    }

    /**
     * Carrega Tela de Cadastro da Formação Acadêmica
     */
    public function saveAcademicFormation():void {

        $head = $this->seo->optimize(
            "Formação Acadêmica - " . site("name"),
            site("desc"),
            $this->router->route("app.saveAcademicFormation"),
            routeImage("Academic Formation")
        )->render();

        echo $this->view->render("theme/curriculum/create_academic_formation",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues()
        ]);

    }

    /**
     * Carrega Tela de Atualização da Formação Acadêmica
     */
    public function updateAcademicFormation():void {

        $head = $this->seo->optimize(
            "Formação Acadêmica - " . site("name"),
            site("desc"),
            $this->router->route("app.updateAcademicFormation"),
            routeImage("Academic Formation")
        )->render();

        echo $this->view->render("theme/curriculum/update_academic_formation",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues()
        ]);

    }

    /**
     * Carrega Tela Outros Cursos
     */
    public function otherCourses():void {

        $head = $this->seo->optimize(
            "Outros Cursos - " . site("name"),
            site("desc"),
            $this->router->route("app.otherCourses"),
            routeImage("Other Courses")
        )->render();

        echo $this->view->render("theme/curriculum/other_courses",[
            "head" =>$head,
            "user" => (object)$this->formation->getOtherCoursesUser($this->user_logado->getid_usuario())
        ]);

    }

    /**
     * Carrega Tela de Cadastro de Outros Cursos
     */
    public function saveOtherCourses():void {

        $head = $this->seo->optimize(
            "Outros Cursos - " . site("name"),
            site("desc"),
            $this->router->route("app.saveOtherCourses"),
            routeImage("Other Courses")
        )->render();

        echo $this->view->render("theme/curriculum/create_other_courses",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues(),
            "user" => (object)$this->formation->getOtherCoursesUser($this->user_logado->getid_usuario())
        ]);

    }

    /**
     * Carrega Tela de Ataluzação de Outros Cursos
     */
    public function updateOtherCourses($data):void {

        $this->formation->getOtherCourses($data["id_cursos"]);

        $head = $this->seo->optimize(
            "Outros Cursos - " . site("name"),
            site("desc"),
            $this->router->route("app.updateOtherCourses"),
            routeImage("Other Courses")
        )->render();

        echo $this->view->render("theme/curriculum/update_other_courses",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues(),
            "courses" => (object)$this->formation->getValues()
        ]);

    }

    /**
     * Carrega Tela de Detalhar de Outros Cursos
     */
    public function detailOtherCourses($data):void {

        $this->formation->getOtherCourses($data["id_cursos"]);

        $head = $this->seo->optimize(
            "Outros Cursos - " . site("name"),
            site("desc"),
            $this->router->route("app.detailOtherCourses"),
            routeImage("Other Courses")
        )->render();

        echo $this->view->render("theme/curriculum/detail_other_courses",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues(),
            "courses" => (object)$this->formation->getValues()
        ]);

    }

    /**
     * Carrega Tela de Idiomas
     */
    public function languages():void {

        $head = $this->seo->optimize(
            "Idiomas - " . site("name"),
            site("desc"),
            $this->router->route("app.languages"),
            routeImage("Languages")
        )->render();

        echo $this->view->render("theme/curriculum/languages",[
            "head" =>$head,
            "languages"=>(object)$this->formation->getLanguagesUser($this->user_logado->getid_usuario())
        ]);

    }

    /**
     * Carrega Tela de Cadastro de Idiomas
     */
    public function saveLanguages():void {

        $head = $this->seo->optimize(
            "Salvar Idiomas - " . site("name"),
            site("desc"),
            $this->router->route("app.saveLanguages"),
            routeImage("Save Languages")
        )->render();

        echo $this->view->render("theme/curriculum/create_languages",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues(),
            "languages"=>(object)$this->formation->getLanguagesUser($this->user_logado->getid_usuario()),
            "lang_cad"=>(object)$this->formation->languages()
        ]);

    }

    /**
     * Carrega Tela de Atualização de Idiomas
     */
    public function updateLanguages($data):void {

        $this->formation->getLanguages($data["id_idiomac"]);

        $head = $this->seo->optimize(
            "Idiomas - " . site("name"),
            site("desc"),
            $this->router->route("app.updateLanguages"),
            routeImage("Languages Update")
        )->render();

        echo $this->view->render("theme/curriculum/update_languages",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues(),
            "languages"=>(object)$this->formation->getValues(),
            "lang_cad"=>(object)$this->formation->languages()
        ]);

    }

    /**
     * Carrega Tela de Experiência Profissional
     */
    public function professional():void {

        $head = $this->seo->optimize(
            "Experiência Profissional - " . site("name"),
            site("desc"),
            $this->router->route("app.professional"),
            routeImage("Professional")
        )->render();

        echo $this->view->render("theme/curriculum/professional",[
            "head" =>$head,
            "professional"=>(object)$this->professional->getExProfessionalUser($this->user_logado->getid_usuario())
        ]);

    }

    /**
     * Carrega Tela de Cadastro de Experiência Profissional
     */
    public function saveProfessional():void {

        $head = $this->seo->optimize(
            "Experiência Profissional - " . site("name"),
            site("desc"),
            $this->router->route("app.saveProfessional"),
            routeImage("Professional")
        )->render();

        echo $this->view->render("theme/curriculum/create_professional",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues(),
            "professional"=>(object)$this->professional->getExProfessionalUser($this->user_logado->getid_usuario())
        ]);

    }

    /**
     * Carrega Tela de Atualização de Experiência Profissional
     */
    public function updateProfessional($data):void {

        $this->professional->getExProfessional($data["id_profissional"]);

        $head = $this->seo->optimize(
            "Experiência Profissional - " . site("name"),
            site("desc"),
            $this->router->route("app.updateProfessional"),
            routeImage("Professional")
        )->render();

        echo $this->view->render("theme/curriculum/update_professional",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues(),
            "professional"=>(object)$this->professional->getValues()
        ]);

    }

    /**
     * Carrega Tela de Detalahr de Experiência Profissional
     */
    public function detailProfessional($data):void {


        $this->professional->getExProfessional($data["id_profissional"]);

        $head = $this->seo->optimize(
            "Experiência Profissional - " . site("name"),
            site("desc"),
            $this->router->route("app.detailProfessional"),
            routeImage("Professional")
        )->render();

        echo $this->view->render("theme/curriculum/detail_professional",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues(),
            "professional"=>(object)$this->professional->getValues()
        ]);

    }


    /**
     * Carrega Tela de Finalizar Curriculo
     */
    public function saveCurriculum():void {

        if($this->curruculum->checkCurriculum($this->user_logado->getid_usuario())) {

            $this->router->redirect("app.start");
            return;
        }

        $head = $this->seo->optimize(
            "Curriculo- " . site("name"),
            site("desc"),
            $this->router->route("app.saveCurriculum"),
            routeImage("Save Curriculum")
        )->render();

        echo $this->view->render("theme/curriculum/finish_curriculum",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues()
        ]);

    }

    /**
     * Carrega Tela Alterar Senha
     */
    public function updatePassword():void {

        $head = $this->seo->optimize(
            "Alterar Senha- " . site("name"),
            site("desc"),
            $this->router->route("app.updatePassword"),
            routeImage("Update Password")
        )->render();

        echo $this->view->render("theme/curriculum/update_password",[
            "head" =>$head,
            "user" => (object)$this->data_user->getValues()
        ]);

    }

    /**
     * Carrega rota de Logout
     */
    public function logout():void{

        Login::logout();

        $this->router->redirect("web.home");

    }


}