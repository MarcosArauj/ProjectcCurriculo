<?php


namespace Source\App;


use Source\Models\Contact;
use Source\Models\Curriculum;
use Source\Models\PersonalData;
use Source\Models\Login;
use Source\Models\Professional;
use Source\Models\User;

/**
 * Class ProfessionalController
 * @package Source\App
 */
class ProfessionalController extends Controller {

    /**
     * @var \Source\Models\User
     * Pegar Usuario logado
     */
    private $user_logado;

    /**
     * @var User
     */
    private $data_user;

    /**
     * AppController constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);

        if(!User::verifyLogin()) {
            flash("error","Acesso negado, favor logar-se");
            User::logout();
            $this->router->redirect("web.home");
        } else {
            $this->user_logado = User::getFromSession();

            $this->data_user = new User();
        }

    }

    /**
     * @param $data
     * Cadastro de Experiência Profissional
     */
    public function saveProfessional($data):void {

        $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

        try {

            $professional = new Professional();

            $professional->setid_usuario((INT)$this->user_logado->getid_usuario());

            $professional->setData($data);

            $professional->saveProfessional();

            echo $this->ajaxResponse("redirect", [
                "url" =>$this->router->route("app.saveProfessional")

            ]);
            flash("success","Sucesso no Registro! Clique em Próximo ou Adicione + Experiência Porfissional");
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

