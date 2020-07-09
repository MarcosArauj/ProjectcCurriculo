<?php


namespace Source\Models;


use Source\Config\Conection;

/**
 * Class Curriculum
 * @package Source\Models
 */
class Curriculum extends User {


    /**
     * @return bool
     * @throws \Exception
     * Salva dados da Formação Acadêmica
     */
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

    /**
     * @return bool
     * @throws \Exception
     * Salva dados de Outros Cursos
     */
    public function saveOtherCourses(): bool {

        $conn = new Conection();

        $results = $conn->select(
            "CALL sp_cursos_salvar(:id_cursos,:nome_curso,:instituicao,:carga_horaria,:termino,:id_usuario)", array(
            ":id_cursos"=>$this->getid_cursos(),
            ":nome_curso"=>$this->getnome_curso(),
            ":instituicao"=>$this->getinstituicao(),
            ":carga_horaria"=>$this->getcarga_horaria(),
            ":termino"=>$this->gettermino(),
            ":id_usuario"=>$this->getid_usuario()
        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salver Cadastro!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

    public static function getOtherCourses($id_usuario) {

        $conn = new Conection();

        return  $conn->select("SELECT * FROM tb_cursos
                WHERE id_usuario = :id_usuario", array(
            ":id_usuario"=>$id_usuario
        ));

    }

}