<?php
if(!isset($seguranca_user)){
   exit;
}//isso caso a pessoa acesse de forma direta.
function seguranca_user(){
	if ((isset($_SESSION['email'])) AND (isset($_SESSION['nivel_user_id']))){
		//echo "Permanecer logado";
	}else{
		//echo "Retirar o usuário do ADM";
		include_once("_config_user/config.php");
		$_SESSION['msg2'] = "<div class='alert alert-danger'>Acesso Negado do Usuário !!!</br>Para acessar esta página é necessário estar logado com um usuário cadastrado e com as devidas permissões de acesso.</div>";
		$url_destino = pg."/login.php";
		header("Location: $url_destino");
	}
}