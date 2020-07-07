<?php


namespace Source\Models\Support;


use Source\Config\Conection;
use Source\Models\User;
use Source\Models\Support\EmailRecover;

class RecoverPassword extends User {

    public static function getEmailRecoverPass($email) {

        $conn = new Conection();

        $results = $conn->select(
            "SELECT * FROM tb_users as u
                    INNER JOIN tb_pessoa_fisica as pf ON u.pessoa_id = pf.id_pessoaf
                    INNER JOIN tb_contato as c ON pf.contato_id = c.id_contato
                    INNER JOIN tb_endereco as e ON pf.endereco_id = e.id_endereco
                    WHERE c.email = :email", array(
            ":email"=>$email
        ));

        if (count($results) === 0) {
            throw new \Exception("Não foi possivel recuperar a senha. E-mail não cadastrado");
        } else {
            $data = $results[0];

            $results_recovery = $conn->select("CALL sp_recupera_senha(:id_usuario,:ip)",array(
                ":id_usuario"=>$data["id_usuario"],
                ":ip"=>$_SERVER["REMOTE_ADDR"]
            ));

            if(count($results_recovery) === 0 ) {
                throw new \Exception("Não foi possivel recuperar a senha.");
            } else {
                $data_recovery = $results_recovery[0];

                $code = base64_encode($data_recovery["id_recupera"]);

                $link = "http://curriculotcc.com.br/recover-password/forgot/recover?code=$code";

                $emailRovever = new EmailRecover();

                $emailRovever->add(
                    "Redefinir senha de acesso",
                    "recover-password",
                    $data["first_name"].$data["last_name"],
                    $data["email"], // Email do Usuario
//                    array(
//                        "first_name"=>$data["first_name"],
//                        "link"=>$link
//                        )

                )->send();

                if(!$emailRovever->error()) {
                    var_dump(true);
                } else {
                    echo $emailRovever->error()->getMessage();
                }

                return $data;

            }

        }
    }

    public static function validRecoverDecrypt($code) {

        $disrecupera =  base64_decode($code);

        $conn = new Conection();

        $results = $conn->select("SELECT * FROM
	  tb_recupera_senha as r 
	  INNER JOIN tb_usuario as u ON r.id_usuario = u.id_usuario
	  INNER JOIN tb_pessoa_fisica as pf ON u.pessoa_id = pf.id_pessoaf
	  WHERE r.id_recupera = :id_recupera AND 
	  r.dtrecuperacao IS NULL AND 
	  DATE_ADD(r.dtregistro, INTERVAL 1 HOUR) >= NOW()", array(
            ":id_recupera"=>$disrecupera
        ));


        if(count($results) === 0) {
            throw new \Exception("Não foi possivel recuperar a senha!");
        } else {
            return $results[0];
        }
    }

    public static function setRecoverUsed($id_recupera){
        $conn = new Conection();

        $conn->query("UPDATE tb_recupera_senha SET 
        dtrecuperacao = NOW() WHERE id_recupera = :id_recupera", array(
            ":id_recupera"=>$id_recupera
        ));

    }

}