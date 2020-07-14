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
            throw new \Exception("Erro ao Salver Cadastro de Formação Acadêmica!");
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
            throw new \Exception("Erro ao Salvar Cadastro de Curso!");
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
    public static function getOtherCourses($id_usuario) {

        $conn = new Conection();

        return  $conn->select("SELECT * FROM tb_cursos
                WHERE id_usuario = :id_usuario", array(
            ":id_usuario"=>$id_usuario
        ));

    }


    /**
     * @return bool
     * @throws \Exception
     * Salva Cadastro de Idioma pora o Usuario
     */

    public function saveLanguages(): bool {
        $conn = new Conection();

        $results = $conn->select("CALL sp_idiomas_salvar(:id_idiomac,:idioma,:nivel_conhecimento,:id_usuario)", array(
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
    public static function getLanguages($id_usuario) {

        $conn = new Conection();

        return  $conn->select("SELECT * FROM tb_idioma_curriculo
                WHERE id_usuario = :id_usuario", array(
            ":id_usuario"=>$id_usuario
        ));

    }

    /**
     * @param $id_usuario
     * @param $idioma
     * @return bool
     *
     * Checa se o Usuario já cadastrou o Idioma
     */
    public static function checkLanguage($id_usuario, $idioma):bool {

        $conn = new Conection();

        $results =  $conn->select("SELECT * FROM tb_idioma_curriculo 
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
    public static function checkLanguageExists($idioma_pt):bool {

        $conn = new Conection();

        $results =  $conn->select("SELECT * FROM tb_idiomas 
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
        $conn = new Conection();

        $results = $conn->select("CALL sp_idiomas_criar(:id_idioma,:idioma_pt)", array(
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
    public static function languages() {
        $conn = new Conection();

        return $conn->select("SELECT * FROM tb_idiomas ORDER BY idioma_pt");
    }


    /**
     * @param $id_usuario
     * @return array
     *
     * Pega Experiência Profissional de Acordo com Usuario
     */
    public static function getExProfessional($id_usuario) {

        $conn = new Conection();

        return  $conn->select("SELECT * FROM tb_experiencia_profissional
                WHERE id_usuario = :id_usuario ORDER BY data_admissao DESC", array(
            ":id_usuario"=>$id_usuario
        ));

    }

    /**
     * @return bool
     * @throws \Exception
     * Salva Cadastro de Experiência Profissional pora o Usuario
     */

    public function saveProfessional(): bool {

        $conn = new Conection();

        $results = $conn->select("CALL sp_profissional_salvar(:id_profissional,:empresa_atual,:cargo_atual,:data_admissao,:atividade, 
        :empresa_anterior,:cargo_anterior,:data_demissao,:id_usuario)", array(
            ":id_profissional"=>$this->getid_profissional(),
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

}