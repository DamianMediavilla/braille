<form action="/pdf.php" method="post">
    <label for="titulo">Título del documento</label>
    <input type="text" name="titulo" id="titulo">
    <label for="papel">Tamaño Papel</label>
    <select name="papel" id="papel">
        <option value="A4" selected>A4</option>
        <option value="Carta">Carta</option>
    </select>
    <label for="code">Codificacion</label>
    <select name="code" id="code">
        <option value="unicode" >Unix</option>
        <option value="numerico" >NumOnce</option>
        <option value="texto" selected>texto</option>
    </select>
    <select name="margenes" id="margenes">
        <option value="" selected>Sin Margen</option>
        <option value="20-24-20-20">Sencillo (Sup:20mm, Izq:24mm, Der:20mm, Inf:20mm</option>
        <option value="20-44-20-20">Anillado (Sup:20mm, Izq:44mm, Der:20mm, Inf:20mm</option>
    </select>
    
    <label for="texto">Texto &#x281E &#x2811 &#x282D &#x281E &#x2815 </label> </br>
    <textarea name="texto" id="texto" cols="40" rows="30">Introduce aquí el texto a traducir</textarea>
    <label for="invertido">Invertido</label>
    <input type="checkbox" name="invertido" id="invertido">
    <label for="grilla">Grilla</label>
    <input type="checkbox" name="grilla" id="grilla">
    <label for="guia">Guia</label>
    <input type="checkbox" name="guia" id="guia" checked>

    <input type="submit" value="Enviar">
</form>