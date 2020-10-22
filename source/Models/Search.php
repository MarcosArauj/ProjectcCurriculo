<?php


namespace Source\Models;


class Search extends Model {


    /*
     * Busca de curriculos com filtros
     */
    public function getPageSearch($search,$filter,$page = 1, $itemsPerPage = 7):array {
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
                    WHERE status_usuario = 'ativo' 
                    AND $column_search LIKE :search OR $column_search1 LIKE :search
                    GROUP BY id_usuario 
                    ORDER BY primeiro_nome LIMIT  $start, $itemsPerPage;",
            array(
                ":search" => '%' . $search . '%'
            ));

        if($filter == "Conhecimento") {
            $results = $this->conn->select("SELECT SQL_CALC_FOUND_ROWS * FROM v_curriculo      
                    WHERE status_usuario = 'ativo' 
                    AND curso LIKE :search OR nome_curso LIKE :search OR idioma LIKE :search
                    OR cargo_atual LIKE :search OR cargo_anterior LIKE :search
                    OR atividade LIKE :search OR compentencias LIKE :search
                    GROUP BY id_usuario 
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


    /*
    * Lista usuarios com busca
    */
    public function getPageUser($page = 1, $itemsPerPage = 10) {
        $start = ($page - 1) * $itemsPerPage;

        $results = $this->conn->select("SELECT SQL_CALC_FOUND_ROWS *  FROM v_curriculo
                    WHERE acesso = 0 AND status_usuario = 'ativo' GROUP BY id_usuario 
                    ORDER BY primeiro_nome LIMIT $start, $itemsPerPage;");

        $resultTotal = $this->conn->select("SELECT FOUND_ROWS() AS nrtotal" );

        return array(
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'pages'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        );

    }


    /*
    * Busca  de Usuarios
    */
    public function getPageSearchUser($search,$page = 1, $itemsPerPage = 10){
        $start = ($page - 1) * $itemsPerPage;

        $results = $this->conn->select("SELECT SQL_CALC_FOUND_ROWS *  FROM v_curriculo
                    WHERE acesso = 0 AND status_usuario = 'ativo'
                    AND primeiro_nome LIKE :search 
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