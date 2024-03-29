<?php


namespace Src\Utils;


class Utils
{
    public function baseUrl(){
        return "http://localhost:8000/v0/api/";
    }
    public function getFields($error = false) : array
    {
        return [
            'success' => null,
            'message' => [],
            'httpCode' => null,
            'count' => 0,
            'error' => [],
            'details' => [],
            'data' => []
        ];
    }

    public function header(String $page, String $message = "", bool $update = false){

        header('Location:index.php?page='. $page .'&message=' . $message . '&update=' . $update);

    }

    public function headerWithId(String $page, int $id = 0){

        if ($id != 0){
            header('Location:index.php?page='. $page .'&id=' . $id);
        }else {
            header('Location:index.php?page='. $page);
        }
    }

    public function headerWithError(String $page, bool $error = false){

        if ($error){
            header('Location:index.php?page='. $page .'&error=' . $error);
        }else {
            header('Location:index.php?page='. $page);
        }
    }

    public function tratativeSuccess($resEndereco = null, $resFuncionario = null)
    {
        $endereco = json_decode($resEndereco);
        $funcionario = json_decode($resFuncionario);

        $fields = $this->getFields();

        $data = ['id'=>     $funcionario->data->id,
            'idEndereco'=>  $funcionario->data->id_endereco,
            'cep'=>         $endereco->data->cep,
            'logradouro'=>  $endereco->data->endereco,
            'cidade'=>      $endereco->data->cidade,
            'uf'=>          $endereco->data->estado,
            'numero'=>      $endereco->data->numero,
            'nome'=>        $funcionario->data->nome_completo,
            'rg'=>          $funcionario->data->rg,
            'cpf'=>         $funcionario->data->cpf,
            'telefone'=>    $funcionario->data->contato,
            'salario'=>     $funcionario->data->salario,
            'cargo'=>       $funcionario->data->id_Cargo,
            'dtNasc'=>      $funcionario->data->dt_nascimento,
            'dtAdimicao'=>  $funcionario->data->dt_admissao] ;

        $fields['success'] = $endereco->success;
        $fields['message'] = $endereco->message;
        $fields['httpCode'] = $endereco->httpCode;
        $fields['error'] = $endereco->error;
        $fields['data'] = $data;
        $fields['details'] = $endereco->details;
        $fields['count'] = count($fields['data']);

        return json_encode($fields);

    }

    // Passando as resposta do servidor como parametro ele printa formatando com json
    public function breakTest($res)
    {
        //echo "<pre>";
        print_r($res);
        exit();
    }

}