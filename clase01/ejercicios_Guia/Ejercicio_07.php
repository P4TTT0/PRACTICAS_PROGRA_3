<?php
echo $fechaActual = date("m.d.y") . " " . estacionDelAño() ."<br>"; 
echo $fechaActual = date("F j, Y, g:i a") . " " . estacionDelAño() . "<br>"; //Miercoles 29, 2023, 22:50 pm
echo $fechaActual = date("m.d.y") . " " . estacionDelAño() ."<br>"; //20230329

function estacionDelAño()
{
    $mesFecha = date("m");

    $estacionAño = "";

    if ($mesFecha < 3 || $mesFecha == 12)
    {
        $estacionAño = "Verano";
    }
    else
    {
        if ($mesFecha < 6)
        {
            $estacionAño = "Otoño";
        }
        else
        {
            if($mesFecha < 9)
            {
                $estacionAño = "Invierno";
            }
            else
            {
                if ($mesFecha < 12)
                {
                    $estacionAño = "Primavera";
                }
            }
        }
    }

    return $estacionAño;
}

?>