<?php

require('fpdf.php');


$anchoCelda=33;
$altoCelda=27;

// for ($i=0;$i<7;$i++){
//     $pdf->SetFillColor(240,120+10*$i,10+20*$i);
//     $pdf->Cell($anchoCelda,$altoCelda,$i+1,1,0,"",true,"");
// };
$meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
$dias=["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];


//$tiempo=time()+strtotime("+3 month");
//$tiempo=time();
$mes=2;
$year=2023;
$tiempo=mktime(5,0,0,$mes,1,$year);

$nYear=date('Y',$tiempo); 

$nMes=date('n',$tiempo)-1; //1 a 12
$nMesm=date('m',$tiempo); //01 a 12

$nDiaDelMes=date('j',$tiempo)-1;
$nDias=date('t',$tiempo);
$nDiaSemana=date('N',$tiempo); //1=lunes a 7=dom
$nDiaSemana=date('w',$tiempo); //de 0=Dom a 6=Sab

date('W',$tiempo)>50?$nSemana=0:$nSemana=date('W',$tiempo)+0;

$diaqempiezaelmes=date('N',$tiempo)-1; // Usamos 'N' y restamos uno para coincidir con posiciones del array

$contador=0-($diaqempiezaelmes)+1; //Iniciamos el contador con valores negativos, para imprimir los primeros dias de la semana correspondientes al mes anterior con otro formato

$pdf=new FPDF('L');
$pdf->AddPage();
$pdf->SetFillColor(240);
$pdf->SetFont('Arial','',18);
$pdf->SetFillColor(250,250,230);
$pdf->GetPageHeight();
$pdf->GetPageWidth();
$pdf->SetTopMargin(20);
$pdf->SetMargins(10,20);
//$pdf->Text(120,10, $meses[$nMes] . "   DayArr" . $dias[$diaqempiezaelmes] . "  numArr". $diaqempiezaelmes . "  ". date('... D - d - m - Y',$tiempo));
$pdf->Text(120,10, $meses[$nMes] . "     " . $year);
$pdf->Ln(2);

for ($columna=0;$columna<7;$columna++){ //imprime los dias de la semana
    $pdf->Cell($anchoCelda,10,$dias[$columna],1,0,"",false,"");
};

$pdf->SetFont('Arial','',11);
$pdf->Text($pdf->GetX()+1,$pdf->GetY()+8,'Semana');
$pdf->Cell($anchoCelda,10,"",'B',1,"",false,"");
$pdf->SetFont('Arial','',18);

for ($fila=0;$fila<6;$fila++){
    for ($columna=0;$columna<7;$columna++){
        if ($contador<1 or $contador>$nDias){
            $pdf->SetFillColor(90);
            $numero='';
        }else{
            $pdf->SetFillColor(230);
            $numero=$contador;
        }
        $pdf->Cell($anchoCelda,$altoCelda,'',1,0,"",true,"");
        $pdf->Text($pdf->GetX()-$anchoCelda+1,$pdf->GetY()+6,$numero);
        //$pdf->Write(10,$numero);
        $contador++;
    };
    //imprime semana
    
    $pdf->SetFont('Arial','',11);
    //$pdf->SetTextColor(0, 0, 255);
    // $pdf->SetFont('', 'U');
    //$pdf->Write(5, 'www.fpdf.org', 'http://www.fpdf.org');
    $pdf->Text($pdf->GetX()+1,$pdf->GetY()+25,$nSemana++);
    $pdf->Cell($anchoCelda,$altoCelda,'','B',1,'',false,'');

    $pdf->SetFont('Arial','',18);
    //$pdf->Ln();
};

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
//exit;
$pdf->Output();
