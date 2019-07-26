<?php
    include('./inc/functions.php');

    if($_POST) {
        $loginOK = logar($_POST['email'], $_POST['senha']);
        if($loginOK) {
            header('location: index.php');
        } 
    } else {
        $loginOK = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    
    <div class="container">
        <form action="" method="post">
        <div class="form-group">
					<label for="email">E-mail</label>
					<input type="email" class="form-control <?= (!$loginOK?'is-invalid':'')?>" id="email" name="email" placeholder="Digite o e-mail do funcionário">
                    <?php if(!$loginOK): ?><div class="invalid-feedback">Preencha o e-mail corretamente.</div><?php endif; ?>
				</div>

				<div class="form-group">
					<label for="senha">Senha</label>
					<input value="" type="password" class="form-control <?= (!$loginOK?'is-invalid':'')?>" id="senha" name="senha" placeholder="Digite a senha"
                    <?php if(!$loginOK): ?><div class="invalid-feedback">Preencha a senha corretamente.</div><?php endif; ?>
				</div>
            <button class="btn btn-primary" type="submit">Log-in</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>