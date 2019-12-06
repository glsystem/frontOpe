<?php
require_once(__DIR__ . "/Composer/autoload.php");

use Src\controllers\controllerIngrediente;
use Src\Utils\Utils;

$utils = new Utils();
$controllerIngrediente= new controllerIngrediente();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GL SYSTEM | Cadastro de Estoque</title>
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
            <h4>Cadastro de Estoque</h4>

            <div class="seg_form">
                <label>Dados da estoque:</label>
                <!-- FORMULÁRIO PARA CADASTRAR RECEITAS -->
                <form>
                <div style="padding-left: 0px;" class="form-group col-md-12">
                        <select id="id_cargo" class="form-control" name="cargo" required>
                            <option selected>Produto</option>
                            <?php $resIngrediente= json_decode($controllerIngrediente->ListarIngreditente()); ?>

                            <?php
                            if ($resIngrediente->success and $resIngrediente->count > 0) {
                                foreach ($resIngrediente->data as $dataIngrediente) {
                                    ?>

                                    <option value="<?php echo($dataIngrediente->id); ?>"> <?php echo($dataIngrediente->nome_ingrediente); ?> </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_nome_produto" placeholder="Quantidade" maxlength="50" required>
                        </div>
                    </div>

                    <input type="submit" class="btn_cadastro_prod" name="btn_enviar" value="Cadastrar">
                </form>
            </div>

             <h4 align="center">Produtos em Estoque</h4>

            <div style="width: 100%; height: 300px; overflow-y: scroll; float: left;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center;">Nome do Ingrediente</th>
                            <th scope="col" style="text-align: center;">Quantidade</th>
                            <th scope="col" style="text-align: center;">Medida</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                    $resIngredienteComNome= json_decode($controllerIngrediente->ListarIngreditenteComNome());

                    if ($resIngredienteComNome->success and $resIngredienteComNome->count > 0) {
                        foreach ($resIngredienteComNome->data as $data) {
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo($data->nome_ingrediente); ?></td>
                                <td style="text-align: center;"><?php echo($data->qtde); ?></td>
                                <td style="text-align: center;"><?php echo($data->tipo_medida); ?></td>
                            </tr>
                            <?php

                        }

                    } else {
                        ?>
                        <tr>
                            <td colspan="6" style="text-align: center">Nada retornado</td>
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