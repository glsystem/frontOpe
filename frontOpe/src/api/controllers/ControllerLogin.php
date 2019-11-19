<?php
namespace Src\Api\Controllers;

//include '../../model/Login.php';

use Src\Api\Models\Login;

class ControllerLogin{
	function login(){
	    if (isset($_POST['cpf']) and isset($_POST['senha'])){
            $conteudo = new Login();
            //echo $obj->titulo;
            return $conteudo->login($_POST['cpf'], $_POST['senha']);
        }else {
	        return null;
        }
	}
}

?>