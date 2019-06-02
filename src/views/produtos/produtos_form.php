<?php
require __DIR__ . '/../header.php';
require __DIR__ . '/../../controllers/ProdutoController.php';
$cont = new ProdutoController();

if ($_POST) {
    $prod_save = [
        'cod_barras' => $_POST['cod_barras'],
        'descricao' => $_POST['descricao'],
        'marca' => $_POST['marca'],
        'preco' => $_POST['preco'],
        'estoque' => $_POST['estoque'],
        'custo' => $_POST['custo']
    ];

    if ($_POST['id']) {
        $id = ['id' => $_POST['id']];
        $cont->save($prod_save, $id);
    } else {
        $cont->save($prod_save+['usuario_cadastro' => $_COOKIE['user_id']], false);
    }
}
if ($_GET['update']) {
    $prod = $cont->getById($_GET['update']);
}
?>
    <div class="row">
        <form class="col s12" method="post" action="produtos_form.php">
            <?php
            if ($prod) {
                echo '<h3>Alterar Produto ' . $prod['id'] . ' </h3>';
                echo "<input hidden id=\"id\" name=\"id\" value=\"" . $prod['id'] . "\">";
            } else {
                echo '<h3>Inclusão de Produtos</h3>';
            }
            ?>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="cod_barras" name="cod_barras" type="text" class="validate" required
                           value="<?php echo $prod['cod_barras']; ?>">
                    <label for="cod_barras">Cod.Barras</label>
                    <span class="helper-text" data-error="por favor, verifique o conteúdo desse campo">Código de barras do produto (EAN13 ou DUN14)</span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m8">
                    <input id="descricao" name="descricao" type="text" class="validate" required
                           value="<?php echo $prod['descricao']; ?>">
                    <label for="descricao">Descrição</label>
                    <span class="helper-text" data-error="por favor, verifique o conteúdo desse campo">Descrição do produto</span>
                </div>
                <div class="input-field col s12 m4">
                    <input id="marca" name="marca" type="text" class="validate" required
                           value="<?php echo $prod['marca']; ?>">
                    <label for="marca">Marca</label>
                    <span class="helper-text"
                          data-error="por favor, verifique o conteúdo desse campo">Marca do produto</span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m4">
                    <input id="preco" name="preco" type="number" min="0" step="0.1" class="validate" required
                           value="<?php echo $prod['preco']; ?>">
                    <label for="preco">Preço Venda</label>
                    <span class="helper-text" data-error="por favor, verifique o conteúdo desse campo">Preço de venda unitário</span>
                </div>
                <div class="input-field col s12 m4">
                    <input id="custo" name="custo" type="number" min="0" step="0.1" class="validate" required
                           value="<?php echo $prod['custo']; ?>">
                    <label for="custo">Custo</label>
                    <span class="helper-text" data-error="por favor, verifique o conteúdo desse campo">Custo da mercadoria</span>
                </div>
                <div class="input-field col s12 m4">
                    <input id="estoque" name="estoque" type="number" min="0" step="0.1" class="validate" required
                           value="<?php echo $prod['estoque']; ?>">
                    <label for="estoque">Estoque</label>
                    <span class="helper-text"
                          data-error="por favor, verifique o conteúdo desse campo">Estoque atual</span>
                </div>
            </div>
            <button class="btn waves-effect waves-light teal" type="submit" name="action">Gravar
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
<?php
require __DIR__ . '/../footer.php';