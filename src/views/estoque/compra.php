<?php
require __DIR__ . '/../../controllers/CompraController.php';
$cont = new CompraController();

if ($_POST) {
    $compraDecoded = json_decode($_POST['cabecalho'], true);
    $prodsDecoded = json_decode($_POST['produtos'], true);
//    error_log($decoded['valor_total'], 4);
    $cont->save($compraDecoded, $prodsDecoded);
    return $_POST;
}
?>

<?php
require __DIR__ . '/../header.php';
?>
    <div class="row">
        <form class="col s12" method="post" action="compra.php">
            <h3>Registrar aquisição de mercadorias</h3>
            <input hidden id="entr_saida" name="entr_saida" value="E">
            <input hidden id="id" name="id">
            <div class="row">
                <div class="card col s12">
                    <div class="card-content">
                        <div class="input-field col s12 m3">
                            <input id="fornecedor" name="fornecedor" type="number" class="validate" required min="0">
                            <label for="fornecedor">ID Fornecedor</label>
                            <span class="helper-text"
                                  data-error="por favor, verifique o conteúdo desse campo">Código do fornecedor</span>
                        </div>
                        <div class="input-field col s12 m3">
                            <input id="numero_nf" name="numero_nf" type="number" min="0" class="validate" required>
                            <label for="numero_nf">Nº NF</label>
                            <span class="helper-text"
                                  data-error="por favor, verifique o conteúdo desse campo">Número da NFe de compra</span>
                        </div>
                        <div class="input-field col s12 m3">
                            <input id="data_mvto" name="data_mvto" type="date" class="validate" required>
                            <label for="data_mvto">Data Movimento</label>
                            <span class="helper-text"
                                  data-error="por favor, verifique o conteúdo desse campo">Data em que a mercadoria foi recebida</span>
                        </div>
                        <div class="input-field col s12 m3">
                            <input id="valor_total" name="valor_total" type="number" min="0" step="0.1" class="validate"
                                   required>
                            <label for="valor_total">Total NF</label>
                            <span class="helper-text"
                                  data-error="por favor, verifique o conteúdo desse campo">Valor total da NFe</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="card col s12">
                    <div class="card-content row">
                        <span class="card-title">Informe o produto</span>
                        <div class="input-field col s12 m4">
                            <input id="produto_id" name="produto_id" type="number" class="validate" required>
                            <label for="produto_id">ID Produto</label>
                            <span class="helper-text"
                                  data-error="por favor, verifique o conteúdo desse campo">Código do produto</span>
                        </div>
                        <div class="input-field col s12 m4">
                            <input id="qtde_unitaria" name="qtde_unitaria" type="number" min="0" step="0.1"
                                   class="validate" required>
                            <label for="qtde_unitaria">Qtde Unit</label>
                            <span class="helper-text"
                                  data-error="por favor, verifique o conteúdo desse campo">Qquantidade unitária</span>
                        </div>
                        <div class="input-field col s12 m4">
                            <input id="total_prod" name="total_prod" type="number" class="validate" step="0.1" required>
                            <label for="total_prod">Valor produto</label>
                            <span class="helper-text"
                                  data-error="por favor, verifique o conteúdo desse campo">Valor total do produto</span>
                        </div>
                    </div>
                    <div class="card-action">
                        <a href="#" class="teal-text" onclick="addProdLancamento()"><i
                                class="material-icons left">add</i>Adicionar produto ao lançamento</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col s12">
                    <div class="card-content row">
                        <span class="card-title">Produtos registrados</span>
                        <table class="striped highlight centered">
                            <thead>
                            <th>ID Produto</th>
                            <th>Qtde Unit</th>
                            <th>Valor Produto</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="fixed-action-btn">
                <a class="btn-floating btn-large" onclick="sendVenda(<?php echo $_COOKIE['user_id'] ?>)">
                    <i class="large material-icons">save</i>
                </a>
            </div>
        </form>
    </div>
    <script src="js/compra.js"></script>
<?php
require __DIR__ . '/../footer.php';