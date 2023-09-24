<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>
            Creador de pdf
        </h1>
    </header>
    <form action="/pdf.php" method="post">
        <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo">
        <label for="papel">Tamaño Papel</label>
        <select name="papel" id="papel">
            <option value="A4">A4</option>
            <option value="Carta">Carta</option>
        </select>
        
        <label for="texto">Texto</label>
        <textarea name="texto" id="texto" cols="40" rows="30"></textarea>

        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>