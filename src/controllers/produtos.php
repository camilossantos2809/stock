<?php
require '../models/conexao.php';

class ProdutosController
{
    private $con;

    function __construct()
    {
        $this->$con = conexao();
    }

    public function produtos()
    {
        $stmt = $this->$con->query("select * from cadfun");
        if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            return array($this->$con->errorInfo());
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
