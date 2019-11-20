<?php
require_once(__DIR__ . "/Composer/autoload.php");

use Src\controllers\controllerProduto;
use Src\controllers\controllerSubCategoria;
use Src\Utils\Utils;

$utils = new Utils();
$controller = new controllerSubCategoria();
$controllerProduto = new controllerProduto();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GL SYSTEM | Registro de Pedidos</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- CABEÇALHO -->
<?php include "header.php"; ?>

<div class="safe_nav_conteudo">
    <!-- MENU DE NAVEGAÇÃO LATERAL -->
    <?php include "menu.php"; ?>

    <div class="container_conteudo">
        <!-- CONTEINER DE SELECIONAR PRODUTOS -->
        <div class="registra_pedido">
            <h4>Selecionar Produtos</h4>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php $resSubCat = json_decode($controller->ListarSubCategoria()); ?>
                <?php $resProduto = json_decode($controllerProduto->ListarProduto()); ?>

                <?php
                if ($resSubCat->success and $resSubCat->count > 0) {
                    foreach ($resSubCat->data as $data) {
                        ?>
                        <div class="panel panel-default">

                            <div class="panel-heading" role="tab" id="heading<?php echo($data->id); ?>">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapse<?php echo($data->id); ?>" aria-expanded="false"
                                       aria-controls="collapse<?php echo($data->id); ?>">
                                        <?php echo($data->nome_categoria); ?>
                                    </a>
                                </h4>
                            </div>

                            <div id="collapse<?php echo($data->id); ?>"
                                 class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="heading<?php echo($data->id); ?>">
                                <?php
                                if ($resProduto->success and $resProduto->count > 0) {
                                    foreach ($resProduto->data as $dataProduto) {
                                        if ($dataProduto->id_categoria == $data->id) {
                                            ?>
                                            <div class="panel-body">
                                                <?php echo($dataProduto->nome_receita); ?>
                                                <div style="float: right;">
                                                    <a href="#" style="width: 25px; height: 25px;"><img
                                                                src="imagens/icons/add.png"
                                                                alt="Adicionar produto"
                                                                title="Adicionar produto"></a>
                                                </div>
                                                <div style="float: right; margin-top: 1px; margin-right: 15px;">
                                                    R$ <?php echo($dataProduto->valor); ?>,00
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>

        <!-- CONTEINER DE PEDIDOS -->
        <div class="pedidos_registrados">
            <h4>Resumo do pedido</h4>

            <div class="table_resumo">
                <!-- FORMULÁRIO DE FINALIZAR O PEDIDO -->
                <form action="<?php echo("router.php?controller=registrarPedidos"); ?>" method="post"
                      enctype="multipart/form-data">
                    <input type="text" class="form-control" id="id_nome_cliente" placeholder="Nome do cliente"
                           maxlength="30" required> <br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col" style="text-align: center;">Quantidade</th>
                            <th scope="col" style="text-align: center;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Coxinha</td>
                            <td style="text-align: center;">2</td>
                            <td style="text-align: center;"><a href="#"><img src="imagens/icons/delete.png"
                                                                             alt="Excluir produto"
                                                                             title="Excluir produto"></a></td>
                        </tr>
                        <tr>
                            <td>Suco de Laranja</td>
                            <td style="text-align: center;">1</td>
                            <td style="text-align: center;"><a href="#"><img src="imagens/icons/delete.png"
                                                                             alt="Excluir produto"
                                                                             title="Excluir produto"></a></td>
                        </tr>
                        </tbody>
                    </table>

                    <!-- VALOR TOTAL DO PEDIDO -->
                    <h4 style="float: left;">R$ 14,00</h4>

                    <input type="submit" class="btn_success" name="btn_enviar" value="Finalizar Pedido">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>