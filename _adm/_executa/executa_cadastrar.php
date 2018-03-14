<?php
	//echo "Página de execução do cadastrar";
	include_once("../_config/conexao.php");

	$nome = $_POST['nome'];
	$sexo = $_POST['sexo'];
	$data_nascimento = $_POST['data_nascimento'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$chave_de_cadastro = $_POST['chave_de_cadastro'];
	$nivel_user_id = $_POST['nivel_user_id'];
	$situacao_usuario_id = $_POST['situacao_usuario_id'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];

	mysqli_query($conn,"INSERT INTO usuarios(
		nome,sexo,data_nascimento,telefone,email,senha,chave_de_cadastro,nivel_user_id,situacao_usuario_id,endereco,bairro,cidade,uf,criacao) VALUES ('$nome','$sexo','$data_nascimento','$telefone','$email','$senha','$chave_de_cadastro','$nivel_user_id','$situacao_usuario_id','$endereco','$bairro','$cidade','$uf',NOW())");

	if (mysqli_affected_rows($conn) != 0) {
		echo "<script>
		alert('Dados Inseridos com sucesso!');
		window.location.href='http://localhost:8080/_adm/index.php';
		</script>";
	}else{
		echo "<script>
		alert('Erro!');
		window.location.href='http://localhost:8080/_adm/index.php';
		</script>";
	}
?>
