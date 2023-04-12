<?php
require_once "./Clases/Alumno.php";

use crud\Alumno;

//RECUPERO LOS VALORES POR POST
if(isset($_POST["accion"]))
{
    $accion = $_POST["accion"];
}
else
{
    if(isset($_GET["accion"]))
    {
        $accion = $_GET["accion"];
    }
}
$nombre = isset($_POST["nombre"]) ? $nombre = $_POST["nombre"] : $nombre = "SIN NOMBRE";
$apellido = isset($_POST["apellido"]) ? $apellido = $_POST["apellido"] : $apellido = "SIN APELLIDO";
$legajo = isset($_POST["legajo"]) ? $legajo = $_POST["legajo"] : $legajo = "SIN LEGAJO"; 

switch($accion)
{
    case "agregar":
        $alumno = new Alumno($nombre, $apellido, $legajo);

        echo Alumno::agregar($alumno) ? "<h2> Alumno agregado exitosamente </h2><br>" : "<h2> Error - no se ha podido agregar el alumno </h2><br>";
        
        break;
    case "listar":
        echo Alumno::listar();
        break;
    case "verificar":
        echo Alumno::verificar($legajo) ? "<h2> El alumno con el legajo '$legajo' se encuentra en el listado </h2><br>" : "<h2> Error - El alumno con el legajo '$legajo' no se encuentra en el listado  </h2><br>";
        break;
    case "modificar":
        $alumno = new Alumno($nombre, $apellido, $legajo);
        echo Alumno::modificar($alumno) ? "<h2> El alumno con el legajo '$legajo' se ha modificado </h2><br>" : "<h2> Error - El alumno con el legajo '$legajo' no se encuentra en el listado  </h2><br>";
        break;
    case "borrar":
        echo Alumno::borrar($legajo) ? "<h2> El alumno con el legajo '$legajo' se ha borrado </h2><br>" : "<h2> Error - El alumno con el legajo '$legajo' no se encuentra en el listado  </h2><br>";
}
?>
<br><br>
<a href="./index.php"><button>MENU PRINCIPAL</button></a>