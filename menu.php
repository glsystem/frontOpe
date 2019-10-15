<?php

    $paginaLink = basename($_SERVER['SCRIPT_NAME']);

?>

<style>

    ul#menu li a:hover,
    ul#menu li a.active {background-color:#ffffff;}

</style>

<nav class="nav">
    <ul>
        <!-- REGISTRAR PEDIDOS -->
        <a <?php if($paginaLink == "registro_de_pedidos.php") {echo 'class="link ativo"';}else{echo 'class="link"';} ?> href="registro_de_pedidos.php">
            <li>
                <div style="width: 100%; height: 25px; padding-left: 18px;">
                    <div style="width: 20px; height: 20px; margin-right: 10px; float: left;"><img src="imagens/icons/pedido.svg"></div>
                    <div style="margin-top: 2px; float: left;">Pedidos</div>
                </div>
            </li>
        </a>
        <!-- CADASTRAR PRODUTOS -->
        <a href="cadastrar_produtos.php">
            <li>
                <div style="width: 100%; height: 25px; padding-left: 18px;">
                    <div style="width: 20px; height: 20px; margin-right: 10px; float: left;"><img src="imagens/icons/produto.svg"></div>
                    <div style="margin-top: 2px; float: left;">Produtos</div>
                </div>
            </li>
        </a>
        <!-- CADASTRAR FUNCIONÁRIOS -->
        <a href="cadastrar_funcionarios.php">
            <li>
                <div style="width: 100%; height: 25px; padding-left: 18px;">
                    <div style="width: 20px; height: 20px; margin-right: 10px; float: left;"><img src="imagens/icons/funcionario.svg"></div>
                    <div style="margin-top: 2px; float: left;">Funcionários</div>
                </div>
            </li>
        </a>
        <!-- CADASTRAR RECEITAS -->
        <a href="cadastrar_receitas.php">
            <li >
                <div style="width: 100%; height: 25px; padding-left: 18px;">
                    <div style="width: 20px; height: 20px; margin-right: 10px; float: left;"><img src="imagens/icons/receita.svg"></div>
                    <div style="margin-top: 2px; float: left;">Receitas</div>
                </div>
            </li>
        </a>
        <!-- CADASTRAR FORNECEDORES -->
        <a href="cadastrar_fornecedores.php">
            <li>
                <div style="width: 100%; height: 25px; padding-left: 18px;">
                    <div style="width: 20px; height: 20px; margin-right: 10px; float: left;"><img src="imagens/icons/fornecedor.svg"></div>
                    <div style="margin-top: 2px; float: left;">Fornecedores</div>
                </div>
            </li>
        </a>
        <!-- CADASTRAR ESTOQUE -->
        <a href="cadastro_estoque.php">
            <li>
                <div style="width: 100%; height: 25px; padding-left: 18px;">
                    <div style="width: 20px; height: 20px; margin-right: 10px; float: left;"><img src="imagens/icons/estoque.svg"></div>
                    <div style="margin-top: 2px; float: left;">Estoque</div>
                </div>
            </li>
        </a>
        <!-- CADASTRAR RECEBIMENTO DE PRODUTO -->
        <a href="cadastro_recebimento_produto.php">
            <li>
                <div style="width: 100%; height: 25px; padding-left: 18px;">
                    <div style="width: 20px; height: 20px; margin-right: 10px; float: left;"><img src="imagens/icons/recebimento.svg"></div>
                    <div style="margin-top: 2px; float: left;">Recebimento</div>
                </div>
            </li>
        </a>
    </ul>
</nav>