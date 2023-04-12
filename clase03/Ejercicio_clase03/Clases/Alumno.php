<?php
nameSpace crud;

use crud\Alumno as CrudAlumno;

class Alumno
{
    private string $nombre;
    private string $apellido;
    private int $legajo;

    public function __construct(string $nombre, string $apellido, int $legajo)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->legajo = $legajo;
    }

    public static function agregar(Alumno $alumno) : bool
    {
        $validacion = false;

        $archivo = fopen("Archivos/alumnos.txt", "a");

        $cantidadEscrito = fwrite($archivo, "$alumno->legajo-$alumno->apellido-$alumno->nombre\n");

        if ($cantidadEscrito > 0)
        {
            $validacion = true;
        }

        fclose($archivo);

        return $validacion;
    }

    public static function listar() : string
    {
        $listaAlumnos = "";

        $archivo = fopen("Archivos/alumnos.txt", "r");

        while(!feof($archivo))
        {
            $listaAlumnos .= fgets($archivo);
            $listaAlumnos .= "<br>";
        }

        fclose($archivo);

        return $listaAlumnos;
    }

    public static function verificar(int $legajo) : array | null
    {
        $alumnoEncontrado = null;

        $archivo = fopen("Archivos/alumnos.txt", "r");

        while (!feof($archivo))
        {
            $lineaAlumno = fgets($archivo);
            $alumno = explode("-", $lineaAlumno);

            if($alumno[0] == $legajo)
            {
                $alumnoEncontrado = $alumno;
                break;
            }
        }

        fclose($archivo);

        return $alumnoEncontrado;
    }

    public static function modificar(Alumno $alumno) : bool
    {
        $validacion = false;
        $banderaAlumnoEncontrado = false;

        $listaAlumnos = array();

        $archivo = fopen("Archivos/alumnos.txt", "r");

        while(!feof($archivo))
        {
            $alumnoLeido = fgets($archivo);
            $auxAlumno = explode("-", $alumnoLeido);

            $auxAlumno[0] = trim($auxAlumno[0]);

            if ($auxAlumno[0] != "")
            {
                $auxLegajo = trim($auxAlumno[0]);
                $auxApellido = trim($auxAlumno[1]);
                $auxNombre = trim($auxAlumno[2]);

                if ($auxLegajo == $alumno->legajo)
                {
                    array_push($listaAlumnos, "$alumno->legajo-$alumno->apellido-$alumno->nombre");
                    $banderaAlumnoEncontrado = true;
                }
                else
                {
                    array_push($listaAlumnos, "$auxLegajo-$auxApellido-$auxNombre");
                }
            }
        }
        fclose($archivo);

        if ($banderaAlumnoEncontrado)
        {
            $archivo = fopen("Archivos/alumnos.txt", "w");

            foreach($listaAlumnos as $item)
            {
                $cantidadEscrito = fwrite($archivo, $item . "\n");
            }

            if($cantidadEscrito > 0)
            {
                $validacion = true;
            }   

            fclose($archivo);
        }
        return $validacion;
    }

    public static function borrar(int $legajo) : bool
    {
        $validacion = false;
        $banderaAlumnoEncontrado = false;

        $listaAlumnos = array();

        $archivo = fopen("Archivos/alumnos.txt", "r");

        while(!feof($archivo))
        {
            $alumnoLeido = fgets($archivo);
            $auxAlumno = explode("-", $alumnoLeido);

            $auxAlumno[0] = trim($auxAlumno[0]);

            if ($auxAlumno[0] != "")
            {
                $auxLegajo = trim($auxAlumno[0]);
                $auxApellido = trim($auxAlumno[1]);
                $auxNombre = trim($auxAlumno[2]);

                if ($auxLegajo != $legajo)
                {
                    array_push($listaAlumnos, "$auxLegajo-$auxApellido-$auxNombre");
                }
                else
                {
                    $banderaAlumnoEncontrado = true;
                }
            }
        }
        fclose($archivo);

        if ($banderaAlumnoEncontrado)
        {
            $archivo = fopen("Archivos/alumnos.txt", "w");

            foreach($listaAlumnos as $item)
            {
                $cantidadEscrito = fwrite($archivo, $item . "\n");
            }

            if($cantidadEscrito > 0)
            {
                $validacion = true;
            }   

            fclose($archivo);
        }
        return $validacion;
    }
}
?>