<?php
require __DIR__ . '/../header.php';
require __DIR__ . '/../../controllers/FornecedorController.php';
$cont = new FornecedorController();

if ($_POST) {
    $forn_save = [
        'razao_social' => $_POST['razao_social'],
        'nome_fantasia' => $_POST['nome_fantasia'],
        'cnpj' => $_POST['cnpj']
    ];

    if ($_POST['id']) {
        $id = ['id' => $_POST['id']];
        $cont->save($forn_save, $id);
    } else {
        $cont->save($forn_save, false);
    }
}
if ($_GET['update']) {
    $forn = $cont->getById($_GET['update']);
}
?>
    <div class="row">
        <form class="col s12" method="post" action="fornecedor_form.php">
            <?php
            if ($forn) {
                echo '<h3>Alterar Fornecedor ' . $forn['id'] . ' </h3>';
                echo "<input hidden id=\"id\" name=\"id\" value=\"" . $forn['id'] . "\">";
            } else {
                echo '<h3>Inclusão de Fornecedor</h3>';
            }
            ?>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="cnpj" name="cnpj" type="text" class="validate" required
                           value="<?php echo $forn['cnpj']; ?>">
                    <label for="cnpj">CNPJ</label>
                    <span class="helper-text"
                          data-error="por favor, verifique o conteúdo desse campo">Código CNPJ</span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m8">
                    <input id="razao_social" name="razao_social" type="text" class="validate" required
                           value="<?php echo $forn['razao_social']; ?>">
                    <label for="razao_social">Razão Social</label>
                    <span class="helper-text"
                          data-error="por favor, verifique o conteúdo desse campo">Razão Social</span>
                </div>
                <div class="input-field col s12 m4">
                    <input id="nome_fantasia" name="nome_fantasia" type="text" class="validate" required
                           value="<?php echo $forn['nome_fantasia']; ?>">
                    <label for="nome_fantasia">Nome fantasia</label>
                    <span class="helper-text"
                          data-error="por favor, verifique o conteúdo desse campo">Nome fantasia</span>
                </div>
            </div>
            <button class="btn waves-effect waves-light teal" type="submit" name="action">Gravar
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
<?php
require __DIR__ . '/../footer.php';