<?php

interface ICRUD
{
    public static function TraerTodos();

    public function Agregar() : bool;

    public function Modificar() : string;

    public static function Eliminar(int $id) : string;

}

?>