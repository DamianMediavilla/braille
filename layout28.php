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
$prueba="Prueba caracteres ";
$texto = $prueba . "           ";
$braille="Prueba caracteres qqqqqqqqqq                 ";
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
$cellWidth=6.15;
$texto = $prueba . $cellWidth . "        ";
$cellHeigth=9.6;
$pdf->SetFont('Arial','',10);
$pdf->Cell($cellWidth,$cellHeigth,$cellHeigth,0);
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
$cellWidth=6.25;
$texto = $prueba . $cellWidth . "        ";
// $cellHeigth+= 0.2;
// $pdf->SetFont('Arial','',10);
// $pdf->Cell($cellWidth,$cellHeigth,$cellHeigth,0);
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
$cellWidth=6.5;
$texto = $prueba . $cellWidth . "        ";
$cellHeigth+= 0.2;
$pdf->SetFont('Arial','',10);
$pdf->Cell($cellWidth,$cellHeigth,$cellHeigth,0);
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
$cellWidth=6.75;
$texto = $prueba . $cellWidth . "        ";
// $cellHeigth+= 0.2;
// $pdf->SetFont('Arial','',10);
// $pdf->Cell($cellWidth,$cellHeigth,$cellHeigth,0);
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
$cellWidth=7;
$texto = $prueba . $cellWidth . "           ";
$cellHeigth+= 0.2;
$pdf->SetFont('Arial','',10);
$pdf->Cell($cellWidth,$cellHeigth,$cellHeigth,0);
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
$cellWidth=5;  
$texto = $prueba . $cellWidth . "           ";
// $cellHeigth+= 0.2;
// $pdf->SetFont('Arial','',10);
// $pdf->Cell($cellWidth,$cellHeigth,$cellHeigth,0);
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
$cellWidth=10;
$pdf->SetFont('Arial','',10);
$cellHeigth+= 0.2;
$pdf->Cell($cellWidth,$cellHeigth,$cellHeigth,0);
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
$pdf->SetFont('Arial','',10);
$cellWidth=6;
$texto = $prueba . $cellWidth . "            ";

for ($j=0; $j<10;$j++){
    for ($i=0; $i<20;$i++){
        $pdf->Cell($cellWidth,$cellHeigth,$cellWidth,$bordes);
    }
    $pdf->Ln();
    $cellWidth+= 0.1;
    $texto = $prueba . $cellWidth . "            ";
    if ($j==1||$j==5){
        $cellHeigth+= 0.2;
        $pdf->Cell($cellWidth,$cellHeigth,$cellHeigth,0);
    }
}
$cellWidth=7;
for ($i=0; $i<20;$i++){
    $pdf->Cell($cellWidth,4,$cellWidth,$bordes);
}
$pdf->Ln();
$cellWidth=7.5;
for ($i=0; $i<20;$i++){
    $pdf->Cell($cellWidth,4,$cellWidth,$bordes);
}
$pdf->Ln();

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
