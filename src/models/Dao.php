<?php
require __DIR__ . '/../models/conexao.php';

abstract class Dao
{
    protected $con;

    function __construct()
    {
        $this->con = new Conexao();
    }

    protected function getAll($query)
    {
        $stmt = $this->con->getCon()->query($query);
        if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            return array($this->con->errorInfo());
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getById($query, $id)
    {
        $stmt = $this->con->getCon()->prepare($query);
        if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            return array($this->con->errorInfo());
        }
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    protected function save($sql, $obj)
    {
        $stmt = $this->con->getCon()->prepare($sql);
        $stmt->execute($obj);
        return true;
    }

    protected function inativar($obj, $id)
    {
        $sql = "UPDATE " . $obj . " set status='C' where id=:id";
        $stmt = $this->con->getCon()->prepare($sql);
        $stmt->execute($id);
    }

    protected function delete($id)
    {
        $sql = "DELETE FROM usuario where id=?";
        $stmt = $this->con->getCon()->prepare($sql);
        $stmt->execute([$id]);
    }
}