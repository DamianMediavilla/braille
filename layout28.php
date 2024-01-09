<?php

require('fpdf.php');

$pdf=new FPDF;
$pdf->AddFont('Braille6-ANSI','','Braille6-ANSI.php','tutorial');
$pdf->AddPage();
$charXrow=28; //el total de caracteres por renglon
$cellWidth=6.25;
$cellHeigth=8;
$printAsciiChar=true;
$printCellNumber=false;
$bordes=true;
$texto = " Había una vez, un perro verde";
$braille="-habia una vez, un perro verde";
$long=strlen($texto);
$longB=strlen($braille);
// echo $long;
// echo $longB;
for ($j=0;$j<=(256/$charXrow);$j++){
    if($printCellNumber){

        for ($i=1;$i<=$charXrow;$i++){
            $pdf->SetFont('Arial','',10);
            $pdf->Cell($cellWidth,$cellHeigth,$i+16*$j,1);
        }
        $pdf->Ln();
    }
    if ($printAsciiChar){
        for ($i=1;$i<=$charXrow;$i++){
            $pdf->SetFont('Arial','',10);
            $pdf->Cell($cellWidth,$cellHeigth,$texto[$i-1+16*$j],1);
        }
        $pdf->Ln();
    }
    for ($i=1;$i<=$charXrow;$i++){
        $pdf->SetFont('Braille6-ANSI','',12);
        $pdf->Cell($cellWidth,$cellHeigth,$braille[$i-1+16*$j],$bordes);
    }
    $pdf->Ln();
    break;

}
//Grilla básica
// for ($j=0;$j<=(256/$charXrow);$j++){
//     if($printCellNumber){

//         for ($i=1;$i<=$charXrow;$i++){
//             $pdf->SetFont('Arial','',10);
//             $pdf->Cell($cellWidth,$cellHeigth,$i+16*$j,1);
//         }
//         $pdf->Ln();
//     }
//     if ($printAsciiChar){
//         for ($i=1;$i<=$charXrow;$i++){
//             $pdf->SetFont('Arial','',10);
//             $pdf->Cell($cellWidth,$cellHeigth,chr($i+16*$j),1);
//         }
//         $pdf->Ln();
//     }
//     for ($i=1;$i<=$charXrow;$i++){
//         $pdf->SetFont('Braille6-ANSI','',12);
//         $pdf->Cell($cellWidth,$cellHeigth,chr($i+16*$j),$bordes);
//     }
//     $pdf->Ln();

// }

$pdf->Output();
