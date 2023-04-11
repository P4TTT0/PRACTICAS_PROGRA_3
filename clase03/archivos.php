<?php
//r - READ
//w - WRITE
//a - APPEND (Concatena informacion en el arhcivo, si no existe, crea uno)
//x - (Crea el archivo solo para lectura)

//ABRO EL ARCHIVO (Y lo almaceno en la variable archivo que sera un entero que referencia al archivo en cuestion)
$archivo = fopen("archivo.txt", "r"); //Nombre del archivo, "r = read"
//LEO EL ARCHIVO
echo "<h2>" . fread($archivo, filesize("archivo.txt")) . "</h2>";
//CIERRO EL ARCHIVO
fclose($archivo); //Retorna TRUE si se cerro con éxito - FALSE en caso contrario

//ABRO EL ARCHIVO (Y lo almaceno en la variable archivo que sera un entero que referencia al archivo en cuestion)
$archivo = fopen("archivo.txt", "r"); //Nombre del archivo, "r = read"
//FILE END OF FILE - feof()
while(!feof($archivo))
{
    echo fgets($archivo). "<br>";
}
fclose($archivo); //Retorna TRUE si se cerro con éxito - FALSE en caso contrario

//ABRO EL ARCHIVO en modo APPEND
$archivo = fopen("archivo.txt", "a");
//ESCRIBO EL ARCHIVO con fwrite() y ALMACENO la cantidad de bytes agregados en cantidadEscritura
$cantidadEscritura = fwrite($archivo, "\nEntre al archivo con la funcion fwrite()");
//VERIFICO si se han modificado los bytes
if($cantidadEscritura > 0)
{
    echo "Escritura EXITOSA" . "<br>";
}
//CIERRO EL ARCHIVO
fclose($archivo);
//ABRO EL ARCHIVO en modo READ
$archivo = fopen("archivo.txt", "r");
//LEO EL ARCHIVO CON fgets() y feof()
while(!feof($archivo))
{
    echo fgets($archivo) . "<br>";
}
//CIERRO EL ARCHIVO
fclose($archivo);

//COPIAMOS EL ARCHIVO archivo original a archivo destino 
//En caso de existir lo sobreescribe
//Retorna TRUE si lo pudo copiar FALSE en caso contrario
echo copy("archivo.txt", "archivoCopia.txt") ? "Copiado con exito" : "ERROR - No se pudo copiar";
echo copy("archivo.txt", "archivoCopiaBorrado.txt") ? "Copiado con exito" : "ERROR - No se pudo copiar";

//Elimino el archivo
echo unlink("archivoCopiaBorrado.txt") ? "Se ha eliminado con exito" : "ERROR - No se pudo eliminar";

$texto = isset($_POST["texto"]) ?  $texto = $_POST["texto"] : $texto = "VACIO";

$archivo = fopen("archivo.txt", "a");
//ESCRIBO EL ARCHIVO con fwrite() y ALMACENO la cantidad de bytes agregados en cantidadEscritura
$cantidadEscritura = fwrite($archivo, $texto);
//VERIFICO si se han modificado los bytes
if($cantidadEscritura > 0)
{
    echo "Escritura EXITOSA" . "<br>";
}
?>