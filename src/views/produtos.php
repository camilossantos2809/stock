<?php
require 'header.php';
require '../controllers/produtos.php';

$prod = new ProdutosController();
echo $prod->produtos();
echo "<h1>Testes produto.php</h1>";

require 'footer.php';