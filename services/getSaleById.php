<?php
// getSaleById.php

// Incluir el archivo de conexión
include('../controlers/conection.php');

// Verificar si se recibió una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos enviados
  $data = json_decode(file_get_contents('php://input'), true);
  
  // Verificar si la clave "id" está definida en los datos
  if (isset($data['id'])) {
    $id = $data['id'];
    
    // Consulta para obtener la venta según el ID
    $query = "SELECT * FROM sales WHERE id = '$id'";
    
    // Ejecutar la consulta
    $result = mysqli_query($conn, $query);
    
    // Verificar si se obtuvieron resultados
    if ($result) {
      // Convertir los resultados a un array asociativo
      $sale = mysqli_fetch_assoc($result);
      
      // Devolver la venta como respuesta
      echo json_encode($sale);
    } else {
      // Si no se obtuvieron resultados
      echo "Error: No se encontró ninguna venta con el ID proporcionado.";
    }
  } else {
    // Si la clave "id" no está definida en los datos
    echo "Error: 'id' no está definido en los datos.";
  }
} else {
  // Si no se envió una solicitud POST
  echo "Error: Se esperaba una solicitud POST.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>