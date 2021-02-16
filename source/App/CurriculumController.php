<?php


namespace Source\App;


use Source\Models\Curriculum;
use Source\Models\Login;
use Source\Models\User;

/**
 * Class CurriculumController
 * @package Source\App
 */
class CurriculumController extends Controller {

    private $user_logado;
    private $data_user;
    private $curruculum;

    /**
     * AppController constructor.
     * @param $router
     * @throws \Exception
     */
    public function __construct($router) {
        parent::__construct($router);

        if(!Login::verifyLogin()) {
            Login::logout();
            $this->router->redirect("web.home");
        } else {
            $this->user_logado = Login::getFromSession();

            $this->data_user = new User();
            $this->data_user->getUser($this->user_logado->getid_usuario());
            $this->data_user->getValues();
            $this->curriculum = new Curriculum();
            $this->curriculum->getCurriculum($this->user_logado->getid_usuario());
            $this->curriculum->getValues();
        }

    }

    /**
     * @param $data
     * Cadastro de Idiomas
     */
    public function saveCurriculum($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            if($this->curriculum->checkCurriculum((INT)$this->user_logado->getid_usuario())) {

                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" =>"Você já registrou o Curriculo"
                ]);
                return;
            }

            if($this->curriculum->checkCurriculumData((INT)$this->user_logado->getid_usuario()) == false) {

                echo $this->ajaxResponse("redirect", [
                    "url" =>$this->router->route("app.checkCurriculum")

                ]);
                return;
            }

            $this->curriculum->setid_usuario((INT)$this->user_logado->getid_usuario());


            $cod_curriculo = str_pad(mt_Rand((INT)$this->user_logado->getid_usuario(), 9999999999), 10, '0', STR_PAD_LEFT);

            $this->curriculum->setcod_curriculo($cod_curriculo);

            $data["divulgacao"] = (isset($data["divulgacao"]))? "Sim": "Não";

            $this->curriculum->setData($data);

            $this->curriculum->saveCurriculum();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.profile")

            ]);
            flash("success","Sucesso no Registro do Seu Curriculo!");
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
     * Atualiza da divuldação dos dados do curriculo
     */
    public function updateCurriculum($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            if($this->curriculum->getdivulgacao() == 'Sim') {
                $this->curriculum->setdivulgacao('Não');
            } else {
                $this->curriculum->setdivulgacao('Sim');
            }
            $this->curriculum->setData($data);

            $this->curriculum->updateCurriculum();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.profile")

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

    public function deleteCurriculum($data): void{

        try {

            $this->curriculum->getCurriculum($data['id_usuario']);

            $this->curriculum->deleteUserCurriculum();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("web.register")

            ]);
            unset($_SESSION[User::SESSION]);
            flash("success","Idioma Excluido com Sucesso!");
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