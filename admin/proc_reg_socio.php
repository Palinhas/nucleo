<?php
session_start(); 
include_once("conexao.php");

$socio = filter_input(INPUT_POST, 'socio', FILTER_SANITIZE_STRING);
$quota = filter_input(INPUT_POST, 'quota', FILTER_SANITIZE_STRING);
$birth = filter_input(INPUT_POST, 'birth', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$morada = filter_input(INPUT_POST, 'morada', FILTER_SANITIZE_STRING);
$cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
$localidade = filter_input(INPUT_POST, 'localidade', FILTER_SANITIZE_STRING);
$ocupacao = filter_input(INPUT_POST, 'ocupacao', FILTER_SANITIZE_STRING);
$cc = filter_input(INPUT_POST, 'cc', FILTER_SANITIZE_STRING);
$nif = filter_input(INPUT_POST, 'nif', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$contacto = filter_input(INPUT_POST, 'contacto', FILTER_SANITIZE_STRING);
$socio_scp = filter_input(INPUT_POST, 'socio_scp', FILTER_SANITIZE_STRING);
$tipo_scp = filter_input(INPUT_POST, 'tipo_scp', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "email: $email <br>";


$result_socio = "INSERT INTO socios (socio, quota, birth, nome, morada, cp, localidade, ocupacao, cc, nif, email, contacto, socio_scp, tipo_scp, created) VALUES ('$socio', '$quota', '$birth', '$nome', '$morada', '$cp', '$localidade', '$ocupacao', '$cc', '$nif', '$email', '$contacto', '$socio_scp', '$tipo_scp', NOW())";
$resultado_socio = mysqli_query($conn, $result_socio);


if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Sócio registado com sucesso.</p>"; 
	header("Location: socios.php");

}else{
	$_SESSION['msg'] = "<p style='color:red;'>Sócio não foi registado.</p>";
	header("Location: inserir_socios.php");
}

?>