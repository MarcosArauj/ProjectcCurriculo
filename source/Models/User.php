<?php

namespace Source\Models;

use Source\Config\Conection;

/**
 * Class User
 * @package Source\Models
 */
class User extends Model {

    const ACESSO = 0;
    const STATUS_USUARIO = "ativo";
    const SESSION = "user";

    /**
     * @return array
     * @throws \Exception
     * Salvar cadastro do usuario
     */

    public function saveUser():bool {

        $results = $this->conn->select(
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

        $results =  $this->conn->select("SELECT * FROM v_usuario
            WHERE  id_usuario = :id_usuario",array(
            ":id_usuario"=>$id_usuario
        ));

        $this->setData($results[0]);

    }

    /**
     * @return array
     */
    public function getAllUsers():array {

        $results =  $this->conn->select("SELECT * FROM v_usuario " , array(
            ":status"=>'ativo'
        ));

        return (count($results) > 0);
    }

    /**
     * @param string $email
     * @return bool
     */
   public  function checkEmail(string $email):bool {


        $results = $this->conn->select("SELECT email FROM v_usuario WHERE email = :email",
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

        $results =  $this->conn->select("CALL sp_senha_atualizar(:id_usuario,:senha)",array(
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

    /**
     * @param $login
     * @param $senha
     * @return Login
     * @throws \Exception
     */
    public function loginUser($login, $password): User {

        $results = $this->conn->select("SELECT * FROM v_usuario
                    WHERE email = :login OR cpf = :login AND status_usuario = :status",
            array(
                ":login"=>$login,
                ":status"=>"ativo",
            ));

        if (count($results) === 0) {

            throw new \Exception("Usuário ou Senha inválidos - :(");

        }

        $data = $results[0];

        if (password_verify($password, $data["senha"])) {

            $user = new User();

            $user->setData($data);

            $_SESSION[User::SESSION] = $user->getValues();

            return $user;

        } else {

            throw new \Exception("Usuário ou Senha inválidos!");

        }

    }

    // Pega dados do Usuario Logado

    /**
     * @return User
     */
    public static function getFromSession(): User{

        $user = new User();

        if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['id_usuario'] > 0) {
            $user->setData($_SESSION[User::SESSION]);
        }

        return $user;

    }

    //Verifcar o Usuario logado e Tipo de acesso permitido

    /**
     * @param bool $access
     * @return bool
     */
    public static function checkLogin($access = true): bool {
        if (!isset($_SESSION[User::SESSION])
            ||
            !$_SESSION[User::SESSION]
            ||
            !(int)$_SESSION[User::SESSION]["id_usuario"] > 0) {
            //Não esta logado
            return false;
        } else {
            if($access === true && (bool)$_SESSION[User::SESSION]["acesso"] === true) {
                return true;

            } else if($access === false){
                return true;

            } else {
                return false;
            }
        }

    }

    /**
     *
     */
    public static function logout():void {

        $_SESSION[User::SESSION] = NULL;

    }

    /**
     * @param bool $access
     * @return bool
     */
    public static function verifyLogin($access = true):bool{

        if (User::checkLogin($access)) {

            return true;

        } else if (User::checkLogin($access = false)) {
            return true;
        } else {
            header("Location: /");
            exit;
        }

    }


}