<?php
if (!$_COOKIE['user']) {
    header('Location: /src/views/login.php');
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Stock</title>
</head>

<body>
<nav>
    <div class="nav-wrapper teal darken-4">
        <a href="#" class="brand-logo">Stock</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="/src/index.php" class="tooltipped" data-tooltip="Ir para a página inicial"><i
                            class="material-icons">home</i></a></li>
            <li><a class="tooltipped" data-tooltip="Usuário logado"><i
                            class="material-icons left">people</i><?php echo $_COOKIE['user']; ?></a></li>
            <li><a href="/src/views/login.php" class="tooltipped" data-tooltip="Efetuar logout"
                   onclick="document.cookie='user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;'"><i
                            class="material-icons">logout</i></a></li>
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="/index.php">Home</a></li>
    <li><a href="/src/views/produtos/produtos.php">Produtos</a></li>
    <li><a href="/src/views/clientes/clientes.php">Clientes</a></li>
    <li><a href="/src/views/fornecedores.php">Fornecedores</a></li>
    <li><a href="/src/views/usuarios.php">Usuários</a></li>
    <li><a href="/src/views/movEstoques.php">Movimento Estoques</a></li>
    <li><a href="/src/views/relatorios.php">Relatórios</a></li>
</ul>
<div class="container">