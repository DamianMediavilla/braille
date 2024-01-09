<?php
require('fpdf.php');


$titulo= $_POST['titulo'] ?? '';
$texto= $_POST['texto'] ?? '';
$margen_izq= $_POST['margen_izq'] ?? '';
$margen_der= $_POST['margen_der'] ?? '';
$margen_top= $_POST['margen_top'] ?? '';
$margen_bot= $_POST['margen_bot'] ?? '';
$papel= $_POST['papel'] ?? 'A4';
$texto= $_POST['texto'] ?? '';
$texto = mb_convert_encoding($texto, 'windows-1252', 'UTF-8');
$titulo = mb_convert_encoding($titulo, 'windows-1252', 'UTF-8');


$pdf = new FPDF();
$pdf->AddFont('Braille6-ANSI','','Braille6-ANSI.php','tutorial');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetFont('Braille6-ANSI','',16);
$pdf->Cell(40,10, $titulo);
$pdf->Ln(25);
$pdf->MultiCell(0,5,$texto,2);
$pdf->Output();
?>