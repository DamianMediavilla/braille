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
    
    <form action="/calendariodinamico.php" method="post">
    <label for="mes">Mes</label>
    <input type="number" name="mes" id="mes">
    <label for="papel">Tamaño Papel</label>
    <select name="papel" id="papel">
        <option value="A4" selected>A4</option>
        <option value="Carta">Carta</option>
    </select>
    <select name="margenes" id="margenes">
        <option value="" selected>Sin Margen</option>
        <option value="20-24-20-20">Sencillo (Sup:20mm, Izq:24mm, Der:20mm, Inf:20mm</option>
    </select>
    <select name="color" id="color">
        <option value="Gris" selected>Gris</option>
        <option value="Rojo" >Rojo</option>
        <option value="Azul" >Azul</option>
        <option value="Verde" >Verde</option>
        <option value="Random" >Random</option>
    </select>
    
    <label for="texto">Texto &#x2802</label>
    <textarea name="texto" id="texto" cols="40" rows="30">Carajillo &#x2802 &#x2800 &#x2803  Braille</textarea>

    <input type="submit" value="Enviar">
</form>
</body>
</html>

