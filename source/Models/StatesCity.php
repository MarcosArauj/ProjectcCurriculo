<?php


namespace Source\Models;


use Source\Config\Conection;

class StatesCity extends Model {


    /**
     * @return array
     */
    public function listuf(): array {

        return $this->conn->select(" SELECT * FROM tb_estados");

    }

    public  function listCitys(int $id_estado): array {

        return  $this->conn->select(" SELECT * FROM tb_cidades WHERE id_estado = :id_estado",array(
            ":id_estado" => $id_estado
        ));

    }

}