<?php


namespace Source\App;


use Source\Models\Support\Support;
use Source\Models\User;

/**
 * Class SupportController
 * @package Source\App
 */
class SupportController extends Controller{

    private $support;
    private $user_data;

    /**
     * AuthController constructor.
     * @param $router
     */
    public function __construct($router) {
        parent::__construct($router);

        $this->support = new Support();
        $this->user_data = new User();
    }

    /**
     * @param $data
     * Envia Email de Recuperação de Senha
     */
    public function forgot($data):void{

        $data = filter_var_array($data, FILTER_VALIDATE_EMAIL);

        if(in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha seu E-mail!"
            ]);
            return;
        }

        try{

            $this->support->getEmailRecoverPass($data["email"]);

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("web.sent")
            ]);
            return;

        } catch ( \Exception $e){
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" =>$e->getMessage()
            ]);
            return;
        }

    }

    /**
     * @param $data
     * @throws \Exception
     * Atualizar senha no processo de Recuperação
     */
    public function reset($data):void{
        $data = filter_var_array($data, FILTER_DEFAULT);

        if(in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos para cadastrar!"
            ]);
            return;
        }
        try{

            $recover_pass = $this->support->validRecoverDecrypt($data["code"]);

            if (strlen($data["senha_nova"]) < 8) {
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "Senha precisa ser de no minimo 8 caracteres!"
                ]);
                return;
            }

            $this->support->setRecoverUsed($recover_pass["id_recupera"]);

        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $e->getMessage()
            ]);
            return;
        }

        $this->user_data->getUser($recover_pass["id_usuario"]);

        $this->user_data->setsenha($data["senha_nova"]);

        $this->user_data->updatePassword();

        echo $this->ajaxResponse("redirect", [
            "url" =>$this->router->route("web.resetSuccess")
        ]);
        return;

    }

    /**
     * @param $data
     * Registro Solicitação
     */
    public function saveSolicitation($data):void{

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        if(in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos para registrar solcitação!"
            ]);
            return;
        }

        try {

            $this->user_data->getUserCpf($data["cpf"]);
            $this->user_data->getValues();


           if($data["email"] != $this->user_data->getemail()) {

               echo $this->ajaxResponse("message", [
                   "type" => "error",
                   "message" =>"Dados Não Conferem! Verifique e Tente Novamente!"
               ]);
               return;

           }

                $this->support->getEmailSupport($this->user_data->getemail());

                $this->support->setid_usuario($this->user_data->getid_usuario());
                $this->support->setsituacao("pendente");

                $this->support->setData($data);

                $this->support->saveSolicitation();

                echo $this->ajaxResponse("redirect", [
                    "url" =>$this->router->route("web.sentSolicitation")

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

}