<?php
define("SEMANAS",54);

//Semanario
$current_year= $_GET['year'] ?? 2024;
$first_day=mktime(5,0,0,1,1,$current_year);

/*
Si el primer dia del año, tiene numero de semana 52 (!=1, o >50) se imprime primero la seman ultima del año anterior.
Siete columnas, horario 8 a 21  primer celda vacia, dos celdas adicionales, linea baja. 
Abcho celda + gap celda

Sabado y Domingo comparten columna. Se imprime mini calendario
Cabecera es numero + nombre dia multilang
*/

if($week=date('W',$first_day)>50){
    $week=0;
    $year=$current_year-1;
}

$dias_es=['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'];

for($week;$week<SEMANAS;$week++){
    for($day;$day<7;$day++){
        echo $dias_es[$day];
    }
}

for($page;$page<SEMANAS;$pege++){
    
    for($day;$day<7;$day++){
        echo $dias_es[$day];
    }
}


$time=time();

$week=date('W',$time);
$data=date('d/m/Y',$time);
echo "semana: " . $week . '<br>';
echo "fecha: " . $data . '<br>';
$week=date('W',$time=$time+(60*60*24*7));
$data=date('d/m/Y',$time);
echo "semana: " . $week . '<br>';
echo "fecha: " . $data . '<br>';



