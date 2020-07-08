<?php


namespace Source\Models;


use Source\Config\Conection;

/**
 * Class Contact
 * @package Source\Models
 */
class Contact extends User {

    /**
     * @return bool
     * @throws \Exception
     * Salvar Contato no sistema
     */
    public function saveContact():bool {

        $conn = new Conection();

        $results = $conn->select(
            "CALL sp_contato_salvar(:celular,:telefone,:c_email,:endereco,:numero,:bairro,:cep,:cidade,:estado,:pais,:id_usuario)",
            array(
            ":celular" => $this->getcelular(),
            ":telefone" => $this->gettelefone(),
            ":c_email" => $this->getc_email(),
            ":endereco" => $this->getendereco(),
            ":numero" => $this->getnumero(),
            ":bairro" => $this->getbairro(),
            ":cep" => $this->getcep(),
            ":cidade" => $this->getcidade(),
            ":estado" => $this->getestado(),
            ":pais" => $this->getpais(),
            ":id_usuario" => $this->getid_usuario()
            ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salver Contato!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

    /**
     * @return array
     */
    public static function listcountries(): array {
        $conn = new Conection();

        return $conn->select(" SELECT * FROM tb_paises");

    }

}