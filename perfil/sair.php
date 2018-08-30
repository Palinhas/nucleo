<?php
session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['nome'], $_SESSION['nif'], $_SESSION['created'], $_SESSION['modified'], $_SESSION['contacto']);

$_SESSION['msg'] = "Obrigado pela sua visita";
header("Location: login.php");
