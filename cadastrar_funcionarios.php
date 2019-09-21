<?php
    require_once(__DIR__ . "/Composer/autoload.php");

    use Src\Controllers\controllerFuncionario;
    use Src\Utils\Utils;

    $utils = new Utils();
    $funcionario = new controllerFuncionario();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GL SYSTEM | Cadastro de Funcionários</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/mascaraCPF.js"></script>
    </head>
<body>
    <!-- CABEÇALHO -->
    <header class="header">
        <div class="logo">GL SYSTEM</div>

        <div class="welcome_exit">
            <div class="welcome">Bem Vindo(a), Usuário</div>

            <div class="exit"><a data-toggle="modal" data-target="#exampleModalCenter"><img
                            src="imagens/icons/exit.png" alt="Sair" title="Sair"></a></div>

            <!-- MODAL -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLongTitle">Tem certeza que deseja sair?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="height: 40px; font-size: 15px;">Cancelar
                            </button>
                            <a href="login.php">
                                <button type="button" class="btn btn-primary" style="height: 40px; font-size: 15px;">Sim
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="safe_nav_conteudo">
        <!-- MENU DE NAVEGAÇÃO LATERAL -->
        <nav class="nav">
            <ul>
                <a href="registro_de_pedidos.php">
                    <li>
                        <div style="width: 100%; height: 25px; padding-left: 18px;">
                            <div style="margin-right: 10px; float: left;"><img src="imagens/icons/pedido.png"></div>
                            <div style="margin-top: 2px; float: left;">Pedidos</div>
                        </div>
                    </li>
                </a>
                <a href="cadastrar_produtos.php">
                    <li>
                        <div style="width: 100%; height: 25px; padding-left: 18px;">
                            <div style="margin-right: 10px; float: left;"><img src="imagens/icons/produto.png"></div>
                            <div style="margin-top: 2px; float: left;">Produtos</div>
                        </div>
                    </li>
                </a>
                <a href="cadastrar_funcionarios.php">
                    <li class="active">
                        <div style="width: 100%; height: 25px; padding-left: 18px;">
                            <div style="margin-right: 10px; float: left;"><img src="imagens/icons/funcionario.png"></div>
                            <div style="margin-top: 2px; float: left;">Funcionários</div>
                        </div>
                    </li>
                </a>
                <a href="cadastrar_receitas.php">
                    <li>
                        <div style="width: 100%; height: 25px; padding-left: 18px;">
                            <div style="margin-right: 10px; float: left;"><img src="imagens/icons/receita.png"></div>
                            <div style="margin-top: 2px; float: left;">Receitas</div>
                        </div>
                    </li>
                </a>
                <a href="cadastrar_fornecedores.php">
                    <li>
                        <div style="width: 100%; height: 25px; padding-left: 18px;">
                            <div style="margin-right: 10px; float: left;"><img src="imagens/icons/fornecedor.png"></div>
                            <div style="margin-top: 2px; float: left;">Fornecedores</div>
                        </div>
                    </li>
                </a>
                <a href="cadastro_estoque.php">
                    <li >
                        <div style="width: 100%; height: 25px; padding-left: 18px;">
                            <div style="margin-right: 10px; float: left;"><img src="imagens/icons/receita.png"></div>
                            <div style="margin-top: 2px; float: left;">Estoque</div>
                        </div>
                    </li>
                </a>
            </ul>
        </nav>
        <div class="container_conteudo">
            <div class="cadastra_produto">
                <h4>Cadastro de Funcionários</h4>

                <div class="seg_form">
                    <label>Dados pessoais:</label>
                    <!-- FORMULÁRIO PARA CADASTRAR FUNCIONÁRIOS -->
                    <form action="<?php if(isset($_GET['method']) == 'update') echo("router.php?controller=editarFuncionario");
                                        else echo("router.php?controller=cadatrarFuncionario");?>"
                          enctype="multipart/form-data"
                          method="post">
                        <?php
                        if (isset($_GET['idFun'])) {
                            $resEditFuncionario = json_decode($funcionario->BuscarFuncionarioPorId());
                        }

                        ?>
                        <input name="idHyperMock" type="text" value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->id); ?>">
                        <div class="form-row">
                            <div class="form-group col-md-3" style="padding-left: 0px; padding-right: 0px;">
                                <div class="form-group">
                                    <input type="text" onkeydown="javascript: fMasc( this, mCEP );"
                                           name="cep"
                                           class="form-control" id="id_cep_funcionario" placeholder=CEP
                                           maxlength="9"
                                           value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->cep); ?>"
                                           required>
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn_busca" name="btn_busca" value="Buscar">

                        <!-- DADOS PESSOAIS -->
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nome_funcionario"
                                       id="id_nome_funcionario"
                                       value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->nome); ?>"
                                       placeholder="Nome do funcionário" maxlength="100" required>
                            </div>

                            <div class="form-group col-md-3" style="padding-left: 0px; padding-right: 0px;">
                                <input type="text" name="dataNasc" class="form-control"
                                       id="id_dt_nascimento"
                                       value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->dtNasc); ?>"
                                       placeholder="Data de nascimento" maxlength="10" required>
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" onkeydown="javascript: fMasc( this, mRG );" name="rg"
                                       class="form-control" id="id_rg" placeholder="RG" maxlength="12"
                                       value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->rg); ?>"
                                       required>
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" onkeydown="javascript: fMasc( this, mCPF );" name="cpf"
                                       class="form-control" id="id_cpf" placeholder="CPF" maxlength="14"
                                       value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->cpf); ?>"
                                       required>
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" onkeydown="javascript: fMasc( this, mTEL );" name="tel"
                                       class="form-control" id="id_telefone" placeholder="Telefone"
                                       maxlength="14"
                                       value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->telefone); ?>"
                                       required>
                            </div>
                        </div>

                        <!-- ENDEREÇO -->
                        <div class="form-row">
                            <div class="form-group col-md-10"
                                 style="padding-left: 0px; padding-right: 0px;">
                                <input type="text" class="form-control" id="id_logradouro" name="rua"
                                       value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->logradouro); ?>"
                                       placeholder="Logradouro" required readonly>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" class="form-control" id="id_num" name="num_home"
                                       placeholder="Nº"
                                       value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->numero); ?>"
                                       maxlength="4" required>
                            </div>
                            <div class="form-group col-md-6" style="padding-left: 0px; padding-right: 0px;">
                                <input type="text" class="form-control" id="id_cidade" placeholder="Cidade"
                                       name="cidade"
                                       value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->cidade); ?>"
                                       required readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="id_estado" placeholder="Estado"
                                       name="uf"
                                       value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->uf); ?>"
                                       required readonly>
                            </div>
                        </div>

                        <!-- EMPRESA -->
                        <label>Empresa:</label>
                        <div class="form-row">
                            <div class="form-group col-md-3" style="padding-left: 0px; padding-right: 0px;">
                                <input type="text" name="dataAdm" class="form-control" id="id_dt_admissao"
                                       value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->dtAdimicao); ?>"
                                       placeholder="Data de admissão" maxlength="10" required>
                            </div>
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" id="id_salario"
                                       placeholder="Salário"
                                       value="<?php if (isset( $resEditFuncionario )) echo($resEditFuncionario->data->salario); ?>"
                                       name="salario"
                                       maxlength="6" required>
                            </div>
                            <div class="form-group col-md-6">
                                <select id="id_cargo" class="form-control" name="cargo" required>
                                    <option selected>Cargo</option>
                                    <option value="Atendente">Atendente</option>
                                    <option value="Balconista">Balconista</option>
                                    <option value="Cozinheiro">Cozinheiro</option>
                                    <option value="Gerente">Gerente</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn_cadastro_prod" name="btn_enviar" value="Cadastrar">
                    </form>
                </div>

                <!-- FUNCIONÁRIOS CADASTRADOS -->
                <h4>Funcionários Cadastrados</h4>

                <div style="width: 100%; height: 250px; overflow-y: scroll; float: left; margin-bottom: 100px">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col" style="text-align: center;">CPF</th>
                            <th scope="col" style="text-align: center;">Cargo</th>
                            <th scope="col" style="text-align: center;">Data de admissão</th>
                            <th scope="col" style="text-align: center;">Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $resFuncionario = json_decode($funcionario->ListarFuncionario());

                        if ($resFuncionario->success and $resFuncionario->count > 0) {
                            foreach ($resFuncionario->data as $data) {
                                ?>
                                <tr>
                                    <td><?php echo($data->nome); ?></td>
                                    <td style="text-align: center;"><?php echo($data->cpf); ?></td>
                                    <td style="text-align: center;"><?php echo($data->cargo); ?></td>
                                    <td style="text-align: center;"><?php echo($data->dtAdimicao); ?></td>
                                    <td style="text-align: center;">
                                        <a href="<?php echo("cadastrar_funcionarios.php?method=update&idFun=" . $data->id); ?>">

                                            <img src="imagens/icons/update.png" alt="Editar produto" title="Editar produto">

                                        </a>
                                        <a href="<?php echo("router.php?controller=deleteFuncionario&idFun=" . $data->id); ?>">

                                            <img src="imagens/icons/delete.png" alt="Excluir produto"
                                                 title="Excluir produto">

                                        </a>
                                    </td>
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
<script src="js/cep.js"></script>
</body>
</html>