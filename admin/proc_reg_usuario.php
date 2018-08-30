<?php
session_start(); 
include_once("conexao.php");

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$nif = filter_input(INPUT_POST, 'nif', FILTER_SANITIZE_STRING);


//echo "Nome: $nome <br>";
//echo "email: $email <br>";


$result_usuario = "INSERT INTO socios (email, usuario, senha, nif, created) VALUES ('$email', '$usuario', '$senha', '$nif', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);


if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Sócio registado com sucesso.</p>"; 
	header("Location: consultar_usuarios.php?id=$id");

}else{
	$_SESSION['msg'] = "<p style='color:red;'>Sócio não foi registado.</p>";
	header("Location: inserir_usuarios.php");
}

?>














