<?php


namespace Source\App;

use Source\Models\Login;
use Source\Models\Support\RecoverPassword;
use Source\Models\User;

/**
 * Class WebController
 * @package Source\App
 */
class AuthController extends Controller {

    /**
     * @var User
     */
    private $user;

    /**
     * AuthController constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);

        $this->user = new User();

    }

    /**
     * @param $data
     * Registro Inicial de Usuario no Sistema
     */
    public function register($data):void{

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        if(in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos para cadastrar!"
            ]);
            return;
        }

        try {

            if($this->user->checkEmail($data["email"]) === true){
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "O e-mail informado já está em uso!"
                ]);
                return;
            } else if(strlen($data["senha"]) < 8) {
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "Senha precisa ser de no minimo 8 caracteres!"
                ]);
                return;
            }

                $this->user->setData($data);

                $this->user->saveUser();

                $_SESSION[User::SESSION] = $this->user->getValues();

                echo $this->ajaxResponse("redirect", [
                 "url" =>$this->router->route("app.start")

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
     * Login no Sistema
     */
    public function login($data):void {

        $login = filter_var($data["login"], FILTER_SANITIZE_STRIPPED);
        $password = filter_var($data["senha"], FILTER_DEFAULT);

        if(!$login || !$password) {
            echo $this->ajaxResponse("message",[
                "type"=>"alert",
                "message"=>"Dados Inválidos, informe seu Usuário(e-mail ou CPF) e senha corretos para logar!"
            ]);
            return;
        }

        try {


            $this->user->loginUser($login,$password);

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.dashboard")

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

            RecoverPassword::getEmailRecoverPass($data["email"]);

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

            $recover = RecoverPassword::validRecoverDecrypt($data["code"]);

            RecoverPassword::setRecoverUsed($recover["id_recupera"]);

        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $e->getMessage()
            ]);
            return;
        }

        $user = new User();

        $user->getUser($recover["id_usuario"]);

        $user->setsenha($data["senha_nova"]);

        $user->updatePassword();

        echo $this->ajaxResponse("redirect", [
            "url" =>$this->router->route("web.resetSuccess")
        ]);
        return;

    }


}