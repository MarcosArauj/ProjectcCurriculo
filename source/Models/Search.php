<?php


namespace Source\Models;


class Search extends Model {

    public function getPage($page = 1, $itemsPerPage = 10) {

        $start = ($page - 1) * $itemsPerPage;

        $results = $this->conn->select("SELECT SQL_CALC_FOUND_ROWS * FROM v_curriculo      
                    WHERE tipo_usuario = :tipo_usuario AND status_usuario = 'ativo'
                    ORDER BY primeiro_nome LIMIT $start, $itemsPerPage;",array(
        ));

        $resultTotal = $this->conn->select("SELECT FOUND_ROWS() AS nrtotal" );

        return array(
            'data'=>$results,
            'total'=>(int)$resultTotal[0]["nrtotal"],
            'page'=>ceil($resultTotal[0]["nrtotal"] / $itemsPerPage)
        );

    }

    public function getPageSearch($search,$page = 1, $itemsPerPage = 7):array {
        $start = ($page - 1) * $itemsPerPage;

        $results =  $this->conn->select("SELECT SQL_CALC_FOUND_ROWS * FROM v_curriculo      
                    WHERE status_usuario = 'ativo'
                    AND genero LIKE :search OR nivel_conclusao LIKE :search GROUP BY id_usuario 
                    ORDER BY primeiro_nome LIMIT  $start, $itemsPerPage;",
            array(
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