<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$socio = filter_input(INPUT_POST, 'socio', FILTER_SANITIZE_STRING);
$Quota = filter_input(INPUT_POST, 'quota', FILTER_SANITIZE_STRING);
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
//$referencia = filter_input(INPUT_POST, 'referencia', FILTER_SANITIZE_STRING;

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

$result_socio = "UPDATE socios SET socio='$socio', quota='$quota', birth='$birth', nome='$nome', morada='$morada', cp='$cp', localidade='$localidade', ocupacao='$ocupacao', cc='$cc', nif='$nif', email='$email', contacto='$contacto', socio_scp='$socio_scp', tipo_scp='$tipo_scp', modified=NOW() WHERE id='$id'";

$resultado_socio = mysqli_query($conn, $result_socio);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Sócio editado com sucesso.</p>";
	header("Location: consultar_socios.php?id=$id");

}else{
	$_SESSION['msg'] = "<p style='color:red;'>Sócio não foi editado.</p>";
	header("Location: editar_socios.php?id=$id");
}

?>