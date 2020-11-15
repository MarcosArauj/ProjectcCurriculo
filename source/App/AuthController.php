<?php


namespace Source\App;

use Source\Models\Login;
use Source\Models\Support\Support;
use Source\Models\User;


/**
 * Class AuthController
 * @package Source\App
 */
class AuthController extends Controller {

    /**
     * @var User
     */
    private $user_login;
    private $recover;

    /**
     * AuthController constructor.
     * @param $router
     */
    public function __construct($router) {
        parent::__construct($router);

        $this->user_login = new Login();
        $this->recover = new Support();

    }

    /**
     * @param $data
     * Registro Inicial de Usuario no Sistema
     */
    public function register($data): void{

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
        if (in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos para cadastrar!"
            ]);
            return;
        }

        try {

            if ($this->user_login->checkEmail($data["email"]) === true) {
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "O e-mail informado já está em uso!"
                ]);
                return;
            } else if (strlen($data["senha"]) < 8) {
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "Senha precisa ser de no minimo 8 caracteres!"
                ]);
                return;
            }

            $this->user_login->setData($data);

            $this->user_login->saveUser();

            $_SESSION[User::SESSION] = $this->user_login->getValues();

            echo $this->ajaxResponse("redirect", [
                "url" => $this->router->route("app.start")

            ]);
            return;

        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $e->getMessage()
            ]);
            return;
        }

    }


    /**
     * @param $data
     * Login no Sistema
     */
    public function login($data): void {

        $login = filter_var($data["login"], FILTER_SANITIZE_STRIPPED);
        $password = filter_var($data["senha"], FILTER_DEFAULT);

        if (!$login || !$password) {
            echo $this->ajaxResponse("message", [
                "type" => "alert",
                "message" => "Dados Inválidos, informe seu Usuário(e-mail ou CPF) e senha corretos para logar!"
            ]);
            return;
        }

        try {

            $this->user_login->loginUser($login, $password);

            if(checkCurriculum()) {
                echo $this->ajaxResponse("redirect", [
                    "url" => $this->router->route("app.profile")
                ]);
                return;
            } else {

                echo $this->ajaxResponse("redirect", [
                    "url" => $this->router->route("app.dashboard")
                ]);
                return;
            }

        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $e->getMessage()
            ]);
            return;
        }

    }

}