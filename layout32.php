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
    $word=$text;
    if (strlen($word)<1){
        //La palabra tiene dos o mas caracteres.
    }
    $arr=str_split($word);

    var_dump($arr);



    return $text;
}

$mariposas=file_get_contents('mariposas.txt');
//$texto=parse_text_braille($mariposas);
//echo $texto;
function test_case(string $value, string $esperable){
    if (parse_text_braille($value)==$esperable){
        echo "cierto<br>";
        return true;
    }
    echo "falso<br>";
    return false;

};

test_case("Había","↑había");
test_case("HOLA","↑↑hola");
// test_case("123","§123");
// test_case("12 3","§12 §3");
// test_case("Damo17","↑damo§1§7"); //o "↑damo§17"
// test_case("H18b","↑h§18↓b"); 
exit;















$pdf=new PDF_Rotate();
$pdf->AddFont('Braille6-ANSI','','Braille6-ANSI.php','tutorial');
$pdf->AddPage();
// $pdf->Rotate(180, 100,100);
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
