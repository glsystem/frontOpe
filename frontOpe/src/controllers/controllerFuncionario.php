<?php

namespace Src\Controllers;

use Src\models\modelEndereco;
use Src\models\modelFuncionario;
use Src\models\modelMock;
use Src\Utils\Utils;


class controllerFuncionario
{

    private $modelEndereco;
    private $modelFuncionario;
    private $Utils;
    private $page;

    public function __construct()
    {
        #Cria uma Instancia das Models
        $this->modelEndereco = new modelEndereco();
        $this->modelFuncionario = new modelFuncionario();
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

    // Pega os dados enviados pelo formulario da pagina
    private function pegaEndereco()
    {

        return $postEnd = array(
            'cidade' => $_POST['cidade'],
            'estado' => $_POST['uf'],
            'cep' => $_POST['cep'],
            'endereco' => $_POST['rua'],
            'bairro' => $_POST['bairro'],
            'numero' => intval($_POST['num_home']),
            'complemento' => $_POST['complemento']
        );
    }

    // Pega os dados enviados pelo formulario da pagina
    private function pegaFuncionario($resposta = null, $update = false)
    {

        //$resposta = json_decode($resposta);

        if ($update){
            //$this->breakTest($resposta->data->id);
            return array(
                'nome_completo' => $_POST['nome_funcionario'],
                'rg' => $_POST['rg'],
                'cpf' => $_POST['cpf'],
                'contato' => $_POST['tel'],
                'salario' => floatval($_POST['salario']),
                'id_cargo' => $_POST['cargo'],
                'dt_nascimento' => $_POST['dataNasc'],
                'dt_admissao' => $_POST['dataAdm']
            );
        }else{
            return array(
                'id_endereco' => $resposta->data->id,
                'nome_completo' => $_POST['nome_funcionario'],
                'rg' => $_POST['rg'],
                'cpf' => $_POST['cpf'],
                'contato' => $_POST['tel'],
                'salario' => floatval($_POST['salario']),
                'id_Cargo' => 1,
                'dt_nascimento' => $_POST['dataNasc'],
                'dt_admissao' => $_POST['dataAdm']
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

//        $this->breakTest($resEndereco);
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
    public function Funcionairo($responseEnd, $mock = false)
    {

        $resposta = json_decode($responseEnd);

        if ($mock) {
            $modelMock = new modelMock();
            $postFun = $modelMock->mockFuncionario($resposta);
        } else {
            $postFun = $this->pegaFuncionario($resposta);
        }

        $resFuncionario = $this->modelFuncionario->Insert($postFun);

//        $this->breakTest($resFuncionario);

        if (json_decode($resFuncionario)->success) {
            $this->Utils->header($this->page, json_decode($resFuncionario)->message);
        } else {
            $this->Utils->header($this->page, json_decode($resFuncionario)->message);
        }
    }

    public function ListarFuncionario($mock = false)
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

        if (isset($_GET['idFun'])) {

            $resFuncionario = $this->modelFuncionario->ListarPorId($_GET['idFun']);

            if (json_decode($resFuncionario)->success) {

                $resEndereco = $this->BuscarEnderecoPorId(false, json_decode($resFuncionario)->data->id_endereco);

                return $this->Utils->tratativeSuccess($resEndereco, $resFuncionario);
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

            $postFun = $this->pegaFuncionario(null, true);

            $resFuncionario = $this->modelFuncionario->Editar($postFun, $_POST['idHyperMock']);

            if (json_decode($resFuncionario)->success){
                $ganbs = $this->BuscarFuncionarioPorId(false, $_POST['idHyperMock']);
//                $this->breakTest($ganbs);
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
        if (isset($_GET['idFun'])){

            $ganbs = $this->BuscarFuncionarioPorId();

            if (json_decode($ganbs)->success){

                $resFuncionario = $this->modelFuncionario->Delete($_GET['idFun']);

                if (json_decode($resFuncionario)->success){

                    $resEndereco = $this->DeleteEndereco(json_decode($ganbs)->data->idEndereco);

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
