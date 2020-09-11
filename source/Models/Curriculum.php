<?php


namespace Source\Models;

/**
 * Class Curriculum
 * @package Source\Models
 */
class Curriculum extends Model {


    /**
     * @return array
     */
    public function getCurriculum($id_usuario): void {

        $results = $this->conn->select("SELECT * FROM v_curriculo
            WHERE id_usuario = :id_usuario",array(
                ":id_usuario" =>$id_usuario
        ));

        if (count($results) > 0) {

            $data = $results[0];

            $this->setData($data);

        }

    }

    /**
     * @param $cod_curriculo
     * Pegar dados do Curriculo pelo Código
     */
    public function getCurriculumCod($cod_curriculo): void {

        $results = $this->conn->select("SELECT * FROM v_curriculo
            WHERE cod_curriculo = :cod_curriculo",array(
            ":cod_curriculo" =>$cod_curriculo
        ));

        if (count($results) > 0) {

            $data = $results[0];

            $this->setData($data);

        }

    }

    /**
     * @param $id_usuario
     * @return bool
     *
     * Pega Curriculo
     */
    public function checkCurriculumData($id_usuario):bool {

        $results =  $this->conn->select("SELECT * FROM v_pre_curriculo
                WHERE id_usuario = :id_usuario", array(
            ":id_usuario"=>$id_usuario,
        ));

        return (count($results) > 0);

    }

    /**
     * @param $id_usuario
     * @param $idioma
     * @return bool
     *
     * Checa se o Usuario já cadastrou o Curriculo
     */
    public function checkCurriculum($id_usuario):bool {

        $results =  $this->conn->select("SELECT * FROM v_curriculo 
                WHERE  id_usuario = :id_usuario", array(
            ":id_usuario"=>$id_usuario
        ));

        return (count($results) > 0);

    }

    /**
     * @return bool
     * @throws \Exception
     * Salva Cadastro do Curriculo pora o Usuario
     */
    public function saveCurriculum(): bool {

        $results = $this->conn->select("CALL sp_curriculo_salvar(:id_usuario,:cod_curriculo)", array(
            ":id_usuario"=>$this->getid_usuario(),
            ":cod_curriculo"=>$this->getcod_curriculo()
        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salvar Cadastro Curriculo!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

}