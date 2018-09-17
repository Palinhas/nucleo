<?php
session_start();
mb_internal_encoding('UTF-8');
?>
<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site oficial do Núcleo do Sporting Clube de Portugal de Campo Maior">
    <meta name="author" content="carlosserranobicho@sapo.pt">
    <link rel="icon" type="image/png" href="assets/imagens/favicon/favicon-16x16.png" "="" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/imagens/favicon/favicon-32x32.png" "="" sizes="32x32">
    <link rel="icon" type="image/png" href="assets/imagens/favicon/favicon-96x96.png" "="" sizes="96x96">
    <link rel="icon" type="image/png" href="assets/imagens/favicon/favicon-192x192.png" "="" sizes="192x192">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/body_site.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <title>MUSEU | Site oficial do Núcleo do Sporting Clube de portugal de Campo Maior</title>
  </head>
  <body class="body">
 <nav class="navbar navbar-dark bg-dark fixed-top justify-content-end nav1">
       <ul class="nav">         
         <a style="font-size: 20px;" href="https://www.facebook.com/Nucleo-Sportinguista-de-Campo-Maior-122434427835725/" target="_blank" class="text-white fa fa-facebook col-2"></a>       
         <a style="font-size: 20px;" href="index.php" target="_blank" class="text-white fa fa-instagram col-2"></a>
         <a style="font-size: 20px;" href="index.php" target="_blank" class="text-white fa fa-youtube-play col-2"></a>
      </ul>
  </nav>

 <nav class="navbar navbar-light fixed-top nav2">
     <div class="">
         <span class="txt-head mobile-hide-txt">Site oficial do Núcleo do Sporting Clube de Portugal de Campo Maior</span>
     </div>
     <div class="login mobile-hide-login">
         <?php
         if(!empty($_SESSION['id'])){?>
         <li class="navbar-brand"><i class="fa fa-user-secret"></i>
             <span class="social-mini" ><?php echo $_SESSION['nome'];?></span>
             <?php
             echo "<a style='font-size: small' class='btn badge badge-success ml-2 social-mini' role='button' aria-pressed='true' href='perfil/sair.php'>Sair</a>";
             }elseif (empty($_SESSION['id'])){?>
                 <div class="mobile-hide-login login">
                     <a href="perfil/login.php" class="btn button btn-sm btn-warning">Login/registar</a>

                 </div>
             <?php }?>

         </li>
     </div>
 </nav>

          <!-- metaMenu -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top navmenu">
      <div class="scpLogo">
      <h1>
        <a href="index.php" title="SPORTING CP">SPORTING CP</a>
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
        <a class="nav-link text-white" href="index.php">INICIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="blog.php">BLOG</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="museu.php">MÚSEU</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="multimedia.php">MULTIMÉDIA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="historia.php">HISTÓRIA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="socios.php">SÓCIOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="quemsomos.php">QUÊM SOMOS</a>
      </li>
    </ul>
</nav>

 <div id="mySidenav" class="sidenav sidenavposition">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">INICIO</a>
  <a href="blog.php">BLOG</a>
  <a href="museu.php">MÚSEU</a>
  <a href="multimedia.php">MULTIMÉDIA</a>
  <a href="historia.php">HISTÓRIA</a>
  <a href="socios.php">SÓCIOS</a>
  <a href="quemsomos.php">QUÊM SOMOS</a>
</div>


<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main" class="topbody">


<div class="container"> 
    <div class="row">
            <div class="col-sm-4 mt-5">      
              <div class="card">
                <img class="card-img-top" src="\nucleo\src\assets\imagens\perfil\webmaster\carlos.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><dt>Webmaster</dt></h5>Carlos Bicho<hr>
                  <p class="card-text">Sócio 88, Núcleo Sportinguista de Campo Maior.</p> 
                  <p class="card-text">Sócio Efetivo A do Sporting clube de Portugal.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-8 mt-5 mb-3">
                <div class="card">
                  <div class="card-body">
                   <h5 class="card-title"><dt>Mensagem do webmaster</dt></h5><hr>                   
                    <p>A técnologia faz cada vez mais parte das nossas vidas, quer no foro profissional como na nossa vida particular.</p>
                    <p>A criação da plataforma digital do Núcleo Sportinguista de Campo Maior surgiu da necessidade da modernização da imagem de Marketing do núcleo, numa tentativa de chegar ao maior número de pessoas possivel surgiu a ideia da criação de um website do Núcleo Sportinguista de Campo Maior, que acredito que seja a forma mais rápida e eficaz de dar a conhecer na sua plenitude os objetivos e a historia do núcleo.</p>
                    <p>As plataformas online são possivelmente a melhor forma de divulgar e preservar a história do núcleo, tendo em conta as vastas possibilidades que este recurso nos permite é fundamental a criação de este web site e a sua preservação para que a história do núcleo não possa cair no esquecimento.</p>
                    <p>Possivelmente a motivação maior de este projeto foi a de preservação da hístoria do Núcleo, no presente existe um risco eleveado em que Hisória do núcleo possoa cair no esquecimento, é inpensável que os grande momentos históricos do núcleo desaparessam com as pessoas.</p>
                    <p>Numa primeira fase vai ser feito um trabalho de investigação e recolha de conteudo multimédia com a intenção de alimentar uma cronologia no tempo até á presente dáta.</p>
                    <p>Numa segunda fase vai ser criada a plataforma digital de logística do núcleo, com a finalidade de dar aos sócios um acesso fácil à toda a informação de relevo do núcleo, com base na transparência e lealdade. </p>
                    <p>Numa Terçeira fase vai ser criado a plataforma de logistica e interação com a plataforma dos sócios, para poderem gerir a regularização das cotas, consulta de tesouraria e logística do núcleo.</p><hr>
                    <p class="card-text"><small class="text-muted">Campo Maior, 12 de Abril de 2018</small></p>
                      <button type="button" onclick="displayCookies()">Display All Cookies</button>
                  </div>
                </div>
            </div>
            
      </div>
  </div>


                  <!-- footer -->
<footer>
    <nav class="navbar navbar-dark bg-dark justify-content-center footer1">
       <ul class="mobile-hide-bottom">         
         <a href="webmaster.php" class="footer-link col-1 text-white">Webmaster</a>
         <a href="index.php" class="footer-link col-1 text-white">Contactos</a>
         <a href="index.php" class="footer-link col-1 text-white">Ajuda</a>
         <a href="index.php" class="footer-link col-1 text-white">Termos e condições</a>
         <a href="index.php" class="footer-link col-1 text-white">Politica de privacidade</a>
     </ul>
    </nav>
    <nav class="navbar navbar-dark bg-dark justify-content-center footer2">
         <ul>         
           <a style="font-size: 18px;" href="https://www.facebook.com/Nucleo-Sportinguista-de-Campo-Maior-122434427835725/" target="_blank" class=" text-white fa fa-facebook col-2 text-white"></a>       
           <a style="font-size: 18px;" href="index.php" target="_blank" class="text-white fa fa-instagram col-2"></a>
           <a style="font-size: 18px;" href="index.php" target="_blank" class="text-white fa fa-youtube-play col-2"></a>
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
     function checkCookie() {
         var username = getCookie("username");
         if (username != "") {
             alert("Welcome again " + username);
         } else {
             username = prompt("Please enter your name:", "");
             if (username != "" && username != null) {
                 setCookie("username", username, 365);
             }
         }
     }
 </script>

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
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>