<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
header("Location: src/index.php");
