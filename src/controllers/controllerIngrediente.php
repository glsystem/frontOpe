<?php

namespace Src\controllers;

use Src\models\modelIngrediente;
use Src\Utils\Utils;

class controllerIngrediente
{
    private $modelIngrediente;
    private $Utils;
    private $page;

    public function __construct()
    {
        #Cria uma Instancia das Models
        $this->modelIngrediente = new modelIngrediente();
        $this->Utils = new Utils();
        $this->page = "cad_produtos";
    }


    public function ListarIngreditente($mock = false)
    {
        $resIngrediente = $this->modelIngrediente->Listar();

        if (json_decode($resIngrediente)->success) {
            return $resIngrediente;
        } else {
            $this->Utils->header($this->page, json_decode($resIngrediente)->message);
        }
    }

    public function ListarIngreditenteComNome($mock = false)
    {
        $resIngrediente = $this->modelIngrediente->ListarComNome();

        if (json_decode($resIngrediente)->success) {
            return $resIngrediente;
        } else {
            $this->Utils->header($this->page, json_decode($resIngrediente)->message);
        }
    }
}