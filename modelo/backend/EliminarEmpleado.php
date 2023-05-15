<?php

require_once(".\clases\Empleado.php");

$id = isset($_POST["id"]) ? $_POST["id"] : null;

echo Empleado::Eliminar($id);

?>