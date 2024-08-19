<?php

require('rfpdf.php');

function parse_text_braille($text){
    //Tenemos que lograr cumplir los siguientes ejemplos 
    //entrada "Había"   salida ">había"
    //entrada "HOLA"   salida ">>hola<<"
    //entrada "123"   salida "*123"
    //entrada "12 3"   salida "*12 *3"
    //entrada "Damo17"   salida ">damo*1*7"
    if ($text=="Había"){
        return "↑había";
    }
    return $text;
}


$charXrow=28; //el total de caracteres por renglon
$cellWidth=6.25;
$cellHeigth=8;
$printAsciiChar=true;
$printCellNumber=false;
$printBraille=false;
$bordes=true;
$texto = " Habia una vez, un perro verde, que movía la cola muy contento. Tenía la manía de correr y correr, ladrando a los pajaros que huían de él";
$braille="-habia una vez, un perro verde";
$textorev=strrev($texto);
$braillerev=strrev($braille);
$long=strlen($texto);
$longB=strlen($braille);

$mariposas=file_get_contents('mariposas.txt');
$texto=parse_text_braille($mariposas);

$pdf=new PDF_Rotate();
$pdf->AddFont('Braille6-ANSI','','Braille6-ANSI.php','tutorial');
$pdf->AddPage();
// $pdf->Rotate(180, 100,100);
$pdf->SetFont('Arial','',10);
// echo $long;
// echo $longB;


//separar texto en array. 
$arr=str_split($texto,28);
// var_dump($arr);
// exit;


function separar($text){
    $array=explode(" ",$text);
    return $array;
}
function agrupar($words, $limite=28){
    $array=[];
    $line='';
    foreach ($words as $word){
        if (strlen(' ' . $word)+strlen($line)<=$limite){
            $line .= ' ';
            $line .= $word;
        }else{
            $array[]=$line;
            $line=$word;
        }
    }
    $array[]=$line;
    return $array;
}

$arr=separar($texto);
$txt=agrupar($arr);



$pdf->Ln();



foreach ($txt as $line_text){
    for ($i=0;$i<strlen($line_text);$i++){
        $pdf->SetFont('Arial','',10);
        $pdf->Cell($cellWidth,$cellHeigth,$line_text[$i],1);
        // $pdf->Cell($cellWidth,$cellHeigth,$i,1);
     
    }
    $pdf->Ln();

}


//completar cadenas y revesearlas
function comp_and_rev($array, $limit=28){
    $resultado=[];
    foreach($array as $line){
        $line = str_pad($line,$limit);
        $resultado[]=strrev($line);
    }
    return $resultado;
}

$txt=comp_and_rev($txt);

$pdf->SetFont('Arial','',10);
$pdf->SetFont('Braille6-ANSI','',16);

foreach ($txt as $line_text){
    for ($i=0;$i<strlen($line_text);$i++){
    //    $pdf->Cell($cellWidth,$cellHeigth,$line_text[$i],1);
        $pdf->Cell($cellWidth,$cellHeigth,"",$bordes);
        $pdf->TextWithRotation($pdf->GetX()-1.8,$pdf->GetY()+$cellHeigth/1.5, $line_text[$i], 180,180) ;
     
    }
    $pdf->Ln();

}


$pdf->Output();

/*
flujo de trabajo
.Procesamiento de datos.
- Recibir parametros y texto



.Qué tengo que enviar de un paso al otro?.


.Creacion del pdf.
dividido en precomp y compaginacion
precomp:
limitacion de caracteres, lineasw etc.-

compaginacion:
apertura del pdf

cierre del pdf
*/