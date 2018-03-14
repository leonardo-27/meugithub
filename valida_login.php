<?php
session_start();
	include_once("_adm/_config/conexao.php");
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	echo "$email - $senha <br>";
	if ((!empty($email)) AND (!empty($senha))) {
		$result_usuario = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
		$resultado_usuario = mysqli_query($conn,$result_usuario);
		if ($resultado_usuario) {
			$row_usuario = mysqli_fetch_assoc($resultado_usuario);
			if (password_verify($senha,$row_usuario['senha'])) {
				echo "Senha Válida: ".$row_usuario['email'];
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				$_SESSION['nivel_user_id'] = $row_usuario['nivel_user_id'];
				$_SESSION['situacao_usuario_id'] = $row_usuario['situacao_usuario_id'];
				//header("Location:adm/index.php");
				//echo "<br>Usuário Existe";
				if ($row_usuario['situacao_usuario_id'] == 0) {
					$_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>Sua Conta está Desativada !!!<br> Contate o administrador para reativa-la.</div>";
					header("Location: login.php");
				}else{
					if ($row_usuario['nivel_user_id'] == 1) {
						//echo "<br> Logado na Página de Usuário";
						header("Location:_user/index.php");
					}elseif ($row_usuario['nivel_user_id'] == 2) {
						//echo "<br> Logado na Página de Administrador";
						header("Location:_adm/index.php");
					}
				}
			} else{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'> Email ou Senha Incorretos!!!<br>Tente novamente.</div>";
				header("Location: login.php");
			}
		}
	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Login Incorreto 01 !!!</div>";
		header("Location: login.php");
	}
?>