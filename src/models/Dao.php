<?php
require __DIR__ . '/../models/conexao.php';

abstract class Dao
{
    protected $con;

    function __construct()
    {
        $this->con = new Conexao();
    }

    public function getAll($query)
    {
        $stmt = $this->con->getCon()->query($query);
        if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            return array($this->con->errorInfo());
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($query, $id)
    {
        $stmt = $this->con->getCon()->prepare($query);
        if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            return array($this->con->errorInfo());
        }
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save($usuario, $id)
    {
        if ($id) {
            $sql = "UPDATE usuario SET nome=:nome, login=:login, senha=:senha where id=:id";
            $stmt = $this->con->getCon()->prepare($sql);
            $stmt->execute($usuario + $id);
        } else {
            $sql = "INSERT INTO usuario (nome, login, senha) VALUES (:nome, :login, :senha)";
            $stmt = $this->con->getCon()->prepare($sql);
            $stmt->execute($usuario);
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM usuario where id=?";
        $stmt = $this->con->getCon()->prepare($sql);
        $stmt->execute([$id]);
    }
}