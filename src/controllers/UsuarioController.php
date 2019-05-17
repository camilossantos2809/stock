<?php
require __DIR__ . '/../models/UsuarioDAO.php';


class UsuarioController
{
    private $dao;

    function __construct()
    {
        $this->dao = new UsuarioDAO();
    }

    public function login($login, $senha)
    {
        return $this->dao->getByLoginAndSenha($login, $senha);
    }

}
