<?php

require_once(".\clases\Usuario.php");

$json = isset($_POST["usuario_json"]) ? $_POST["usuario_json"] : null;

$params = json_decode($json, true);

var_dump(Usuario::TraerUno($params["correo"], $params["clave"]));

?>