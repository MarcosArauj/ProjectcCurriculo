<?php

namespace Source\Models;

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

    public function checkPhotoUser(){
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR. "views". DIRECTORY_SEPARATOR. "assets". DIRECTORY_SEPARATOR .
            "images". DIRECTORY_SEPARATOR. "user". DIRECTORY_SEPARATOR . $this->getid_usuario() . ".jpg")){

            $url = "/views/assets/images/user/" . $this->getid_usuario() . ".jpg";

        } else {
            $url =  $this->getid_usuario();
        }

        return $this->setfoto_usuario($url);

    }

    public function getValues() {

        $this->checkPhotoUser();

        $values =  parent::getValues();


        return $values;

    }

    public function setPhotoUser($foto_usuario) {

        $extension = explode('.',$foto_usuario['name']);
        $extension = end($extension);

        switch ($extension) {

            case "jpg":case "jpeg":
            $image = imagecreatefromjpeg($foto_usuario["tmp_name"]);
            break;
            case "git":
                $image = imagecreatefromgif($foto_usuario["tmp_name"]);
                break;
            case "png":
                $image = imagecreatefrompng($foto_usuario["tmp_name"]);
                break;

        }

        $dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR. "views". DIRECTORY_SEPARATOR. "assets". DIRECTORY_SEPARATOR .
            "images". DIRECTORY_SEPARATOR. "user". DIRECTORY_SEPARATOR . $this->getid_usuario() . ".jpg";

        imagejpeg($image, $dist);

        imagedestroy($image);

        $this->checkPhotoUser();
    }

    /**
     *  Salvar Foto Usuario
     */
    public function savePhoto():bool {

        $results =  $this->conn->select("CALL sp_foto_salvar(:id_usuario,:foto_usuario)",array(
            ":id_usuario"=>$this->getid_usuario(),
            ":foto_usuario"=>$this->getfoto_usuario()
        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Inserir Foto!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

    public function deleteCurriculum():void{

        $this->conn->query("CALL sp_usuario_excluir(:id_usuario)"
            ,array(
                ":id_usuario"=>$this->getid_usuario()
            ));

    }

}