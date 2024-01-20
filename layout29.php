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
$bordes=true;
$texto = " Había una vez, un perro verde";
$braille="-habia una vez, un perro verde";
$long=strlen($texto);
$longB=strlen($braille);
$pdf->SetFont('Arial','',10);
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
            $pdf->Cell($cellWidth,$cellHeigth, "",1);
            $pdf->TextWithRotation($pdf->GetX()-2,$pdf->GetY()+$cellHeigth/1.5, $texto[16*$j-$i], 180,180) ;
        }
        $pdf->Ln();
    }
    for ($i=1;$i<=$charXrow;$i++){
        $pdf->SetFont('Braille6-ANSI','',12);
        $pdf->Cell($cellWidth,$cellHeigth,"",$bordes);
        $pdf->TextWithRotation($pdf->GetX()-2,$pdf->GetY()+$cellHeigth/1.5, $braille[$i-1+16*$j], 180,180) ;
    }
    $pdf->Ln();
    break;
    
}
$pdf->SetFont('Arial','',10);
$pdf->TextWithRotation(150,65, $braille, 180,180) ;
$pdf->SetFont('Braille6-ANSI','',12);
$pdf->TextWithRotation(150,85, $braille, 180,180) ;
$pdf->SetFont('Arial','',10);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->Cell($cellWidth*3,$cellHeigth,$pdf->GetX(),1);
$pdf->Cell($cellWidth*3,$cellHeigth,$pdf->GetY(),1);
$pdf->SetFont('Braille6-ANSI','',12);
$pdf->Cell($cellWidth,$cellHeigth,"",1);
$pdf->TextWithRotation($pdf->GetX()-2,$pdf->GetY()+$cellHeigth/1.5, "e", 180,180) ;
// $pdf->TextWithRotation(50,65,'Hello',0,-45);
// $list=[0,45,90,135,180,185,270,345,360];
// $i=0;
// foreach ( $list as $grado){
//     $i++;
//     $pdf->TextWithRotation(30*$i,65,'Hello' . $grado ,$grado,$grado);
// }


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
