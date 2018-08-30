<?php
session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email']);

$_SESSION['msg'] = "Obrigado pela sua visita";
header("Location: login.php");