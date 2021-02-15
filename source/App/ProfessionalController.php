<?php


namespace Source\App;


use Source\Models\Contact;
use Source\Models\Login;
use Source\Models\Professional;
use Source\Models\User;

/**
 * Class ProfessionalController
 * @package Source\App
 */
class ProfessionalController extends Controller {

    private $user_logado;
    private $data_user;
    private $professional;

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

            $this->professional = new Professional();
            $this->professional->setid_usuario((INT)$this->user_logado->getid_usuario());
        }

    }

    /**
     * @param $data
     * Cadastro de Experiência Profissional
     */
    public function saveProfessional($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $this->professional->setData($data);

            $this->professional->saveProfessional();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveProfessional")

            ]);
            if(checkCurriculum()) {
                flash("success","Sucesso no Registro!");
            } else {
                flash("success","Sucesso no Registro! Clique em Próximo ou Adicione + Experiência Porfissional");
            }

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
     * Atualização de Experiência Profissional
     */
    public function updateProfessional($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $this->professional->setid_profissional($this->data_user->getid_profissional());

            $this->professional->setData($data);

            $this->professional->saveProfessional();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.updateProfessional",["id_profissional" => $data['id_profissional']])

            ]);
            flash("success","Experiência Profissional Atualizada com Sucesso");
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
     * Exclui de Experiência Profissional
     */
    public function deleteProfessional($data):void {

        try {

            $this->professional->getExProfessional($data["id_profissional"]);

            $this->professional->deleteProfessional();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.professional")
            ]);
            flash("success","Experiência Profissional Excluido com Sucesso!");
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

