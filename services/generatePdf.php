<?php
require('../utils/fpdf185/fpdf.php');

// Establecer la codificación de caracteres UTF-8
header('Content-Type: text/html; charset=utf-8');

// Obtener los datos enviados en el cuerpo de la solicitud
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData);

$currentDate = $data->currentDate;
$detail = $data->detail;
$id = $data->id;
$total = $data->total;

// Crear una nueva instancia de FPDF
$pdf = new FPDF();

// Agregar una página al PDF
$pdf->AddPage();

// Ajustar la posición y el tamaño del logo en la esquina superior derecha
$pdf->Image('../assets/logoFagham.jpeg', $pdf->GetPageWidth() - 60, 10, 50); // Ajusta las coordenadas y el tamaño según sea necesario

// Establecer la fuente y el tamaño del texto para el título
$pdf->SetFont('Arial', 'B', 16);

// Centrar el título en la página
$title = utf8_decode('Cotización');
$pdf->Cell(0, 20, $title, 0, 1, 'C');

// Añadir un espacio en blanco
$pdf->Ln(10);

// Establecer la fuente y el tamaño del texto para el contenido
$pdf->SetFont('Arial', '', 12);

// Obtener el ancho de la página
$pageWidth = $pdf->GetPageWidth();

// Ajustar el ancho de la tabla
$tableWidth = 100;
$tableX = ($pageWidth - $tableWidth) / 2;

// Crear la tabla
$pdf->SetX($tableX);
$pdf->Cell(50, 10, 'Fecha', 1, 0, 'L');
$pdf->Cell(50, 10, utf8_decode($currentDate), 1, 1, 'L');

$pdf->SetX($tableX);
$pdf->Cell(50, 10, 'ID', 1, 0, 'L');
$pdf->Cell(50, 10, utf8_decode($id), 1, 1, 'L');

$pdf->SetX($tableX);
$pdf->Cell(50, 70, 'Detalle', 1, 0, 'L');
$pdf->MultiCell(50, 10, utf8_decode($detail), 1, 'L'); // Utilizar MultiCell() para mantener los saltos de línea

$pdf->SetX($tableX);
$pdf->Cell(50, 10, 'Total', 1, 0, 'L');
$pdf->Cell(50, 10, utf8_decode($total), 1, 1, 'L');

// Salida del PDF al navegador
$pdf->Output();
?>
