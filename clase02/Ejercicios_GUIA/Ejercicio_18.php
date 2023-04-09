<?php

function esPar($numero) : bool
{
    $esPar = false;

    if ($numero % 2 == 0)
    {
        $esPar = true;
    }

    return $esPar;
}

function esImpar($numero) : bool
{
   $esImpar = false;

    if (!esPar($numero))
    {
        $esImpar = true;
    }

    return $esImpar;
}

echo esPar(2) ? "Es Par" : "Es Impar"; // TRUE
echo "<br>";
echo esPar(7) ? "Es Par" : "Es Impar"; // FALSE
echo "<br>";
echo esImpar(2) ? "Es Impar" : "Es Par"; // FALSE
echo "<br>";
echo esImpar(7) ? "Es Impar" : "Es Par"; // TRUE
?>