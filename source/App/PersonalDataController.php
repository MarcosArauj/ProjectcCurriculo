<?php


namespace Source\App;


use Source\Models\Contact;
use Source\Models\Curriculum;
use Source\Models\Login;
use Source\Models\PersonalData;

class PersonalDataController extends Controller {

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
                "url" =>$this->router->route("app.personalData")

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