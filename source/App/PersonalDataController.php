<?php


namespace Source\App;


use CoffeeCode\Uploader\Image;
use Source\Models\Contact;
use Source\Models\Login;
use Source\Models\PersonalData;
use Source\Models\User;

/**
 * Class PersonalDataController
 * @package Source\App
 */
class PersonalDataController extends Controller {

    private $user_logado;
    private $data_user;
    private $personalData;
    private $contact;

    /**
     * AppController constructor.
     * @param $router
     * @throws \Exception
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

            $this->personalData =  new PersonalData();
            $this->personalData->setid_usuario((INT)$this->user_logado->getid_usuario());
            $this->contact = new Contact();
            $this->contact->setid_usuario((INT)$this->user_logado->getid_usuario());
        }

    }

    /**
     * @param $data
     * Salvar de Dados Pessoais
     */
    public function savePersonalData($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            if($this->personalData->checkCpf($data["cpf"]) === true) {
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "CPF informado já está em uso!"
                ]);
                return;
            }

            $this->personalData->setData($data);

            $this->personalData->savePersonalData();

            if($this->user_logado->getid_contato() == NULL) {
                echo $this->ajaxResponse("redirect", [
                    "url" =>$this->router->route("app.saveContact")
                ]);
                flash("success","Sucesso no Registro dos dados pessoais!");
                return;
            } else {
                echo $this->ajaxResponse("redirect", [
                    "url" =>$this->router->route("app.updateContact")
                ]);
                flash("success","Sucesso no Registro dos dados pessoais!");
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
     * Atualiza de Dados Pessoais
     */
    public function updatePersonalData($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            if(($this->personalData->checkCpf($data["cpf"]) === true) && (!$this->user_logado->getid_usuario()) ) {
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "CPF informado já está em uso!"
                ]);
                return;
            }

            $this->personalData->setid_pessoa($this->data_user->getid_pessoa());

            $this->personalData->setData($data);

            $this->personalData->updatePersonalData();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.updatePersonalData")

            ]);
            flash("success","Dados Alterados Com Sucesso");
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

            $this->contact->setc_email($this->user_logado->getemail());

            $this->contact->setData($data);

            $this->contact->saveContact();

            if($this->user_logado->getid_deficiencia() == NULL) {

                echo $this->ajaxResponse("redirect", [
                    "url" => $this->router->route("app.saveDeficiency")
                ]);
                flash("success", "Sucesso no Registro do contato");
                return;
            } else {
                echo $this->ajaxResponse("redirect", [
                    "url" => $this->router->route("app.updateDeficiency")
                ]);
                flash("success", "Sucesso no Registro do contato");
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
     * Atualizar de Contato e Endereço
     */
    public function updateContact($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $this->contact->setid_contato($this->data_user->getid_contato());

            $this->contact->setData($data);

            $this->contact->updateContact();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.updateContact")

            ]);
            flash("success","Dados Alterados");
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
     * Atualizar de Deficiencia
     */
    public function saveDeficiency($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $this->personalData->setid_deficiencia($this->data_user->getid_deficiencia());

            $data["regime_cota"] = (isset($data["regime_cota"]))? "Sim": "Não";

            $this->personalData->setData($data);

            $this->personalData->saveDeficiency();

            if($this->data_user->getid_deficiencia()) {

                echo $this->ajaxResponse("redirect", [
                    "url" => $this->router->route("app.updateDeficiency")
                ]);
                flash("success", "Dados Alterados Com Sucesso");
                return;
            }else {

                if($this->user_logado->getid_formacao() == NULL) {

                    echo $this->ajaxResponse("redirect", [
                        "url" => $this->router->route("app.saveAcademicFormation")
                    ]);
                    flash("success", "Sucesso no Registro de sua deficiência");
                    return;
                } else {
                    echo $this->ajaxResponse("redirect", [
                        "url" => $this->router->route("app.updateAcademicFormation")
                    ]);
                    flash("success", "Sucesso no Registro de sua deficiência");
                    return;
                }
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
     * Atualizar de Deficiencia
     */
    public function updatePassword($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if(in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos para cadastrar!"
            ]);
            return;
        }

        try {

            if (!password_verify($data['senha_atual'], $this->data_user->getsenha())){

                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "Senha Atual Inválida, Gentileza verificar!!"
                ]);
                return;
            } else if(strlen($data["nova_senha"]) < 8) {
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "Senha precisa ser de no minimo 8 caracteres!"
                ]);
                return;
            }

            $this->data_user->setsenha($data['nova_senha']);

            $this->data_user->updatePassword();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.updatePassword")
            ]);
            flash("success","Senha Alterada Com Sucesso");
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
     * Foto
     */
    public function savePhoto($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        if(in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Escolha oto para Cadastro!"
            ]);
            return;
        }

        try {

            $this->data_user->setData($data);

            $this->data_user->savePhoto();

            $this->data_user->setPhotoUser($_FILES["foto_usuario"]);

            flash("success","Sucesso ao salvar Foto");
            $this->router->redirect("app.profile");

        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" =>$e->getMessage()
            ]);
            return;
        }

    }



}