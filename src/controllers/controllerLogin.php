<?php

namespace Src\Controllers;

use Src\Utils\Utils;

class controllerLogin{
    private $servidor;
    private $usuario;
    private $senha;
    private $database;
    private $Utils;
    private $page;

    public function __construct()
    {
        $this->servidor = "127.0.0.1";
        $this->usuario = "root";
        $this->senha = "batatinha";
        $this->database = "ope_database" ;

        $this->Utils = new Utils();
        $this->page = "cad_funcionarios";
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
        $conexao = mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->database);

//        $user = $this->limpaCPF_CNPJ($_POST['cpf']);
        $user = $_POST['cpf'];
        $senha = $_POST['senha'];

        $query = "SELECT * FROM funcionario WHERE cpf = '{$user}' and senha = '{$senha}' LIMIT 1";


        $consulta = mysqli_query($conexao, $query);

        $resultado = mysqli_fetch_assoc($consulta);

//        print_r($query);
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

Fatal error: Uncaught ArgumentCountError: Too few arguments to function Src\Utils\Utils::header(), 1 passed in /Applications/XAMPP/xamppfiles/htdocs/server/src/Controllers/controllerLogin.php on line 38 and at least 2 expected in /Applications/XAMPP/xamppfiles/htdocs/server/src/Utils/Utils.php:25 Stack trace: #0 /Applications/XAMPP/xamppfiles/htdocs/server/src/Controllers/controllerLogin.php(38): Src\Utils\Utils->header('cad_funcionario...') #1 /Applications/XAMPP/xamppfiles/htdocs/server/router.php(23): Src\Controllers\controllerLogin->login() #2 {main} thrown in /Applications/XAMPP/xamppfiles/htdocs/server/src/Utils/Utils.php on line 25
