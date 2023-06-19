<?php	
 include '../controlers/validateLogin.php';
 validarSesion();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Fagham S.A.C</title>
</head>
<body>
 <?php	
   header("location: ./home.php");  
  ?>
</body>
</html>