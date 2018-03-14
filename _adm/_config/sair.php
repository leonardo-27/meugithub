<?php
session_start();
//session_destroy();
unset($_SESSION['id'],$_SESSION['nome'],$_SESSION['email'],$_SESSION['nivel_user_id'],$_SESSION['situacoes_usuarios_id']);
$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Usuário Deslogado com Sucesso</div>";

header("Location: ../../login.php");
