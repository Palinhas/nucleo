<?php
include_once("conexao.php");
$acao = $_POST['acao'];

switch ($acao) {

    case 'registar':

        $nome = empty($_POST['nome']) ? '' : $_POST['nome'];
        $email = empty($_POST['email']) ? '' : $_POST['email'];
        $senha = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $socio = empty($_POST['socio']) ? '' : $_POST['socio'];
        $estado = empty($_POST['estado']) ? '' : $_POST['estado'];

        $result_usuario = "INSERT INTO usuarios (nome, email, senha, socio, estado, created) VALUES ('$nome', '$email', '$senha', '$estado', NOW())";

        $Conexao = mysqli_query($conn,
            $result_usuario) or die ('Erro ao inserir os dados ' . mysqli_error($result_usuario));

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