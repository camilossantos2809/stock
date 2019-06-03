<?php
require __DIR__ . '/../header.php';
require __DIR__ . '/../../controllers/UsuarioController.php';

$control = new UsuarioController();
$res = $control->getAll();

if ($_GET && $_GET['delete']) {
    $id = ['id' => $_GET['delete']];
    $control->inativar($id);
}
?>
    <h3>Listagem de Usuários</h3>
    <table class="striped highlight centered">
        <thead>
        <th>ID</th>
        <th>Login</th>
        <th>Nome</th>
        <th></th>
        <th></th>
        </thead>
        <tbody>
        <?php
        foreach ($res as $row) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['login'] . '</td>';
            echo '<td>' . $row['nome'] . '</td>';
            echo '<td><a href="usuario_form.php?update=' . $row['id'] . '"><i class="material-icons">edit</i></a></td>';
            echo '<td><a href="" onclick="deleteById(' . $row['id'] . ')"><i class="material-icons">delete</i></a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <div class="fixed-action-btn">
        <a href="usuario_form.php" class="btn-floating btn-large">
            <i class="large material-icons">add</i>
        </a>
    </div>
    <script src="js/usuario.js"></script>
<?php
require __DIR__ . '/../footer.php';