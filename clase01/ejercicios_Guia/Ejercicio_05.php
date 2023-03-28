<?php
$a = rand(1, 10);
$b = rand(1, 10);
$c = rand(1, 10);

echo "A = $a <br>" .
     "B = $b <br>" .
     "C = $c <br>";

$arrayNumeros = array_unique(array($a, $b, $c)); //Inicializamos un array con los 3 valores y eliminamos los valores duplicados en caso de existir.
sort($arrayNumeros); //Ordenamos el array
$longitudArray = count($arrayNumeros); //Obtenemos la longitud de array
if (count($arrayNumeros) % 2 == 0 || count($arrayNumeros) == 1) //Si la longitud del array es 2 o 1 al remover los valores duplicados significa que no hay numero del medio
{
    echo "No hay numero del medio";
}
else //De lo contrario, al haber ordenado el array el valor que se encuentra en el medio, sera el del medio.
{
    echo "El numero del medio es $arrayNumeros[1]"; 
}

?>