<?php
require('../fpdf.php');


$pdf = new FPDF();
$pdf->AddFont('CevicheOne','','CevicheOne-Regular.php','.');
$pdf->AddFont('Braille6-ANSI','','Braille6-ANSI.php','.');

$pdf->AddPage();


$pdf->SetFont('Braille6-ANSI','',72);
$pdf->Write(55,'braille');
$pdf->Write(55,'@');
$pdf->Output();
?>