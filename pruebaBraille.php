<?php

require('fpdf.php');

$pdf=new FPDF;
$pdf->AddFont('Braille6-ANSI','','Braille6-ANSI.php','tutorial');
$pdf->AddPage();
$charXrow=16;
for ($j=0;$j<=(256/$charXrow);$j++){

    for ($i=1;$i<=$charXrow;$i++){
        $pdf->SetFont('Arial','',14);
        $pdf->Cell(10,8,$i-1+16*$j,1);
    }
    $pdf->Ln();
    for ($i=1;$i<=$charXrow;$i++){
        $pdf->SetFont('Arial','',14);
        $pdf->Cell(10,8,chr($i-1+16*$j),1);
    }
    $pdf->Ln();
    for ($i=1;$i<=$charXrow;$i++){
        $pdf->SetFont('Braille6-ANSI','',16);
        $pdf->Cell(10,10,chr($i-1+16*$j),1);
    }
    $pdf->Ln();

}
// for ($i=1;$i<=1;$i++){
//     $pdf->SetFont('Arial','',14);
//     $pdf->Cell(10,5,$i-1,1,1);
//     $pdf->Cell(10,5,chr($i-1),1,1);
//     $pdf->SetFont('Braille6-ANSI','',14);
//     $pdf->Cell(10,8,chr($i-1),1);
//     if ($i%16==0){
//         $pdf->Ln();
//     }
// }
$pdf->Output();
