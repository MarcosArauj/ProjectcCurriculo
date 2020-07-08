<?php


namespace Source\Models;


use Source\Config\Conection;

class Curriculum extends User {


    public function saveAcademicFormation(): bool {

        $conn = new Conection();

        $results = $conn->select(
            "CALL sp_formacao_salvar(:nivel_conclusao, :instituicao_conclusao, :ano_inicio_conclusao, :ano_conclusao, :nivel_andamento,
             :instituicao_andamento, :ano_inicio_andamento, :curso, :id_usuario)", array(
            ":nivel_conclusao"=>$this->getnivel_conclusao(),
            ":instituicao_conclusao"=>$this->getinstituicao_conclusao(),
            ":ano_inicio_conclusao"=>$this->getano_inicio_conclusao(),
            ":ano_conclusao"=>$this->getano_conclusao(),
            ":nivel_andamento"=>$this->getnivel_andamento(),
            ":instituicao_andamento"=>$this->getinstituicao_andamento(),
            ":ano_inicio_andamento"=>$this->getano_inicio_andamento(),
            ":curso"=>$this->getcurso(),
            ":id_usuario"=>$this->getid_usuario()
        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salver Cadastro!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

}