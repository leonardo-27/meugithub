<?php
session_start();
	//echo "Código para a Exclusão.";
	include_once("../_config/conexao.php");

	$id = $_POST['id'];
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
	$criacao = $_POST['criacao'];
	$modificacao = $_POST['modificacao'];

	mysqli_query($conn,"DELETE FROM usuarios WHERE id='$id'");

	if (mysqli_affected_rows($conn) !=0) {
		echo "<script>
		alert('Dado Excluido com Sucesso !!!');
		window.location.href='http://localhost:8080/_adm/index.php';
		</script>";
	}else{
		echo "<script>
		alert('Erro!');
		window.location.href='http://localhost:8080/_adm/index.php';
		</script>";
	}

?>