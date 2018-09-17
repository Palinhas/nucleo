<?php
include_once("conexao.php");
mb_internal_encoding('UTF-8');
$acao = empty($_POST['acao'])?'':$_POST['acao'];
switch ($acao) {

    case 'registar':
        $erro = false;
        $nsocioe = false;
        $nomee = false;
        $emaile = false;
        $socioue = false;
        $registo = false;

            $result_socios = "SELECT * FROM socios WHERE socio='". $_POST['socio'] ."'"; // verifica se o numero de sócio está inserido na tabela socios
            $resultado_socios = mysqli_query($conn, $result_socios);
            $row_socios = mysqli_fetch_array($resultado_socios);

            $compara = $_POST['socio'];
            $socios =  empty($row_socios['socio'])?'':$row_socios['socio'];

            if ($compara !== $socios) {
                $erro = true;
                $nsocioe = true;
            }

            $ids = empty($row_socios['id'])?'':$row_socios['id'];
            $result_nomes = "SELECT * FROM socios WHERE id='$ids' ORDER BY id ASC"; // Ligacao a base de dados socios
            $resultado_nomes = mysqli_query($conn, $result_nomes);
            $row_nomes = mysqli_fetch_array($resultado_nomes);

            $comparaNome = $_POST['nome'];
            $nomesSocios =  empty($row_nomes['nome'])?'':$row_nomes['nome'];

            $contaNome = mb_strlen("$comparaNome");
            $contaSocio = mb_strlen("$nomesSocios");

            //if ($comparaNome !== $nomesSocios) {
            //if (($comparaNome) AND ($nomesSocios->num_rows != 0)) { // Conta as rows e verifica se o mome de socio coincide

            if ($contaNome !== $contaSocio ) { // Conta as rows e verifica se o mome de socio coincide
                $erro = true;
                $nomee = true;
            }

            $result_usuario = "SELECT id FROM usuarios WHERE email='". $_POST['email'] ."'"; // verifica o email se é igual
            $resultado_usuario = mysqli_query($conn, $result_usuario);

            if (($resultado_usuario) AND ($resultado_usuario->num_rows != 0)) { // Conta as rows e verifica se é existe algum dado do email
                $erro = true;
                $emaile = true;
            }
            $result_usuario = "SELECT id FROM usuarios WHERE socio='". $_POST['socio'] ."'"; // verifica o numero de socio é igual
            $resultado_usuario = mysqli_query($conn, $result_usuario);

            if (($resultado_usuario) AND ($resultado_usuario->num_rows != 0)) { // Conta as rows e verifica se existe algum dado
                $erro = true;
                $socioue = true;
            }

            if (!$erro) {
                // var_dump($dados);
                $_POST['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);

                $result_usuario = "INSERT INTO usuarios (nome, email, senha, socio, estado, created) VALUES (
                  '" .$_POST['nome']. "',
                  '" .$_POST['email']. "',
                  '" .$_POST['senha']. "',
                  '" .$_POST['socio']. "',
                  '" .$estado. "', NOW())";
                $resultado_usuario = mysqli_query($conn, $result_usuario);
                //$Conexao = mysqli_query($conn, $result_usuario) or die ('Erro ao inserir os dados '.mysqli_error($result_usuario)) ;
                if (mysqli_insert_id($conn)) {
                    $registo = true;
                }else{
                    $registo = false;
                }
            }


        $msgi = array('erro' => $erro,
            'nsocioe' => $nsocioe,
            'registo' => $registo ,
            'nomee' => $nomee,
            'emaile' => $emaile,
            'socioue' => $socioue
        );
        header('content-type: application/json');
        echo json_encode($msgi);


        break;

    case 'updateEmail':

        $id = empty($_POST['id']) ? '' : $_POST['id'];
        $email = empty($_POST['email']) ? '' : $_POST['email'];
        $result_usuario = "UPDATE usuarios SET email='$email', modified=NOW() WHERE id='$id'";
        //$resultado_usuario = mysqli_query($conn, $result_usuario);
        $Conexao = mysqli_query($conn,
            $result_usuario) or die ('Erro ao inserir os dados ' . mysqli_error($result_usuario));

        // print_r(json_encode(array("status" => true, "message"=> "Email Alterado com successo")));
        echo $_POST['email'];
        break;

    case 'updateSenha':

        $id = empty($_POST['id']) ? '' : $_POST['id'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $result_usuario = "UPDATE usuarios SET senha='$senha', modified=NOW() WHERE id='$id'";
        //$resultado_usuario = mysqli_query($conn, $result_usuario);
        $Conexao = mysqli_query($conn,
            $result_usuario) or die ('Erro ao inserir os dados ' . mysqli_error($result_usuario));

        // print_r(json_encode(array("status" => true, "message"=> "Email Alterado com successo")));
        echo $_POST['senha'];
        break;

    case 'compara':

        $socioc = $_POST['socio'];
        $result_socios = "SELECT * FROM socios WHERE socio='$socioc'"; // verifica se o numero de sócio está inserido na tabela socios
        $resultado_socios = mysqli_query($conn, $result_socios);
        $row_socios = mysqli_fetch_array($resultado_socios);

        $nomec = $row_socios['nome'];
        $moradac = $row_socios['morada'];

        $msg = array('nomec' => $nomec, 'moradac' => $moradac);
        header('content-type: application/json');
        echo json_encode($msg);
        break;

    case 'consultarSocio':

        $id = $_POST['id'];
        $result_socios = "SELECT * FROM socios  WHERE id='$id'";
        $resultado_socios = mysqli_query($conn, $result_socios);
        $row_socios = mysqli_fetch_array($resultado_socios);

        $socio_scp = $row_socios['socio_scp'];
        $tipo_scp = $row_socios['tipo_scp'];
        $contacto = $row_socios['contacto'];
        $habilitacoes = $row_socios['habilitacoes'];
        $ocupacao = $row_socios['ocupacao'];
        $morada = $row_socios['morada'];
        $cp = $row_socios['cp'];
        $localidade = $row_socios['localidade'];
        $pais = $row_socios['pais'];
        $nacionalidade = $row_socios['nacionalidade'];

        $msgso = array(
           'socio_scp' => $socio_scp,
            'tipo_scp' => $tipo_scp,
            'contacto' => $contacto,
            'habilitacoes' => $habilitacoes,
            'ocupacao' => $ocupacao,
            'morada' => $morada,
            'cp' => $cp,
            'localidade' => $localidade,
            'pais' => $pais,
            'nacionalidade' => $nacionalidade
        );
        header('content-type: application/json');
        echo json_encode($msgso);

        break;

    case 'editarSocio':

        $editou = false;
        $erro = false;

        $id = empty($_POST['id']) ? '' : $_POST['id'];
        $socio_scp = empty($_POST['socio_scp']) ? '' : $_POST['socio_scp'];
        $tipo_scp = empty($_POST['tipo_scp']) ? '' : $_POST['tipo_scp'];
        $contacto = empty($_POST['contacto']) ? '' : $_POST['contacto'];
        $habilitacoes = empty($_POST['habilitacoes']) ? '' : $_POST['habilitacoes'];
        $ocupacao = empty($_POST['ocupacao']) ? '' : $_POST['ocupacao'];
        $morada = empty($_POST['morada']) ? '' : $_POST['morada'];
        $cp = empty($_POST['cp']) ? '' : $_POST['cp'];
        $localidade = empty($_POST['localidade']) ? '' : $_POST['localidade'];
        $pais = empty($_POST['pais']) ? '' : $_POST['pais'];
        $nacionalidade = empty($_POST['nacionalidade']) ? '' : $_POST['nacionalidade'];

        if ($ocupacao == '' || $socio_scp == '' || $tipo_scp == '' || $contacto == '' || $habilitacoes == '' || $morada == '' || $cp == '' || $localidade == '' || $pais == '' || $nacionalidade == '') {

            $erro = true;

        }

        if(!$erro){

        $result_usuario = "UPDATE socios SET socio_scp='$socio_scp', tipo_scp='$tipo_scp', contacto='$contacto', habilitacoes='$habilitacoes', ocupacao='$ocupacao', morada='$morada', cp='$cp', localidade='$localidade', pais='$pais', nacionalidade='$nacionalidade', modified=NOW() WHERE id='$id'";
        //$resultado_usuario = mysqli_query($conn, $result_usuario);
        $Conexao = mysqli_query($conn, $result_usuario) or die ('Erro ao inserir os dados ' . mysqli_error($result_usuario));

        if (mysqli_affected_rows($conn)) {
            $editou = true;
        }else{
            $editou = false;
        }

        }

        $result_socios = "SELECT * FROM socios WHERE id='$id'";
        $resultado_socios = mysqli_query($conn, $result_socios);
        $row_socios = mysqli_fetch_array($resultado_socios);

        $ocupacaoR = $row_socios['ocupacao'];
        $socio_scpR = $row_socios['socio_scp'];
        $tipo_scpR = $row_socios['tipo_scp'];
        $contactoR = $row_socios['contacto'];
        $habilitacoesR = $row_socios['habilitacoes'];
        $moradaR = $row_socios['morada'];
        $cpR = $row_socios['cp'];
        $localidadeR = $row_socios['localidade'];
        $paisR = $row_socios['pais'];
        $nacionalidadeR = $row_socios['nacionalidade'];

        $msg = array(
            'editou' => $editou,
            'erro' => $erro,
            'ocupacaoR' => $ocupacaoR,
            'socio_scpR' => $socio_scpR,
            'tipo_scpR' => $tipo_scpR,
            'contactoR' => $contactoR,
            'habilitacoesR' => $habilitacoesR,
            'moradaR' => $moradaR,
            'cpR' => $cpR,
            'localidadeR' => $localidadeR,
            'paisR' => $paisR,
            'nacionalidadeR' => $nacionalidadeR
        );
        header('content-type: application/json');
        echo json_encode($msg);



        break;

    case 'login':

        $login = false;
        $erro = false;

            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

            if((!empty($email)) AND (!empty($senha))){

                $result_usuario = "SELECT id, nome, email, senha, socio, estado FROM usuarios WHERE email='$email' LIMIT 1";
                $resultado_usuario = mysqli_query($conn, $result_usuario);
                if($resultado_usuario){
                    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
                    if(password_verify($senha, $row_usuario['senha'])){
                        $login = true;
                          $idl = $row_usuario['id'];
                          $nomel = $row_usuario['nome'];
                          $emaill = $row_usuario['email'];
                          $sociol = $row_usuario['socio'];
                          $estadol =  $row_usuario['estado'];
//                       $_SESSION['id'] = $row_usuario['id'];
//                       $_SESSION['nome'] = $row_usuario['nome'];
//                       $_SESSION['email'] = $row_usuario['email'];
//                       $_SESSION['socio'] = $row_usuario['socio'];
//                       $_SESSION['estado'] = $row_usuario['estado'];
//                       header("Location: informacao-pessoal.php");
                    }else{
                        $login = false;
//
//                        $_SESSION['msg'] = "Login ou senha incorretas!";
//                        header("Location: login.php");
                    }
                }
            }else{
                $erro = true;
//                $_SESSION['msg'] = "Login ou senha incorretas!";
//                header("Location: login.php");
            }
        $idr = empty($idl)?"":$idl;
        $nomer = empty($nomel)?"":$nomel;
        $emailr = empty($emaill)?"":$emaill;
        $socior = empty($sociol)?"":$sociol;
        $estador = empty($estadol)?"":$estadol;

        $msg = array(
            'login' => $login,
            'erro' => $erro,
            'idr' => $idr,
            'nomer' => $nomer,
            'emailr' => $emailr,
            'socior' => $socior,
            'estador' => $estador
        );
        header('content-type: application/json');
        echo json_encode($msg);


        break;
}
?>