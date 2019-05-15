<?php
require 'header.php';
require '../controllers/ClienteController.php';

$control = new ClienteController;
$res = $control->getAll();
?>
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
            echo '<td><a href="#"><i class="material-icons">edit</i></a></td>';
            echo '<td><a href="#"><i class="material-icons">delete</i></a></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large">
            <i class="large material-icons">add</i>
        </a>
    </div>
<?php
require 'views/footer.php';