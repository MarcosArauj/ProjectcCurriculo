<?php


namespace Source\Models\Support;

use League\Plates\Engine;
use Source\Models\Model;

/**
 * Class RecoverPassword
 * @package Source\Models\Support
 */
class RecoverPassword extends Model {

    /* @var Engine */
    protected $view;

    /**
     * @param $email
     * @return EmailRecover
     * @throws \Exception
     *
     * Envia E-mail para recuperação da Senha
     */
    public function getEmailRecoverPass($email): bool {


        $results = $this->conn->select(
            "SELECT * FROM v_usuario WHERE email = :email", array(
            ":email"=>$email
        ));

        if (count($results) === 0) {
            throw new \Exception("Não foi possivel recuperar a senha. E-mail não cadastrado");
            return false;
        } else {
            $data = $results[0];

            $results_recovery = $this->conn->select("CALL sp_recupera_senha(:id_usuario,:ip)",array(
                ":id_usuario"=>$data["id_usuario"],
                ":ip"=>$_SERVER["REMOTE_ADDR"]
            ));

            if(count($results_recovery) === 0 ) {
                throw new \Exception("Não foi possivel recuperar a senha.");
            } else {
                $data_recovery = $results_recovery[0];

                $code = base64_encode($data_recovery["id_recupera"]);

                $link = site("root")."/reset?code=$code";

                $emailRovever = new EmailRecover();

                $this->view =  Engine::create(dirname(__DIR__,3)."/views/theme","php");

                $emailRovever->add(
                    "Redefinir senha - ". site("name"),
                    $this->view->render("email/email_recover", [
                        "name"=>$data["primeiro_nome"],
                        "link"=>$link,
                        "site"=>site("name")
                    ]),
                    $data["primeiro_nome"],
                    $data["email"]
                )->send();

                if(!$emailRovever->error()) {
                   return true;
                } else {
                    echo $emailRovever->error()->getMessage();
                    return false;
                }

            }

        }
    }

    /**
     * @param $code
     * @return array
     * @throws \Exception
     * Valida a o Link Enviado para Recuperção da Senha
     */
    public function validRecoverDecrypt($code):array {

        $disrecupera =  base64_decode($code);

        $results = $this->conn->select("SELECT * FROM v_recupera_senha
	    WHERE id_recupera = :id_recupera AND 
	    dtrecuperacao IS NULL AND 
	     DATE_ADD(dtregistro_senha, INTERVAL 1 HOUR) >= NOW()", array(
            ":id_recupera"=>$disrecupera
        ));


        if(count($results) === 0) {
            throw new \Exception("Não foi possivel recuperar a senha!");
        } else {
            return $results[0];
        }

    }

    /**
     * @param $id_recupera
     *
     * Registra a recuperação da Senha
     */
    public function setRecoverUsed($id_recupera):void {

        $this->conn->query("UPDATE tb_recupera_senha SET 
        dtrecuperacao = NOW() WHERE id_recupera = :id_recupera", array(
            ":id_recupera"=>$id_recupera
        ));

    }

}