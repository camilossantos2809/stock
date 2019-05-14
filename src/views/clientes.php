<?php


require 'header.php';
require '../controllers/ClienteController.php';

$control = new ClienteController;
$res = $control->getAll();

echo '<ul class="collection">';
foreach ($res as $row) {
    echo '<li class="collection-item">' . $row['nome'] . '</li>';
}
echo '</ul>';

require 'views/footer.php';