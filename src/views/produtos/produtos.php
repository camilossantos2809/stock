<?php
require __DIR__.'/../header.php';
require __DIR__.'/../../controllers/ProdutoController.php';

$control = new ProdutoController();
$res = $control->getAll();

//if ($_GET && $_GET['delete']) {
//    $control->delete($_GET['delete']);
//}
?>
    <h3>Listagem de Produtos</h3>
    <table class="striped highlight centered">
        <thead>
        <th>ID</th>
        <th>Cod.Barras</th>
        <th>Descrição</th>
        <th>Marca</th>
        <th>Preço</th>
        <th>Custo</th>
        <th>Estoque</th>
        <th>St.</th>
        <th></th>
        <th></th>
        </thead>
        <tbody>
        <?php
        foreach ($res as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['cod_barras'] . '</td>';
            echo '<td>' . $row['descricao'] . '</td>';
            echo '<td>' . $row['marca'] . '</td>';
            echo '<td>' . $row['preco'] . '</td>';
            echo '<td>' . $row['custo'] . '</td>';
            echo '<td>' . $row['estoque'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '<td><a href="produtos_form.php?update=' . $row['id'] . '"><i class="material-icons">edit</i></a></td>';
            echo '<td><a href="" onclick="deleteById(' . $row['id'] . ')"><i class="material-icons">delete</i></a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <div class="fixed-action-btn">
        <a href="produtos_form.php" class="btn-floating btn-large">
            <i class="large material-icons">add</i>
        </a>
    </div>
<!--    <script src="js/clientes.js"></script>-->
<?php
require __DIR__.'/../footer.php';