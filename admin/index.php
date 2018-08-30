<?php 
session_start();
include_once("conexao.php"); 
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

    <title>HOME | Site oficial do Núcleo do Sporting Clube de portugal de Campo Maior</title>
  </head>
  <body class="body"> 
      <nav class="navbar navbar-light navbar-dark bg-dark fixed-top" style="height: 60px; margin-top: 0px; float: right;">
          <div>
<?php
              if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
              }
?>
          </div>
            <div class="login">

                <li class="navbar-brand"><i class="fa fa-user-secret"></i>
                  <?php  
                  if(!empty($_SESSION['id'])){
                    echo "".$_SESSION['nome']."";
                    echo "<a class='btn btn-outline-success btn-sm ml-2' role='button' aria-pressed='true' href='sair.php'>Sair</a>";
                  }else{
                    $_SESSION['msg'] = "Área restrita";
                    header("Location: login.php");  
                  }?>
                </li>
            </div>
        </nav>

          <!-- metaMenu -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="margin-top: 60px; height: 62px; background-color: #04b46b; border-bottom: #343a40 solid 4px;">
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
    <ul class="navbar-nav topnavloc">
      <li class="nav-link">
        <a class="text-white" href="index.php"><h5><i class="fa fa-home mr-1"></i>Dashboard</a></h5>
      </li>
      <li class="nav-link">
        <a class="text-white" href="socios.php"><h5><i class="fa fa-users mr-1"></i>Sócios</a></h5>
      </li>
      <!--<li class="nav-link">
       <a class="text-white" href="usuarios.php"><h5><i class="fa fa-user-circle-o mr-1"></i>Usuários</a></h5>
      </li>-->
    </ul>
</nav>

 <div id="mySidenav" class="sidenav sidenavpositionMin">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a class="text-white" href="index.php"><h5><i class="fa fa-home mr-1"></i>Dashboard</a></h5>
  <a class="text-white" href="socios.php"><h5><i class="fa fa-users mr-1"></i>Sócios</a></h5>
  <a class="text-white" href="usuarios.php"><h5><i class="fa fa-user-circle-o mr-1"></i>Usuários</a></h5>
</div>


<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main" class="topbody mb-3">


<div class="row container-fluid" style="display: flex;">
  <div class="col mt-5" style="flex: 0%; float: left;">
    <div class="list-group" style="width: 200px;">
  <a href="index.php" class="list-group-item list-group-item-action list-group-item-success">Dashboard</a> 
  <!-- <a href="inserir_usuarios.php" disable class="list-group-item list-group-item-action">Inserir Usuário</a> -->

</div>
  </div>
            
  <div class="col mb-3" style="flex: 50%; float: left;">
         <!-- Corpo -->
        <div class="row">
          <div class="col-3">
            <h5>Usuários Online</h5>
          <h2> 0</h2>
         </div>
            <div class="col-3">
            <h5>Usuários Registados</h5>
          <h2> 0</h2>
         </div>
        </div><hr><br>
        <div class="row">
          <div class="col-3">
            <h5>Sócios Registados</h5>
          <h2> 0</h2>
         </div>
        </div><hr><br>
        <div class="row">
          <div class="col-3">
            <h5>Administradores Online</h5>
          <h2> 0</h2>
         </div><hr><br>
        </div>
  </div>
 </div>           

              <!-- footer -->
<footer>
    <nav class="navbar navbar-dark bg-dark justify-content-center footer1">
       <ul class="mobile-hide-bottom">         
         
         <p class="text-white text-center">Se precisar de ajuda, pode consultar a <a href="ajuda.html" class="text-white mr-2">Ajuda.</a></p>                       
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
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>