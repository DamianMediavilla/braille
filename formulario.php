<form action="/pdf.php" method="post">
    <label for="titulo">Título del documento</label>
    <input type="text" name="titulo" id="titulo">
    <label for="papel">Tamaño Papel</label>
    <select name="papel" id="papel">
        <option value="A4" selected>A4</option>
        <option value="Carta">Carta</option>
    </select>
    <select name="margenes" id="margenes">
        <option value="" selected>Sin Margen</option>
        <option value="20-24-20-20">Sencillo (Sup:20mm, Izq:24mm, Der:20mm, Inf:20mm</option>
    </select>
    
    <label for="texto">Texto &#x2802</label>
    <textarea name="texto" id="texto" cols="40" rows="30">Carajillo &#x2802 &#x2800 &#x2803  Braille</textarea>

    <input type="submit" value="Enviar">
</form>