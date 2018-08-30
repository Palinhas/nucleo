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

    <title>Inserir Usuários | Site oficial do Núcleo do Sporting Clube de portugal de Campo Maior</title>
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
  <a href="socios.php" class="list-group-item list-group-item-action list-group-item-success">Menú Usuários</a> 
  <a href="inserir_usuarios.php" class="list-group-item list-group-item-action">Inserir Usuários</a>

</div>
  </div>
              <!-- Corpo -->

  <div class="col mb-3" style="flex: 50%; float: left; background: #eeeeee;">
    <div class="mt-3"">
      <span class="d-block p-3 bg-success text-white">Adicionar Usuários na base de dados</span>
    </div>
   <form method="POST" action="proc_reg_socio.php">
      <div class="form-row mt-3">
        <div class="form-group col-md-3">
              <label>Número Sócio do núcleo</label>
              <input type="text" class="form-control" name="socio" placeholder="N. Sócio">
        </div>
         <div class="form-group col-md-3">
              <label>Quota</label>
              <input type="date" class="form-control" name="quota" placeholder="">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-9">
              <label>Nome</label>
              <input type="text" class="form-control" name="nome" placeholder="Nome">
        </div>
        <div class="form-group col-md-3">
              <label>Dáta Nascimento</label>
              <input type="date" class="form-control" name="birth" placeholder="">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">
              <label>Morada</label>
              <input type="text" class="form-control" name="morada" placeholder="Morada">
        </div>
      </div>
        <div class="form-row">
        <div class="form-group col-md-3">
              <label>Codigo-postal</label>
              <input type="text" class="form-control" name="cp" placeholder="0000-000">
        </div>
        <div class="form-group col-md-9">
              <label>Localidade</label>
              <input type="text" class="form-control" name="localidade" placeholder="localidade">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
              <label>Número Cartão de cidadão</label>
              <input type="text" class="form-control" name="cc" placeholder="N. cc">
        </div>
          <div class="form-group col-md-4">
              <label>Número Contribuinte</label>
              <input type="text" class="form-control" name="nif" placeholder="N. Contribuinte">
        </div>
          <div class="form-group col-md-4">
              <label>Ocupação</label>
              <input type="text" class="form-control" name="ocupacao" placeholder="Ocupação Profissional">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-8">
              <label>E-mail</label>
              <input type="email" class="form-control" name="email" placeholder="E-mail">
        </div>
          <div class="form-group col-md-4">
              <label>Contacto telefónico</label>
              <input type="text" class="form-control" name="contacto" placeholder="Contacto">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
              <label>Número Sócio SCP</label>
              <input type="text" class="form-control" name="socio_scp" placeholder="N. Sócio SCP">
        </div>
          <div class="form-group col-md-6">
              <label for="tipo_scp">Tipo de Sócio</label>
              <select name="tipo_scp" class="form-control">
              <option selected>...</option>
              <option>Não é sócio</option>
              <option>Efetivo-A</option>
              <option>Efetivo-B</option>
              <option>Efetivo-C</option>
              </select>
        </div>
      </div><br>
       <input class="btn btn-success btn-sm" type="submit" value="Adicionar Sócio"></input>
    </form><br><br>

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
  </body>
</html>