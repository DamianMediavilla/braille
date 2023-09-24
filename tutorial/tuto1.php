<?php
require('../fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(45,10,'¡Hola, Mundo!');
$pdf->Cell(40,10,'Zarasa');
$pdf->Cell(80,10,'1');
$pdf->Ln(20);
$pdf->Cell(80,25,'2');
$pdf->Cell(50,10,'3----------------------------');
$pdf->Cell(10,10,'3');
$pdf->Cell(80,10,'3');
$pdf->Output();
?>
