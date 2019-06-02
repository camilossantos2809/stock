<?php

require __DIR__ . '/Controller.php';
require __DIR__ . '/../models/ProdutoDAO.php';

class ProdutoController extends Controller
{
    private $dao;

    function __construct()
    {
        $this->dao = new ProdutoDAO();
    }

    public function getAll()
    {
        return $this->dao->getAll();
    }

    public function save($obj, $id)
    {
        $this->dao->save($obj, $id);
        $this->showMessage("Produto gravado!");
        header('Location: /src/views/produtos/produtos.php');
    }

    public function getById($id)
    {
        return $this->dao->getById($id);
    }

    public function inativar($id)
    {
        return $this->dao->inativar($id);
    }
}
