<?php
session_start();
unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['nif'], $_SESSION['created'], $_SESSION['modified'], $_SESSION['contacto']);
$_SESSION['msg'] = " <span class='text-success'><b> Obrigado pela sua visita</b></span>";
header("Location: login.php");

