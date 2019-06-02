<?php
require_once 'Dao.php';

class ProdutoDAO extends Dao
{
    public function getAll()
    {
        return parent::getAll("select * from produto where status='N'");
    }

    public function getById($id)
    {
        return parent::getById("select * from produto where id=?", $id);
    }

    public function save($produto, $id)
    {
        if ($id) {
            $sql = "UPDATE produto SET cod_barras=:cod_barras, descricao=:descricao, marca=:marca, preco=:preco, estoque=:estoque, custo=:custo where id=:id";
            return parent::save($sql, $produto + $id);
        } else {
            $sql = "INSERT INTO produto (cod_barras, descricao, marca, preco, estoque, custo, usuario_cadastro, data_hora_cadastro) 
                    VALUES (:cod_barras, :descricao, :marca, :preco, :estoque, :custo, :usuario_cadastro, current_timestamp)";
            return parent::save($sql, $produto);
        }
    }

    public function inativar($id)
    {
        parent::inativar("produto", $id);
    }
}