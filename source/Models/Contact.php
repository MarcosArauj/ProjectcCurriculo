<?php


namespace Source\Models;


use Source\Config\Conection;

class Contact extends User {

    public function saveContact():bool {

        $conn = new Conection();

        $results = $conn->select(
            "CALL sp_contact_salvar()", array(


        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salver Cadastro!" );
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

}