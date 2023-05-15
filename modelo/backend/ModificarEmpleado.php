<?php

require_once("clases/Empleado.php");

$json= isset($_POST["empleado_json"]) ? $_POST["empleado_json"] : null;

$params = json_decode($json, true);

$empleado = new Empleado($params["sueldo"], $params["nombre"], $params["correo"], $params["clave"], $params["id_perfil"], "", $params["id"]);

echo $empleado->Modificar();
?>