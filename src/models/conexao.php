<?php

class Conexao {
    private $con;
    function __construct()
    {
        $this->con = $this->conexao();
    }


    private function conexao()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=stock', 'camilo', '123456789', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $pdo;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    /**
     * @return PDO
     */
    public function getCon(): PDO
    {
        return $this->con;
    }
}


