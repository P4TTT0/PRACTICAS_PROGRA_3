<?php
include_once "Clases\Mascota.php";
include_once "Clases\Guarderia.php";

use Animalitos\
{
    Mascota
};
use Negocios\
{
    Guarderia
};

$respuesta;

$mascotaUno = new Mascota("Reina", "Gato");
$mascotaDos = new Mascota("Reina", "Perro");


echo "METODO DE CLASE [MASCOTA 1]: " . Mascota::mostrar($mascotaUno) . "<br>"; //METODO DE CLASE ::
echo "METODO DE INSTANCIA [MASCOTA 2]: " . $mascotaDos->toString() . "<br>"; //METODO DE INSTANCIA  ->

$respuesta = $mascotaUno->equales($mascotaDos) ? "Si" : "No";
echo "Es [MASCOTA 1] igual a [MASCOTA 2]: " . $respuesta . "<br>";

$mascotaTres = new Mascota("Uma", "Perro", 2);
$mascotaCuatro = new Mascota("Uma", "Perro", 6);

echo "METODO DE CLASE [MASCOTA 3]: " . Mascota::mostrar($mascotaTres) . "<br>"; //METODO DE CLASE ::
echo "METODO DE CLASE [MASCOTA 4]: " . $mascotaCuatro->toString() . "<br>"; //METODO DE INSTANCIA  ->

$respuesta = $mascotaTres->equales($mascotaCuatro) ? "Si" : "No";
echo "Es [MASCOTA 3] igual a [MASCOTA 4]: " . $respuesta . "<br>";

$respuesta = $mascotaUno->equales($mascotaTres) ? "Si" : "No";
echo "Es [MASCOTA 1] igual a [MASCOTA 3]: " . $respuesta . "<br>";

$guarderia = new Guarderia("La guarderia de Pancho");

$guarderia->add($mascotaUno);
$guarderia->add($mascotaDos);
$guarderia->add($mascotaTres);
$guarderia->add($mascotaCuatro);

echo $guarderia->toString();

?>