<?php
session_start();
include_once("conexao.php");
$nif = filter_input(INPUT_GET, 'nif', FILTER_SANITIZE_NUMBER_INT); 
$result_usuario = "SELECT * FROM usuarios WHERE nif = '$nif'"; 
$resultado_usuario = mysqli_query($conn, $result_usuario); 
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
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

    <title>Consultar Usuarios | Site oficial do Núcleo do Sporting Clube de portugal de Campo Maior</title>
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

            <!-- Mini menu -->

<div class="row container-fluid" style="display: flex;">
<div class="col mt-5" style="flex: 0%; float: left;">
<div class="list-group" style="width: 200px;">
  <a href="usuarios.php" class="list-group-item list-group-item-action list-group-item-success">Menú Usuários</a> 
  <!-- <a href="inserir_socios.php" class="list-group-item list-group-item-action">Inserir Usuários</a> -->

</div>
  </div>
              <!-- Corpo -->

  <div class="col" style="flex: 50%; float: left; background: #eeeeee;">
    <div class="mt-3">
      <span class="d-block p-3 bg-success text-white">Consultar informação do Usuário</span>
    </div>

<div class="card">
  <div class="card-body">
    <form>
      <div class="form-row mt-5">
        <div class="form-group col-md-3">
              <label></label>
              <img class="ml-4" src="../assets/imagens/perfil/semfoto/jonhdoe.svg" alt="" width="100" height="120">
        </div>
        <div class="form-group col-md-3">
        <label>Arquivo</label>         
        <input disabled class="form-control text-center" name="id" value="<?php echo $row_usuario['id']; ?>"></input>
      </div>
              <div class="form-group col-md-3">
              <label>Criado</label>
              <input disabled class="form-control" value="<?php echo $row_usuario['created']; ?>">
        </div>
         <div class="form-group col-md-3">
              <label>Modificado</label>
              <input disabled class="form-control" value="<?php echo $row_usuario['modified']; ?>">
        </div>
      </div>
      <div class="form-row">
                <div class="form-group col-md-3">
              <label>Contribuinte</label>
              <input disabled class="form-control" value="<?php echo $row_usuario['nif']; ?>">
        </div>
        <div class="form-group col-md-3">
              <label>Nome do login</label>
              <input disabled class="form-control" value="<?php echo $row_usuario['usuario']; ?>">
        </div>
        <div class="form-group col-md-6">
              <label>E-mail</label>
              <input disabled class="form-control" value="<?php echo $row_usuario['email']; ?>">
        </div>
      </div>
<br>
        <div class="col-auto">
                            <!-- Button cancelar modal -->  
            <a href="#" class="btn btn-danger btn-sm mb-2" data-toggle="modal" data-target="#cancelarModal">
        Voltar
        </a>
                            <!-- Button validar modal -->
        <button type="button" class="btn btn-warning btn-sm mb-2" data-toggle="modal" data-target="#registarModal">
          Editar
        </button>
      </div>
                                              <!-- Modal validar -->
        <div class="modal fade" id="registarModal" tabindex="-1" role="dialog" aria-labelledby="registarModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="registarModal">? ATENÇÃO DESEJA CONTINUAR ?</h5>
                <button type="button" class="close btn btn-sm" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Se quer editar o cliente pressione SIM, se quer continuar na informação do cliente pressione Não.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger mb-2" data-dismiss="modal">NÃO</button>
                <?php // Botões
            echo '<a class="btn btn-sm btn-success mb-2" href="editar_usuarios.php?id='.$row_usuario['id'].'" role="button"> Sim </a>';
              ?>
              </div>
            </div>
          </div>
        </div>
          </div>                        <!-- Modal Cancelar-->
        <div class="modal fade" id="cancelarModal" tabindex="-1" role="dialog" aria-labelledby="cancelarModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="cancelarModal">? ATENÇÃO DESEJA CONTINUAR ?</h5>
                <button type="button btn btn-sm" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Deseja sair desta pagina?.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger mb-2" data-dismiss="modal">NÃO</button>
               <a class="btn btn-sm btn-success mb-2" role="button" href="usuarios.php">Sim</a>
              </div>
            </div>
          </div>
        </div>
    </form>
    </div>
    <br>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/popper.min.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Data tables -->
    <script src="../js/jquery.dataTables.min.js"></script>

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

    <script>
    	$(document).ready(function() {
    	$('#example').DataTable();
		} );
    </script>

  </body>
</html>