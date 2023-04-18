<?php
session_start();

$inactivo = 15; //SEGUNDOS

if(isset($_SESSION["tiempo"]))
{
    $vida_session = time() - $_SESSION["tiempo"];
    if($vida_session > $inactivo)
    {
        session_destroy();
        echo "Sesion expirada";
    }
}
else
{
    $ahora = time();
    $_SESSION["tiempo"] =  $ahora;
}
?>