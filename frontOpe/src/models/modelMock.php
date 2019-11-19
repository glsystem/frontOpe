<?php


namespace Src\models;


class modelMock
{

    public function mockFuncionario($postFun){

        return $postFun = array(
            'idEndereco'        => $postFun->id,
            'nome'              => 'Vinicius Mock',
            'rg'                => '538562821',
            'cpf'               => '4615817871',
            'telefone'          => '11971276378',
            'salario'           => floatval(3450),
            'cargo'             => 'Dono do Mock',
            'dtNasc'            => '2000-9-14',
            'dtAdimicao'        => '2018-7-19'
        );
    }

    public function mockEndereco(){
        return $postEnd = array(
            'cep' => '06693270',
            'logradouro' => 'Rua Pedro Valadares Mock',
            'cidade' => 'Itapevi do Mock',
            'uf' => 'SP',
            'numero' => '507'
        );
    }

}