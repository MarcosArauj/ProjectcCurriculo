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

    /**
     *
     */
    public function home():void{

        $page = new PageWeb();

        $page->setTpl("home");
    }

    public function register():void{

        $page = new PageWeb();

        $page->setTpl("create_user");
    }

    public function login():void{

        $page = new PageWeb();

        $page->setTpl("login");
    }

 //------------- Recuperar Senha ---------------------//
    public function forgot():void{

        $page = new PageRecoverPassword();

        $page->setTpl("forgot_password");
    }

    public function sent():void{

        $page = new PageRecoverPassword();

        $page->setTpl("forgot_sent");
    }

    public function reset($data):void{

        $recover = new RecoverPassword();

        $recover_pass = null;

        try {
            $recover_pass = $recover->validRecoverDecrypt($data["code"]);

        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $e->getMessage()
            ]);
            return;

        }

        $page = new PageRecoverPassword();

        $page->setTpl("recover_send", array(
            'name' => $recover_pass["primeiro_nome"],
            'code' => $_GET["code"]
        ));
    }

    public function resetSuccess():void{

        $page = new PageRecoverPassword();

        $page->setTpl("reset_success");
    }

}