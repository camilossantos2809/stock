<?php
require __DIR__ . '/../models/Dao.php';

abstract class Controller
{
    abstract function getAll();
}