<?php
$arrayOperadores = array("+", "-", "/", "*"); //Array con los operadores existentes
$numeroUno = rand(1, 100); //Variable con numero al azar.
$numeroDos = rand(1, 100); //Variable con numero al azar.

$operador = $arrayOperadores[rand(0, count($arrayOperadores) - 1)]; //Operador seleccionado al azar 

$resultado = eval("return $numeroUno $operador $numeroDos;"); //Resultado de la operacion mediante la funcion EVAL() que ejecuta un string como si fuese codigo PHP
echo "Numero [1] = $numeroUno <br>
    Numero [2] = $numeroDos <br>  
    Operador seleccionado = $operador <br> 
    $numeroUno $operador $numeroDos = $resultado";
?>