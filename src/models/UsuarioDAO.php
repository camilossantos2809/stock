<?php

require_once 'Dao.php';


class UsuarioDAO extends Dao
{

    public function getAll()
    {
        return parent::getAll("select * from usuario");
    }

    public function getById($id)
    {
        return parent::getById("select * from usuario where id=?", $id);
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
            return parent::save($sql, $usuario + $id);
        } else {
            $sql = "INSERT INTO usuario (nome, login, senha) VALUES (:nome, :login, :senha)";
            return parent::save($sql, $usuario);
        }
    }

    public function inativar($id)
    {
        parent::inativar("usuario", $id);
    }
}
