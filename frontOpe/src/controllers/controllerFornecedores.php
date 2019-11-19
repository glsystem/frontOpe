<?php

namespace Src\controllers;


use Src\models\modelEndereco;
use Src\models\modelFornecedor;
use Src\models\modelMock;
use Src\Utils\Utils;

class controllerFornecedores
{

    private $modelEndereco;
    private $modelFornecedor;
    private $Utils;
    private $page;

    public function __construct()
    {
        #Cria uma Instancia das Models
        $this->modelEndereco = new modelEndereco();
        $this->modelFuncionario = new modelFornecedor();
        $this->Utils = new Utils();
        $this->page = "cad_forncedores";
    }


    // Pega os dados enviados pelo formulario da pagina
    private function pegaEndereco()
    {

        return $postEnd = array(
            'cidade' => $_POST['text_cidade'],
            'estado' => $_POST['text_estado'],
            'cep' => $_POST['cep'],
            'endereco' => $_POST['text_logradouro'],
            'bairro' => $_POST['bairro'],
            'numero' => intval($_POST['text_numero']),
            'complemento' => $_POST['complemento']
        );
    }

    // Pega os dados enviados pelo formulario da pagina
    private function pegaFornecedor($resposta = null, $update = false)
    {

        //$resposta = json_decode($resposta);

        if ($update){
            return array(
                'cnpj' => $_POST['nome_funcionario'],
                'nome_fornecedor' => $_POST['rg'],
                'nome_fantasia' => $_POST['cpf'],
                'e_mail' => $_POST['tel'],
                'cep' => floatval($_POST['salario']),
                'contato' => $_POST['cargo'],
                'celular' => $_POST['dataNasc'],
                'nome_contato' => $_POST['dataAdm'],
                'id_clas_fornecedor' => intval($_POST['dataAdm'])
//                'id_endereco' => $_POST['dataAdm']
            );
        }else{
            return array(
                'cnpj' => $_POST['cnpj'],
                'nome_fornecedor' => $_POST['text_razao_social'],
                'nome_fantasia' => $_POST['text_nome_fantasia'],
                'e_mail' => $_POST['text_email'],
                'cep' => floatval($_POST['cep']),
                'contato' => $_POST['tel'],
                'celular' => $_POST['cel'],
                'nome_contato' => $_POST['text_nome_contato'],
                'id_clas_fornecedor' => intval($_POST['text_tipo_pessoa']),
                'id_endereco' => $resposta->data->id
            );
        }

    }

    /**
     * @param bool $mock -> Esta variavel serve para saber se ira resgatar os valores do formulario ou ira pegar valores prontos serve para TESTE!!
     * @return bool|string -> Retorna o Json de Resposta com os dados do Endereco
     */
    public function cadEndereco($mock = false)
    {
        #Resgata os valores da pagina via POST se a variavel $MOCK entiver false
        if ($mock) {
            $modelMock = new modelMock();
            $postEnd = $modelMock->mockEndereco();
        } else {

            $postEnd = $this->pegaEndereco();

        }

        $resEndereco = $this->modelEndereco->Insert($postEnd);
//        $this->Utils->breakTest($resEndereco);
        if (json_decode($resEndereco)->success) {
            return $resEndereco;
        } else {
            $this->Utils->header($this->page, json_decode($resEndereco)->message);
        }

        #Chama a funcao para inserir um Endereco e retorna os valores para o Router
    }

    public function ListarEndereco($mock = false)
    {
        $resEndereco = $this->modelEndereco->Listar();

        if (json_decode($resEndereco)->success) {
            return $resEndereco;
        } else {
            $this->Utils->header($this->page, json_decode($resEndereco)->message);
        }
    }

    public function BuscarEnderecoPorId($mock = false, $id = 0)
    {

        if (isset($_GET['idEnd'])) {
            $resEndereco = $this->modelEndereco->ListarPorId($_GET['idEnd']);

            if (json_decode($resEndereco)->success) {
                return $resEndereco;
            } else {
                $this->Utils->header($this->page, json_decode($resEndereco)->message);
            }
        }elseif ( $id != 0){
            $resEndereco = $this->modelEndereco->ListarPorId($id);

            if (json_decode($resEndereco)->success) {
                return $resEndereco;
            } else {
                $this->Utils->header($this->page, json_decode($resEndereco)->message);
            }
        }

    }

