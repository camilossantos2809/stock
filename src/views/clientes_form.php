<?php
require 'header.php';
require '../controllers/ClienteController.php';
$cont = new ClienteController();

if ($_POST) {
    $cli_save = [
        'nome' => $_POST['nome'],
        'cpf' => $_POST['cpf'],
        'rg' => $_POST['rg']
    ];

    if ($_POST['id']) {
        $id = ['id' => $_POST['id']];
        $cont->save($cli_save, $id);
    } else {
        $cont->save($cli_save, false);
    }
}
if ($_GET['update']) {
    $cli = $cont->getById($_GET['update']);
}
?>
    <div class="row">
        <form class="col s12" method="post" action="clientes_form.php">
            <?php
            if ($cli) {
                echo '<h3>Alterar cliente ' . $cli['id'] . ' </h3>';
                echo "<input hidden id=\"id\" name=\"id\" value=\"" . $cli['id'] . "\">";
            } else {
                echo '<h3>Inclusão de Cliente</h3>';
            }
            ?>
            <div class="row">
                <div class="input-field col s12">
                    <input id="nome" name="nome" type="text" class="validate" required
                           value="<?php echo $cli['nome']; ?>">
                    <label for="nome">Nome</label>
                    <span class="helper-text" data-error="por favor, verifique o conteúdo desse campo">Nome completo do cliente</span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="cpf" name="cpf" type="number" class="validate" required
                           value="<?php echo $cli['cpf']; ?>">
                    <label for="cpf">CPF</label>
                    <span class="helper-text"
                          data-error="por favor, verifique o conteúdo desse campo">CPF do cliente</span>
                </div>
                <div class="input-field col s12 m6">
                    <input id="rg" name="rg" type="text" class="validate" required value="<?php echo $cli['rg']; ?>">
                    <label for="rg">RG</label>
                    <span class="helper-text"
                          data-error="por favor, verifique o conteúdo desse campo">RG do cliente</span>
                </div>
            </div>
            <button class="btn waves-effect waves-light teal" type="submit" name="action" >Gravar
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
<?php
require 'footer.php';