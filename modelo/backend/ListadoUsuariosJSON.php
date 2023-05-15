<?php

require_once(".\clases\Usuario.php");
$usuarios = array();

$usuarios = Usuario::TraerTodoJSON();

var_dump($usuarios);

?>