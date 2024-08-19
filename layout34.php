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
function parse_text_ascii($text){ //al igual que el BRAILLE, devuelve la cadena de texto con modificaciones si fuesen necesrais para coincidir en cantidad de caracteres
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


// DEFINICION DE PARAMETROS

//de pagina y cuadricula
$charXrow=28; //el total de caracteres por renglon
$cellWidth=6.45; //segun pruebas entre 6.4 y 6.5
$cellHeigth=10.45; //segun pruebas entre 10.4 y 10.5
$rowsXpage=30; // +++++++++++ sin definir
$bordes=true;
//$margenes


// modificar
$printAsciiChar=true; 
$printCellNumber=false;
$printBraille=false;
$texto = " Habia una vez, un perro verde, que movía la cola muy contento. Tenía la manía de correr y correr, ladrando a los pajaros que huían de él";
$braille="-habia una vez, un perro verde";
$textorev=strrev($texto);
$braillerev=strrev($braille);
$long=strlen($texto);
$longB=strlen($braille);
//modos
$soloAsciiDer=false;
$soloAsciiRev=false;
$soloBrailleDer=false;
$soloBrailleRev=false;
$paginasIntercaladas=true;

// MANIPULACION TEXTO
/* 
tomamos un texto de entrada y retornamos cuatro arrays. 
Cada uno de estos arrays corresponde an textoAsciiDer textoAsciiIzq textoBrailleDer textoBrailleIzq
Cada array se compone de la misma cantidad de lineas y caracteres
*/
$simple=file_get_contents('simple_lower.txt');
$texto=parse_text_braille($simple);
$texto_entrada=file_get_contents('texto largo.txt');






// Qué llega a la creacion de PDF

/* Tipo de documento (alternado, invertido, integrado, etc)
Arrays preprocesados de textos (textoAsciiDer textoAsciiIzq textoBrailleDer textoBrailleIzq)
*/
function separar_agrupar_completar_rev($texto, $charXrow=28, $rev=false){
    //Toma texto como entrada, devuelve un array de lineas de tamaño fijo, que pueden o no estar invertidas
    $words=explode(" ",$texto);
    $rows=[];
    $line='';
    foreach ($words as $word){
        if (strlen(' ' . $word)+strlen($line)<=$charXrow){ //esta condicion debe ser revisada ya que agrega un espacio delante de la primer palabra. Pensar como reescribirlo para que utilice el salto de linea como espacio (que no cree una linea nueva si el caracter 28 es una letra)
            $line .= $word;
            $line .= ' ';
        }else{
            $line = str_pad($line,$charXrow);
            if ($rev){
                $rows[]=strrev($line);
            } else{
                $rows[]=$line;
            }
            $line=$word;
        }
    }
    $line = str_pad($line,$charXrow);
    if ($rev){
        $rows[]=strrev($line);
    } else{
        $rows[]=$line;
    }
    return $rows;

}

function procesar_texto($texto_entrada){
    //declaramos los arrays para luego rellenar y devolver
    $textoAsciiDer=[];
    $textoAsciiIzq=[];
    $textoBrailleDer=[];
    $textoBrailleIzq=[];

    // traducimos el texto a caracteres ascii
    $braille=parse_text_braille($texto_entrada);
    $ascii=parse_text_ascii($texto_entrada);

    $textoAsciiDer=separar_agrupar_completar_rev($ascii);
    $textoAsciiIzq=separar_agrupar_completar_rev($ascii, 28,true);
    $textoBrailleDer=separar_agrupar_completar_rev($braille);
    $textoBrailleIzq=separar_agrupar_completar_rev($braille, 28,true);

    return $arreglos=[$textoAsciiDer, $textoAsciiIzq, $textoBrailleDer, $textoBrailleIzq];
}


$arreglos=procesar_texto($texto_entrada);
$textoAsciiDer=$arreglos[0];
$textoAsciiIzq=$arreglos[1];
$textoBrailleDer=$arreglos[2];
$textoBrailleIzq=$arreglos[3];




// CREACION DE PDF
$pdf=new PDF_Rotate();
$pdf->AddFont('Braille6-ANSI','','Braille6-ANSI.php','tutorial');
// $pdf->Rotate(180, 100,100);
$pdf->SetFont('Arial','',10);




if ($soloAsciiDer){
    $pdf->AddPage();
    
    foreach ($textoAsciiDer as $line_text){
        for ($i=0;$i<strlen($line_text);$i++){
            $pdf->SetFont('Arial','',10);
            $pdf->Cell($cellWidth,$cellHeigth,$line_text[$i],1);
            // $pdf->Cell($cellWidth,$cellHeigth,$i,1);
            
        }
        $pdf->Ln();
        
    }
    
}
if ($soloAsciiRev){
    $pdf->AddPage();
    
    $pdf->SetFont('Arial','',10);
    foreach ($textoAsciiIzq as $line_text){
        for ($i=0;$i<strlen($line_text);$i++){
            $pdf->Cell($cellWidth,$cellHeigth,"",$bordes);
            $pdf->TextWithRotation($pdf->GetX()-1.8,$pdf->GetY()+$cellHeigth/1.5, $line_text[$i], 180,180) ;
            
            // $pdf->Cell($cellWidth,$cellHeigth,$i,1);
            
        }
        $pdf->Ln();
        
    }
    
}
if ($soloBrailleDer){
    
    $pdf->AddPage();
    $pdf->SetFont('Braille6-ANSI','',16);
    foreach ($textoBrailleDer as $line_text){
        for ($i=0;$i<strlen($line_text);$i++){
            $pdf->Cell($cellWidth,$cellHeigth,$line_text[$i],1);
            
        }
        $pdf->Ln();
        
    }
    
}

if ($soloBrailleRev){
    $pdf->AddPage();
    $pdf->SetFont('Braille6-ANSI','',16);
    
    foreach ($textoBrailleIzq as $line_text){
        for ($i=0;$i<strlen($line_text);$i++){
            //    $pdf->Cell($cellWidth,$cellHeigth,$line_text[$i],1);
            $pdf->Cell($cellWidth,$cellHeigth,"",$bordes);
            $pdf->TextWithRotation($pdf->GetX()-1.8,$pdf->GetY()+$cellHeigth/1.5, $line_text[$i], 180,180) ;
            
        }
        $pdf->Ln();
        
    }
}

if ($paginasIntercaladas){
    
    $rowsXpage=22;
    $lineas_totales=count($textoAsciiDer);
    $linea_actual=0;
    $bordes=1;
    $margenIzq=8;
    $anchoPapel=210;
    $anchoRegleta=28; //es la cantidad de casillas, es decir el limite de caracteres
    $anchoImpreso=$cellWidth*$anchoRegleta;
    $margenInvertido=$anchoPapel-$anchoImpreso-$margenIzq;


    while(count($textoBrailleIzq)){

      
        $pdf->SetFont('Arial','',16);
        $pdf->Ln();
        $j=0;
        $pdf->SetMargins($margenIzq,15);
        $pdf->AddPage();
        while($line_text=array_shift($textoAsciiDer)){
            for ($i=0;$i<strlen($line_text);$i++){
                $pdf->Cell($cellWidth,$cellHeigth,$line_text[$i], $bordes);
                // $pdf->Cell($cellWidth,$cellHeigth,"",$bordes);
                // $pdf->TextWithRotation($pdf->GetX()-1.8,$pdf->GetY()+$cellHeigth/1.5, $line_text[$i], 180,180) ;
                
            }
            $pdf->Ln();
            // if ($linea_actual==$lineas_totales) break; //pasar por esta condicion solo en un ciclo de impresiones, que es para el while gral
            // $linea_actual++;
            $j++;
            if ($j==$rowsXpage) break;
        }
        
        
        $pdf->SetMargins($margenInvertido,15);
        $pdf->AddPage();
        $pdf->SetFont('Braille6-ANSI','',16);
        $j=0;
        while($line_text=array_shift($textoBrailleIzq)){
            for ($i=0;$i<strlen($line_text);$i++){
            //    $pdf->Cell($cellWidth,$cellHeigth,$line_text[$i],1);
                $pdf->Cell($cellWidth,$cellHeigth,"",$bordes);
                $pdf->TextWithRotation($pdf->GetX()-1.8,$pdf->GetY()+$cellHeigth/1.5, $line_text[$i], 180,180) ;
             
            }
            $pdf->Ln();
            // if ($linea_actual==$lineas_totales) break; //pasar por esta condicion solo en un ciclo de impresiones, que es para el while gral
            // $linea_actual++;
            $j++;
            if ($j==$rowsXpage) break;
        }
    }

}




$pdf->Output();
