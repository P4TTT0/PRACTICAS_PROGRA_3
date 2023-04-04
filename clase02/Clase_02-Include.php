<?php
//include "/.no_existe.php"; //En caso de error INCLUDE genera un WARNING 
//require "/.no_existe.php"; //En caso de error REQUIRE genera un FATAL ERROR 
include "./Clase_02.php";  //Copia y pega en EJECUCION todo el codigo que haya en el archivo especificado
include_once "./Clase_02.php"; //Sirve para detectar conflictos e interseccion entre declaraciones de distintos codigos
saludar();

include "./Clases/Clase_02-Clases.php";

$objetoClase = new clasePrueba(true);
echo "<br>" . $objetoClase::mostrarTest($objetoClase);

include "./namespace/otro.php";

//Equivalente a USING en C#
//Deviendo especificar que elemento/s se utilizara/n del NAMESPACE
use miNameSpace\
{
    Otro
};

$objetoOtraClase = new Otro();

?>