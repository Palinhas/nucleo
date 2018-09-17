<?php  
session_start();
mb_internal_encoding('UTF-8');
//var_dump($_COOKIE);
if ( ! empty( $_COOKIE['idr'] || $_COOKIE['nomer'] )  ) {
    $_SESSION["id"] = $_COOKIE['idr'];
    $_SESSION["nome"] = $_COOKIE['nomer'];
}
include_once("conexao.php");

      $id = $_SESSION['id'];
      $result_usuario = "SELECT * FROM usuarios WHERE id='$id' ORDER BY id ASC";
      $resultado_usuario = mysqli_query($conn, $result_usuario); 
      $row_usuario = mysqli_fetch_array($resultado_usuario); 
      
      $socioC = $row_usuario['socio'];
      $result_socio = "SELECT * FROM socios WHERE socio='$socioC' ORDER BY id ASC";
      $resultado_socio = mysqli_query($conn, $result_socio);
      $row_socio = mysqli_fetch_array($resultado_socio);

      $ids = $row_socio['id'];
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
          <div style="z-index: 2; " class="dropdown">
              <button onclick="myFunction()" class="dropbtn">Dropdown</button>
              <div style="z-index: 3; position: fixed;" id="myDropdown" class="dropdown-content">
                  <a href="#home">Home</a>
                  <a href="#about">About</a>
                  <a href="#contact">Contact</a>
              </div>
          </div>
              <div class="login mobile-hide-login">
                <li class="navbar-brand"><i class="fa fa-user-secret"></i>
                  <?php
                  if(!empty($_SESSION['id'])){?>
                      <span class="social-mini" ><?php echo $_SESSION['nome'];?></span>

                     <a onclick="document.cookie=&quot;idr=;expires=Wed; 01 Jan 1970&quot;"  style='font-size: small' class='btn badge badge-success ml-2 social-mini' role='button' aria-pressed='true' href='sair.php'>Sair</a>
                      <?php
                  }else{
                    $_SESSION['msg'] = "<span class='alert-danger'><b>Área restrita</b></span>";
                    header("Location: login.php");
                  }?>
                </li>
            </div>
      </nav>

          <!-- metaMenu -->

<nav class="navbar navbar-expand-lg navbar-light fixed-top navmenu">
      <div class="scpLogo">
      <h1>
        <a href="../index.php" title="SPORTING CP">SPORTING CP</a>
      </h1>
    </div>
    <!-- Use any element to open the sidenav -->
  <div class="desktop-hide mobilemenu">
    <a style="font-size: 48px;" type="button" class="fa fa-bars" onclick="openNav()"></a>
  </div>
  </div>
  <div style="z-index: 1; position:absolute;" class=" mobile-hide-menu collapse navbar-collapse">
    <ul class="navbar-nav topnav topnavloc" style="">
      <li class="nav-item">
        <a class="nav-link text-white" href="../index.php">INICIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../blog.php">BLOG</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../museu.php">MÚSEU</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../multimedia.php">MULTIMÉDIA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../historia.php">HISTÓRIA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../socios.php">SÓCIOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../quemsomos.php">QUÊM SOMOS</a>
      </li>
    </ul>
</nav>

 <div style="" id="mySidenav" class="sidenav sidenavposition">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="../index.php">INICIO</a>
  <a href="../blog.php">BLOG</a>
  <a href="../museu.php">MÚSEU</a>
  <a href="../multimedia.php">MULTIMÉDIA</a>
  <a href="../historia.php">HISTÓRIA</a>
  <a href="../socios.php">SÓCIOS</a>
  <a href="../quemsomos.php">QUÊM SOMOS</a>
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
<?php
  if(isset($_SESSION['msg'])){
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
  }
?>

<div class="row bg-faded" style="margin-top: 10px; ;">
  <div style="z-index: 0;" class="col-3">
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

    <h1 class="display-6">INFORMAÇÃO PESSOAL</h1><hr> 
      
      <!-- <span id="mensagem"></span>  -->

  <dl class="row">
  <dt class="col-sm-3">Informação de Registo</dt>
  <dd class="col-sm-9">

    <div class="form-row">
      <div class="form-group col-md-12 p-4" style="background-color: #DCDCDC">
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
      <!-- Modal editar Password-->
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
    <hr>
  </dd>
  </dl>

     <!--   Informação de sócio -->

    <dl class="row">
        <dt class="col-sm-3">Informação de Sócio</dt>
        <dd class="col-sm-9">
            <div class="p-4" style="background-color: #DCDCDC">
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><h5><b>Numero Socio </b></h5></label><br>
                            <span id="mostraNsocio"><?php echo $row_socio['socio']; ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label><h5><b>Ultima Quota Paga </b></h5></label><br>
                            <span id="mostraQuota"><?php echo $row_socio['quota']; ?></span>
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <h5><b>Cartão de Cidadão: </b></h5>
                            <span id="mostracc"><?php echo $row_socio['cc']; ?></span>
                        </div>
                        <div class="form-group col-md-6">
                            <h5><b>NIF </b></h5>
                            <span id="mostraNif"><?php echo $row_socio['nif']; ?></span>
                        </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                            <label><h5><b>Data de Nascimento </b></h5></label><br>
                            <span id="mostraBirth"><?php echo $row_socio['birth']; ?></span>
                        </div>
                </div>
            </div>

            <div class="p-4">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><h5><b>Número Sócio SCP </b></h5></label><br>
                        <span id="mostraSoScp"><?php echo $row_socio['socio_scp']; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label><h5><b>Tipo de Sócio SCP</b></h5></label><br>
                        <span id="mostraTipoSocio"><?php echo $row_socio['tipo_scp']; ?></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label><h5><b>Contacto </b></h5></label><br>
                        <span id="mostraContacto"><?php echo $row_socio['contacto']; ?></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label><h5><b>Habilitações Literárias</b></h5></label><br>
                        <span id="mostraHabilitacoes"><?php echo $row_socio['habilitacoes']; ?></span>
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label><h5><b>Morada</b></h5></label><br>
                        <span id="mostraMorada"><?php echo $row_socio['morada']; ?></span><br>
                        <span id="mostraCp"><?php echo $row_socio['cp']; ?></span><br>
                        <span id="mostraLocalidade"><?php echo $row_socio['localidade']; ?></span><br>
                        <span id="mostraPais"><?php echo $row_socio['pais']; ?></span>

                    </div>

                    <div class="form-group col-md-6">
                        <label><h5><b>Nacionalidade </b></h5></label><br>
                        <span id="mostraNacionalidade"><?php echo $row_socio['nacionalidade']; ?></span>
                    </div>

                </div>
                <div class="form-row">

                        <div class="form-group col-md-6">
                            <label><h5><b>Ocupacao</b></h5></label><br>
                            <span id="mostraOcupacaao"><?php echo $row_socio['ocupacao']; ?></span>
                        </div>

                </div><hr>

                <div class="form-row">
                    <div class="form-group col-md-10">

                    </div>
                    <div class="form-group col-md-2">

