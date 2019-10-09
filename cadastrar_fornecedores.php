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
		<?php include "header.php"; ?>

		<div class="safe_nav_conteudo">
			<!-- MENU DE NAVEGAÇÃO LATERAL -->
			<?php include "menu.php"; ?>

			<div class="container_conteudo">
                <div class="cadastra_produto">
					<h4>Cadastro de Fornecedores</h4>

					<div class="seg_form">
						<label>Dados do fornecedor:</label>
                        <!-- FORMULÁRIO DE CADASTRAR FORNECEDORES -->
						<form action="<?php if(isset($_GET['method']) == 'update') echo("router.php?controller=editarFornecedor");
                                            else echo("router.php?controller=cadatrarFornecedor");?>">
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
									<input type="text" class="form-control" id="id_nome_fantasia" name="text_nome_fantasia" placeholder="Nome fantasia" required readonly>
								</div>

								<div class="form-group">
									<input type="text" class="form-control" id="id_razao_social" name="text_razao_social" placeholder="Razão social" required readonly>
								</div>
								
								<div class="form-group col-md-3" style="padding-left: 0px; padding-right: 0px;">
									<input type="text" onkeydown="javascript: fMasc( this, mCEP );" name="cep" class="form-control" id="id_cep_fornecedor" placeholder="CEP" maxlength="9" required readonly>
								</div>
								
								<div class="form-group col-md-7">
									<input type="text" class="form-control" id="id_logradouro"  name="text_logradouro" placeholder="Logradouro" required readonly>
								</div>
								
								<div class="form-group col-md-2">
									<input type="text" class="form-control" id="id_num"  name="text_numero" placeholder="Nº" maxlength="4" required>
								</div>
								
								<div class="form-group col-md-6" style="padding-left: 0px; padding-right: 0px;">
									<input type="text" class="form-control" id="id_cidade" name="text_cidade" placeholder="Cidade" required readonly>
								</div>
								
								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="id_estado" name="text_estado" placeholder="Estado" required readonly>
								</div>

								<div class="form-group col-md-3" style="padding-left: 0px; padding-right: 0px;">
									<select id="id_tipo_pessoa" name="text_tipo_pessoa" class="form-control" required>
										<option selected>Pessoa</option>
										<option>Física</option>
										<option>Jurídica</option>
									</select>
								</div>

								<div class="form-group col-md-9">
									<input type="email" class="form-control" name="text_email" id="id_email" placeholder="Email" maxlength="50" required>
								</div>

								<div class="form-group col-md-3" style="padding-left: 0px; padding-right: 0px;">
									<input type="text" onkeydown="javascript: fMasc( this, mTEL );" name="tel" class="form-control" id="id_telefone" placeholder="Telefone" maxlength="14" required>
								</div>

								<div class="form-group col-md-3">
									<input type="text" onkeydown="javascript: fMasc( this, mCEL );" name="cel" class="form-control" id="id_celular" placeholder="Celular" maxlength="15" required>
								</div>

								<div class="form-group col-md-6">
									<input type="text" class="form-control" id="id_nome_contato" name="text_nome_contato" placeholder="Nome do contato" maxlength="15" required>
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