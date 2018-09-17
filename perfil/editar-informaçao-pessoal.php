<?php  
session_start();
include_once("conexao.php");

      $id = $_SESSION['id'];
      $result_usuario = "SELECT * FROM usuarios WHERE id='$id' ORDER BY id ASC";
      $resultado_usuario = mysqli_query($conn, $result_usuario); 
      $row_usuario = mysqli_fetch_array($resultado_usuario); 
      
      $socio = $row_usuario['socio'];
      $result_socio = "SELECT * FROM socios WHERE socio='$socio' ORDER BY id ASC";
      $resultado_socio = mysqli_query($conn, $result_socio);
      $row_socio = mysqli_fetch_array($resultado_socio);

      $opcao = 0;
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
  
  <title>Site oficial do Núcleo do Sporting Clube de portugal de Campo Maior</title>
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
          <div class="">
            <span class="txt-head mobile-hide-txt">Site oficial do Núcleo do Sporting Clube de Portugal de Campo Maior</span>
          </div>
              <div class="login mobile-hide-login">
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

<nav class="navbar navbar-expand-lg navbar-light fixed-top navmenu">
      <div class="scpLogo">
      <h1>
        <a href="index.html" title="SPORTING CP">SPORTING CP</a>
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
        <a class="nav-link text-white" href="index.html">INICIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="blog.html">BLOG</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="museu.html">MÚSEU</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="multimedia.html">MULTIMÉDIA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="historia.html">HISTÓRIA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="socios.html">SÓCIOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="quemsomos.html">QUÊM SOMOS</a>
      </li>
    </ul>
</nav>

 <div id="mySidenav" class="sidenav sidenavposition">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.html">INICIO</a>
  <a href="blog.html">BLOG</a>
  <a href="museu.html">MÚSEU</a>
  <a href="multimedia.html">MULTIMÉDIA</a>
  <a href="historia.html">HISTÓRIA</a>
  <a href="socios.html">SÓCIOS</a>
  <a href="quemsomos.html">QUÊM SOMOS</a>
</div>

      <nav class="navbar navbar-light navbar-dark bg-dark" style="margin-top: 152px; height: 220px; border-bottom: #343a90 solid 4px;">
          <div>

          </div>

        </nav>

 <div id="mySidenav" class="sidenav sidenavposition">
  <a href="../javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="../index.php">INICIO</a>
  <a href="../blog.php">BLOG</a>
  <a href="../museu.php">MÚSEU</a>
  <a href="../multimedia.php">MULTIMÉDIA</a>
  <a href="../historia.php">HISTÓRIA</a>
  <a href="../socios.php">SÓCIOS</a>
  <a href="../quemsomos.php">QUÊM SOMOS</a>
</div>

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main" class="mb-3 container">
              <!-- Corpo -->

<div class="row bg-faded" style="margin-top: 10px;">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="list-group-item list-group-item-action list-group-item-secondary active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
      <a class="list-group-item list-group-item-action list-group-item-secondary" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Perfil</a>
      <a class="list-group-item list-group-item-action list-group-item-secondary" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
      <a class="list-group-item list-group-item-action list-group-item-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
    </div>
  </div>
  <?php
              if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
              }
?>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">

      <!-- Inicio de home -->
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

        
      </div> <!-- Final de Home -->

  
      <!-- Inicio de Perfil -->
<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

  <form class=" p-4 mb-5" method="POST" action="">     
    <h1 class="display-6">INFORMAÇÃO PESSOAL</h1> 
  <hr> 
  <dl class="row">
  <dt class="col-sm-3">Informação de Registo</dt>
  <dd class="col-sm-9">
    
    <div class="form-row">
      <div class="form-group col-md-12">
        <label>Nome: </label>
        <input readonly="true" type="text" name="segmento" class="form-control" placeholder="" value="<?php echo $row_usuario['nome']; ?>">
      </div>
    </div>
    <div class="form-row">  
      <div class="form-group col-md-12">
        <label>E-mail: </label>
        <input readonly="true"  type="text" name="ncliente" class="form-control" placeholder="" value="<?php echo $row_usuario['email']; ?>">
      </div>
    </div>
    <div class="form-row">  
      <div class="form-group col-md-6">
        <label>Usuario: </label>
        <input readonly="true"  type="text" name="nif" class="form-control" placeholder="" value="<?php echo $row_usuario['usuario']; ?>">
      </div>
      <div class="form-group col-md-6">
        <label>Password: </label>
        <input readonly="true"  type="" name="nif" class="form-control" placeholder="" value="********">
      </div>
    </div>
   
   <!-- Inputs -->

<input class="btn btn-secondary btn-sm ml-lg-2" type="submit" value="Editar"> 
   
</form>



  <form class=" p-4 mb-5" method="POST" action="">     
    <h1 class="display-6">INFORMAÇÃO PESSOAL</h1> 
    <?php  
      if (isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        }
    ?> <hr> 
  <dl class="row">
  <dt class="col-sm-3">Informação de Registo</dt>
  <dd class="col-sm-9">
    
    <div class="form-row">
      <div class="form-group col-md-12">
        <label>Nome: </label>
        <input type="text" name="segmento" class="form-control" placeholder="" value="<?php echo $row_usuario['nome']; ?>">
      </div>
    </div>
    <div class="form-row">  
      <div class="form-group col-md-12">
        <label>E-mail: </label>
        <input type="text" name="ncliente" class="form-control" placeholder="" value="<?php echo $row_usuario['email']; ?>">
      </div>
    </div>
    <div class="form-row">  
      <div class="form-group col-md-6">
        <label>Usuario: </label>
        <input type="text" name="nif" class="form-control" placeholder="" value="<?php echo $row_usuario['usuario']; ?>">
      </div>
      <div class="form-group col-md-6">
        <label>Password: </label>
        <input type="" name="nif" class="form-control" placeholder="" value="********">
      </div>
    </div>
   
   <!-- Inputs -->

  <input class="btn btn-success mb-2 btn-sm" role="button" type="submit" value="Validar">
  
  </form>


  </dd>
  </dl>  
  
  </div> <!-- Final de Perfil -->


      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>


      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
    </div>
  </div>
</div>

    
    </div>


<script>
function myFunction() {
$(function(){

   $('button#showit').on('click',function(){  
      $('#EditarShow').show();
   });
});
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
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>
