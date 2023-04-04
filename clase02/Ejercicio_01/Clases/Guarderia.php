<?php

namespace Negocios;

use Animalitos\Mascota;

class Guarderia
{
    //ATRIBUTOS
    public string $nombre;
    public array $mascotas;

    //CONSTRUCTOR
    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
        $this->mascotas = array();
    }

    //METODOS
    public function equals(Guarderia $guarderia, Mascota $mascota) : bool
    {
        $validacion = false;
        foreach($guarderia->mascotas as $auxMascota)
        {
            if ($mascota->equales($auxMascota))
            {
                $validacion = true;
            }
        }
        return $validacion;
    }

    public function add(Mascota $mascota) : bool
    {
        $validacion = false;

        if(!$this->equals($this, $mascota))
        {
            array_push($this->mascotas, $mascota);
            $validacion = true;
        }
        return $validacion;
    }

    public function toString() : string
    {
        $acumuladorEdad = 0;
        $promedioEdad = 0;
        $string = "GUARDERIA: $this->nombre <br> 
                ANIMALES: ";
        foreach($this->mascotas as $mascota)
        {
            $acumuladorEdad = $acumuladorEdad + $mascota->edad;
            $string = $string . "<br>" . $mascota->toString();
        }
        
        $promedioEdad = $acumuladorEdad / count($this->mascotas);

        $string = $string . "<br>" . "El promedio de edad es: " . ceil($promedioEdad);

        return $string;
    }


}

?>