    public function EditarEndereco($mock = false, $id = 0)
    {
        if ($id != 0 ){
            $postEnd = $this->pegaEndereco();

            $resEndereco = $this->modelEndereco->Editar($postEnd, $id);

            if (json_decode($resEndereco)->success) {
                return $resEndereco;
            } else {
                return $this->Utils->header($this->page, json_decode($resEndereco)->message);
            }
        }
    }

    public function DeleteEndereco($id, $mock = false)
    {

        if (isset($id)) {
            $resEndereco = $this->modelEndereco->Delete($id);

            if (json_decode($resEndereco)->success){
                return $resEndereco;
            }
        }

        //header('Location: cadastrar_funcionarios.php?message=' . json_encode($resEndereco));

    }


    /**
     * @param $responseEnd
     * @param bool $mock
     * @return bool|string
     */
    public function Fornecedor($responseEnd, $mock = false)
    {

        $resposta = json_decode($responseEnd);

        if ($mock) {
            $modelMock = new modelMock();
            $postFun = $modelMock->mockFuncionario($resposta);
        } else {
            $postFun = $this->pegaFornecedor($resposta);
        }

        $resFuncionario = $this->modelFuncionario->Insert($postFun);

//        $this->Utils->breakTest($resFuncionario);

        if (json_decode($resFuncionario)->success) {
            $this->Utils->header($this->page, json_decode($resFuncionario)->message);
        } else {
            $this->Utils->header($this->page, json_decode($resFuncionario)->message);
        }
    }

    public function ListarFornecedor($mock = false)
    {

        $resFuncionario = $this->modelFuncionario->Listar();

        if (json_decode($resFuncionario)->success) {

            return $resFuncionario;
        } else {
            $this->Utils->header($this->page, json_decode($resFuncionario)->message);
        }
    }

    public function BuscarFuncionarioPorId($mock = false, $id = 0)
    {

        if (isset($_GET['idFor'])) {

            $resFuncionario = $this->modelFuncionario->ListarPorId($_GET['idFor']);

            if (json_decode($resFuncionario)->success) {

                return $resEndereco = $this->BuscarEnderecoPorId(false, json_decode($resFuncionario)->data->id_endereco);

            } else {
                $this->Utils->header($this->page, json_decode($resFuncionario)->message);
            }
        }elseif ($id != 0){
            $resFuncionario = $this->modelFuncionario->ListarPorId($id);

            if (json_decode($resFuncionario)->success) {
                return $resFuncionario;
            } else {
                $this->Utils->header($this->page, json_decode($resFuncionario)->message);
            }
        }
    }

    public function EditarFuncionario($mock = false)
    {
        if (isset($_POST['idHyperMock'])){

            $postFun = $this->pegaFornecedor(null, true);

            $resFuncionario = $this->modelFuncionario->Editar($postFun, $_POST['idHyperMock']);

            if (json_decode($resFuncionario)->success){
                $ganbs = $this->BuscarFuncionarioPorId(false, $_POST['idHyperMock']);
                if (json_decode($ganbs)->success){

                    $resEndereco = $this->EditarEndereco(false, json_decode($ganbs)->data->idEndereco);

                    if (json_decode($resEndereco)->success) {
                        $this->Utils->header($this->page, json_encode(json_decode($resEndereco)->message));
                    }
                }
                $this->Utils->header($this->page, json_encode(json_decode($resFuncionario)->message));
            }
            $this->Utils->header($this->page, json_encode(json_decode($resFuncionario)->message));
        }else{
            echo("Falha ao passar dados");
        }
    }

    public function DeleteFuncionario($mock = false)
    {
        if (isset($_GET['idFor'])){

            $ganbs = $this->BuscarFuncionarioPorId();

            if (json_decode($ganbs)->success){

                $resFuncionario = $this->modelFuncionario->Delete($_GET['idFor']);
//                $this->Utils->breakTest($resFuncionario);
                if (json_decode($resFuncionario)->success){

                    $resEndereco = $this->DeleteEndereco(json_decode($ganbs)->data->id_endereco);

                    if (json_decode($resEndereco)->success){
                        $this->Utils->header($this->page, json_encode(json_decode($resEndereco)->message));
                    }
                    $this->Utils->header($this->page, json_encode(json_decode($resEndereco)->message));
                }
                $this->Utils->header($this->page, json_encode(json_decode($resFuncionario)->message));
            }
            $this->Utils->header($this->page, json_encode(json_decode($ganbs)->success));
        }
    }

}