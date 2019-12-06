<?php
require_once(__DIR__ . "/Composer/autoload.php");

use Src\controllers\controllerProduto;
use Src\controllers\controllerCategoria;
use Src\Controllers\controllerVenda;

use Src\Utils\Utils;

$venda = new controllerVenda();

$utils = new Utils();
$controller = new controllerCategoria();
$controllerProduto = new controllerProduto();

if (isset($_GET['error'])){
    if ($_GET['error']){
        echo "<script>alert(\"Compra feita com sucesso\");</script>";
    }else{
        echo "<script>alert(\"Erro ao finalizar a compra \");</script>";
    }
}
?>
<script type="text/javascript">
    function insere_item_na_lista(id){
        // localStorage.setItem('produtosEscolhidos', id);
        var prod = $('#item'+id).html();
        var produto = JSON.parse(JSON.parse(prod));
        var total = $('#total_pedido').text().replace('R$','').trim();
        var listaProdutos = []
        var produtos = []
        for(data in produto['data']){
            if(produto['data'][data]['id'] == id){
                var total = parseFloat(total)+ parseFloat(produto['data'][data]['valor']);
                if(listaProdutos.length == 0){
                    produtoSelecionado = {'id': id, 'nome': produto['data'][data]['nome_receita'], 'qtd': 1, 'valor': produto['data'][data]['valor']};
                }
            }
        }
        if(localStorage.getItem('produtosEscolhidos')){
            if(localStorage.getItem('produtosEscolhidos').length > 0){
                localStorage.setItem('produtosEscolhidos', localStorage.getItem('produtosEscolhidos')+';'+JSON.stringify(produtoSelecionado));
            }else{
                localStorage.setItem('produtosEscolhidos', JSON.stringify(produtoSelecionado));
            }
        }else{
            localStorage.setItem('produtosEscolhidos', JSON.stringify(produtoSelecionado));
        }

        resultado = transformaTextoEmJson();
        console.log('resultado')
        console.log(resultado); 
        $('#total_pedido').html('R$'+total)
        var html = ""
        for(prod in resultado){
            html = html+"<tr>\
            <td>"+resultado[prod]['nome']+"</td>\
                <td style='text-align: center;'>"+resultado[prod]['qtd']+"</td>\
                <td style='text-align: center;' ><div style='display:none;' id='item_venda_"+resultado[prod]['id']+"'>"+JSON.stringify(resultado[prod])+"</div>\
                <div onclick=reduzDaLista("+resultado[prod]['id']+")><img src='imagens/icons/delete.png'\
                alt='Excluir produto'\
                title='Excluir produto'></div></td>\
        </tr>"
            };
        $('#lista_produtos').html(html);
    }

    function transformaTextoEmJson(){
        var retrievedObject = localStorage.getItem('produtosEscolhidos');
        var transformados = retrievedObject.split(";")
        var ObjectsJSON = []
        for(item in transformados){
            var convertido = JSON.parse(transformados[item]);
            if(ObjectsJSON.length == 0){
                ObjectsJSON.push(convertido);
            }else{
                var ProdutoExiste = false
                for(obj in ObjectsJSON){
                    if(ObjectsJSON[obj].id == convertido.id){
                        ProdutoExiste = true
                        ObjectsJSON[obj].qtd = ObjectsJSON[obj].qtd+1
                    }
                }
                if(!ProdutoExiste){
                    ObjectsJSON.push(convertido);
                }
            }
        }
        return ObjectsJSON;
    }

    function cadastrar(){
        var listaProdutos = transformaTextoEmJson();
        console.log('itens vendidos: ')
        for(i in listaProdutos){
            console.log(listaProdutos)
        }
        setCookie("compraope06122019", JSON.stringify(listaProdutos), 1)
        localStorage.setItem('produtosEscolhidos', "");

        window.location.reload();
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function reduzDaLista(id){
        var prod = $('#item_venda_'+id).html();
        var produto = JSON.parse(prod);
        var total = $('#total_pedido').text().replace('R$','').trim();
        
        var listaProdutos = transformaTextoEmJson();
        localStorage.setItem('produtosEscolhidos',"");
        // var produtos = []
        for(data in listaProdutos){
             if(listaProdutos[data]['id'] == id){
                var total = parseFloat(total)- parseFloat(produto['valor']);
                if(listaProdutos[data]['qtd'] == 1){
                    index_remover = listaProdutos.indexOf(listaProdutos[data]);
                    listaProdutos.splice(index_remover, 1);
                    console.log(listaProdutos)
                }
                else{
                    listaProdutos[data]['qtd'] = listaProdutos[data]['qtd']-1
                }
            }
        }

        for(data in listaProdutos){
            if(localStorage.getItem('produtosEscolhidos').length > 0){
                localStorage.setItem('produtosEscolhidos', localStorage.getItem('produtosEscolhidos')+';'+JSON.stringify(listaProdutos[data]));
            }else{
                localStorage.setItem('produtosEscolhidos', JSON.stringify(listaProdutos[data]));
            }
        }
        console.log('removido');
        console.log(localStorage.getItem('produtosEscolhidos'));
        console.log('removido 2');
        console.log(listaProdutos);

        $('#total_pedido').html('R$'+total)
        var html = ""
        for(prod in listaProdutos){
            html = html+"<tr>\
            <td>"+resultado[prod]['nome']+"</td>\
                <td style='text-align: center;'>"+listaProdutos[prod]['qtd']+"</td>\
                <td style='text-align: center;' ><div style='display:none;' id='item_venda_"+listaProdutos[prod]['id']+"'>"+JSON.stringify(resultado[prod])+"</div>\
                <div onclick=reduzDaLista("+listaProdutos[prod]['id']+")><img src='imagens/icons/delete.png'\
                alt='Excluir produto'\
                title='Excluir produto'></div></td>\
        </tr>"
            };
        $('#lista_produtos').html(html);
    }
</script>



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
                <?php $resSubCat = json_decode($controller->ListarCategoria()); ?>
                <?php $resProduto = json_decode($controllerProduto->ListarProduto()); ?>
                
                <?php $resProdutoJ = json_encode($controllerProduto->ListarProduto()); ?>
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
                                                <div style="float: right;" onclick="insere_item_na_lista(<?php echo($dataProduto->id); ?>)">
                                                    <a style="width: 25px; height: 25px;"><img
                                                                src="imagens/icons/add.png"
                                                                alt="Adicionar produto"
                                                                title="Adicionar produto"></a>
                                                </div>
                                                <?php $resProdutoJSON = json_encode($controllerProduto->BuscarProdutoPorId($dataProduto->id)); ?>
                                                <!-- echo($resProdutoJSON)?> -->
                                                <div id='item<?php echo($dataProduto->id); ?>' style='display:none;'><?php echo $resProdutoJ ?></div>
                                                <div style="float: right; margin-top: 1px; margin-right: 15px;">
                                                    R$ <?php echo($dataProduto->valor); ?>
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
                           maxlength="30"> <br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col" style="text-align: center;">Quantidade</th>
                            <th scope="col" style="text-align: center;"></th>
                        </tr>
                        </thead>
                        <tbody id="lista_produtos">
                        <!-- PRODUTOS ESCOLHIDOS-->
                        </tbody>
                    </table>

                    <!-- VALOR TOTAL DO PEDIDO -->
                    <h4 style="float: left;" id="total_pedido">R$ 00.00</h4>

                    <input onclick="cadastrar()" type="submit" class="btn_success" name="btn_enviar" value="Finalizar Pedido">
                </form>
            </div>
        </div>


        <!-- FUNCIONÁRIOS CADASTRADOS -->
        <h4 align="center">Venda Realizadas</h4>

        <div style="width: 100%; height: 250px; overflow-y: scroll; float: left; margin-bottom: 100px">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" style="text-align: center;">ID Venda</th>
                    <th scope="col" style="text-align: center;">Valor Total</th>
                    <th scope="col" style="text-align: center;">Qtde de Items</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $resvenda = json_decode($venda->ListarVenda());

                //                        print_r($funcionario->ListarFuncionario());
                //                        exit();
                if ($resvenda->success and $resvenda->count > 0) {
                    foreach ($resvenda->data as $data) {
                        ?>
                        <tr>
                            <td style="text-align: center;"><?php echo($data->id); ?></td>
                            <td style="text-align: center;"><?php echo($data->vlr_total); ?></td>
                            <td style="text-align: center;"><?php echo($data->qtde_items); ?></td>
                        </tr>
                        <?php

                    }

                } else {
                    ?>
                    <tr>
                        <td colspan="6" style="text-align: center">Nenhum funcionário cadastrado</td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script src="js/vendas.js"></script> -->
</body>
</html>


