<?php
require 'views/header.php';

require 'models/conexao.php';
$con = conexao();
$stmt = $con->query("select * from cadfun");
if (!$stmt) {
    echo "\nPDO::errorInfo():\n";
    print_r($con->errorInfo());
}
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo '<ul class="collection">';
foreach ($res as $row) {
    echo '<li class="collection-item">' . $row['nome'] . '</li>';
}
echo '</ul>';

require 'views/footer.php';
?>
