<?php

require_once(".\clases\Usuario.php");

$json = isset($_POST["usuario_json"]) ? $_POST["usuario_json"] : null;

$params = json_decode($json, true);

$usuario = new Usuario($params["nombre"], $params["correo"], $params["clave"], $params["id_perfil"], "", $params["id"]);

echo $usuario->Modificar()

?>