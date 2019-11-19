<?php

namespace Src\controllers;

use Src\models\modelMock;
use Src\models\modelVenda;
use Src\Utils\Utils;

class controllerVenda
{
    private $modelVenda;
    private $Utils;
    private $page;

    public function __construct()
    {
        #Cria uma Instancia das Models
        $this->modelVenda = new modelVenda();
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

    private function pegaVenda()
    {

        return $postEnd = array(
            'id_receita' => intval($_POST['sl_receita']),
            'Valor' => floatval($_POST['text_preco_produto']),
//            'id_categoria' => intval($_POST['sl_categoria']),
            'id_categoria' => intval($_POST['sl_categoria'])
//            'bairro' => $_POST['sl_fornecedor'], não tem no banco
//            'numero' => intval($_POST['num_home']),
//            'complemento' => $_POST['complemento']
        );
    }


    public function cadProduto($mock = false)
    {
        #Resgata os valores da pagina via POST se a variavel $MOCK entiver false
        if ($mock) {
            $modelMock = new modelMock();
            $postEnd = $modelMock->mockProduto();
        } else {

            $postEnd = $this->pegaVenda();

        }

        $resProduto = $this->modelVenda->Insert($postEnd);

        if (json_decode($resProduto)->success) {
            $this->Utils->header($this->page, json_decode($resProduto)->message);
        } else {
            $this->Utils->header($this->page, json_decode($resProduto)->message);
        }

        #Chama a funcao para inserir um Produto e retorna os valores para o Router
    }

    public function ListarProduto($mock = false)
    {
        $resProduto = $this->modelVenda->Listar();

        if (json_decode($resProduto)->success) {
            return $resProduto;
        } else {
            $this->Utils->header($this->page, json_decode($resProduto)->message);
        }
    }

    public function BuscarProdutoPorId($mock = false, $id = 0)
    {

        if (isset($_GET['idEnd'])) {
            $resProduto = $this->modelVenda->ListarPorId($_GET['idEnd']);

            if (json_decode($resProduto)->success) {
                return $resProduto;
            } else {
                $this->Utils->header($this->page, json_decode($resProduto)->message);
            }
        }elseif ( $id != 0){
            $resProduto = $this->modelVenda->ListarPorId($id);

            if (json_decode($resProduto)->success) {
                return $resProduto;
            } else {
                $this->Utils->header($this->page, json_decode($resProduto)->message);
            }
        }

    }

    public function EditarProduto($mock = false, $id = 0)
    {
        if ($id != 0 ){
            $postEnd = $this->pegaVenda();

            $resProduto = $this->modelVenda->Editar($postEnd, $id);

            if (json_decode($resProduto)->success) {
                return $resProduto;
            } else {
                return $this->Utils->header($this->page, json_decode($resProduto)->message);
            }
        }
    }

    public function DeleteProduto($id, $mock = false)
    {

        if (isset($id)) {
            $resProduto = $this->modelVenda->Delete($id);

            if (json_decode($resProduto)->success){
                return $resProduto;
            }
        }

        //header('Location: cadastrar_funcionarios.php?message=' . json_encode($resProduto));

    }
}