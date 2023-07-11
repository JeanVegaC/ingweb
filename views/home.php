<?php
include '../controlers/validateLogin.php';
validarSesion();

include '../controlers/validateRol.php';
$rol = validarRol();
?>
