<nav>
        <h3>Links</h3>

    <?php for ($i=1; $i<8;$i++){
        echo '<a href="/tutorial/tuto'.$i.'.htm">Tuto'.$i.' explicacion</a>';
        echo '<br>';
        echo '<a href="/tutorial/tuto'.$i.'.php">Tuto'.$i.' PDF</a>';
        echo '<br>';
    } ?>
    <a href="pruebaBraille.php">PRUEBA</a>
    <a href="layout28.php">Braille28</a>
    <a href="pruebaBrailleUnicode.php">PRUEBA Unicode</a>
    <a href="pruebaCalendario.php">PRUEBA cALENDARIO</a>
</nav>