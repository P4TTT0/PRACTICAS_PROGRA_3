<?php

require_once("clases/Empleado.php");

$correo = isset($_POST["correo"]) ? $_POST["correo"] : null;
$clave = isset($_POST["clave"]) ? $_POST["clave"] : null;
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : null;
$id_perfil = isset($_POST["id_perfil"]) ? $_POST["id_perfil"] : null;
$sueldo = isset($_POST["sueldo"]) ? $_POST["sueldo"] : null;

$empleado = new Empleado($sueldo, $nombre, $correo, $clave, $id_perfil);

echo $empleado->Agregar();
?>