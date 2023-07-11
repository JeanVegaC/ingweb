<?php
include('../controlers/conection.php');

// Consulta SQL para obtener los datos de la tabla "sales"
$sql = "SELECT * FROM sales";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Array para almacenar los datos de la tabla
    $data = array();

    // Recorrer los resultados y almacenar los datos en el array
    while ($row = $result->fetch_assoc()) {
        $row['detail'] = json_decode($row['detail'], true);
        $data[] = $row;
    }

    // Devolver los datos en formato JSON
    echo json_encode($data);
}

// Cerrar la conexión
$conn->close();
?>