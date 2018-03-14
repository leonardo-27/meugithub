<?php
	//echo "Página do código de edição";
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

	//echo "$id";

	mysqli_query($conn,"UPDATE usuarios set nome='$nome', sexo = '$sexo', data_nascimento = '$data_nascimento',telefone = '$telefone',email = '$email',senha = '$senha', chave_de_cadastro = '$chave_de_cadastro', nivel_user_id = '$nivel_user_id', situacao_usuario_id = '$situacao_usuario_id', endereco = '$endereco', bairro = '$bairro', cidade = '$cidade', uf = '$uf', modificacao = NOW() WHERE id = '$id'");

	if (mysqli_affected_rows($conn) != 0) {
		echo "<script>
		alert('Dados Editados com sucesso!');
		window.location.href='http://localhost:8080/_adm/index.php';
		</script>";
	}else{
		echo "<script>
		alert('Erro!');
		window.location.href='http://localhost:8080/_adm/index.php';
		</script>";
	}
?>	
