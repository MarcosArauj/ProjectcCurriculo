<?php


namespace Source\App;


use Source\Models\Contact;
use Source\Models\PersonalData;
use Source\Models\User;

/**
 * Class PersonalDataController
 * @package Source\App
 */
class PersonalDataController extends Controller {

    /**
     * @var \Source\Models\User
     * Pegar Usuario logado
     */
    private $user_logado;

    /**
     * @var User
     */
    private $data_user;

    private $personalData;

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

            $this->personalData =  new PersonalData();
        }

    }

    /**
     * @param $data
     * Salvar de Dados Pessoais
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

            $this->personalData->setid_usuario($this->user_logado->getid_usuario());

            $this->personalData->setData($data);

            $this->personalData->savePersonalData();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.savePersonalData")

            ]);
            flash("success","Sucesso no Registro! Clique em Próximo para Registrar seu Contato e Endereço");
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
     * Atualiza de Dados Pessoais
     */
    public function updatePersonalData($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            if((PersonalData::checkCpf($data["cpf"]) === true) && (!$this->user_logado->getid_usuario()) ) {
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "CPF informado já está em uso!"
                ]);
                return;
            }

            $this->data_user->getUser($this->user_logado->getid_usuario());

            $this->data_user->getValues();

            $personalData = new PersonalData();

            $personalData->setid_pessoa($this->data_user->getid_pessoa());

            $personalData->setData($data);

            $personalData->updatePersonalData();

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

            $contact = new PersonalData();

            $contact->setid_usuario((INT)$this->user_logado->getid_usuario());
            $contact->setc_email($this->user_logado->getemail());

            $contact->setData($data);

            $contact->saveContact();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveContact")

            ]);
            flash("success","Sucesso no Registro! Clique em Próximo para Registrar Deficiência se Houver");
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
     * Cadastro de Deficiência
     */
    public function saveDeficiency($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $deficiency = new PersonalData();

            $deficiency->setid_usuario((INT)$this->user_logado->getid_usuario());

            $data["regime_cota"] = (isset($data["regime_cota"]))? "Sim": "Não";

            $deficiency->setData($data);

            $deficiency->saveDeficiency();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveDeficiency")

            ]);
            flash("success","Sucesso no Registro! Clique em Próximo para Registrar Formação Acadêmica");
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