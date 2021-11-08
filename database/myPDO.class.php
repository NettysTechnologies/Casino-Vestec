<?php
define("CONNECTION", true);
require_once("DbConn.class.php");

class myPDO {
    private $pdo = null;

    public function __construct() {
        $this->pdo = DbConn::connect();
    }

    public function proved(string $sql, array $params) : bool { /* dává data DO databaze + mění data */
        $stmt = $this->pdo->prepare($sql);
        foreach ($params as $key => $param) {
            $stmt->bindValue($key, $param[0], $param[1]);
        }
        return $stmt->execute();
    }

    public function vrat(string $sql, array $params) : array { /* vrací data Z databaze */
        $stmt = $this->pdo->prepare($sql);
        foreach ($params as $key => $param) {
            $stmt->bindValue($key, $param[0], $param[1]);
        }
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}