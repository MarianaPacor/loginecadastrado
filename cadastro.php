<?php 
	// Incluindo as funções gravadas no functions php.
	include('./inc/functions.php');

	if($_POST){
		
		// Verificando o post
		$erros = errosNoPost();

		if(count($erros) == 0){

			// Adicionar funcionario ao arquivo json
			addFuncionario($_POST['nome'],$_POST['email'],$_POST['senha']);
		
		}

	} else {

		// Garantindo que um vetor de erros exista
		// ainda que vazio quando não houver POST
		$erros = [];

	}

	// errNome será true se o campo nome for inválido e false se o campo estiver ok. 
	$errNome = in_array('errNome',$erros);

	// errEmail será true se o campo email for inválido e false se o campo estiver ok. 
	$errEmail = in_array('errEmail',$erros);

	$errSenha = in_array('errSenha', $erros);

	$errConf = in_array('errConf', $erros);

	// Carregando vetor de funcionários
	$funcionarios = getFuncionarios();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cadastro de Funcionários</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
</head>
<body>
	<div class="container">
		<div class="row">
			<ul class="col-sm-12 col-md-4 list-group">
				<?php foreach($funcionarios as $c): ?>
				<li class="list-group-item">
					<span><?= $c['nome'];  ?></span> : 
					<span><?= $c['email'];  ?></span>
				</li>
				<?php endforeach; ?>
			</ul>
			<form class="col-sm-12 col-md-8" action="cadastro.php" method="post">
				
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" class="form-control <?= ($errNome?'is-invalid':'')?>" id="nome" name="nome" placeholder="Digite o nome do funcionário">
					<?php if($errNome): ?><div class="invalid-feedback">Preencha o nome corretamente.</div><?php endif; ?>
				</div>
				
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="email" class="form-control <?= ($errEmail?'is-invalid':'')?>" id="email" name="email" placeholder="Digite o e-mail do funcionário">
					<?php if($errEmail): ?><div class="invalid-feedback">Preencha o e-mail corretamente.</div><?php endif; ?>
				</div>

				<div class="form-group">
					<label for="senha">Senha</label>
					<input value="" type="password" class="form-control <?= ($errSenha?'is-invalid':'')?>" id="senha" name="senha" placeholder="Digite a senha">
					<?php if($errSenha): ?><div class="invalid-feedback">Preencha a senha corretamente.</div><?php endif; ?>
				</div>
				
				<div class="form-group">
					<label for="confirmacao">Confirmação</label>
					<input value="" type="password" class="form-control <?= ($errConf?'is-invalid':'')?>" id="confirmacao" name="confirmacao" placeholder="Digite novamente">
					<?php if($errConf): ?><div class="invalid-feedback">Preencha a senha corretamente.</div><?php endif; ?>
				</div>
				
				<button class="btn btn-primary" type="submit">Salvar</button>
				
			</form>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>