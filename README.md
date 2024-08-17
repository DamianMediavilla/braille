# braille
php app for print braille sheets

Pasos
1. Index con:
    - breve explicacion de como usar
    - Boton para acceder a form
1. Form con:
    - Campo a ingresar texto
    - nombre de archivo
    - eleccion tamaño papel
1. Objeto con 



### Metodos

+ ->cell()
+ ->Ln(): crea una salto de línea   
+ ->cell()
+ ->cell()


#### Modo de uso, alcance, penddientes

+ Configuracion de portada, el texto va centrado, por lo que rellenar los 28 caracteres con espacios blancos seria adecuado- 27 lineas (la linea 1 y 29 van en blanco)
+ Siglas, van literales ↑O↑N↑C↑E  ↑Renfer
+ subrayados con caracter 14 (C) (excede al txt)
+ La ONCE utiliza signos como # para indicador de numeros y {como indicador de mayus
 Ejemplo {i{s{b{n: #hd-#gajj-#hjb-#h
+ Los formatos de libros Braille tiene generalmente 38 caracteres en 29 lineas. Tambien son comunes los formatos de 36 y 33 caracteres por línea. 
+ El objetivo de esta herramienta es facilitar el intercambio de mensajes escritos entre escritura Braille y el alfabeto español (u otros basados en latín)
+ Los valores por defecto serán de 28 casillas por renglon, ya que las reglas de escritura braille más comunes tienes ésta cantidad de casillas.
+ El texto puede escribirse en español y ser impreso en braille(tinta). Puede ser impreso de izq-der, o del reverso (en espejo) para poder utilizarlo como guía para la perforacion manual con regleta. También debería ser posible la impresion de caracteres ascii y caracteres braille superpuestos, para facilitar la comprension de los textos en ambos alfabetos y facilitar el reconocimiento de caracteres
+ El documento debería poder imprimirse con paginas al derecho, paginas al revés (espejadas) o una combinacion de ambas intercaladas (las impares al derecho, y las pares al revés) de manera de que la pagina 1 al derecho, lleve la pagina 2 al revés, impresas sobre la misma hoja, quedando la tinta superpuesta en ambas caras como si el papel fuese transparente. 
+ Las funciones deben ser separadas:
    + Crear una clase que permita rotaciones. 
    + Crear una clase/funcion para _parsear_ el texto de entrada en texto con indicaciones braille
    + Crear un diccionario con la equivalencia alfanumerica-unicodeBraille-nomenclaturaBraille-binaria(electronica) (ej C-u2809-14-00001001)
    + Verificar la posibilidad de que binario-unicode-alfanumerico puedan tener relacion y dejarla explicada (por ejemplo en unicode el 2800 es igual a 0)