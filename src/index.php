<?php
require 'views/header.php';

require 'models/conexao.php';

$con = new Conexao();
$stmt = $con->getCon()->query("select * from produto");
if (!$stmt) {
    echo "\nPDO::errorInfo():\n";
    print_r($con->errorInfo());
}
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo '<ul class="collection">';
foreach ($res as $row) {
    echo '<li class="collection-item">' . $row['descricao'] . '</li>';
}
echo '</ul>';

require 'views/footer.php';
?>
