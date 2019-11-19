<?php

namespace Src\controllers;

use Src\models\modelProduto;
use Src\models\modelCategoria;
use Src\Utils\Utils;

class controllerCategoria
{

    private $modelCategoria;
    private $Utils;
    private $page;

    public function __construct()
    {
        $this->modelCategoria = new modelCategoria();
        $this->Utils = new Utils();
        $this->page = "cad_produtos";
    }

    public function ListarCategoria($mock = false)
    {
        $resProduto = $this->modelCategoria->Listar();

        if (json_decode($resProduto)->success) {
            return $resProduto;
        } else {
            $this->Utils->header($this->page, json_decode($resProduto)->message);
        }
    }
}