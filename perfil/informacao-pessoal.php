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
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="../index.html">INICIO</a>
  <a href="../blog.html">BLOG</a>
  <a href="../museu.html">MÚSEU</a>
  <a href="../multimedia.html">MULTIMÉDIA</a>
  <a href="../historia.html">HISTÓRIA</a>
  <a href="../socios.html">SÓCIOS</a>
  <a href="../quemsomos.html">QUÊM SOMOS</a>
</div>

      <nav class="navbar navbar-light navbar-dark bg-dark" style="margin-top: 152px; height: 220px; border-bottom: #343a90 solid 4px;">
          <div>

          </div>

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

<div id="main" class="mb-3 container">
              <!-- Corpo -->
<?php
  if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
  }
?>

<div class="row bg-faded" style="margin-top: 10px;">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

      <a class="list-group-item list-group-item-action list-group-item-secondary active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
      <a class="list-group-item list-group-item-action list-group-item-secondary " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Perfil</a>
      <a class="list-group-item list-group-item-action list-group-item-secondary" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
      <a class="list-group-item list-group-item-action list-group-item-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">

      <!-- Inicio de home -->
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
      ... Home ...
        
      </div> <!-- Final de Home -->
  
      <!-- Inicio de Perfil -->

    <div class="tab-pane fade " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

   
  <form class=" p-4 mb-5" method="POST" action="">     
    <h1 class="display-6">INFORMAÇÃO PESSOAL</h1><hr> 
      
      <!-- <span id="mensagem"></span>  -->
     

  <dl class="row">
  <dt class="col-sm-3">Informação de Registo</dt>
  <dd class="col-sm-9">

    <div class="form-row">
      <div class="form-group col-md-12 p-1" style="background-color: #DCDCDC">
        <label><h3><b>Nome: </b></h3></label>
        <h4><?php echo $row_socio['nome']; ?></h4>
      </div>
    </div>
    <div class="form-row">  
      <div class="form-group col-md-6">
        <h5><b>E-mail: </b></h5>
        <span id="mostraEmail"><?php echo $row_usuario['email']; ?></span>
        <!-- Button Editar usuario modal -->
          <button type="button" class="btn btn-link text-success ml-2" data-toggle="modal" data-target="#ModalEditarEmail">Editar</button>
          <left><div id="mensagemEmail"></div></left>
      </div>
      <div class="form-group col-md-6">
        <h5>Password: </h5>
        <span id="mostrasenha">********</span>
        <!-- Button Editar password modal -->
        <button type="button" class="btn btn-link text-success ml-2" data-toggle="modal" data-target="#ModalEditarPassword">Editar</button>
        <left><div id="mensagemPassword"></div></left>
      </div>
    </div>
   
   <!-- Inputs -->

<!-- Modal editar email-->
<div class="modal fade" id="ModalEditarEmail" tabindex="-1" role="dialog" aria-labelledby="ModalLabemEmail" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header table-success">
        <h5 class="modal-title" id="ModalLabemEmail">Editar e-mail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
         
      <!-- <form class=" p-4 mb-5" method="POST" action=""> -->
        <div class="form-row">  
          <div class="form-group col-md-12">
            <label>E-mail: </label>
            <input type="email" name="email" id="email" class="form-control" required placeholder="" value="">
          </div>
        </div>
        <div class="form-row">  
          <div class="form-group col-md-12">
            <label>Confirmação de E-mail: </label>
            <input type="email" name="emailc" id="emailc" class="form-control" required placeholder="" value="">
          </div>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-success btn-sm ml-lg-2" name="btnEditarUsuario" type="button" id="btnSubEmail" data-id="<?=$id?>">Validar</button>

          </div>
        </div>
      </div>
    </div>

<div class="modal fade" id="ModalEditarPassword" tabindex="-1" role="dialog" aria-labelledby="ModalLabemPassword" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header table-success">
        <h5 class="modal-title" id="ModalLabemPassword">Editar Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="form-row">  
          <div class="form-group col-md-12">
            <label>Password: </label>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="" value="">
          </div>
        </div>
        <div class="form-row">  
          <div class="form-group col-md-12">
            <label>Confirmação da Password: </label>
            <input type="password" name="senhac" id="senhac" class="form-control" placeholder="" value="">
          </div>
        </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-success btn-sm ml-lg-2" name="btnEditarSenha" type="button" id="btnSubSenha" data-id="<?=$id?>">Validar</button>
          </div>
        </div>
      </div>
    </div>

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
$(document).ready(function(){
    $(".close").click(function(){
        $("#bsalert").alert("close");
    });
});
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
    <script src="../js/popper.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</html>
