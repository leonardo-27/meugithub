<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="_css/signin.css" rel="stylesheet">
  </head>

  <body>
    <div class="container">
        <?php
          if (isset($_SESSION['msg2'])) {
              echo $_SESSION['msg2'];
              unset($_SESSION['msg2']);
          }
        ?>
      <form class="form-signin" method="POST" action="valida_login.php">
        <h2 class="form-signin-heading">Área Restrita - Login </h2>
        <?php
          if (isset($_SESSION['msg'])) {
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
          }
        ?>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Digite o seu Email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Digite a sua Senha" required>
        <button class="btn btn-lg btn-primary btn-block" name="btnLogin" value="Acessar" type="submit">Entrar</button>
      </form>
    </div> <!-- /container -->
  </body>
</html>