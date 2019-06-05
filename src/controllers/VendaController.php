<?php
require __DIR__ . '/Controller.php';
require __DIR__ . '/../models/VendaDAO.php';

class VendaController {
    private $dao;

    function __construct()
    {
        $this->dao = new VendaDAO();
    }
    public function save($venda, $prods) {
        $id = $this->dao->save($venda, $prods);
        $this->showMessage($id['id']." adicionada");
    }

    function showMessage($msg)
    {
        echo '<script src="../js/login.js"></script>';
        echo '<script>showMessage("' . $msg . '")</script>';
    }
}