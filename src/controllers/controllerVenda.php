<?php

namespace Src\controllers;

use Src\models\modelVenda;
use Src\Utils\Utils;

class controllerVenda
{
    private $modelVenda;
    private $controllerItemVenda;
    private $Utils;
    private $page;
    private $venda ;

    public function __construct()
    {
        #Cria uma Instancia das Models
        $this->modelVenda = new modelVenda();
        $this->controllerItemVenda = new controllerItemVenda();
        $this->Utils = new Utils();
        $this->page = "registro_de_pedidos";
    }

    // Passando as resposta do servidor como parametro ele printa formatando com json
    private function breakTest($res)
    {
        //echo "<pre>";
        print_r($res);
        exit();
    }

    public function pegaVenda()
    {
        $this->venda = json_decode($_COOKIE['compraope06122019']); // Fulano

        return $postEnd = array(
            'id_funcionario' => 1,
            'vlr_final' => $this->somaAPorraToda($this->venda),
            'id_cliente' => 1
        );
    }


    private function somaAPorraToda($valor){
        $soma = 0;

        foreach ($valor as $data) {
            $soma = $soma + ($data->valor * $data->qtd);
        }
        return $soma;
    }

    public function cadVenda(){

        $resVenda= $this->modelVenda->Insert($this->pegaVenda());

        if (json_decode($resVenda)->success) {
            foreach ($this->venda as $data){
                $resItem = $this->controllerItemVenda->cadItemsVenda(json_decode($resVenda)->data->id,$data->id, $data->qtd);
                if (json_decode($resItem)->success){

                }else{
                    return json_encode($this->Utils->getFields(false));
                }
            }
            return $resVenda;
        } else {
            print_r("Falha");
            print("</br>");
        }



    }

}