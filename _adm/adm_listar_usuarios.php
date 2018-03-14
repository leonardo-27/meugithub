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
	<title>Administrador - Listar Usuários</title>

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
		        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
		      <li class="nav-item">
		      	<a class="nav-link" href="adm_cadastrar.php">Cadastrar</a>
		      </li>
		      <li class="nav-item dropdown">
			      <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Listar
			      </a>
			      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
			        <a class="dropdown-item" href="#">Listar Usuários<span class="sr-only">(current)</span></a>
			        <a class="dropdown-item" href="adm_listar_administradores.php">Listar Administradores</a>
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
			        <a class="dropdown-item" href="#">Listar Usuários</a>
			        <a class="dropdown-item" href="adm_listar_administradores.php">Listar Administradores</a>
			        <div class="dropdown-divider"></div>
			        <a class="dropdown-item" href="_config/sair.php">Sair</a>
			      </div>
			    </li>
			</ul>
		</nav>
	</header>
	<body>
		<?php
			$result_usuarios = "SELECT * FROM usuarios WHERE nivel_user_id = 1";
			$resultado_usuarios = mysqli_query($conn, $result_usuarios);
		?>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Lista de Usuários</h1>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th class="text-center">Id</th>
								<th class="text-center">Nome</th>
								<th class="text-center">Email</th>
								<th class="text-center">Chave de Cadastro</th>
								<th class="text-center">Nível Acesso</th>
								<th class="text-center">Situação Usuário</th>
								<th class="text-center">Data de Criação</th>
								<th class="text-center">Data de Modificação</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row_usuarios = mysqli_fetch_assoc($resultado_usuarios)){?>
								<tr>
									<td class="text-center"><?php echo $row_usuarios['id'] ; ?></td>
									<td class="text-center"><?php echo $row_usuarios['nome'] ?></td>
									<td class="text-center"><?php echo $row_usuarios['email']; ?></td>
									<td class="text-center"><?php echo $row_usuarios['chave_de_cadastro']; ?></td>
									<td class="text-center"><?php echo $row_usuarios['nivel_user_id']; ?></td>
									<td class="text-center"><?php echo $row_usuarios['situacao_usuario_id']; ?></td>
									<td class="text-center"><?php echo $row_usuarios['criacao']; ?></td>
									<td class="text-center"><?php echo $row_usuarios['modificacao']; ?></td>
									<td class="text-center">
										<a href="adm_visualizar.php?&id=<?php echo $row_usuarios['id']; ?>"
										<button type="button" class="btn btn-sm btn-info">Vizualizar <br>todos os dados </br> deste Usuário</button></a>
									</td>
									<td>
										<a href="adm_editar.php?&id=<?php echo $row_usuarios['id']; ?>"
										<button type="button" class="btn btn-sm btn-warning">Editar <br>este Usuário</button></a>
									</td>
									<td>
										<a href="adm_excluir.php?&id=<?php echo $row_usuarios['id']; ?>"
										<button type="button" class="btn btn-sm btn-danger">Excluir <br>este Usuário</button></a>
								</tr>
							<?php }?>	
						</tbody>
					</table>	
				</div>
			</div>
		</div>
	</body>

	<!--JavaScript CDN-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>