<?php


namespace Source\Config;


/**
 * Class Conection
 * @package Source\Config
 */
class Conection {
//    const HOSTNAME = "localHost";
//    const USERNAME = "root";
//    const PASSWORD = "";
//    const DBNAME = "db_curriculo";

    const HOSTNAME = "185.201.11.23";
    const USERNAME = "u655389713_wc";
    const PASSWORD = "2517Mmm23";
    const DBNAME = "u655389713_tb_curriculo";

    /**
     * @var \PDO
     */
    private $conn;

    /**
     * Conection constructor.
     */
    public function __construct() {

        $this->conn = new \PDO(
            "mysql:dbname=".Conection::DBNAME.";host=".Conection::HOSTNAME,
            Conection::USERNAME,
            Conection::PASSWORD
        );

    }

    /**
     * @param $statement
     * @param array $parameters
     */
    private function setParams($statement, $parameters = array()) {

        foreach ($parameters as $key => $value) {

            $this->bindParam($statement, $key, $value);

        }

    }

    /**
     * @param $statement
     * @param $key
     * @param $value
     */
    private function bindParam($statement, $key, $value) {

        $statement->bindParam($key, $value);

    }

    /**
     * @param $rawQuery
     * @param array $params
     */
    public function query($rawQuery, $params = array()) {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

    }

    /**
     * @param $rawQuery
     * @param array $params
     * @return array
     */
    public function select($rawQuery, $params = array()):array {

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    

}