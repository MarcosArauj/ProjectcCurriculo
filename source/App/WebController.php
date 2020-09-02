<?php


namespace Source\App;

use Source\App\Pages\PageRecoverPassword;
use Source\App\Pages\PageWeb;
use Source\Models\Curriculum;
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

        $page = new PageWeb();

        $page->setTpl("home", array(
            "title"=> site("name"),
        ));
    }

    public function register():void{

        $page = new PageWeb();

        $page->setTpl("create_user", array(
            "title" => site("name") ." | Crie sua conta no"

        ));
    }

    public function login():void{

        $page = new PageWeb();

        $page->setTpl("login", array(
            "title" => site("name") ." | Faça login"
        ));
    }

    /**
     * Carrega Curriculo Compartilhado
     */
    public function shareCurriculum($data):void {

        $page = new PageWeb();

        $curriculum = new Curriculum();

        $curriculum->getCurriculumCod($data['cod_curriculo']);

        $page->setTpl("share_curriculum", array(
            "title" => site("name"). " | " . $curriculum->getprimeiro_nome(),
            "curriculum" => $curriculum->getValues()

        ));
    }

 //------------- Recuperar Senha ---------------------//
    public function forgot():void{

        $page = new PageRecoverPassword();

        $page->setTpl("forgot_password", array(
            "title" => site("name") ." | Recuperação de Senha"
        ));
    }

    public function sent():void{

        $page = new PageRecoverPassword();

        $page->setTpl("forgot_sent", array(
            "title" => site("name") ." | Recuperação de Senha "
        ));
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

        $page = new PageRecoverPassword();

        $page->setTpl("recover_send", array(
            "title" => site("name") ." | Recuperação de Senha",
            "name" => $recover_pass["primeiro_nome"],
            "code" => $_GET["code"]
        ));
    }

    public function resetSuccess():void{

        $page = new PageRecoverPassword();

        $page->setTpl("reset_success", array(
            "title" => site("name") ." | Senha Recuperada com Sucesso",
        ));
    }

}