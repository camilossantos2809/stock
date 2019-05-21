<?php
require_once 'Dao.php';

class ProdutoDAO extends Dao
{
    public function getAll()
    {
        return parent::getAll("select * from produto");
    }

    public function getById($id)
    {
        return parent::getById("select * from produto where id=?", $id);
    }
}