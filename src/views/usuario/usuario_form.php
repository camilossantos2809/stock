<?php
require __DIR__ . '/../header.php';
require __DIR__ . '/../../controllers/UsuarioController.php';
$cont = new UsuarioController();

if ($_POST) {
    $user_save = [
        'login' => $_POST['login'],
        'nome' => $_POST['nome'],
        'senha' => $_POST['senha']
    ];

    if ($_POST['id']) {
        $id = ['id' => $_POST['id']];
        $cont->save($user_save, $id);
    } else {
        $cont->save($user_save, false);
    }
}
if ($_GET['update']) {
    $user = $cont->getById($_GET['update']);
}
?>
    <div class="row">
        <form class="col s12" method="post" action="usuario_form.php">
            <?php
            if ($user) {
                echo '<h3>Alterar Usuário ' . $user['id'] . ' </h3>';
                echo "<input hidden id=\"id\" name=\"id\" value=\"" . $user['id'] . "\">";
            } else {
                echo '<h3>Inclusão de Usuários</h3>';
            }
            ?>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="login" name="login" type="text" class="validate" required
                           value="<?php echo $user['login']; ?>">
                    <label for="login">Login</label>
                    <span class="helper-text" data-error="por favor, verifique o conteúdo desse campo">Login</span>
                </div>
                <div class="input-field col s12 m6">
                    <input id="nome" name="nome" type="text" class="validate" required
                           value="<?php echo $user['nome']; ?>">
                    <label for="nome">Nome</label>
                    <span class="helper-text" data-error="por favor, verifique o conteúdo desse campo">Nome completo do usuário</span>
                </div>
                <div class="input-field col s12 m6">
                    <input id="senha" name="senha" type="password" class="validate" required value="<?php echo $user['senha']; ?>">
                    <label for="senha">Senha</label>
                    <span class="helper-text" data-error="por favor, verifique o conteúdo desse campo">Senha</span>
                </div>
            </div>
            <button class="btn waves-effect waves-light teal" type="submit" name="action">Gravar
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
<?php
require __DIR__ . '/../footer.php';