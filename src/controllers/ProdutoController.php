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
}
