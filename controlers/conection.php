<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "ingweb";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
  die("Error de conexión: " . mysqli_connect_error());
}
?>