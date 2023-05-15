<?php

require_once(".\clases\Usuario.php");

$id = isset($_POST["id"]) ? $_POST["id"] : null;
$accion = isset($_POST["accion"]) ? $_POST["accion"] : null;

if($accion == "borrar")
{
    echo Usuario::Eliminar($id);
}

?>