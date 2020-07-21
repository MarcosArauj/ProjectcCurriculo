<?php

namespace Source\Models;

use Source\Config\Conection;

class User extends Model {

    const ACESSO = 0;
    const STATUS_USUARIO = "ativo";
    const SESSION = "user";
    const SECRET = "Web_Curriculotcc";

    /**
     * @return array
     * @throws \Exception
     * Salvar cadastro do usuario
     */

    public function saveUser():bool {

        $conn = new Conection();

        $results = $conn->select(
            "CALL sp_usuario_salvar(:email,:senha,:status_usuario,:acesso)", array(
            ":email" => $this->getemail(),
            ":senha" => password_hash($this->getsenha(), PASSWORD_DEFAULT, ["cost" => 12]),
            ":status_usuario" => User::STATUS_USUARIO,
            ":acesso" => User::ACESSO

        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salver Cadastro!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }


    /**
     * @param int $id_usuario
     * @return string
     */
    public function getUser(int $id_usuario): void {

        $conn = new Conection();

        $results =  $conn->select("SELECT * FROM v_usuario
            WHERE  id_usuario = :id_usuario",array(
            ":id_usuario"=>$id_usuario
        ));

        $this->setData($results[0]);

    }

    /**
     * @return array
     */
    public function getAllUsers():array {

        $conn = new Conection();

        $results =  $conn->select("SELECT * FROM v_usuario " , array(
            ":status"=>'ativo'
        ));

        return (count($results) > 0);
    }

    /**
     * @param string $email
     * @return bool
     */
   public static function checkEmail(string $email):bool {

        $conn = new Conection();

        $results = $conn->select("SELECT email FROM v_usuario WHERE email = :email",
                [
                   ":email"=>$email
                ]);
        if(count($results) > 0){
            return true;
        }
        return false;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public static function validatePassword(string $senha):bool {
        if(strlen($senha) < 8){
            throw new \Exception("Informe uma sennha com pelo menos 8 caracteres!");
            return false;
        }
        return true;
    }


    /**
     * Atualizar Senha
     */
    public function updatePassword():bool {
        $conn = new Conection();

        $results =  $conn->select("CALL sp_senha_atualizar(:id_usuario,:senha)",array(
            ":id_usuario"=>$this->getid_usuario(),
            ":senha"=>password_hash($this->getsenha(), PASSWORD_DEFAULT,["cost"=>12])
        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Atualizar Senha !");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }


}