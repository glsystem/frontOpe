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
									<input type="text" class="form-control" id="id_nome_produto" placeholder="Nome da receita" maxlength="50" required>
								</div>
							</div>
							
							<input type="submit" class="btn_cadastro_prod" name="btn_enviar" value="Cadastrar">
						</form>
					</div>

					<!-- RECEITAS CADASTRADAS -->
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