<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "bdlss#1917";
	$dbname = "banco_de_dados";

	$conn = mysqli_connect($servidor,$usuario,$senha,$dbname);
	if (!$conn) {
		die("Falha Na Conexão ".mysqli_connect_error());
	}else{
		//echo "Conexão Bem Sucedida!!!";
	}

?>