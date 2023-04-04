<?php
function validarPalabras($string, $max)
{
    $validacion = 0;
    $palabrasValidas = array("Recuperatorio", "Parcial", "Programacion"); 
    if(strlen($string) > $max)
    {
        $validacion = 0;
    }
    else
    {
        foreach($palabrasValidas as $palabraValida)
        {
            if ($string == $palabraValida)
            {
                $validacion = 1;
                break;
            }
        }
    }

    return $validacion;
}

echo validarPalabras("Examen", 5);
echo validarPalabras("Parcial", 3);
echo validarPalabras("Parcial", 13);
?>