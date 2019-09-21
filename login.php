<?php
if(isset($_GET['erro'])){ ?>

    <div class="alert alert-danger"  role="alert">
        Usuario e/ou senha invalidos
    </div>

<?php }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GL SYSTEM | Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/mascaraCPF.js"></script>
</head>
<body class="background_login">
<div class="overlay">
    <div class="content_login">
        <div class="form_login">
            <div class="header_login">
                <div class="logo_login">GL SYSTEM<div class="line"></div></div> <br>
                <p style="color: #808080; font-size: 13px; padding-bottom: 5px;">Realize o Login para prosseguir</p>
            </div>
            <!-- FORMULÁRIO DE LOGIN -->
            <form method = "post" action="router.php?controller=login">
                <input type="text" onkeydown="javascript: fMasc( this, mCPF );" name="cpf" class="form-control" id="id_cpf" placeholder="CPF" maxlength="14" required style="height: 45px; box-shadow: 0px 2px 6px #cccccc;"> <br>
                <input type="password" name = "senha" class="form-control" id="id_senha" placeholder="SENHA" maxlength="8" required style="height: 45px; box-shadow: 0px 2px 6px #cccccc; margin-bottom: 10px;">

                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">Lembrar-me</label>

                <input type="submit" class="btn_entrar" name="btn_logar" value="Entrar">
            </form>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>