<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GL SYSTEM | Cadastro de Produtos</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<!-- CABEÇALHO -->
		<header class="header">
			<div class="logo">GL SYSTEM</div>

			<div class="welcome_exit">
				<div class="welcome">Bem Vindo(a), Usuário</div>

                <div class="exit"><a href="login.php" data-toggle="modal" data-target="#exampleModalCenter"><img src="imagens/icons/exit.png" alt="Sair" title="Sair"></a></div>
                
                <!-- MODAL -->
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLongTitle">Tem certeza que deseja sair?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="height: 40px; font-size: 15px;">Cancelar</button>
								<a href="login.php"><button type="button" class="btn btn-primary" style="height: 40px; font-size: 15px;">Sim</button></a>
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
						<li class="active">
							<div style="width: 100%; height: 25px; padding-left: 18px;">
								<div style="margin-right: 10px; float: left;"><img src="imagens/icons/produto.png"></div>
								<div style="margin-top: 2px; float: left;">Produtos</div>
							</div>
						</li>
					</a>
					<a href="cadastrar_funcionarios.php">
						<li>
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
				</ul>
			</nav>
			<div class="container_conteudo">
                <div class="cadastra_produto">
					<h4>Cadastro de Produtos</h4>

					<div class="seg_form">
						<label>Dados do produto:</label>
						<!-- FORMULÁRIO PARA CADASTRAR PRODUTOS -->
						<form>
							<div class="form-group">
								<input type="text" class="form-control" id="id_nome_produto" placeholder="Nome do produto" maxlength="50" required>
							</div>
							<div class="form-row">
								<div class="form-group col-md-3" style="padding-left: 0px; padding-right: 0px;">
									<input type="text" class="form-control" id="id_qtd_produto" placeholder="Quantidade" maxlength="3" required>
								</div>
								<div class="form-group col-md-3">
									<input type="text" class="form-control" id="id_preco_produto" placeholder="Preço" maxlength="10" required>
								</div>
								<div class="form-group col-md-3">
									<select id="id_tipo_produto" class="form-control" required>
										<option selected>Tipo do produto</option>
										<option>Tipo 1</option>
										<option>Tipo 2</option>
										<option>Tipo 3</option>
									</select>
								</div>
								<div class="form-group col-md-3">
									<select id="id_fornecedor" class="form-control" required>
										<option selected>Fornecedor</option>
										<option>Fornecedor 1</option>
										<option>Fornecedor 2</option>
										<option>Fornecedor 3</option>
									</select>
								</div>
							</div>
							<input type="submit" class="btn_cadastro_prod" name="btn_enviar" value="Cadastrar">
						</form>
					</div>

					<!-- PRODUTOS CADASTRADOS -->
					<!-- <h4>Produtos Cadastrados</h4>

					<div style="width: 100%; height: 250px; overflow-y: scroll; float: left;">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Nome do Produto</th>
									<th scope="col" style="text-align: center;">Quantidade</th>
									<th scope="col" style="text-align: center;">Preço</th>
									<th scope="col" style="text-align: center;">Tipo do produto</th>
									<th scope="col" style="text-align: center;">Fornecedor</th>
									<th scope="col" style="text-align: center;">Opções</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Teste</td>
									<td style="text-align: center;">Teste</td>
									<td style="text-align: center;">Teste</td>
									<td style="text-align: center;">Teste</td>
									<td style="text-align: center;">Teste</td>
									<td style="text-align: center;">
										<a href="#">
											
											<img src="imagens/icons/update.png" alt="Editar produto" title="Editar produto">

											
											<img src="imagens/icons/delete.png" alt="Excluir produto" title="Excluir produto">
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div> -->
				</div>
			</div>
		</div>
		
		<!-- SCRIPTS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>