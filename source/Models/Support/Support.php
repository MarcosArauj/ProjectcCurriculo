<?php


namespace Source\Models\Support;

use Source\Models\Model;

/**
 * Class Support
 * @package Source\Models\Support
 */
class Support extends Model {

    /**
     * @param $email
     * @return bool
     * @throws \Exception Envia E-mail para recuperação da Senha
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

                $emailRecovery = new EmailSupport();

                $emailRecovery->send(
                    $data["email"],
                    $data["primeiro_nome"],
                    "Redefinir senha - ". site("name_complete"),
                    "email_recover",
                    array(
                        "name"=>$data["primeiro_nome"],
                        "link"=>$link,
                        "site"=>site("name_complete")
                    ));

                if(!$emailRecovery->error()) {
                   return true;
                } else {
                    echo $emailRecovery->error()->getMessage();
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
	     DATE_ADD(dtregistro_senha, INTERVAL 24 HOUR) >= NOW()", array(
            ":id_recupera"=>$disrecupera
        ));


        if(count($results) === 0) {
            throw new \Exception("Erro ao recuperar a senha! Link já Usado ou Expirado");
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


    /**
     * @param $email
     * @return EmailSupport
     * @throws \Exception
     *
     * Envia E-mail de Reset da senha
     */
    public function getEmailResetPass($email): bool {

        $results = $this->conn->select(
            "SELECT * FROM v_usuario WHERE email = :email", array(
            ":email"=>$email
        ));

        if (count($results) === 0) {
            throw new \Exception("Não foi possivel recuperar a senha");
            return false;
        } else {
            $data = $results[0];

            $results_reset = $this->conn->select("CALL sp_recupera_senha(:id_usuario,:ip)",array(
                ":id_usuario"=>$data["id_usuario"],
                ":ip"=>$_SERVER["REMOTE_ADDR"]
            ));

            if(count($results_reset) === 0 ) {
                throw new \Exception("Não foi possivel recuperar a senha.");
            } else {
                $this->setData($results_reset[0]);

                $emailRest = new EmailSupport();

                $emailRest->send(
                    $data["email"],
                    $data["primeiro_nome"],
                    "Redefinição de senha - ". site("name_complete"),
                    "email_reset",
                    array(
                        "name"=>$data["primeiro_nome"],
                        "new_pass" => "12345678",
                        "link" =>site("root")."/login",
                        "site"=>site("name_complete")
                    ));

                if(!$emailRest->error()) {
                    return true;
                } else {
                    echo $emailRest->error()->getMessage();
                    return false;
                }

            }

        }
    }


    /**
     * @param $email
     * @return EmailSupport
     * @throws \Exception
     *
     * Envia E-mail de Solicitações
     */
    public function getEmailSupport($email): bool {

        $results = $this->conn->select(
            "SELECT * FROM v_usuario WHERE email = :email", array(
            ":email"=>$email
        ));

        if (count($results) === 0) {
            throw new \Exception("Enviar sua solicitação");
            return false;
        } else {
            $data = $results[0];

            $emailSupport = new EmailSupport();

            $emailSupport->send(
                    $data["email"],
                    $data["primeiro_nome"],
                    "Suporte - ". site("name_complete"),
                    "email_solicitation",
                    array(
                        "name"=>$data["primeiro_nome"],
                        "site"=>site("name_complete")
                    ));

                if(!$emailSupport->error()) {
                    return true;
                } else {
                    echo $emailSupport->error()->getMessage();
                    return false;
                }

        }
    }

    /**
     * @return bool
     * @throws \Exception
     * Salvar Solicitações
     */
    public function saveSolicitation():bool {

        $date = date("Y-m-d");

        $results = $this->conn->select(
            "CALL sp_solicitacao_salvar(:descricao_solicitacao,:assunto,:situacao,:id_usuario,:dtregistro)",
            array(
                ":descricao_solicitacao" => $this->getdescricao_solicitacao(),
                ":assunto" => $this->getassunto(),
                ":situacao" => $this->getsituacao(),
                ":id_usuario" => $this->getid_usuario(),
                ":dtregistro" =>$date
            ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salvar Solicitação!");
            return false;
        }

        $this->setData($results[0]);

        return true;
    }

    /**
     * @return bool
     * @throws \Exception
     * Finalizar Solicitações
     */
    public function updateSolicitation():bool {

        $results = $this->conn->select(
            "CALL sp_solicitacao_atualizar(:id_solicitacoes,:situacao)",
            array(
                ":id_solicitacoes" => $this->getid_solicitacoes(),
                ":situacao" => $this->getsituacao()
            ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Atualizar Solicitação!");
            return false;
        }

        $this->setData($results[0]);

        return true;
    }

    /**
     * @param int $page
     * @param int $itemsPerPage
     * @return array
     * Lista usuarios com busca
     */
    public function getPageSolicitation(int $page = 1, int $itemsPerPage = 10) {
        $start = ($page - 1) * $itemsPerPage;

        $results = $this->conn->select("SELECT SQL_CALC_FOUND_ROWS *  FROM tb_solicitacoes
                                        INNER JOIN v_usuario USING(id_usuario) ORDER BY dtregistro ASC
                                        LIMIT $start, $itemsPerPage;");

        $resultTotal = $this->conn->select("SELECT FOUND_ROWS() AS nrtotal" );

        return array(
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        );

    }

    /**
     * @param int $id_solicitacao
     * @return void
     * Pega Curso
     * @throws \Exception
     */
    public function getRequest(int $id_solicitacoes):void {

        $results =   $this->conn->select("SELECT * FROM tb_solicitacoes
            INNER JOIN v_usuario USING(id_usuario) WHERE id_solicitacoes = :id_solicitacoes",
            array(
                    ":id_solicitacoes"=>$id_solicitacoes
                ));

        if (count($results) === 0) {
            throw new \Exception("Solicitação não Encontrada!");
        }

        $this->setData($results[0]);
    }

}