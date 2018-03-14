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
	<title>Administrador - Editar Dados</title>

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
		      	<a class="nav-link" href="adm_cadastrar.php">Cadastrar</a>
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
			        <a class="dropdown-item" href="adm_cadastrar.php">Cadastrar</a>
			        <a class="dropdown-item" href="adm_listar_usuarios.php">Listar Usuários</a>
			        <a class="dropdown-item" href="adm_listar_administradores.php">Listar Administradores</a>
			        <div class="dropdown-divider"></div>
			        <a class="dropdown-item" href="_config/sair.php">Sair</a>
			      </div>
			    </li>
			</ul>
		</nav>
	</header>
		<?php
			$id = $_GET['id'];
			$result_usuarios = "SELECT * FROM usuarios WHERE id ='$id'LIMIT 1";
			$resultado_usuarios = mysqli_query($conn, $result_usuarios);
			$row_usuarios = mysqli_fetch_assoc($resultado_usuarios);
		?>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Editar Usuário</h1>
			</div>	
			<div class="row">
				<div class="col-md-12">
					<form method="POST" action="_executa/executa_editar.php" enctype="multipart/from-data" >
						<div class="form-group">
							<label for="inputId" class="col-sm-2 col-form-label">Id:</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="id" id="inputId"  readonly value="<?php echo $row_usuarios['id']?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputText" class="col-sm-2 col-form-label">Nome:</label>
							<div class="col-sm-10">
								<input type="text" name="nome" class="form-control" id="inputText"  
								value="<?php echo $row_usuarios['nome']?>">
							</div>					
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputSexo">Sexo:</label>
							<div class="col-sm-10">
							<select class="form-control" name="sexo" id="inputSexo">
								<option value="F"
									<?php
										if ($row_usuarios['sexo'] == 'F') {
											echo 'selected';
										}
									?>
								>Feminino</option>
								<option value="M" 
									<?php
										if ($row_usuarios['sexo'] == 'M') {
											echo 'selected';
										}
									?>
								>Masculino</option>
							</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputDataNasc">Data de Nascimento:</label>
							<div class="col-sm-10">
								<input type="date" name="data_nascimento" class="form-control" id="inputDataNasc"  value="<?php echo $row_usuarios['data_nascimento'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputTelefone" >Telefone:</label>
							<div class="col-sm-10"> 
								<input type="tel" name="telefone" id="inputTelefone" class="form-control"  value="<?php echo $row_usuarios['telefone'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputEmail">Email:</label>
							<div class="col-sm-10">
								<input type="email" name="email" id="inputEmail" class="form-control"  value="<?php echo $row_usuarios['email'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputSenha">Senha:</label>
							<div class="col-sm-10">
								<input type="password" name="senha" id="inputSenha" class="form-control"  value="<?php echo $row_usuarios['senha'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputChaveCad">Chave De Cadastro:</label>
							<div class="col-sm-10">
								<input type="text" name="chave_de_cadastro" id="inputChaveCad" class="form-control"  value="<?php echo $row_usuarios['chave_de_cadastro'];?>">
							</div>
						</div>		
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputNivelUsuario" >Nível do Usuário:</label>
							<div class="col-sm-10">
							<select class="form-control" name="nivel_user_id" id="inputNivelUsuario">
								<option value="1" 
										<?php
											if ($row_usuarios['nivel_user_id'] == 1) {
												echo 'selected';
											}
										?>
								>Usuário</option>
								<option value="2" 
									<?php
										if ($row_usuarios['nivel_user_id'] == 2) {
											echo 'selected';
										}
									?> 
								>Administrador</option>
							</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputSitUsuario">Situação Usuário:</label>
							<div class="col-sm-10">
								<select class="form-control" name="situacao_usuario_id" id="inputSitUsuario">
									<option value="0" 
										<?php
											if ($row_usuarios['situacao_usuario_id'] == 0) {
												echo 'selected';
											}
										?>
									>Desativado</option>
									<option value="1"
										<?php
											if ($row_usuarios['situacao_usuario_id'] == 1) {
												echo 'selected';
											}
										?> 
									>Ativado</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputEndereco">Endereço:</label>
							<div class="col-sm-10">
								<input type="text" name="endereco" class="form-control" id="inputEndereco"  value="<?php echo $row_usuarios['endereco'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputBairro">Bairro:</label>
							<div class="col-sm-10">
								<input type="text" name="bairro" class="form-control" id="inputBairro"  value="<?php echo $row_usuarios['bairro'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputCidade">Cidade:</label>
							<div class="col-sm-10">
								<input type="text" name="cidade" class="form-control" id="inputCidade"  value="<?php echo $row_usuarios['cidade'];?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="inputUf">UF:</label>
							<div class="col-sm-10">
								<input type="text" name="uf" class="form-control" id="inputUf"  value="<?php echo $row_usuarios['uf'];?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-12">
								<button type="submit" class="btn btn-warning">Editar e Salvar as alterações deste Usuário</button>
								<a href="index.php"><button type="button" class="btn btn-info">Voltar a Página Inicial do Administrador</button></a>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	<!--JavaScript CDN-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>