<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos leen</title>
</head>
<body>
    <header>
        <h1>
            Creador de pdf
        </h1>
    </header>
    <?php include "formulario.php"; ?>
    <nav>
    <h3>Links</h3>
    <?php for ($i=1; $i<8;$i++){
        echo '<a href="/tutorial/tuto'.$i.'.htm">Tuto'.$i.' explicacion</a>';
        echo '<br>';
        echo '<a href="/tutorial/tuto'.$i.'.php">Tuto'.$i.' PDF</a>';
        echo '<br>';
    } ?>
    </nav>
    <hr>
    <a href="pruebaBraille.php">PRUEBA</a>
    <a href="layout28.php">Braille28</a>
    <a href="pruebaBrailleUnicode.php">PRUEBA Unicode</a>
    <a href="pruebaCalendario.php">PRUEBA cALENDARIO</a>
</body>
</html>