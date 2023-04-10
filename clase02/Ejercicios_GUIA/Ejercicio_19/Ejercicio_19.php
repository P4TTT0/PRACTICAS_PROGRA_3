<?php
require_once "Clases\Rectangulo.php";
require_once "Clases\Triangulo.php";

use figurasGeometricas\Rectangulo;
use figurasGeometricas\Triangulo;

$rectangulo = new Rectangulo(40, 10);

echo $rectangulo->dibujar();

echo $rectangulo->toString();

$triangulo = new Triangulo(10, 21);

echo $triangulo->dibujar();

echo $triangulo->toString();
?>