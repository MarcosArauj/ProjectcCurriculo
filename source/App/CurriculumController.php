<?php


namespace Source\App;


use Source\Models\Contact;
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
    public function personalDataSave($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        if(in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos para cadastrar!"
            ]);
            return;
        }

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
                "url" =>$this->router->route("app.contactSave")

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
    public function contactSave($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        if(in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos para cadastrar!"
            ]);
            return;
        }

        try {

            $contact = new Contact();

            $contact->setid_usuario((INT)$this->user_logado->getid_usuario());
            $contact->setc_email($this->user_logado->getemail());

            $contact->setData($data);

            $contact->saveContact();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.contactSave")

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

}

