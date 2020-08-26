<?php


namespace Source\App;

use Source\App\Pages\PageRecoverPassword;
use Source\App\Pages\PageWeb;
use Source\Models\Support\RecoverPassword;
use Source\Models\User;

/**
 * Class WebController
 * @package Source\App
 */
class WebController extends Controller {


    public function __construct($router)
    {
        parent::__construct($router);

    }

    public function home():void{

        $head = $this->seo->optimize(
            site("name"),
            site("desc"),
            $this->router->route("web.home"),
            routeImage("Home")
        )->render();

        echo $this->view->render("theme/web/home",[
            "head" =>$head
        ]);

    }

    public function register():void{

        $head = $this->seo->optimize(
            "Crie sua conta no" . site("name"),
            site("desc"),
            $this->router->route("web.register"),
            routeImage("Register")
        )->render();

        echo $this->view->render("theme/web/create_user",[
            "head" =>$head
        ]);
    }

    public function login():void{
        $head = $this->seo->optimize(
            "Faça login no" . site("name"),
            site("desc"),
            $this->router->route("web.login"),
            routeImage("Login")
        )->render();

        echo $this->view->render("theme/web/login",[
            "head" =>$head
        ]);
    }

 //------------- Recuperar Senha ---------------------//
    public function forgot():void{

        $head = $this->seo->optimize(
            "Recuperação de Senha " . site("name"),
            site("desc"),
            $this->router->route("web.forgot"),
            routeImage("Recuperação de Senha")
        )->render();

        echo $this->view->render("theme/recover_password/forgot_password",[
            "head" =>$head
        ]);
    }

    public function sent():void{

        $head = $this->seo->optimize(
            "Recuperação de Senha " . site("name"),
            site("desc"),
            $this->router->route("web.sent"),
            routeImage("Recuperação de Senha")
        )->render();

        echo $this->view->render("theme/recover_password/forgot_sent",[
            "head" =>$head
        ]);

    }

    public function reset($data):void{

        $recover = new RecoverPassword();

        $recover_pass = null;

        try {
            $recover_pass = $recover->validRecoverDecrypt($_GET["code"]);

        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $e->getMessage()
            ]);
            return;

        }

        $head = $this->seo->optimize(
            "Recuperação de Senha " . site("name"),
            site("desc"),
            $this->router->route("web.reset"),
            routeImage("Recuperação de Senha")
        )->render();

        echo $this->view->render("theme/recover_password/recover_send",[
            "head" =>$head,
            'name' => $recover_pass["primeiro_nome"],
            'code' => $_GET["code"]
        ]);

    }

    public function resetSuccess():void{

        $head = $this->seo->optimize(
            "Recuperação de Senha " . site("name"),
            site("desc"),
            $this->router->route("web.resetSuccess"),
            routeImage("Recuperação de Senha")
        )->render();

        echo $this->view->render("theme/recover_password/reset_success",[
            "head" =>$head
        ]);

    }

}