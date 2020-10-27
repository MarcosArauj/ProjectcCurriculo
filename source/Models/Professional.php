<?php


namespace Source\Models;


/**
 * Class Curriculum
 * @package Source\Models
 */
class Professional extends Model {

    /**
     * @param int $id_usuario
     * @return array
     *
     * Pega Experiência Profissional de Acordo com Usuario
     */
    public function getExProfessionalUser(int $id_usuario) {

        return  $this->conn->select("SELECT * FROM tb_experiencia_profissional
                WHERE id_usuario = :id_usuario ORDER BY data_admissao DESC", array(
            ":id_usuario"=>$id_usuario
        ));

    }

    /**
     * @param int $id_profissional
     * @return void
     * Pega Idiomas
     * @throws \Exception
     */
    public function getExProfessional(int $id_profissional):void {

        $results =   $this->conn->select("SELECT * FROM tb_experiencia_profissional
                WHERE id_profissional = :id_profissional", array(
            ":id_profissional"=>$id_profissional
        ));

        if (count($results) === 0) {
            throw new \Exception("Experiência profissional não Encontrado!");
        }

        $this->setData($results[0]);
    }

    /**
     * @return bool
     * @throws \Exception
     * Salva Cadastro de Experiência Profissional pora o Usuario
     */
    public function saveProfessional(): bool {

        $results = $this->conn->select("CALL sp_profissional_salvar(:id_profissional,:registro,:empresa_atual,:cargo_atual,:data_admissao,:atividade, 
        :empresa_anterior,:cargo_anterior,:data_demissao,:id_usuario)", array(
            ":id_profissional"=>$this->getid_profissional(),
            ":registro"=>$this->getregistro(),
            ":empresa_atual"=>$this->getempresa_atual(),
            ":cargo_atual"=>$this->getcargo_atual(),
            ":data_admissao"=>$this->getdata_admissao(),
            ":atividade"=>$this->getatividade(),
            ":empresa_anterior"=>$this->getempresa_anterior(),
            ":cargo_anterior"=>$this->getcargo_anterior(),
            ":data_demissao"=>$this->getdata_demissao(),
            ":id_usuario"=>$this->getid_usuario()
        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salvar Cadastro de Experiência Profissional!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

    /**
     *Exclui Experiencia Profissional para o Usuario
     */
    public function deleteProfessional():void{

        $this->conn->query("DELETE FROM tb_experiencia_profissional WHERE id_profissional = :id_profissional"
            ,array(
                ":id_profissional"=>$this->getid_profissional()
            ));
    }

}