<?php


require __DIR__ . '/../models/conexao.php';


class UsuarioDAO
{
    private $con;

    function __construct()
    {
        $this->con = new Conexao();
    }

    public function getAll()
    {
        $stmt = $this->con->getCon()->query("select * from usuario");
        if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            return array($this->con->errorInfo());
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->con->getCon()->prepare("select * from usuario where id=?");
        if (!$stmt) {
            echo "\nPDO::errorInfo():\n";
            return array($this->con->errorInfo());
        }
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByLoginAndSenha($login, $senha)
    {
        $params = [
            'login' => $login,
            'senha' => $senha
        ];
        try {
            $stmt = $this->con->getCon()->prepare("select * from usuario where login=:login and senha=:senha");
            if (!$stmt) {
                echo "\nPDO::errorInfo():\n";
                return array($this->con->errorInfo());
            }
            $stmt->execute($params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $err) {
            echo "<div><strong>" . $err . "</strong></div>";
            return false;
        }
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
