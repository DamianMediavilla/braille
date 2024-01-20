<?php

require('fpdf.php');


$anchoCelda=33;
$altoCelda=24;

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

function getWeek($month=0,$year=0){
    //returns the first week of a given month or current month
    if($month==0||$year==0){
        $time=time();
    }else{
        $time=mktime(5,0,0,$month+1,1,$year);
    };
    $time=mktime(5,0,0,$month+1,1,$year);
    date('W',$time)>50?$nWeek=0:$nWeek=date('W',$time)+0;
    return $nWeek;
};
function getCont($month=0,$year=0){
    //returns the first week of a given month or current month
    
    $time=mktime(5,0,0,$month+1,1,$year); //time of 1st day of month
    $nStarterDay=date('N',$time)-1; // Usamos 'N' y restamos uno para coincidir con posiciones del array
    
    $newCont=0-($nStarterDay)+1; //Iniciamos el contador con valores negativos, para imprimir los primeros dias de la semana correspondientes al mes anterior con otro formato
    $newCont=1+$nStarterDay*-1; //Iniciamos el contador con valores negativos, para imprimir los primeros dias de la semana correspondientes al mes anterior con otro formato
    return $newCont;
};

$pdf=new FPDF('L');
$pdf->SetFillColor(240);
$pdf->SetFont('Arial','',18);
$pdf->SetFillColor(250,250,230);
$pdf->GetPageHeight();
$pdf->GetPageWidth();
$pdf->SetTopMargin(20);
$pdf->SetMargins(10,20);
//$pdf->Text(120,10, $meses[$nMes] . "   DayArr" . $dias[$diaqempiezaelmes] . "  numArr". $diaqempiezaelmes . "  ". date('... D - d - m - Y',$tiempo));

for($m=0;$m<12;$m++){
    $pdf->AddPage();
    $pdf->Text(120,10, $meses[$m ] . "     " . $year);
 

    $pdf->Ln(2);
    $nSemana=getWeek($m,$year); //Numera la primer semana del mes
    $contador=getCont($m,$year); //Asigna un valor al contador para calcular que dia empieza el mes
    $nDias=date('t',mktime(5,0,0,$m+1,1,$year)); //Asigna la cantidad de dias ddel mes (de 28 a 31)

    $pdf->Text(20,20, "Debug: " . 
    " DiaInicial " . date('N', mktime(5,0,0,$m+1,1,$year))-1 .
    " nombre " . $dias[date('N', mktime(5,0,0,$m+1,1,$year))-1].
    " NCont " . $contador .
    " mes 0-11: " . $m .
    " anio: " . $year);

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
        $pdf->Text($pdf->GetX()+1,$pdf->GetY()+22,$nSemana++);
        $pdf->Cell($anchoCelda,$altoCelda,'','B',1,'',false,'');
    
        $pdf->SetFont('Arial','',18);
        //$pdf->Ln();
    };
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
