<?php
require_once __DIR__ . '/Controller.php';
require __DIR__ . '/../models/UsuarioDAO.php';


class UsuarioController extends Controller
{
    private $dao;

    function __construct()
    {
        $this->dao = new UsuarioDAO();
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function login($login, $senha)
    {
        $user = $this->dao->getByLoginAndSenha($login, $senha);
        if ($user) {
            setcookie('user', $user['nome'], (time() + (2 * 3600)), '/');
            setcookie('user_id', $user['id'], (time() + (2 * 3600)), '/');
        }
        return $user;
    }

    public function save($obj, $id)
    {
        // TODO: Implement save() method.
    }

}
