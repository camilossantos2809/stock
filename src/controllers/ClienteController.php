<?php


require '../models/conexao.php';


class ClienteController
{
    private $con;

    function __construct()
    {
        $this->con = new Conexao();
    }

    public function getAll() {
        $stmt = $this->con->getCon()->query("select * from cliente");
        if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            return array($this->con->errorInfo());
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}