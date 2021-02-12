<?php


namespace Source\Models;


/**
 * Class Search
 * @package Source\Models
 */
class Search extends Model {

    /**
     * @param string $search
     * @param string $filter
     * @param int $page
     * @param int $itemsPerPage
     * @return array
     * Busca de curriculos com filtros
     */
    public function getPageSearch(string $search, string $filter, int $page = 1, int $itemsPerPage = 7):array {
        $start = ($page - 1) * $itemsPerPage;
        $column_search = null;
        $column_search1 = "nivel_andamento";

        if($filter == "Formação") {
            $column_search = "nivel_conclusao";

        } else if ($filter == "Sexo") {
            $column_search = "genero";

        }else if($filter == "Idioma") {
            $column_search = "idioma";

        } else if($filter == "PCD") {
            $column_search = "tipo_deficiencia";
        }
        $results = $this->conn->select("SELECT SQL_CALC_FOUND_ROWS * FROM v_curriculo      
                    WHERE status_usuario = 'ativo' AND divulgacao = 'Sim'
                    AND $column_search LIKE :search OR $column_search1 LIKE :search
                    ORDER BY primeiro_nome LIMIT  $start, $itemsPerPage;",
            array(
                ":search" => '%' . $search . '%'
            ));

        if($filter == "Conhecimento") {
            $results = $this->conn->select("SELECT SQL_CALC_FOUND_ROWS * FROM v_curriculo      
                    WHERE status_usuario = 'ativo' AND divulgacao = 'Sim'
                    AND curso LIKE :search OR nome_curso LIKE :search OR idioma LIKE :search
                    OR cargo_atual LIKE :search OR cargo_anterior LIKE :search
                    OR atividade LIKE :search OR compentencias LIKE :search
                    ORDER BY primeiro_nome LIMIT  $start, $itemsPerPage;",
                array(
                    ":search" => '%' . $search . '%'
                ));
        }

        $resultTotal = $this->conn->select("SELECT FOUND_ROWS() AS nrtotal" );

        return array(
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        );
    }

    /**
     * @param int $page
     * @param int $itemsPerPage
     * @return array
     * Lista usuarios com busca
     */
    public function getPageUser(int $page = 1, int $itemsPerPage = 10) {
        $start = ($page - 1) * $itemsPerPage;

        $results = $this->conn->select("SELECT SQL_CALC_FOUND_ROWS *  FROM v_curriculo
                    WHERE acesso = 0 AND status_usuario = 'ativo'
                    ORDER BY primeiro_nome LIMIT $start, $itemsPerPage;");

        $resultTotal = $this->conn->select("SELECT FOUND_ROWS() AS nrtotal" );

        return array(
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        );

    }

    /**
     * @param string $search
     * @param int $page
     * @param int $itemsPerPage
     * @return array
     * Busca  de Usuarios
     */
    public function getPageSearchUser(string $search, int $page = 1, int $itemsPerPage = 10){
        $start = ($page - 1) * $itemsPerPage;

        $results = $this->conn->select("SELECT SQL_CALC_FOUND_ROWS *  FROM v_curriculo
                    WHERE acesso = 0 AND status_usuario = 'ativo'
                    AND primeiro_nome LIKE :search OR sobrenome LIKE :search 
                    GROUP BY id_usuario ORDER BY primeiro_nome LIMIT $start, $itemsPerPage;",array(
                        ":search"=>'%'.$search.'%'
                    ));

        $resultTotal = $this->conn->select("SELECT FOUND_ROWS() AS nrtotal" );

        return array(
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        );
    }


}