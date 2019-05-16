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

    public function getById($id) {
        $stmt = $this->con->getCon()->prepare("select * from cliente where id=?");
        if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            return array($this->con->errorInfo());
        }
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save($cli, $id) {
        if ($id) {
            $sql = "UPDATE cliente SET nome=:nome, cpf=:cpf, rg=:rg where id=:id";
            $stmt = $this->con->getCon()->prepare($sql);
            $stmt->execute($cli+$id);
        } else {
            $sql = "INSERT INTO cliente (nome, cpf, rg) VALUES (:nome, :cpf, :rg)";
            $stmt = $this->con->getCon()->prepare($sql);
            $stmt->execute($cli);
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM cliente where id=?";
        $stmt = $this->con->getCon()->prepare($sql);
        $stmt->execute([$id]);
    }
}