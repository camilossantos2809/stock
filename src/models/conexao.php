<?php
function conexao()
{
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=teste', 'camilo', '123456789', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $pdo;
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}
