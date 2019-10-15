<?php


namespace Src\controllers;


use Src\models\modelMock;
use Src\models\modelProduto;
use Src\Utils\Utils;

class controllerProduto
{

    private $modelProduto;
    private $Utils;
    private $page;

    public function __construct()
    {
        $this->modelProduto = new modelProduto();
        $this->Utils = new Utils();
        $this->page = "cad_produtos";
    }

    private function pegaProduto()
    {

        return $postEnd = array(
            'id_receita' => intval($_POST['sl_receita']),
            'Valor' => floatval($_POST['text_preco_produto']),
//            'id_categoria' => intval($_POST['sl_categoria']),
            'id_subcategoria' => intval($_POST['sl_sub_categoria'])
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

            $postEnd = $this->pegaProduto();

        }

        $resProduto = $this->modelProduto->Insert($postEnd);

        if (json_decode($resProduto)->success) {
            $this->Utils->header($this->page, json_decode($resProduto)->message);
        } else {
            $this->Utils->header($this->page, json_decode($resProduto)->message);
        }

        #Chama a funcao para inserir um Produto e retorna os valores para o Router
    }

    public function ListarProduto($mock = false)
    {
        $resProduto = $this->modelProduto->Listar();

        if (json_decode($resProduto)->success) {
            return $resProduto;
        } else {
            $this->Utils->header($this->page, json_decode($resProduto)->message);
        }
    }

    public function BuscarProdutoPorId($mock = false, $id = 0)
    {

        if (isset($_GET['idEnd'])) {
            $resProduto = $this->modelProduto->ListarPorId($_GET['idEnd']);

            if (json_decode($resProduto)->success) {
                return $resProduto;
            } else {
                $this->Utils->header($this->page, json_decode($resProduto)->message);
            }
        }elseif ( $id != 0){
            $resProduto = $this->modelProduto->ListarPorId($id);

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
            $postEnd = $this->pegaProduto();

            $resProduto = $this->modelProduto->Editar($postEnd, $id);

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
            $resProduto = $this->modelProduto->Delete($id);

            if (json_decode($resProduto)->success){
                return $resProduto;
            }
        }

        //header('Location: cadastrar_funcionarios.php?message=' . json_encode($resProduto));

    }
}