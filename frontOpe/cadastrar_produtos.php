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
		<?php include "header.php"; ?>
		
		<div class="safe_nav_conteudo">
			<!-- MENU DE NAVEGAÇÃO LATERAL -->
			<?php include "menu.php"; ?>
			
			<div class="container_conteudo">
                <div class="cadastra_produto">
					<h4>Cadastro de Produtos</h4>

					<div class="seg_form">
						<label>Dados do produto:</label>
						<!-- FORMULÁRIO PARA CADASTRAR PRODUTOS -->
						<form method="post" action="<?php if(isset($_GET['method']) == 'update') echo("router.php?controller=editarProduto");
                        else echo("router.php?controller=cadatrarProduto");?>">
<!--							<div class="form-group">-->
<!--								<input type="text" class="form-control" id="id_nome_produto" name="text_nome_produto" placeholder="Nome do produto" maxlength="50" required>-->
<!--							</div>-->
							<div class="form-row">
<!--								<div class="form-group col-md-3" style="padding-left: 0px; padding-right: 0px;">-->
<!--									<input type="text" class="form-control" id="id_qtd_produto" name="text_qtd_produto"placeholder="Quantidade" maxlength="3" required>-->
<!--								</div>-->
								<div class="form-group col-md-3" style="padding-left: 0px">
									<input type="text" class="form-control" id="id_preco_produto" name="text_preco_produto" placeholder="Preço" maxlength="10" required>
								</div>
								<div class="form-group col-md-4">
									<select id="id_tipo_produto" class="form-control" name="sl_receita" required>
										<option selected>Receita</option>
										<option value="1">Receita 1</option>
										<option value="2">Receita 2</option>
										<option value="3">Receita 3</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<select id="id_fornecedor" class="form-control" name="sl_categoria" required>
										<option selected>Sub Categoria</option>
										<option value="1">Sub Categoria 1</option>
										<option value="2">Sub Categoria 2</option>
										<option value="3">Sub Categoria 3</option>
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