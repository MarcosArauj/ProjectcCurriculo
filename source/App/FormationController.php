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

    private $data_user;
    private $formation;

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
            $this->data_user->getValues();

            $this->formation = new Formation();
            $this->formation->setid_usuario((INT)$this->user_logado->getid_usuario());
        }

    }

    /**
     * @param $data
     * Cadastro e Atulização de Formação Academica
     */
    public function saveAcademicFormation($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $this->formation->setid_formacao($this->data_user->getid_formacao());

            $this->formation->setData($data);

            $this->formation->saveAcademicFormation();

            if($this->data_user->getid_formacao()) {
                echo $this->ajaxResponse("redirect", [
                    "url" => $this->router->route("app.saveAcademicFormation")
                ]);
                flash("success", "Dados Altualizados com Sucesso");
                return;

            } else {
                echo $this->ajaxResponse("redirect", [
                    "url" => $this->router->route("app.saveOtherCourses")
                ]);
                flash("success", "Sucesso no Registro de sua formação acadêmica");
                return;

            }

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

            $this->formation->setData($data);

            $this->formation->saveOtherCourses();

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
     * Atualização de Outros Cursos
     */
    public function updateOtherCourses($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if(in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos para cadastrar!"
            ]);
            return;
        }

        try {

            $this->formation->setid_cursos($this->data_user->getid_cursos());

            $this->formation->setData($data);

            $this->formation->saveOtherCourses();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.updateOtherCourses")

            ]);
            flash("success","Dados do Curso Atualizado");
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
     * Exclui de Outros Cursos
     */
    public function deleteOtherCourses($data):void {

        try {

            $this->formation->getOtherCourses($data["id_cursos"]);

            $this->formation->deleteOtherCourses();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.otherCourses")

            ]);
            flash("success","Curso Excluido com Sucesso!");
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

            if($this->formation->checkLanguage((INT)$this->user_logado->getid_usuario(),$data["idioma"]) == true) {

                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" =>"Você já registrou esse Idioma"
                ]);
                return;

            }

            $this->formation->setData($data);

            $this->formation->saveLanguages();

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
     * Atualização de Idiomas
     */
    public function updateLanguages($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $this->formation->setid_idiomac($this->data_user->getid_idiomac());

            $this->formation->setData($data);

            $this->formation->saveLanguages();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.updateLanguages")

            ]);
            flash("success","Idioma Atualizado com Sucesso");
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

            if($this->formation->checkLanguageExists($data["idioma_pt"]) == true) {

                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" =>"Idioma Já Cadastrado"
                ]);
                return;
            }

            $this->formation->setData($data);

            //Novo Idioma no Sistema
            $this->formation->createLanguage();

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

    /**
     * @param $data
     * Exclui de Idioma para o Usuário
     */
    public function deleteLanguages($data):void {

        try {

            $this->formation->getLanguages($data["id_idiomac"]);

            $this->formation->deleteLanguages();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.languages")
            ]);
            flash("success","Idioma Excluido com Sucesso!");
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