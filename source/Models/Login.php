<?php


namespace Source\Models;


class Login extends User {
    /**
     * @param $login
     * @param $senha
     * @return Login
     * @throws \Exception
     */
    public function loginUser($login, $password): User {

        $results = $this->conn->select("SELECT * FROM v_usuario
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

    /**
     * @return User
     * Pega dados do Usuario Logado
     */
    public static function getFromSession(): User{

        $user = new User();

        if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['id_usuario'] > 0) {
            $user->setData($_SESSION[User::SESSION]);
        }

        return $user;

    }


    /**
     * @param bool $access
     * @return bool
     *Verifcar o Usuario logado
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
     *Sair do Sistema
     */
    public static function logout():void {

        unset($_SESSION[User::SESSION]);

    }

    /**
     * @param bool $access
     * @return bool
     * Verifica do tipo de acesso do usuário
     */
    public static function verifyLogin($access = true):bool{

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