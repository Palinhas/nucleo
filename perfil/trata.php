<?php
include_once("conexao.php");
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

}
?>