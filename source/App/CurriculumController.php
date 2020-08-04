<?php


namespace Source\App;


use Source\Models\Curriculum;
use Source\Models\Login;
use Source\Models\User;

class CurriculumController extends Controller {

    /**
     * @var \Source\Models\User
     * Pegar Usuario logado
     */
    private $user_logado;

    private $data_user;
    private $curruculum;

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

            $this->data_user = new User();
            $this->data_user->getUser($this->user_logado->getid_usuario());
            $this->data_user->getValues();
            $this->curruculum = new Curriculum();
        }

    }


    /**
     * @param $data
     * Cadastro de Idiomas
     */
    public function saveCurriculum($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            if($this->curruculum->checkCurriculum((INT)$this->user_logado->getid_usuario())) {

                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" =>"Você já registrou o Curriculo"
                ]);
                return;
            }

            if($this->curruculum->checkCurriculumData((INT)$this->user_logado->getid_usuario()) == false) {

                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" =>"Gentileza Verifique se Existe Dados Obrigaórios sem Preechimento!"
                ]);
                return;
            }

            $this->curruculum->setid_usuario((INT)$this->user_logado->getid_usuario());

            $this->curruculum->setData($data);

            $this->curruculum->saveCurriculum();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.dashboard")

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

    public function deleteCurriculum(): void{

        try {

            $this->data_user->deleteCurriculum();

            flash("success","Idioma Excluido com Sucesso!" .$this->user_logado->getid_usuario());

            Login::logout();
            $this->router->redirect("web.register");

        } catch (\Exception $e) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" =>$e->getMessage()
            ]);
            return;
        }

    }

}