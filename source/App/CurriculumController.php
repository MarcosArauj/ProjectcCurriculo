<?php


namespace Source\App;


use Source\Models\Contact;
use Source\Models\Curriculum;
use Source\Models\PersonalData;
use Source\Models\Login;

/**
 * Class CurriculumController
 * @package Source\App
 */
class CurriculumController extends Controller {

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
     * @param $data
     * Cadastro de Dados Pessoais
     */
    public function savePersonalData($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            if(PersonalData::checkCpf($data["cpf"]) === true) {
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "CPF informado já está em uso!"
                ]);
                return;
            }

            $personalData = new PersonalData();

            $personalData->setid_usuario((INT)$this->user_logado->getid_usuario());

            $personalData->setData($data);

            $personalData->savePersonalData();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveContact")

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

    /**
     * @param $data
     * Cadastro de Contato e Endereço
     */
    public function saveContact($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $contact = new Contact();

            $contact->setid_usuario((INT)$this->user_logado->getid_usuario());
            $contact->setc_email($this->user_logado->getemail());

            $contact->setData($data);

            $contact->saveContact();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveAcademicFormation")

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

    /**
     * @param $data
     * Cadastro de Formação Academica
     */
    public function saveAcademicFormation($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $formation = new Curriculum();

            $formation->setid_usuario((INT)$this->user_logado->getid_usuario());

            $formation->setData($data);

            $formation->saveAcademicFormation();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveOtherCourses")

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

    /**
     * @param $data
     * Cadastro de Outros Cursos
     */
    public function saveOtherCourses($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if(in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos para cadastrar!"
            ]);
            return;
        }

        try {

            $courses = new Curriculum();

            $courses->setid_usuario((INT)$this->user_logado->getid_usuario());

            $courses->setData($data);

            $courses->saveOtherCourses();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveOtherCourses")

            ]);
            flash("success","Dados Cadastrados Com Sucesso");
            return;


        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" =>$e->getMessage()
            ]);
            return;
        }

    }

    /**
     * @param $data
     * Cadastro de Idiomas
     */
    public function saveLanguages($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $id_user = $this->user_logado->getid_usuario();

            if(Curriculum::checkLanguage((INT)$id_user,$data["idioma"]) == true) {

                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" =>"Você já registrou esse Idioma"
                ]);
                return;

            }

            $language_user = new Curriculum();

            $language_user->setid_usuario((INT)$id_user);

            $language_user->setData($data);

            // Idioma do Usuario
            $language_user->saveLanguagesCurriculum();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveLanguages")

            ]);
            flash("success","Dados Cadastrados Com Sucesso");
            return;

        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" =>$e->getMessage()
            ]);
            return;
        }

    }

    public function createLanguage($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            if(Curriculum::checkLanguageExists($data["idioma_pt"]) == true) {

                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" =>"Idioma Já Cadastrado"
                ]);
                return;

            }

            $language = new Curriculum();

            $language->setData($data);

            //Novo Idioma no Sistema
            $language->saveLanguage();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveLanguages")

            ]);
            flash("success","Idioma Cadastrado Com Sucesso");
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

