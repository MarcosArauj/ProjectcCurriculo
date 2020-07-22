<?php


namespace Source\Models;


class Formation extends Model {

    /**
     * @return bool
     * @throws \Exception
     * Salvar e Atualizar dados da Formação Acadêmica
     */
    public function saveAcademicFormation(): bool {

        $results = $this->conn->select(
            "CALL sp_formacao_salvar(:id_formacao,:nivel_conclusao, :instituicao_conclusao, :ano_inicio_conclusao, :ano_conclusao, :nivel_andamento,
             :instituicao_andamento, :ano_inicio_andamento, :curso, :id_usuario)", array(
            ":id_formacao"=>$this->getid_formacao(),
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
            throw new \Exception("Erro  No Registro da Formação Acadêmica!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

    /**
     * @return bool
     * @throws \Exception
     * Salvar e Atualizar dados de Outros Cursos
     */
    public function saveOtherCourses(): bool {

        $results = $this->conn->select(
            "CALL sp_cursos_salvar(:id_cursos,:nome_curso,:instituicao,:carga_horaria,:termino,:compentencias,:id_usuario)", array(
            ":id_cursos"=>$this->getid_cursos(),
            ":nome_curso"=>$this->getnome_curso(),
            ":instituicao"=>$this->getinstituicao(),
            ":carga_horaria"=>$this->getcarga_horaria(),
            ":termino"=>$this->gettermino(),
            ":compentencias"=>$this->getcompentencias(),
            ":id_usuario"=>$this->getid_usuario()
        ));

        if (count($results) === 0) {
            throw new \Exception("Erro no Registro do Curso!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

    /**
     * @param $id_usuario
     * @return array
     *
     * Pega Curso de Acordo com Usuario
     */
    public function getOtherCoursesUser($id_usuario):array {

        return  $this->conn->select("SELECT * FROM tb_cursos
                WHERE id_usuario = :id_usuario", array(
            ":id_usuario"=>$id_usuario
        ));

    }

    /**
     * @param $id_cursos
     * @return void
     * Pega Curso
     */
    public function getOtherCourses($id_cursos):void {

        $results =   $this->conn->select("SELECT * FROM tb_cursos
                WHERE id_cursos = :id_cursos", array(
            ":id_cursos"=>$id_cursos
        ));

        $this->setData($results[0]);
    }

    /**
     * @return bool
     * @throws \Exception
     * Salva Cadastro de Idioma pora o Usuario
     */

    public function saveLanguages(): bool {

        $results = $this->conn->select("CALL sp_idiomas_salvar(:id_idiomac,:idioma,:nivel_conhecimento,:id_usuario)", array(
            ":id_idiomac"=>$this->getid_idiomac(),
            ":idioma"=>$this->getidioma(),
            ":nivel_conhecimento"=>$this->getnivel_conhecimento(),
            ":id_usuario"=>$this->getid_usuario()
        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salvar Cadastro de Idioma!");
            return false;
        }

        $this->setData($results[0]);

        return true;

    }

    /**
     * @param $id_usuario
     * @return array
     *
     * Pega Idioma de Acordo com Usuario
     */
    public function getLanguagesUser($id_usuario) {

        return  $this->conn->select("SELECT * FROM tb_idioma_curriculo
                WHERE id_usuario = :id_usuario", array(
            ":id_usuario"=>$id_usuario
        ));

    }

    /**
     * @param $id_idiomac
     * @return void
     * Pega Idiomas
     */
    public function getLanguages($id_idiomac):void {

        $results =   $this->conn->select("SELECT * FROM tb_idioma_curriculo
                WHERE id_idiomac = :id_idiomac", array(
            ":id_idiomac"=>$id_idiomac
        ));

        $this->setData($results[0]);
    }

    /**
     * @param $id_usuario
     * @param $idioma
     * @return bool
     *
     * Checa se o Usuario já cadastrou o Idioma
     */
    public function checkLanguage($id_usuario, $idioma):bool {

        $results =  $this->conn->select("SELECT * FROM tb_idioma_curriculo 
                WHERE  id_usuario = :id_usuario AND idioma = :idioma", array(
            ":id_usuario"=>$id_usuario,
            ":idioma"=>$idioma
        ));

        return (count($results) > 0);

    }

    /**
     * @param $id_usuario
     * @param $idioma
     * @return bool
     *
     * Checa  cadastrou o Idioma
     */
    public function checkLanguageExists($idioma_pt):bool {

        $results =  $this->conn->select("SELECT * FROM tb_idiomas 
                WHERE idioma_pt = :idioma_pt", array(
            ":idioma_pt"=>$idioma_pt
        ));

        return (count($results) > 0);

    }

    /**
     * @return bool
     * @throws \Exception
     * Salvar novos Idiomas no Sistema
     */
    public function createLanguage(): bool {

        $results = $this->conn->select("CALL sp_idiomas_criar(:id_idioma,:idioma_pt)", array(
            ":id_idioma"=>$this->getid_idioma(),
            ":idioma_pt"=>$this->getidioma_pt()
        ));

        if (count($results) === 0) {
            throw new \Exception("Erro ao Salvar Idioma!");
            return false;
        }

        $this->setData($results[0]);

        return true;
    }

    /**
     * @return array
     * Lista Idiomas
     */
    public function languages() {

        return $this->conn->select("SELECT * FROM tb_idiomas ORDER BY idioma_pt");
    }

}