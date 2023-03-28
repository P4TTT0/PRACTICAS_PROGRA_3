<?php

echo "hola mundo PHP!!!";
echo 'Hola, otra vez!';



/*
$valor = "algo";

echo $valor;

ECHO $Valor; //warning


//constante
define("valor", 3);

echo valor;

//phpinfo();

*/
/*

$num = 0;
$num++;

echo $num;


*/

/*
$nombre = "Juan\n";

echo $nombre;

$nombre = 'ahora soy roberto\n';

echo "<br>" . $nombre;

$nombre = "8";
if ($nombre == "8") {
   echo "es ocho (string)<br>";
}
if ($nombre == 8) {
    echo "es ocho (integer)<br>";
}

$numero = (int) $nombre;
if ($numero == "8") {
    echo "es ocho numérico (string)<br>";
}
if ($numero === 8) {
   echo "es ocho numérico idéntico<br>";
}

*/

//echo $variable . "<br>"; //WARNING 

/*
$variable = "\"\"";
if (isset($variable)) {
    echo $variable . "<br>";
}
else{
    echo "no está inicializada <br>";
}
*/

/*
$variable = "cadena";
echo $variable  . "<br>";

$variable = 91218;
echo $variable  . "<br>";

$variable = false;
echo boolval($variable)  . "<br>";
*/
/*
$variable = NULL;
if($variable == false){
    echo "es false"  . "<br>";
}
if($variable == ""){
    echo "es ''"  . "<br>";
}
if($variable == 0){
    echo "es 0"  . "<br>";
}

if($variable === false){
    echo "es false"  . "<br>";
}
else{
    echo "no es false idéntico"  . "<br>";
}
if($variable === ""){
    echo "es ''"  . "<br>";
}
else{
    echo "no es '' idéntico"  . "<br>";
}
if($variable === 0){
    echo "es 0"  . "<br>";
}
else{
    echo "no es 0 idéntico"  . "<br>";
}
*/

/*
$vec = array(1,2,"3",true);

//echo $vec; //NO SE PUEDE!!!
//var_dump($vec);
//var_dump($variable);

$vec[4] = "valor cadena";
$vec[5] = false; // booleano
$vec[6]=8;
//var_dump($vec);

$vec2 = [];//array();
var_dump($vec2);
array_push($vec2, 4);
array_push($vec2, 5);
array_push($vec2, 48);
var_dump($vec2);





for ($i=0; $i < count($vec); $i++) { 
   
    echo $vec[$i] . "<br>";
}

foreach ($vec2 as $item ) {
    echo $item . "<br>";
}
*/
/*
$vec_asoc = array("uno" => 1, "dos" => 2);
$vec_asoc["tres"] = 3;

foreach ($vec_asoc as $item ) {
    echo $item . "<br>";
}


echo $vec_asoc["dos"];


array_push($vec, 88);

foreach ($vec as $item ) {
    echo $item . "<br>";
}

var_dump($vec);

*/
/*
enum Enumerado{
    case Uno;
    case Dos;
    case Tres;
}

$mi_enum = Enumerado::Uno;//C# Enum.enumerado

if ($mi_enum === Enumerado::Uno) {
    echo "es Enumerado::Uno idéntico";
}
echo "<br>";

$h=3;
$h = isset($h) ? $h : null;

var_dump( $h);

if(isset($v))
{
    echo "con valor";
}
else 
{
    echo "sin valor";
}

define("CONSTANTE", "asdfasdfasdfasdfasdf");



var_dump(CONSTANTE);
*/