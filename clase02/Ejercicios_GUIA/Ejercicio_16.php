<?php
$string = "hola";

function invertirString ($string) : string
{
    $auxString = "";
    echo "Palabra original: $string";
    echo "<br>";
    for ($i = strlen($string); $i > 0; $i--)
    {
        $auxString = $auxString . $string[$i - 1];
    }
    return "Palabra a la inversa: $auxString";
}

echo invertirString($string) . "<br>";
echo invertirString("Hola como estas?") . "<br>";
?>