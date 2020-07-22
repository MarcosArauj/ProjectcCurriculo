<?php


namespace Source\Models;


class Address extends Model {

    /**
     * @return bool
     * @throws \Exception
     * Salvar Contato no sistema
     */
    public function saveContact():bool {

        $results = $this->conn->select(
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
            throw new \Exception("Erro ao Salvar Contato!");
            return false;
        }

        $this->setData($results[0]);

        return true;
    }

    /**
     * @return bool
     * @throws \Exception
     * Atualizar Contato no sistema
     */
    public function updateContact():bool {

        $results = $this->conn->select(
            "CALL sp_contato_atualizar(:id_contato,:celular,:telefone,:c_email,:endereco,:numero,:bairro,:cep,:cidade,:estado,:pais)",
            array(
                ":id_contato" => $this->getid_contato(),
                ":celular" => $this->getcelular(),
                ":telefone" => $this->gettelefone(),
                ":c_email" => $this->getc_email(),
                ":endereco" => $this->getendereco(),
                ":numero" => $this->getnumero(),
                ":bairro" => $this->getbairro(),
                ":cep" => $this->getcep(),
                ":cidade" => $this->getcidade(),
                ":estado" => $this->getestado(),
                ":pais" => $this->getpais()
            ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Atualizar Contato!".  $this->getid_contato());
            return false;
        }

        $this->setData($results[0]);

        return true;
    }

    /**
     * @return array
     * Lista de Paises
     */
    public function listcountries(): array {

        return  $this->conn->select(" SELECT * FROM tb_paises");

    }

    /**
     * @return array
     * Lista de Estados
     */
    public function listuf(): array {

        return $this->conn->select(" SELECT * FROM tb_estados");

    }

    public function listCitys(int $id_estado): array {

        return  $this->conn->select(" SELECT * FROM tb_cidades WHERE id_estado = :id_estado",array(
            ":id_estado" => $id_estado
        ));

    }

}