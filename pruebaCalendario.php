<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pruebas de calendario</h1>
    <p>
        Hoy es
        <?php echo(date('D, d'))?> de 
        <?php echo(date('M'))?> de 
        <?php echo(date('Y'))?>
        <br>
        Estamos en el mes de :
        <?php echo(date('m'))?> <br>
        El mes tiene
        <?php echo(date('t'))?> dias


    </p>
    <p>
        <?php $tiempo=time()+strtotime("+1 month");?> 
        <?php echo("el timestamp usado es" . $tiempo);?> 

        El mes proximo es el mes de 
        <?php echo(date('M',$tiempo))?> 
        
        <br>
        y tiene
        <?php echo(date('t',$tiempo))?> dias


    </p>
    <a href="calendar1.php">Calendario 1</a>
    
</body>
</html>

