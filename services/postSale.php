<?php
include("../controlers/conection.php");

// Obtener los datos enviados desde JavaScript
$data = json_decode(file_get_contents('php://input'), true);

// Obtener los valores individuales de los datos
$detail = $data['detail'];
$total = $data['total'];
$currentDate = $data['currentDate'];

$sql = "INSERT INTO sales (detail, total, currentDate) VALUES ('$detail', '$total', '$currentDate')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    
} else {
    echo "Error al agregar la venta: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>