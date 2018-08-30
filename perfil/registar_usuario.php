<?php  
session_start();
ob_start();
include_once 'conexao.php';

//$btnRegisto = filter_input(INPUT_POST, 'btnRegisto', FILTER_SANITIZE_STRING);
//if ($btnRegisto) {
//  include_once 'conexao.php';
//    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); // recebo pelo array tudo junto e direciono o campo pela variavel $dados.
//    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//    $erro = false;
//    $dados_st = array_map('strip_tags', $dados_rc); // regra para os caracteres
//    $dados = array_map('strip_tags', $dados_st);  // regra para os caracteres
//    if (in_array('',$dados)) { // regra para os espacos
//        $erro = true;
//        $_SESSION['msgreg'] = "<p style='color:red;'><b> Erro obrigatório preencher todos os campos </b></p>";
//    }elseif (strlen($dados['senha']) < 6 ) {  // Senha minimo 6 caracteres
//        $erro = true;
//        $_SESSION['msgreg'] = "<p style='color:red;'><b> A password deve ter pelo menos 6 Caracteres </b></p>";
//
//    }elseif (stristr($dados['senha'], "'")) {  // Senha proibir '' caracteres
//        $erro = true;
//        $_SESSION['msgreg'] = "<p style='color:red;'><b> Caracter invalido (') </b></p>";
//    }elseif (stristr($dados['senha'], ",")) {  // Senha proibir , caracteres
//        $erro = true;
//        $_SESSION['msgreg'] = "<p style='color:red;'>Caracter invalido (,) </b></p>";
//    }elseif (stristr($dados['senha'], ".")) {  // Senha proibir . caracteres
//        $erro = true;
//        $_SESSION['msgreg'] = "<p style='color:red;'><b>Erro caracter errado (.) </b></p>";
//    }elseif ($dados['senha'] <> $dados['senhac']){
//        $erro = true;
//        $_SESSION['msgreg'] = "<p style='color:red;'><b>Erro a password não coincide.</b></p>";
//    }else{
//      $result_socios = "SELECT * FROM socios WHERE socio='". $dados['socio'] ."'"; // verifica se o numero de sócio está inserido na tabela socios
//      $resultado_socios = mysqli_query($conn, $result_socios);
//      $row_socios = mysqli_fetch_array($resultado_socios);
//
//      $compara = $dados['socio'];
//      $socios =  empty($row_socios['socio'])?'':$row_socios['socio'];
//
//      if ($compara !== $socios) {
//          $erro = true;
//          $_SESSION['msgreg'] = "<p style='color:red;'><b>O número de Sócio: ". $dados['socio'] ." Não existe.</b></p>";
//      }
//
//      $ids = empty($row_socios['id'])?'':$row_socios['id'];
//      $result_nomes = "SELECT * FROM socios WHERE id='$ids' ORDER BY id ASC"; // Ligacao a base de dados socios
//      $resultado_nomes = mysqli_query($conn, $result_nomes);
//      $row_nomes = mysqli_fetch_array($resultado_nomes);
//
//      $comparaNome = $dados['nome'];
//      $nomesSocios =  empty($row_nomes['nome'])?'':$row_nomes['nome'];
//
//      $contaNome = mb_strlen("$comparaNome");
//      $contaSocio = mb_strlen("$nomesSocios");
//
//      //if ($comparaNome !== $nomesSocios) {
//      //if (($comparaNome) AND ($nomesSocios->num_rows != 0)) { // Conta as rows e verifica se o mome de socio coincide
//      if ($contaNome !== $contaSocio ) { // Conta as rows e verifica se o mome de socio coincide
//          $erro = true;
//          $_SESSION['msgreg'] = "<p style='color:red;'><b>O nome que está a registar é: ". $dados['nome'] .", esse nome não coincide com o nome do número de socio: ". $dados['socio'] ." da nossa base de dados .</b></p>";
//      }
///*      $result_usuario = "SELECT id FROM usuarios WHERE usuario='". $dados['usuario'] ."'"; // verifica o nome se é igual
//      $resultado_usuario = mysqli_query($conn, $result_usuario);
//      if (($resultado_usuario) AND ($resultado_usuario->num_rows != 0)) { // Conta as rows e verifica se é existe algum dado
//          $erro = true;
//          $_SESSION['msgreg'] = "<p style='color:red;'><b>O Usuario: ". $dados['usuario'] ." já está a ser utilizado.</b></p>";
//      }*/
//      $result_usuario = "SELECT id FROM usuarios WHERE email='". $dados['email'] ."'"; // verifica o email se é igual
//      $resultado_usuario = mysqli_query($conn, $result_usuario);
//      if (($resultado_usuario) AND ($resultado_usuario->num_rows != 0)) { // Conta as rows e verifica se é existe algum dado
//          $erro = true;
//          $_SESSION['msgreg'] = "<p style='color:red;'><b>O e-mail: ". $dados['email'] ." já está a ser utilizado.</b></p>";
//      }
//      $result_usuario = "SELECT id FROM usuarios WHERE socio='". $dados['socio'] ."'"; // verifica o numero de socio se é igual
//      $resultado_usuario = mysqli_query($conn, $result_usuario);
//      if (($resultado_usuario) AND ($resultado_usuario->num_rows != 0)) { // Conta as rows e verifica se é existe algum dado
//          $erro = true;
//          $_SESSION['msgreg'] = "<p style='color:red;'><b>O número de Sócio: ". $dados['socio'] ." já foi registado.</b></p>";
//      }
//
//    //var_dump($dados);
//    //
//
//    if (!$erro) {
//          // var_dump($dados);
//          $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
//
//  $result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha, socio, estado, created) VALUES (
//                  '" .$dados['nome']. "',
//                  '" .$dados['email']. "',
//                  '" .$dados['usuario']. "',
//                  '" .$dados['senha']. "',
//                  '" .$dados['socio']. "',
//                  '" .$dados['estado']. "', NOW())";
//  $resultado_usuario = mysqli_query($conn, $result_usuario);
//  //$Conexao = mysqli_query($conn, $result_usuario) or die ('Erro ao inserir os dados '.mysqli_error($result_usuario)) ;
//          if (mysqli_insert_id($conn)) {
//              $_SESSION['msg'] = "<p style='color:green;'><b>Parabéns, registo criado com sucesso.</b></p>";
//              header("Location: login.php");
//          }else{
//              $_SESSION['msgreg'] = "<p style='color:red;'><b>Erro ao criar o usuario.</b></p>";
//              header("Location: registar_usuario.php");
//          }
//        }
//      }
//    }

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
        <center><div id="mensagemRegisto"></div></center>
          <?php
                    
          if(isset($_SESSION['msgreg'])){
              echo $_SESSION['msgreg'];
              unset($_SESSION['msgreg']);
          }
    //echo "compara: $compara <br>";
    //echo "socios: $socios <br>";
    //  echo "comparaNome: $comparaNome <br>";
    //  echo "nomesSocios: $nomesSocios <br>";
    //var_dump($dados);
      ?>
    </div>
      <form class="needs-validation" novalidate>
          <span id="mensagem"></span>
      <div class="form-row">
        <div class="form-group col-md-9">
          <label for="nome">Nome Completo</label>

          <input type="text" class="form-control" id="nome" placeholder="Nome Completo" value="" required>
            <span id="nomev"></span>
        </div>
        <div class="form-group col-md-3">
            <label for="socio">Número Sócio Núcleo</label>
              <input type="text" class="form-control" id="socio" placeholder="Número de Sócio" value="" required>
            <div class="invalid-feedback">
                <small><b>Campo Obrigatório</b></small>
            </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
