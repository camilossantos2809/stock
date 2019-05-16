<?php
require 'views/header.php';
?>
    <div class="row">
        <div class="col s12 m6">
            <div class="card teal hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Cadastro de Clientes</span>

                    <p>Acesso ao ambiente para gerenciamento do cadastro de clientes</p>
                </div>
                <div class="card-action right-align">
                    <a href="views/clientes_form.php">
                        <i class="material-icons" title="Cadastrar Clientes">add</i>
                    </a>
                    <a href="views/clientes.php">
                        <i class="material-icons" title="Listar Clientes">send</i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card teal hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Cadastro de Fornecedores</span>
                    <p>Acesso ao ambiente para gerenciamento do cadastro de fornecedores</p>
                </div>
                <div class="card-action right-align">
                    <a href="views/clientes.php">
                        <i class="material-icons" title="Cadastrar Fornecedores">add</i>
                    </a>
                    <a href="views/fornecedores.php"><i class="material-icons">send</i></a>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card teal hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Cadastro de Produtos</span>
                    <p>Acesso ao ambiente para gerenciamento do cadastro de produtos</p>
                </div>
                <div class="card-action right-align">
                    <a href="views/clientes.php">
                        <i class="material-icons" title="Cadastrar Produtos">add</i>
                    </a>
                    <a href="views/produtos.php"><i class="material-icons">send</i></a>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card teal hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Cadastro de Usuários</span>
                    <p>Acesso ao ambiente para gerenciamento do cadastro de usuários</p>
                </div>
                <div class="card-action right-align">
                    <a href="views/clientes.php">
                        <i class="material-icons" title="Cadastrar Usuários">add</i>
                    </a>
                    <a href="views/produtos.php"><i class="material-icons">send</i></a>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card teal hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Movimentar Estoque</span>
                    <p>Acesso ao ambiente para registrar entrada ou saída de mercadorias</p>
                </div>
                <div class="card-action right-align">
                    <a href="views/produtos.php"><i class="material-icons">send</i></a>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card teal hoverable">
                <div class="card-content white-text">
                    <span class="card-title">Relatórios</span>
                    <p>Acesso as opções de visualização relatórios do sistema</p>
                </div>
                <div class="card-action right-align">
                    <a href="views/produtos.php"><i class="material-icons">send</i></a>
                </div>
            </div>
        </div>
    </div>
<?php
require 'views/footer.php';
