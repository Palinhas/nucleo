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
    <link href="../css/signin2.css" rel="stylesheet">
  
  <title>Login | Site oficial do Núcleo do Sporting Clube de portugal de Campo Maior</title>
  </head>
  <body class="body">
 <nav class="navbar navbar-dark bg-dark fixed-top justify-content-end nav1">
       <ul class="nav">         
         <a style="font-size: 20px;" href="https://www.facebook.com/Nucleo-Sportinguista-de-Campo-Maior-122434427835725/" target="_blank" class="text-white fa fa-facebook col-2"></a>       
         <a style="font-size: 20px;" href="index.html" target="_blank" class="text-white fa fa-instagram col-2"></a>
         <a style="font-size: 20px;" href="index.html" target="_blank" class="text-white fa fa-youtube-play col-2"></a> 
      </ul>
  </nav>
 
      <nav class="navbar navbar-light fixed-top nav2">
          <div class="mobile-hide-txt">
            <span class="txt-head">Site oficial do Núcleo do Sporting Clube de Portugal de Campo Maior</span>
          </div>
              <div class="mobile-hide-login login">
                <a href="../login.php" class="btn button btn-sm btn-warning">Login/registar</a>
              </div>
      </nav>

          <!-- metaMenu -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top navmenu">
      <div class="scpLogo">
      <h1>
        <a href="../index.html" title="SPORTING CP">SPORTING CP</a>
      </h1>
    </div>
    <!-- Use any element to open the sidenav -->
  <div class="desktop-hide mobilemenu">
    <a style="font-size: 48px;" type="button" class="fa fa-bars" onclick="openNav()"></a>
  </div>
  </div>
  <div class=" mobile-hide-menu collapse navbar-collapse">
    <ul class="navbar-nav topnav topnavloc" style="">
      <li class="nav-item">
        <a class="nav-link text-white" href="../index.html">INICIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../blog.html">BLOG</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../museu.html">MÚSEU</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../multimedia.html">MULTIMÉDIA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../historia.html">HISTÓRIA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../socios.html">SÓCIOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../quemsomos.html">QUÊM SOMOS</a>
      </li>
    </ul>
</nav>

 <div id="mySidenav" class="sidenav sidenavposition">
  <a href="../javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="../index.html">INICIO</a>
  <a href="../blog.html">BLOG</a>
  <a href="../museu.html">MÚSEU</a>
  <a href="../multimedia.html">MULTIMÉDIA</a>
  <a href="../historia.html">HISTÓRIA</a>
  <a href="../socios.html">SÓCIOS</a>
  <a href="../quemsomos.html">QUÊM SOMOS</a>
</div>


<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main" class="topbody mb-3">        
  
  <br><div class="container" style="padding-top: 30px;"> 
        <div class="row">
          <div class="col-12 text-center">      
              <p class="display-4">Login</p>
          </div>
        </div>
      </div>
    <form class="form-signin" method="post" action="valida.php">
      <hr>
      <h1 class="h3 mb-3 font-weight-normal"></h1>
      <div class="mb-3">
      <?php

          if(isset($_SESSION['msg'])){
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
          }
          if(isset($_SESSION['msgreg'])){
              echo $_SESSION['msgreg'];
              unset($_SESSION['msgreg']);
          }
      ?>
      </div>
      <label class="sr-only">Usuário</label>
      <input type="text" name="usuario" class="form-control" placeholder="Escrever o Usuário" required autofocus>
      <br>
      <label class="sr-only">Password</label>
      <input type="password" name="senha" class="form-control" placeholder="Escrever a Password" required>
      
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembr-me
        </label>
      </div>
      <input style="width: 100%;" class="btn btn-success" type="submit" name="btnLogin" value="Login"></input>
      <hr>
      <span>Ainda não tem registo?</span> <a style="font-color: #000000" href="registar_usuario.php">Registe-se aqui !</a>
    </form>
</div>

              <!-- footer -->
<footer>
    <nav class="navbar navbar-dark bg-dark justify-content-center footer1">
       <ul class="mobile-hide-bottom">         
         <a  href="webmaster.html" class="footer-link col-1 text-white">Webmaster</a>       
         <a href="index.html" class="footer-link col-1 text-white">Contactos</a>
         <a href="index.html" class="footer-link col-1 text-white">Ajuda</a> 
         <a href="index.html" class="footer-link col-1 text-white">Termos e condições</a>
         <a href="index.html" class="footer-link col-1 text-white">Politica de privacidade</a>        
     </ul>
    </nav>
    <nav class="navbar navbar-dark bg-dark justify-content-center footer2">
         <ul>         
           <a style="font-size: 18px;" href="https://www.facebook.com/Nucleo-Sportinguista-de-Campo-Maior-122434427835725/" target="_blank" class=" text-white fa fa-facebook col-2 text-white"></a>       
           <a style="font-size: 18px;" href="index.html" target="_blank" class="text-white fa fa-instagram col-2"></a>
           <a style="font-size: 18px;" href="index.html" target="_blank" class="text-white fa fa-youtube-play col-2"></a>
        </ul>
    </nav>
    <nav class="navbar navbar-dark bg-dark justify-content-center footer3" style="">
         <ul>         
            <p class="text-secondary text-center">
                2018@ Núcleo do Sporting Clube de Portugal, Todos os direitos reservados
            </p>
        </ul>
    </nav>
</footer>
</footer>

</div> 

<script>
/* Open the sidenav */
function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

/* Close/hide the sidenav */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
} 
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
