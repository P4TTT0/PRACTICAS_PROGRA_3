<?php
saludar();
echo "<br>";

saludar3("Jorge");
echo "<br>";

saludar3("Elisa", "Femenino");
echo "<br>";

//TIPADO DEBIL
function saludar()
{
    echo "Hola mundo, soy una funcion";
}

function saludar3($nombre, $genero = "Masculino")
{
    echo "Hola " . $nombre . " tu genero es " . $genero;
}

echo saludar_tipado("Hola");
echo "<br>";

echo union_tipos("Hola");
echo "<br>";

echo union_tipos(3);
echo "<br>";

//TIPADO FUERTE
function saludar_tipado(string $saludo) : string
{
    return $saludo;
}

function union_tipos (string | int $parametro) : string
{
    $resultado = "";
    if (gettype($parametro) == "string")
    {
        $resultado = "El parametro es un STRING: " . $parametro;
    }
    else
    {
        $resultado = "El parametro es un ENTERO: " . $parametro;
    }

    return $resultado;
}

?>