<?php
require_once(__DIR__ . "/Composer/autoload.php");

use Src\controllers\controllerProduto;
use Src\controllers\controllerCategoria;
use Src\Utils\Utils;

$utils = new Utils();
$controller = new controllerCategoria();
$controllerProduto = new controllerProduto();
?>

<script type="text/javascript">
    function insere_item_na_lista(id){
        var prod = $('#item'+id).html();
        var produto = JSON.parse(JSON.parse(prod));
        var total = $('#total_pedido').text().replace('R$','').trim();
        var listaProdutos = []
        // console.log(request.getSession().getAttribute("user"))
        var produtos = []
        for(data in produto['data']){
            if(produto['data'][data]['id'] == id){
                // console.log(produto['data'][data])
                // console.log(id)
                var total = parseFloat(total)+ parseFloat(produto['data'][data]['valor']);
                if(listaProdutos.length == 0){
                    produtoSelecionado = {'id': id, 'nome': produto['data'][data]['nome_receita'], 'qtd': 1};
                    // request.getSession().setAttribute("dados", produtos)
                }
            }
        }
        
        if(localStorage.getItem('produtosEscolhidos').length > 0){
            localStorage.setItem('produtosEscolhidos', localStorage.getItem('produtosEscolhidos')+';'+JSON.stringify(produtoSelecionado));
        }else{
            localStorage.setItem('produtosEscolhidos', JSON.stringify(produtoSelecionado));
        }
        // console.log(localStorage.getItem('produtosEscolhidos'));
        resultado = transformaTextoEmJson();
        console.log(resultado); 
        // document.cookie = "produtos="+listaProdutos"+; expires=Mon, 29 Oct 2019 12:00:00 UTC; path=/";
        $('#total_pedido').html('R$'+total)
        var html = ""
        for(prod in resultado){
            html = html+"<tr>\
            <td>"+resultado[prod]['nome']+"</td>\
                <td style='text-align: center;'>"+resultado[prod]['qtd']+"</td>\
                <td style='text-align: center;' ><img src='imagens/icons/delete.png'\
                                                     alt='Excluir produto'\
                                                     title='Excluir produto'></a></td>\
        </tr>"
            console.log(html)
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
        // localStorage.setItem('produtosEscolhidos',"");
        console.log(ObjectsJSON)
        return ObjectsJSON;
    }

    function cadastrar(){
        localStorage.setItem('produtosEscolhidos',"");
        window.location.reload();
    }

    function reduzDaLista(id){
        var prod = $('#item'+id).html();
        var produto = JSON.parse(JSON.parse(prod));
        var total = $('#total_pedido').text().replace('R$','').trim();
        var listaProdutos = []
        // console.log(request.getSession().getAttribute("user"))
        var produtos = []
        for(data in produto['data']){
            if(produto['data'][data]['id'] == id){
                // console.log(produto['data'][data])
                // console.log(id)
                var total = parseFloat(total)- parseFloat(produto['data'][data]['valor']);
            }
        }

        $('#total_pedido').html('R$'+total)
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
                <?php $listaEscolhidos = "<script>document.write(listaProdutos)</script>" ?>
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

                    <input onclick="cadastrar()" class="btn_success" name="btn_enviar" value="Finalizar Pedido">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script src="js/vendas.js"></script> -->
</body>
</html>


