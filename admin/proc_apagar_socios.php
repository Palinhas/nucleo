<?php
session_start(); // para poder dar a mensagem de registo ou logins com sucesso
include_once("conexao.php");// include_once é para incluir a conexão da base de dados só uma vez !

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); // O que quero apagar
if(!empty($id)) {
	$result_socio = "DELETE FROM socios WHERE id='$id'"; // Query que indica a localização$ na base de dados 
	$resultado_socio = mysqli_query($conn, $result_socio); // Executa o processo, liga na base de dados e executa a query $result_usuario.
	if (mysqli_affected_rows($conn)) { // se efetuar o processo vai redirecionar para
		//A Mensagem se Regsito foi feita com sucesso então redireciona para
	 	$_SESSION['msg'] = "<p style='color:green;'>Sócio apagado com sucesso.</p>";
	 	header("Location: socios.php");
	 
	}else{
	//A Mensagem se Regsito não foi feita com sucesso então redireciona para.
	 	$_SESSION['msg'] = "<p style='color:red;'>Sócio não foi apagado com sucesso.</p>"; 
		header("Location: socios.php");

	}

}else{
		//A Mensagem se Regsito não selecionou nenhum usuario.
	 	$_SESSION['msg'] = "<p style='color:red;'>Erro ... tem de escolher pelo menos 1 Sócio</p>"; 
		header("Location: socios.php");

}