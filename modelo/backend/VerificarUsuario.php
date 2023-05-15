<?php

require_once(".\clases\Usuario.php");

$correo = isset($_POST["correo"]) ? $_POST["correo"] : null;
$clave = isset($_POST["clave"]) ? $_POST["clave"] : null;

var_dump(Usuario::TraerUno($correo, $clave)); 

?>