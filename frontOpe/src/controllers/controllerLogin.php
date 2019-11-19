<?php

namespace Src\Controllers;

use Src\Utils\Utils;

class controllerLogin{
    private $Utils;
    private $page;
    private $controller;

    public function __construct()
    {
        $this->Utils = new Utils();
        $this->page = "cad_funcionarios";

        $this->controller = new \Src\Api\Controllers\ControllerLogin();
    }
    function limpaCPF_CNPJ($valor){
        $valor = trim($valor);
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace("/", "", $valor);
        return $valor;
    }

    public function login(){
//        $conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->database);

//            $user = $this->limpaCPF_CNPJ($_POST['cpf']);
//        $user = $_POST['cpf'];
//        $senha = $_POST['senha'];

        $resultado =  mysqli_fetch_assoc($this->controller->login());

//        var_dump(count($resultado->num_rows));
//        exit();
        if (isset($resultado) == 1) {
            $_SESSION['login'] = true;
            $this->Utils->header($this->page);
        } else {
            header('location:login.php?erro=1');
        }
    }




}
?>