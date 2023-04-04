<?php
namespace Animalitos;

class Mascota
{
    //ATRIBUTOS
    public string $nombre;
    public string $tipo;
    public int $edad;

    //CONSTRUCTOR
    public function __construct(string $nombre, string $tipo, int $edad = 0)
    {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->edad = $edad;
    }

    //METODOS
    public function toString() : string
    {
        return "$this->nombre - $this->tipo - $this->edad";
    }

    public static function mostrar(Mascota $mascota) : string
    {
        return $mascota->toString();
    }

    public function equales(Mascota $mascota) : bool
    {
        $validacion = false;
        if ($mascota->nombre == $this->nombre && $mascota->tipo == $this->tipo)
        {
            $validacion = true;
        }
        return $validacion;
    }
}
?>