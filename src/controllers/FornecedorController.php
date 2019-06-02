<?php

require __DIR__ . '/Controller.php';
require __DIR__ . '/../models/FornecedorDAO.php';

class FornecedorController extends Controller{
    private $dao;
    public function __construct()
    {
        $this->dao = new FornecedorDAO();
    }
    public function getAll()
    {
        return $this->dao->getAll();
    }
    public function save($obj, $id)
    {
        $this->dao->save($obj, $id);
        $this->showMessage("Fornecedor gravado!");
        header('Location: /src/views/fornecedor/fornecedor.php');
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