<?php
namespace Pdo;

class Cd
{
    public string $titulo;
    public string $interprete;
    public int $anio;

    public function mostrarDatos() : string
    {
        return $this->titulo . " - " . $this->interprete . " - " . $this->anio;
    } 
}