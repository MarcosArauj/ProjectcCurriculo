<?php


namespace Source\App;

use Source\App\Pages\PageSupport;
use Source\App\Pages\PageWeb;
use Source\Models\Curriculum;
use Source\Models\Formation;
use Source\Models\Professional;
use Source\Models\Support\Support;
use Source\Models\User;

/**
 * Class WebController
 * @package Source\App
 */
class WebController extends Controller {

    public function __construct($router) {
        parent::__construct($router);
    }

    public function home():void{

        $page = new PageWeb();

        $page->setTpl("home", array(
            "title"=> site("name_complete"),
        ));
    }

    public function tutorial():void{

        $page = new PageWeb();

        $page->setTpl("tutorial", array(
            "title"=> site("name_complete"),
        ));
    }

    public function register():void{

        $page = new PageWeb();

        $page->setTpl("create_user", array(
            "title" => site("name") ." | Crie sua conta"

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
        $formation = new Formation();
        $professional = new Professional();

        $curriculum->getCurriculumCod($data['cod_curriculo']);

        $page->setTpl("share_curriculum", array(
            "title" => site("name"). " | " . $curriculum->getprimeiro_nome(),
            "curriculum" => $curriculum->getValues(),
            "courses"=>$formation->getOtherCoursesUser($curriculum->getid_usuario()),
            "languages"=>$formation->getLanguagesUser($curriculum->getid_usuario()),
            "professional"=>$professional->getExProfessionalUser($curriculum->getid_usuario())

        ));
    }

    //------------- Recuperar Senha ---------------------//
    public function forgot():void{

        $page = new PageSupport();

        $page->setTpl("forgot_password", array(
            "title" => site("name") ." | Recuperação de Senha"
        ));
    }

    public function sent():void{

        $page = new PageSupport();

        $page->setTpl("forgot_sent", array(
            "title" => site("name") ." | Recuperação de Senha "
        ));
    }

    public function reset():void{

        $recover = new Support();

        $recover_pass = null;

        try {
            $recover_pass = $recover->validRecoverDecrypt($_GET["code"]);

        } catch (\Exception $e) {
            flash("error",$e->getMessage());
        }

        $page = new PageSupport();

        $page->setTpl("recover_send", array(
            "title" => site("name") ." | Recuperação de Senha",
            "name" => $recover_pass["primeiro_nome"],
            "code" => $_GET["code"]
        ));
    }

    public function resetSuccess():void{

        $page = new PageSupport();

        $page->setTpl("reset_success", array(
            "title" => site("name") ." | Senha Recuperada com Sucesso",
        ));
    }

    public function saveSolicitation(): void {

        $page = new PageSupport();

        $page->setTpl("create_solicitation", array(
            "title" => site("name") ." | Suporte"
        ));

    }

    public function sentSolicitation(): void {

        $page = new PageSupport();

        $page->setTpl("reset_solicitation", array(
            "title" => site("name") ." | Solicitação Enviada",
        ));
    }

}
