<?php

namespace Src\controllers;

use Src\models\modelItemVenda;
use Src\Utils\Utils;

class controllerItemVenda
{
    private $modelItemVenda;
    private $Utils;
    private $page;

    public function __construct()
    {
        #Cria uma Instancia das Models
        $this->modelItemVenda = new modelItemVenda();
        $this->Utils = new Utils();
        $this->page = "cad_funcionarios";
    }

    // Passando as resposta do servidor como parametro ele printa formatando com json
    private function breakTest($res)
    {
        //echo "<pre>";
        print_r($res);
        exit();
    }

    public function parseJson($idVenda, $idProd, $qtd)
    {

        return $postEnd = array(
            'id_venda' => $idVenda,
            'id_produto' => $idProd,
            'qtde' => $qtd
        );
    }

    public function cadItemsVenda($idVenda, $idProd, $qtd){

        return $this->modelItemVenda->Insert($this->parseJson($idVenda, $idProd, $qtd));

    }
}