<?php

require('fpdf.php');


class PDF_Rotate extends FPDF{
var $angle=0;

function Rotate($angle,$x=-1,$y=-1)
{
    if($x==-1)
        $x=$this->x;
    if($y==-1)
        $y=$this->y;
    if($this->angle!=0)
        $this->_out('Q');
    $this->angle=$angle;
    if($angle!=0)
    {
        $angle*=M_PI/180;
        $c=cos($angle);
        $s=sin($angle);
        $cx=$x*$this->k;
        $cy=($this->h-$y)*$this->k;
        $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
    }
}

function _endpage()
{
    if($this->angle!=0)
    {
        $this->angle=0;
        $this->_out('Q');
    }
    parent::_endpage();
}
function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
{
    $font_angle+=90+$txt_angle;
    $txt_angle*=M_PI/180;
    $font_angle*=M_PI/180;

    $txt_dx=cos($txt_angle);
    $txt_dy=sin($txt_angle);
    $font_dx=cos($font_angle);
    $font_dy=sin($font_angle);

    $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',$txt_dx,$txt_dy,$font_dx,$font_dy,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
    if ($this->ColorFlag)
        $s='q '.$this->TextColor.' '.$s.' Q';
    $this->_out($s);
}
}


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

function parse_text_braille($text){
    //Tenemos que lograr cumplir los siguientes ejemplos 
    //entrada "Había"   salida ">había"
    //entrada "HOLA"   salida ">>hola<<"
    //entrada "123"   salida "*123"
    //entrada "12 3"   salida "*12 *3"
    //entrada "Damo17"   salida ">damo*1*7"
    return $text;
}
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
