<?php  
session_start();
?>
<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site oficial do Núcleo do Sporting Clube de Portugal de Campo Maior">
    <meta name="author" content="carlosserranobicho@sapo.pt">
    <link rel="icon" type="image/png" href="../assets/imagens/favicon/favicon-16x16.png" "="" sizes="16x16">
    <link rel="icon" type="image/png" href="../assets/imagens/favicon/favicon-32x32.png" "="" sizes="32x32">
    <link rel="icon" type="image/png" href="../assets/imagens/favicon/favicon-96x96.png" "="" sizes="96x96">
    <link rel="icon" type="image/png" href="../assets/imagens/favicon/favicon-192x192.png" "="" sizes="192x192">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/body_site.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  
  <title>Login Admin | Site oficial do Núcleo do Sporting Clube de portugal de Campo Maior</title>
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="valida.php">
      <img class="mb-4" src="../assets/imagens/logo/svg/logosvg.svg" alt="" width="150" height="180">
      
      <h1 class="h3 mb-3 font-weight-normal"></h1>
      <div class="mb-3">
      <?php  
          if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
          }
      ?>
      </div>
      <label class="sr-only">Usuário</label>
      <input type="text" name="usuario" class="form-control" placeholder="Escrever o Usuário" required autofocus>
      
      <label class="sr-only">Password</label>
      <input type="password" name="senha" class="form-control" placeholder="Escrever a Password" required>
      
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembr-me
        </label>
      </div>
      <input class="btn btn-success" type="submit" name="btnLogin" value="Login"></input>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>