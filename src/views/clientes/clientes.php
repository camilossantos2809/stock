<?php
require __DIR__.'/../header.php';
require __DIR__.'/../../controllers/ClienteController.php';

$control = new ClienteController;
$res = $control->getAll();

if ($_GET && $_GET['delete']) {
    $control->delete($_GET['delete']);
}
?>
    <h3>Listagem de Clientes</h3>
    <table class="striped highlight centered">
        <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>RG</th>
        <th>St.</th>
        <th></th>
        <th></th>
        </thead>
        <tbody>
        <?php
        foreach ($res as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td>' . $row['cpf'] . '</td>';
            echo '<td>' . $row['rg'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '<td><a href="clientes_form.php?update=' . $row['id'] . '"><i class="material-icons">edit</i></a></td>';
            echo '<td><a href="" onclick="deleteById(' . $row['id'] . ')"><i class="material-icons">delete</i></a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <div class="fixed-action-btn">
        <a href="clientes_form.php" class="btn-floating btn-large">
            <i class="large material-icons">add</i>
        </a>
    </div>
    <script src="../js/clientes.js"></script>
<?php
require __DIR__.'/../footer.php';