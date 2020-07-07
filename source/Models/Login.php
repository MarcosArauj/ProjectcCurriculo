<?php


namespace Source\Models;

use Source\Config\Conection;


/**
 * Class Login
 * @package Source\Models
 */
class Login extends User {

    /**
     * @param $login
     * @param $senha
     * @return Login
     * @throws \Exception
     */
    public static function loginUser($login, $password): User {

        $conn = new Conection();

        $results = $conn->select("SELECT * FROM v_usuario
                    WHERE email = :login AND status_usuario = :status",
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
    public static function verifyLogin($access = true):bool {

        if (Login::checkLogin($access)) {

            return true;

        } else if (Login::checkLogin($access = false)) {
            return true;
        } else {
            header("Location: /");
            exit;
        }

    }

}