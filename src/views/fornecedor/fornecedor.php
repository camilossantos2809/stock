<?php
require __DIR__ . '/../header.php';
require __DIR__ . '/../../controllers/FornecedorController.php';

$control = new FornecedorController();
$res = $control->getAll();

if ($_GET && $_GET['delete']) {
    $id = ['id' => $_GET['delete']];
    $control->inativar($id);
}
?>
    <h3>Listagem de Fornecedores</h3>
    <table class="striped highlight centered">
        <thead>
        <th>ID</th>
        <th>Razão Social</th>
        <th>Nome Fantasia</th>
        <th>CNPJ</th>
        <th>St.</th>
        <th></th>
        <th></th>
        </thead>
        <tbody>
        <?php
        foreach ($res as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['razao_social'] . '</td>';
            echo '<td>' . $row['nome_fantasia'] . '</td>';
            echo '<td>' . $row['cnpj'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '<td><a href="fornecedor_form.php?update=' . $row['id'] . '"><i class="material-icons">edit</i></a></td>';
            echo '<td><a href="" onclick="deleteById(' . $row['id'] . ')"><i class="material-icons">delete</i></a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <div class="fixed-action-btn">
        <a href="fornecedor_form.php" class="btn-floating btn-large">
            <i class="large material-icons">add</i>
        </a>
    </div>
    <script src="js/fornecedor.js"></script>
<?php
require __DIR__ . '/../footer.php';