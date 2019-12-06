<?php

namespace Src\controllers;

use Src\models\modelProduto;
use Src\models\modelSubCategoria;
use Src\Utils\Utils;

class controllerCategoria
{

    private $modelSubCategoria;
    private $Utils;
    private $page;

    public function __construct()
    {
        $this->modelSubCategoria = new modelSubCategoria();
        $this->Utils = new Utils();
        $this->page = "cad_produtos";
    }

    public function ListarCategoria($mock = false)
    {
        $resProduto = $this->modelSubCategoria->Listar();

        if (json_decode($resProduto)->success) {
            return $resProduto;
        } else {
            $this->Utils->header($this->page, json_decode($resProduto)->message);
        }
    }
}