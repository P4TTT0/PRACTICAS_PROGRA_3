<?php
$numeroEntero = 1;
$resultadoAcumulado = 0;
$numerosSumados;

while($resultadoAcumulado + $numeroEntero < 1000)
{
    echo "[$numeroEntero] $numeroEntero + $resultadoAcumulado = ";
    $resultadoAcumulado += $numeroEntero;
    echo $resultadoAcumulado . "<br>";

    $numeroEntero++;
    
}

?>