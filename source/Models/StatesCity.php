<?php


namespace Source\Models;


use Source\Config\Conection;

class StatesCity extends Model {


    /**
     * @return array
     */
    public static function listuf(): array {
        $conn = new Conection();

        return $conn->select(" SELECT * FROM tb_estados");

    }

    public static function listCitys(int $id_estado): string {
        $conn = new Conection();

        return  $conn->select(" SELECT * FROM tb_cidades WHERE id_estado = :id_estado",array(
            ":id_estado" => $id_estado
        ));

    }

}