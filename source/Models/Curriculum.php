<?php


namespace Source\Models;

/**
 * Class Curriculum
 * @package Source\Models
 */
class Curriculum extends Model {


    /**
     * @param int $id_usuario
     * @return void
     * @throws \Exception
     */
    public function getCurriculum(int $id_usuario): void {

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
     * @throws \Exception
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

        $results = $this->conn->select("CALL sp_curriculo_salvar(:id_usuario,:cod_curriculo,:divulgacao)", array(
            ":id_usuario"=>$this->getid_usuario(),
            ":cod_curriculo"=>$this->getcod_curriculo(),
            ":divulgacao"=>$this->getdivulgacao()
        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salvar Cadastro Curriculo!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

    /**
     * Atualizar Divulgação dos dados do curriculo
     */
    public function updateCurriculum():bool {

        $results =  $this->conn->select("CALL sp_curriculo_atualizar(:id_curriculo,:divulgacao)",array(
            ":id_curriculo"=>$this->getid_curriculo(),
            ":divulgacao"=>$this->getdivulgacao()
        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Atualizar Divulgação do Curriculo !");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

}

