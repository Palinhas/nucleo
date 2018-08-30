<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
//$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$socio = filter_input(INPUT_POST, 'socio', FILTER_SANITIZE_STRING);
$nif = filter_input(INPUT_POST, 'nif', FILTER_SANITIZE_STRING);

//echo "Socio: $socio <br>";
//echo "Quota: $quota <br>";
//echo "Birth: $birth <br>";
//echo "Nome: $nome <br>";
//echo "Morada: $morada <br>";
//echo "cp: $cp <br>";
//echo "localidade: $localidade <br>";
//echo "Ocupacao: $ocupacao <br>";
//echo "cc: $cc <br>";
//echo "nif: $nif <br>";
//echo "email: $email <br>";
//echo "contacto: $contacto <br>";
//echo "socio_scp: $socio_scp <br>";
//echo "tipo_scp: $tipo_scp <br>";

$result_usuario = "UPDATE usuarios SET nome='$nome', email='$email', usuario='$usuario', socio='$socio', nif='$nif', modified=NOW() WHERE id='$id'";

$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuárioeditado com sucesso.</p>";
	header("Location: usuarios.php");

}else{
	$_SESSION['msg'] = "<p style='color:red;'>Sócio não foi editado.</p>";
	header("Location: editar_usuarios.php?id=$id");
}

?>