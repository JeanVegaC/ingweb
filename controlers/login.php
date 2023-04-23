<?php
session_start();
include("conection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql = "SELECT * FROM usuarios WHERE user = '$username' AND pass = '$password'" ;
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $count = mysqli_num_rows($result);
  if ($count == 1) {
    $_SESSION["id"] = $row["id"];
    $_SESSION["user"] = $row["user"];
    $_SESSION["pass"] = $row["pass"];
    $_SESSION["rol"] = $row["rol"];
    $_SESSION["category"] = $row["category"];
    header("location: ../views/main.php");
  } else {
    $_SESSION["error"] = "Nombre de usuario o contraseña incorrectos";
    header("location: ../index.php");
  }
}
?>