<!--         <div class="valid-feedback">
            E-mail válido!
          </div>-->
          <div class="invalid-feedback">
            Introduzia um e-mail válido exemplo@exemplo.pt!
          </div>
        </div>      
        <div class="form-group col-md-6">
            <label for="emailc">Confirmar E-mail</label>
              <input type="email" class="form-control" name="emailc" id="emailc" placeholder="Confirmar E-mail" required>
<!--            <div class="valid-feedback">
            Confirmar E-mail!
          </div>-->
          <div class="invalid-feedback">
            Introduza um e-mail válido exemplo@exemplo.pt!
          </div>      
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
            <label for="senha">Password</label>
           <input type="password" class="form-control" name="senha" id="senha" placeholder="Password" required>
<!--            <div class="valid-feedback">
            Senha válida minimo 6 caracteres!
          </div>-->
          <div class="invalid-feedback">
            Password válida minimo 6 caracteres!
          </div> 
        </div>
        <div class="form-group col-md-6">
            <label for="senhac">Confirmar Password</label>
             <input type="password" class="form-control" name="senhac" id="senhac" placeholder="Password" required>
<!--      <div class="valid-feedback">
            Password válida minimo 6 caracteres!
          </div>-->
          <div class="invalid-feedback">
             Password válida minimo 6 caracteres!
          </div> 
        </div>
        </div><br>
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

  <script src="../bootstrap-validate/dist/bootstrap-validate.js"></script>
  <script>
      // Basic Example
      bootstrapValidate('#nome', 'contains:Peter:Needs to Contain "Peter"|min:20:Enter 20 character!|max:40:Enter 40 chars at most!');
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
