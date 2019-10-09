<?php

$mock = false;

require_once(__DIR__ . "/Composer/autoload.php");

use Src\Controllers\controllerFuncionario;
use Src\Controllers\controllerLogin;

if (isset($_GET['controller'])) {
    $controll_funcionario = new controllerFuncionario();
    $controller_login = new controllerLogin();
    $newControl = new \Src\Api\Controllers\ControllerLogin();

    $controller = $_GET['controller'];

    switch ($controller) {
        case 'registrarPedidos':
            header("Location: http://localhost/server/cupom-fiscal.php");
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

            $response = $controll_funcionario->BuscarEnderecoPorId();

            //echo ("<pre>");
            print_r($response);
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