<?php
require_once(__DIR__ . "/Composer/autoload.php");


use Src\controllers\controllerReceita;
use Src\Utils\Utils;

$receita = new controllerReceita();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GL SYSTEM | Cadastro de Receitas</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- CABEÇALHO -->
<?php include "header.php"; ?>

<div class="safe_nav_conteudo">
    <!-- MENU DE NAVEGAÇÃO LATERAL -->
    <?php include "menu.php"; ?>

    <div class="container_conteudo">
        <div class="cadastra_produto">
            <h4>Cadastro de Receitas</h4>

            <div class="seg_form">
                <label>Dados da receita:</label>
                <!-- FORMULÁRIO PARA CADASTRAR RECEITAS -->
                <form>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_nome_produto" placeholder="Nome da receita"
                                   maxlength="50" required>
                        </div>
                    </div>

                    <input type="submit" class="btn_cadastro_prod" name="btn_enviar" value="Cadastrar">
                </form>
            </div>

            <h4 align="center">Receitas cadastradas</h4>

            <div style="width: 100%; height: 300px; overflow-y: scroll; float: left;">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nome da Receita</th>
                        <th scope="col" style="text-align: center;">Ingredientes </th>
                        <th scope="col" style="text-align: center;">Qtde usada</th>
                        <th scope="col" style="text-align: center;">Medida</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $resReceita = json_decode($receita->ListarReceitas());

                    if ($resReceita->success and $resReceita->count > 0) {
                        foreach ($resReceita->data as $data) {
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo($data->nome_receita); ?></td>
                                <td style="text-align: center;"><?php echo($data->nome_ingrediente); ?></td>
                                <td style="text-align: center;"><?php echo($data->qtd_usada); ?></td>
                                <td style="text-align: center;"><?php echo($data->tipo_medida); ?></td>
                            </tr>
                            <?php

                        }

                    } else {
                        ?>
                        <tr>
                            <td colspan="6" style="text-align: center">Nenhum funcionário cadastrado</td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>