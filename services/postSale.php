<?php
include("../controlers/conection.php");

// Obtener los datos enviados desde JavaScript
$data = json_decode(file_get_contents('php://input'), true);

// Obtener los valores individuales de los datos
$detail = json_encode($data['detail']);;
$message = $data['message'];
$total = $data['total'];
$currentDate = $data['currentDate'];

$sql = "INSERT INTO sales (detail, total, currentDate, message) VALUES ('$detail', '$total', '$currentDate', '$message')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error al agregar la venta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>