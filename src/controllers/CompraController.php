<?php
require __DIR__ . '/Controller.php';
require __DIR__ . '/../models/CompraDAO.php';

class CompraController {
    private $dao;

    function __construct()
    {
        $this->dao = new CompraDAO();
    }
    public function save($compra, $prods) {
        $id = $this->dao->save($compra, $prods);
        $this->showMessage($id['id']." adicionada");
    }

    function showMessage($msg)
    {
        echo '<script src="../js/login.js"></script>';
        echo '<script>showMessage("' . $msg . '")</script>';
    }
}