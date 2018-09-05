<?php  
session_start();
ob_start();
include_once 'conexao.php';

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

      <!-- Sweetalert2 CSS -->
      <script src="../js/sweetalert2.min.js"></script>
      <link rel="stylesheet" href="../css/sweetalert2.min.css">

    <!-- Custom styles for this template -->
    <link href="../css/signin2.css" rel="stylesheet">
  
  <title>Registar | Site oficial do Núcleo do Sporting Clube de portugal de Campo Maior</title>
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
  
   <!-- Mini menu -->

 <div class="row container-fluid" style="display: flex;">
<div class="col" style="flex: 0%; float: left; margin-top: 120px;">
<div class="list-group" style="">
  <a href="#" class="list-group-item list-group-item-action list-group-item-success">Informação para sócios</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-link">
    <p>Querido sócio o teu registo é importante, com o teu registo ajudas o núcleo a ter os teus dados sempre atualizados, dessa forma podes consultar todo o tipo de conteudo de relevância sobre o núcleo.</p>
    <p>Para validares o teu registo o teu nome têm de coincidir com o teu numero de sócio na nossa base de dados, caso contrario não vai ser possivel efetuares o teu registo.</p>
  </a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-success">Obrigádo pela tua colaboração.</a>
</div>
  </div>
              <!-- Corpo -->

  <div class="col mb-3" style="flex: 40%; float: left;">
    <div class="mt-3"">
      <span class="display-3">Registar</span><hr>
        <span id="mensagemRegisto"></span>
          <?php
                    
          if(isset($_SESSION['msgreg'])){
              echo $_SESSION['msgreg'];
              unset($_SESSION['msgreg']);
          }
      ?>
    </div>
      <form class="needs-validation" novalidate>

      <div class="form-row">
        <div class="form-group col-md-9">
          <label for="nome">Nome Completo</label>
          <input type="text" class="form-control active" id="nome" placeholder="Nome Completo" value="" required>
        </div>
        <div class="form-group col-md-3">
            <label for="socio">Número Sócio Núcleo</label>
              <input type="text" class="form-control" id="socio" placeholder="Número de Sócio" value="" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-12">
            <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
            <label for="senha">Password</label>
           <input type="password" class="form-control" name="senha" id="senha" placeholder="Password" required>
            <span id="mensagemsenha"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="senhac">Confirmar Password</label>
             <input type="password" class="form-control" name="senhac" id="senhac" placeholder="Password" required>
        </div>
        </div><br>

          <input type="hidden" estado="estado" id="estado" placeholder="0" >
       <button style="width: 100%;" class="btn btn-success btn-sm ml-lg-2" id="btnRegistar" >Efetuar Registo</button>
    </form><hr>
    <span>Já possui um registo ? </span> <a class="" href="login.php">Login aqui !</a>
  </div>
</div> 

              <!-- footer -->
<footer>
    <nav class="navbar navbar-dark bg-dark justify-content-center footer1">
       <ul class="mobile-hide-bottom">         
         <a  href="../webmaster.html" class="footer-link col-1 text-white">Webmaster</a>       
         <a href="../index.html" class="footer-link col-1 text-white">Contactos</a>
         <a href="../index.html" class="footer-link col-1 text-white">Ajuda</a> 
         <a href="../index.html" class="footer-link col-1 text-white">Termos e condições</a>
         <a href="../index.html" class="footer-link col-1 text-white">Politica de privacidade</a>        
     </ul>
    </nav>
    <nav class="navbar navbar-dark bg-dark justify-content-center footer2">
         <ul>         
           <a style="font-size: 18px;" href="https://www.facebook.com/Nucleo-Sportinguista-de-Campo-Maior-122434427835725/" target="_blank" class=" text-white fa fa-facebook col-2 text-white"></a>       
           <a style="font-size: 18px;" href="../index.html" target="_blank" class="text-white fa fa-instagram col-2"></a>
           <a style="font-size: 18px;" href="../index.html" target="_blank" class="text-white fa fa-youtube-play col-2"></a>
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

</body>

<!-- Optional JavaScript -->

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

<script src="../bootstrap-validate/dist/bootstrap-validate.js"></script>

  <script>
      bootstrapValidate('#nome', 'min:3:Minimo 10 Caracteres!')
      bootstrapValidate('#nome', 'required:<b>Campo Obrigatório!</b>')

      bootstrapValidate('#socio', 'numeric:10:Não são permitidas letras!')
      bootstrapValidate('#socio', 'required:<b>Campo Obrigatório!</b>')

      bootstrapValidate('#email', 'email:Insira um e-mail válido')
      bootstrapValidate('#email', 'required:<b>Campo Obrigatório!</b>')

      bootstrapValidate('#senha', 'min:8:Minimo 8 Caracteres!')
      bootstrapValidate('#senha', 'required:<b>Campo Obrigatório!</b>')

      bootstrapValidate('#senhac', 'matches:#senha:A password não coincide')
      bootstrapValidate('#senhac', 'required:<b>Campo Obrigatório!</b>')


  </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="../js/polyfill.min.js"></script>

</html>
