<?php


namespace Src\controllers;


use Src\models\modelReceita;
use Src\Utils\Utils;

class controllerReceita
{

    private $modelReceita;
    private $Utils;
    private $page;

    public function __construct()
    {
        #Cria uma Instancia das Models
        $this->modelReceita = new modelReceita();
        $this->Utils = new Utils();
        $this->page = "cad_forncedores";
    }

    public function ListarReceitas($mock = false)
    {
        $resReceita = $this->modelReceita->Listar();

        if (json_decode($resReceita)->success) {
            return $resReceita;
        } else {
            $this->Utils->header($this->page, json_decode($resReceita)->message);
        }
    }

}