<!--                         Button Editar Socio -->
                        <button type="button" class="btn btn-outline-success" data-toggle="modal" id="editSocio" socio-id="<?=$ids?>" >Editar Sócio</button>
                    </div>
                </div>

                <!-- Modal Editar Sócio-->
            <form>
                <div class="modal fade bd-ModalEditarSocio-lg" id="ModalEditarSocio" tabindex="-1" role="dialog" aria-labelledby="ModalLabelSocio" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header table-success">
                                <h5 class="modal-title" id="ModalLabelSocio">Editar Sócio</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="socio_scpM">Número de Sócio Scp </label>
                                        <input type="text" id="socio_scpM" required class="form-control" placeholder="" value="">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="tipo_scpM">Tipo de Sócio SCP</label>
                                        <input type="text" id="tipo_scpM" required class="form-control" placeholder="" value="">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="contactoM">Contacto </label>
                                        <input type="text" id="contactoM" required class="form-control" placeholder="" value="<?php //echo $row_socio['contacto']; ?>">
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="habilitacoesM">Habilitações Literárias</label>
                                        <input type="text" id="habilitacoesM" required class="form-control" placeholder="" value="<?php //echo $row_socio['habilitacoes']; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="ocupacaoM">Ocupação </label>
                                        <input type="text" id="ocupacaoM" required class="form-control" placeholder="" value="<?php //echo $row_socio['ocupacao']; ?>">
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-8">
                                        <label for="moradaM">Morada </label>
                                        <input type="text" id="moradaM" required class="form-control" placeholder="" value="<?php //echo $row_socio['morada']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="cpM">Código Postal </label>
                                        <input type="text" id="cpM" required class="form-control" placeholder="" value="<?php //echo $row_socio['cp']; ?>">
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="localidadeM">Localidade </label>
                                        <input type="text" id="localidadeM" required class="form-control" placeholder="" value="<?php //echo $row_socio['localidade']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="paisM">Pais </label>
                                        <input type="text" id="paisM" required class="form-control" placeholder="" value="<?php // echo $row_socio['nacionalidade']; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nacionalidadeM">Nacionalidade </label>
                                        <input type="text" id="nacionalidadeM" required class="form-control" placeholder="" value="<?php // echo $row_socio['nacionalidade']; ?>">
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                                <button class="btn btn-success btn-sm ml-lg-2" name="btnEditSocio" type="button" id="btnEditSocio" socios-id="<?=$ids?>">Validar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            </div>

  </div> <!-- Final de Perfil -->


      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>


      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
    </div>
  </div>
</div>

    
    </div>
  <script>
      /* When the user clicks on the button,
      toggle between hiding and showing the dropdown content */
      function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {

              var dropdowns = document.getElementsByClassName("dropdown-content");
              var i;
              for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                      openDropdown.classList.remove('show');
                  }
              }
          }
      }
  </script>

  <script src="../bootstrap-validate/dist/bootstrap-validate.js"></script>

  <script>

      bootstrapValidate('#socio_scpM', 'required:<b>Campo Obrigatório!</b>')
      bootstrapValidate('#tipo_scpM', 'required:<b>Campo Obrigatório!</b>')
      bootstrapValidate('#contactoM', 'required:<b>Campo Obrigatório!</b>')
      bootstrapValidate('#habilitacoesM', 'required:<b>Campo Obrigatório!</b>')
      bootstrapValidate('#ocupacaoM', 'required:<b>Campo Obrigatório!</b>')
      bootstrapValidate('#moradaM', 'required:<b>Campo Obrigatório!</b>')
      bootstrapValidate('#cpM', 'required:<b>Campo Obrigatório!</b>')
      bootstrapValidate('#localidadeM', 'required:<b>Campo Obrigatório!</b>')
      bootstrapValidate('#paisM', 'required:<b>Campo Obrigatório!</b>')
      bootstrapValidate('#nacionalidadeM', 'required:<b>Campo Obrigatório!</b>')

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

  <script src="../js/sweetalert2.all.min.js"></script>
  <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
  <script src="../js/polyfill.min.js"></script>
</html>
