<?php
require('../utils/fpdf185/fpdf.php');

// Obtener los datos enviados en el cuerpo de la solicitud
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData);

$currentDate = $data->currentDate;
$message = $data->message;
$id = $data->id;
$total = $data->total;

// Convertir la cadena de texto JSON de la columna 'detail' en un array
$details = json_decode($data->detail);

// Crear una nueva instancia de FPDF
$pdf = new FPDF();

// Agregar una página al PDF
$pdf->AddPage();

// Ajustar la posición y el tamaño del logo en la esquina superior izquierda
$pdf->Image('../assets/logoFagham.jpeg', 10, 10, 50); // Ajusta las coordenadas y el tamaño según sea necesario

// Establecer la fuente y el tamaño del texto para el título
$pdf->SetFont('Arial', 'B', 16);

// Obtener el ancho de la página
$pageWidth = $pdf->GetPageWidth();

// Ajustar la posición y el tamaño del cuadro del título
$pdf->SetXY($pageWidth - 70, 10);
$pdf->Cell(60, 20, '', 1, 0, 'C');
$pdf->SetX($pageWidth - 70);
$pdf->Cell(60, 10, utf8_decode('COTIZACIÓN'), 0, 1, 'C');

// Ajustar la posición y el tamaño del código "COT-número de id"
$pdf->SetX($pageWidth - 70);
$pdf->Cell(60, 10, 'COT-' . $id, 0, 1, 'C');

// Agregar un espacio en blanco
$pdf->Ln(20);

// Establecer la fuente y el tamaño del texto para el contenido
$pdf->SetFont('Arial', '', 12);

// Ubicación del establecimiento
$location = utf8_decode('Huarochirí Santa Eulalia 283');

// Dividir $currentDate en fecha y hora
$date = date('d/m/Y', strtotime($currentDate));
$time = date('H:i', strtotime($currentDate));

// Escribir la información de la venta (fecha y hora)
$pdf->Cell(0, 10, 'Fecha: ' . $date, 0, 1);
$pdf->Cell(0, 10, 'Hora: ' . $time, 0, 1);
$pdf->Cell(0, 10, utf8_decode('Ubicación: ') . $location, 0, 1);

// Agregar un espacio en blanco
$pdf->Ln(10);

// Ajustar el ancho de la tabla
$tableWidth = 160;
$tableX = ($pageWidth - $tableWidth) / 2 - 10; // Ajustar la posición a la izquierda en 10 unidades

// Crear la tabla para los productos
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX($tableX);
$pdf->Cell(15, 10, 'Item', 1, 0, 'C');
$pdf->Cell(50, 10, 'Marca', 1, 0, 'C'); // Cambio de 'Brand' a 'Marca'
$pdf->Cell(80, 10, 'Modelo', 1, 0, 'C'); // Cambio de 'Model' a 'Modelo' y aumento de ancho
$pdf->Cell(20, 10, utf8_decode('Año'), 1, 0, 'C'); // Cambio de 'Year' a 'Año'
$pdf->Cell(25, 10, 'Precio', 1, 1, 'C'); // Cambio de 'Price' a 'Precio'

// Establecer la fuente y el tamaño del texto para los detalles de los productos
$pdf->SetFont('Arial', '', 12);

// Ajustar la posición de la tabla para centrarla
$tableY = $pdf->GetY();
$pdf->SetXY($tableX, $tableY);

// Recorrer los detalles y agregarlos a la tabla
$item = 1;
foreach ($details as $detail) {
    $brand = $detail->brand;
    $model = $detail->model;
    $price = $detail->price;
    $year = $detail->year;

    $pdf->SetX($tableX);
    $pdf->Cell(15, 10, $item, 1, 0, 'C');
    $pdf->Cell(50, 10, utf8_decode($brand), 1, 0, 'C');
    $pdf->Cell(80, 10, utf8_decode($model), 1, 0, 'C');
    $pdf->Cell(20, 10, $year, 1, 0, 'C');
    $pdf->Cell(25, 10, $price, 1, 1, 'C');

    $item++;
}

// Escribir el total
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX($tableX + 135); // Posición para centrar el texto "Total"
$pdf->Cell(25, 10, 'Total:', 0, 0, 'R');
$pdf->Cell(25, 10, number_format($total, 2), 0, 1, 'C');

// Salida del PDF al navegador
$pdf->Output();
?>
