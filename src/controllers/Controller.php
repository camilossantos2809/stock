<?php
require __DIR__ . '/../models/Dao.php';

abstract class Controller
{
    abstract function getAll();

    abstract function save($obj, $id);

    abstract function getById($id);

    function showMessage($msg)
    {
        echo '<script src="../js/login.js"></script>';
        echo '<script>showMessage("' . $msg . '")</script>';
    }
}