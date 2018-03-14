<?php
session_start();

$seguranca = true;
include_once("_config/seguranca.php");
seguranca();

//Biblioteca auxiliar
include_once("_config/config.php");
include_once("_config/conexao.php");

if ($_SESSION['nivel_user_id'] <> 2) {
	$_SESSION['msg'] = "<div class='alert alert-danger'>Acesso Negado !!!</br>Para acessar esta página é necessário estar logado como Administrador</div>";
	header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Administrador - Excluir Dados</title>

	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">


</head>
<!-- Áreas semânticas HTML 5-->
<body>
	<!---Cabeçalho E Nav -->
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="index.php">Lorem Ipsum</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		    <ul class="navbar-nav">
		      <li class="nav-item active">
		        <a class="nav-link" href="index.php">Home</a>
		      <li class="nav-item">
		      	<a class="nav-link" href="#">Cadastrar</a>
		      </li>
		      <li class="nav-item dropdown">
			      <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Listar
			      </a>
			      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
			        <a class="dropdown-item" href="adm_listar_usuarios.php">Listar Usuários</a>
			        <a class="dropdown-item" href="adm_listar_administradores.php">Listar Administradores<span class="sr-only">(current)</span></a>
			      </div>
			  </li>
		      <li class="nav-item">
		      	<a class="nav-link" href="index.php"><?php echo "Usuário Logado: ".$_SESSION['nome']?></a>
		      </li>
		    </ul>
		  </div>
  			<ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
			    <li class="nav-item dropdown">
			      <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Menu
			      </a>
			      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
			        <a class="dropdown-item" href="index.php">Home</a>
			        <div class="dropdown-divider"></div>
			        <a class="dropdown-item" href="#">Cadastrar</a>
			        <a class="dropdown-item" href="adm_listar_usuarios.php">Listar Usuários</a>
			        <a class="dropdown-item" href="adm_listar_administradores.php">Listar Administradores</a>
			        <div class="dropdown-divider"></div>
			        <a class="dropdown-item" href="_config/sair.php">Sair</a>
			      </div>
			    </li>
			</ul>
		</nav>
	</header>
		<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Cadastrar Usuário</h1>
			<h4> As Informações pedidas nos campos que contém o símbolo de asterisco (*) são obrigatório.</h4>
		</div>
		<form class="form-horizontal" method="POST" action="_executa/executa_cadastrar.php" enctype="multipart/from-data">
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputNome">* Nome:</label>
				<div class="col-sm-10">
					<input type="text" name="nome" class="form-control" id="inputNome" required placeholder="Nome Completo">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputSexo">*Sexo</label>
				<div class="col-sm-10">
					<select class="form-control" name="sexo" id="inputSexo" required>
						<option value="F"> Feminino</option>
						<option value="M"> Masculino</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputDataNasc">* Data de Nascimento</label>
				<div class="col-sm-10">
					<input type="date" name="data_nascimento" class="form-control" id="inputDataNasc" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputTelefone" >* Telefone</label>
				<div class="col-sm-10"> 
					<input type="tel" name="telefone" id="inputTelefone" class="form-control" required placeholder="Digite o seu Telefone">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputEmail">* Email</label>
				<div class="col-sm-10">
					<input type="email" name="email" id="inputEmail" class="form-control" required placeholder="Digite o seu Email">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputSenha">* Senha</label>
				<div class="col-sm-10">
					<input type="text" name="senha" id="inputSenha" class="form-control" required placeholder="Insira a sua Senha">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputChaveCad">* Chave De Cadastro</label>
				<div class="col-sm-10">
					<input type="text" name="chave_de_cadastro" id="inputChaveCad" class="form-control" required placeholder="Insira a Chave de Cadastro">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputNivelUsuario" >* Nível do Usuário</label>
				<div class="col-sm-10">
					<select class="form-control" name="nivel_user_id" id="inputNivelUsuario" required>
						<option value="1">1 - Usuário</option>
						<option value="2">2 - Administrador</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputSitUsuario">* Situação Usuário</label>
				<div class="col-sm-10">
					<select class="form-control" name="situacao_usuario_id" id="inputSitUsuario" required>
						<option value="0"> 0 - Desativado</option>
						<option value="1"> 1 - Ativado</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputEndereco">Endereço</label>
				<div class="col-sm-10">
					<input type="text" name="endereco" class="form-control" id="inputEndereco" placeholder="Digite o seu Endereço">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputBairro">Bairro</label>
				<div class="col-sm-10">
					<input type="text" name="bairro" class="form-control" id="inputBairro" placeholder="Digite o seu Bairro">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputCidade">Cidade</label>
				<div class="col-sm-10">
					<input type="text" name="cidade" class="form-control" id="inputCidade" placeholder="Digite a sua Cidade">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputUf">UF</label>
				<div class="col-sm-10">
					<input type="text" name="uf" class="form-control" id="inputUf" placeholder="Digite a sua Unidade da Ferderação">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-12">
					<button type="submit" class="btn btn-success">Enviar e Salvar</button>
					<a href="index.php"><button type="button" class="btn btn-info">Voltar a Página Inicial do Administrador</button></a>
				</div>
			</div>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>