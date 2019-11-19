<?php

require_once __DIR__."/Composer/autoload.php";
require_once __DIR__."/src/config/routesConfig.php";

//echo (DIRCSS);
//exit();

if (isset($_GET['page'])) {
    $requested_page = $_GET['page'];
}
else {
    $requested_page = 'home';
}
// a better way would be to put this into an array, but I think a switch is easier to read for this example
switch($requested_page) {
    case "home":
        include(__DIR__."/login.php");
        break;
    case "cad_forncedores":
        include(__DIR__."/cadastrar_fornecedores.php");
        break;
    case "cad_funcionarios":
        include(__DIR__."/cadastrar_funcionarios.php");
        break;
    case "cad_produtos":
        include(__DIR__."/cadastrar_produtos.php");
        break;
    case "cad_receitas":
        include(__DIR__."/cadastrar_receitas.php");
        break;
    case "cupom_fiscal":
        include(__DIR__."/cupom-fiscal.php");
        break;
    case "registro_de_pedidos":
        include(__DIR__."/registro_de_pedidos.php");
        break;
    default:
        include(__DIR__."/router.php");
}