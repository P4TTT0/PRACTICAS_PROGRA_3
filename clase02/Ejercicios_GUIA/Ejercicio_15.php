<?php
function mostrarPotencias()
{
    for ($i = 1; $i <= 4; $i++)
    {
        echo "El numero $i tiene como potencia: ";
        for ($j = 1; $j <= 4; $j++)
        {
            echo pow($i, $j) . " ";
        }
        echo "<br>";
    }
}

mostrarPotencias();
?>