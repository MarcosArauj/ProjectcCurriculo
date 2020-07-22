<?php


namespace Source\App;


use Source\Config\Conection;
use Source\Models\Curriculum;
use Source\Models\Formation;
use Source\Models\Login;
use Source\Models\User;

/**
 * Class FormationController
 * @package Source\App
 */
class FormationController extends Controller {

    /**
     * @var \Source\Models\User
     * Pegar Usuario logado
     */
    private $user_logado;

    /**
     * @var User
     */
    private $data_user;

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
        }

    }

    /**
     * @param $data
     * Cadastro de Formação Academica
     */
    public function saveAcademicFormation($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $formation = new Formation();

            $formation->setid_usuario((INT)$this->user_logado->getid_usuario());

            $formation->setData($data);

            $formation->saveAcademicFormation();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveAcademicFormation")

            ]);
            flash("success","Sucesso no Registro! Clique em Próximo para Registrar Outros Cursos");
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

            $courses = new Formation();

            $courses->setid_usuario((INT)$this->user_logado->getid_usuario());

            $courses->setData($data);

            $courses->saveOtherCourses();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveOtherCourses")

            ]);
            flash("success","Sucesso no Registro! Clique em Próximo para Idiomas ou Adicione + Cursos");
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

            if(Formation::checkLanguage((INT)$this->user_logado->getid_usuario(),$data["idioma"]) == true) {

                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" =>"Você já registrou esse Idioma"
                ]);
                return;

            }

            $language_user = new Formation();

            $language_user->setid_usuario((INT)$this->user_logado->getid_usuario());

            $language_user->setData($data);

            $language_user->saveLanguages();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveLanguages")

            ]);
            flash("success","Sucesso no Registro! Clique em Próximo para Experiência Profissional ou Adicione + Idiomas");
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
     * Cadastro de Novo Idioma no Sistema
     */
    public function createLanguage($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            if(Formation::checkLanguageExists($data["idioma_pt"]) == true) {

                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" =>"Idioma Já Cadastrado"
                ]);
                return;
            }

            $language = new Formation();

            $language->setData($data);

            //Novo Idioma no Sistema
            $language->createLanguage();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveLanguages")

            ]);
            flash("success","Idioma Cadastrado Com Sucesso - Agora já pode Selecionar para seu Curriculo");
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