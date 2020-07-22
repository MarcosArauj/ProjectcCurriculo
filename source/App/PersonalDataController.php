<?php


namespace Source\App;


use Source\Models\Address;
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
    private $contact;

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
            $this->data_user->getUser($this->user_logado->getid_usuario());
            $this->data_user->getValues();

            $this->personalData =  new PersonalData();
            $this->personalData->setid_usuario((INT)$this->user_logado->getid_usuario());
            $this->contact = new Address();
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

                echo $this->ajaxResponse("redirect", [
                    "url" =>$this->router->route("app.saveDeficiency")
                ]);
                flash("success","Sucesso no Registro! Clique em Próximo para Registrar Formação Acadêmica");
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



}