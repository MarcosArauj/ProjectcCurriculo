<?php


namespace Source\App;

use Source\Models\Login;
use Source\Models\User;

/**
 * Class WebController
 * @package Source\App
 */
class AuthController extends Controller {

    /**
     * AuthController constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);

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

            if(User::checkEmail($data["email"]) === true){
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

                $user = new User();
                $user->setData($data);

                $user->saveUser();

                $_SESSION[User::SESSION] = $user->getValues();

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

        $email = filter_var($data["login"], FILTER_VALIDATE_EMAIL);
        $password = filter_var($data["senha"], FILTER_DEFAULT);

        if(!$email || !$password) {
            echo $this->ajaxResponse("message",[
                "type"=>"alert",
                "message"=>"Dados Inválidos, informe seu e-mail e senha corretos para logar!"
            ]);
            return;
        }

        try {

            Login::loginUser($email,$password);

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


}