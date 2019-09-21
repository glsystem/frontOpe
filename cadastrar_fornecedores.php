<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GL SYSTEM | Cadastro de Fornecedores</title>
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
						<li>
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
						<li class="active">
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
					<h4>Cadastro de Fornecedores</h4>

					<div class="seg_form">
						<label>Dados do fornecedor:</label>
                        <!-- FORMULÁRIO DE CADASTRAR FORNECEDORES -->
						<form>
							<div class="form-row">
								<div class="form-group col-md-3" style="padding-left: 0px; padding-right: 0px;">
									<div class="form-group">
										<input type="text" onkeydown="javascript: fMasc( this, mCNPJ );" name="cnpj" class="form-control" id="id_cnpj" placeholder=CNPJ maxlength="18" required>
									</div>
								</div>
							</div>
							
							<input type="submit" class="btn_busca" name="btn_busca" value="Buscar">

							<div class="form-row">
								<div class="form-group">
									<input type="text" class="form-control" id="id_nome_fantasia" placeholder="Nome fantasia" required readonly>
								</div>

								<div class="form-group">
									<input type="text" class="form-control" id="id_razao_social" placeholder="Razão social" required readonly>
								</div>
								
								<div class="form-group col-md-3" style="padding-left: 0px; padding-right: 0px;">
									<input type="text" onkeydown="javascript: fMasc( this, mCEP );" name="cep" class="form-control" id="id_cep_fornecedor" placeholder="CEP" maxlength="9" required readonly>
								</div>
								
								<div class="form-group col-md-7">
									<input type="text" class="form-control" id="id_logradouro" placeholder="Logradouro" required readonly>
								</div>
								
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="id_num" placeholder="Nº" maxlength="4" required>
								</div>
								
								<div class="form-group col-md-6" style="padding-left: 0px; padding-right: 0px;">
									<input type="text" class="form-control" id="id_cidade" placeholder="Cidade" required readonly>
								</div>
								
								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="id_estado" placeholder="Estado" required readonly>
								</div>

								<div class="form-group col-md-3" style="padding-left: 0px; padding-right: 0px;">
									<select id="id_tipo_pessoa" class="form-control" required>
										<option selected>Pessoa</option>
										<option>Física</option>
										<option>Jurídica</option>
									</select>
								</div>

								<div class="form-group col-md-9">
									<input type="email" class="form-control" id="id_email" placeholder="Email" maxlength="50" required>
								</div>

								<div class="form-group col-md-3" style="padding-left: 0px; padding-right: 0px;">
									<input type="text" onkeydown="javascript: fMasc( this, mTEL );" name="tel" class="form-control" id="id_telefone" placeholder="Telefone" maxlength="14" required>
								</div>

								<div class="form-group col-md-3">
									<input type="text" onkeydown="javascript: fMasc( this, mCEL );" name="cel" class="form-control" id="id_celular" placeholder="Celular" maxlength="15" required>
								</div>

								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="id_nome_contato" placeholder="Nome do contato" maxlength="15" required>
								</div>
							</div>
                            
							<input type="submit" class="btn_cadastro_prod" name="btn_enviar" value="Cadastrar">
						</form>
					</div>

					<!-- FORNECEDORES CADASTRADOS -->
					<!-- <h4>Produtos Cadastrados</h4>

					<div style="width: 100%; height: 300px; overflow-y: scroll; float: left;">
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