<?php
namespace Src\Api\Models;

use Src\Api\Conexao\Conexao;

class Login extends Conexao{
	public $cpf;
    public $senha;
    private $conex;

    public function login($cpf, $senha){
    	$sql = "SELECT * FROM glsystem.funcionario as f join glsystem.login as l on l.senha = '{$senha}' and f.cpf = '{$cpf}' and l.id_funcionario = f.id";
        $conex = Conexao::getInstance();
        // var_dump(mysqli_query($conex, $sql));
        // exit();
        return mysqli_query($conex, $sql);
	}
}

?>