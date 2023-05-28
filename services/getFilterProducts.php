<?php
session_start();
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "ingweb");

// Verificar la conexión
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

$category = isset($_POST['category']) ? $_POST['category'] : '';

// Consulta a la base de datos
echo $_SESSION['category'];
if($_SESSION['category']) {
  $sql = "SELECT * FROM productos";
} else {
  $category = mysqli_real_escape_string($conn, $category); // Se recomienda escapar la variable para evitar inyección SQL
  $sql = "SELECT * FROM productos WHERE categoria = '$category'";
}

$resultado = mysqli_query($conn, $sql);

// Crear un array para almacenar los datos de los productos
$productos = array();

// Iterar sobre los resultados de la consulta y almacenar los datos en el array
while ($fila = mysqli_fetch_assoc($resultado)) {
  $productos[] = $fila;
}

// Convertir el array en formato JSON
echo json_encode($productos);

// Cerrar la conexión a la base de datos
mysqli_close($conn);

?>