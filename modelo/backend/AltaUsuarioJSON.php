<?php

require_once(".\clases\Usuario.php");

$correo = isset($_POST["correo"]) ? $_POST["correo"] : null;
$clave = isset($_POST["clave"]) ? $_POST["clave"] : null;
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : null;

$usuario = new Usuario($nombre,$correo,$clave);

$validado = $usuario->GuardarEnArchivo();

echo($validado);

?>