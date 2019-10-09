<?php
namespace Src\Api\Models;

use Src\Api\Conexao\Conexao;

class Login extends Conexao{
	public $cpf;
    public $senha;
    private $conex;

    public function login($cpf, $senha){
    	$sql = "SELECT * FROM glsystem_dois.funcionario as f join glsystem_dois.login as l on l.senha = '{$senha}' and f.cpf = '{$cpf}' and l.id_funcionario = f.id";
    	$conex = Conexao::getInstance();
        return mysqli_query($conex, $sql);
	}
}

?>