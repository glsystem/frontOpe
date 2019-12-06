<?php

$mock = false;

require_once(__DIR__ . "/Composer/autoload.php");

use Src\controllers\controllerFornecedores;
use Src\Controllers\controllerFuncionario;
use Src\Controllers\controllerLogin;
use Src\controllers\controllerProduto;
use Src\controllers\controllerVenda;
use Src\Utils\Utils;

if (isset($_GET['controller'])) {
    $controll_funcionario = new controllerFuncionario();
    $controller_login = new controllerLogin();
    $controller_fornecedor = new controllerFornecedores();
    $controller_produto = new controllerProduto();
    $controller_venda = new controllerVenda();
    $utils = new Utils();

    $controller = $_GET['controller'];

    switch ($controller) {
        case 'registrarPedidos':
            $response = $controller_venda->cadVenda();

            if (json_decode($response)->success){
                $utils->headerWithError('registro_de_pedidos', true);
            }else{
                $utils->headerWithError('registro_de_pedidos',false);
            }
            break;

        case 'login':

//            var_dump($newControl->login());
            $controller_login->login();
            exit();

            break;

        case 'cadatrarFuncionario':

            $responseEnd = $controll_funcionario->cadEndereco($mock);

            $response = $controll_funcionario->Funcionairo($responseEnd, $mock);

            break;

        case 'listarFuncionario':

            $responseEnd = $controll_funcionario->ListarFuncionario();

            break;

        case 'editarFuncionario':

            $responseFun = $controll_funcionario->EditarFuncionario();

            break;

        case 'deleteFuncionario':

            $responseFun = $controll_funcionario->DeleteFuncionario();

            echo $responseFun;

        case 'cadatrarFornecedor':

            $responseEnd = $controller_fornecedor->cadEndereco($mock);

            $response = $controller_fornecedor->Fornecedor($responseEnd, $mock);

            exit();

            break;
        case 'deleteFornecedor':

            $responseEnd = $controller_fornecedor->DeleteFuncionario();


            exit();

            break;
        case 'cadatrarProduto':

            $controller_produto->cadProduto();

            exit();

            break;
        case 'teste':

            $response = $controll_funcionario->BuscarEnderecoPorId();

            //echo ("<pre>");
            print_r($response);
            exit();

            break;

        default:

            echo "Trouxa não manda o controller vazio";

    }

}
?>