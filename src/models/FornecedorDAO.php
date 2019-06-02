<?php
require_once 'Dao.php';

class FornecedorDAO extends Dao
{
    public function getAll()
    {
        return parent::getAll("select * from fornecedor where status='N'");
    }

    public function getById($id)
    {
        return parent::getById("select * from fornecedor where id=?", $id);
    }

    public function save($forn, $id)
    {
        if ($id) {
            $sql = "UPDATE fornecedor SET razao_social=:razao_social, nome_fantasia=:nome_fantasia, cnpj=:cnpj where id=:id";
            return parent::save($sql, $forn + $id);
        } else {
            $sql = "INSERT INTO fornecedor (razao_social, nome_fantasia, cnpj) VALUES (:razao_social, :nome_fantasia, :cnpj)";
            return parent::save($sql, $forn);
        }
    }

    public function inativar($id)
    {
        parent::inativar("fornecedor", $id);
    }
}
