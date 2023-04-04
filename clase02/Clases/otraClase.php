<?php
abstract class otraClase
{
    public string $otroString;

    public function __construct()
    {
        $this->otroString = "Holaa";
    }

    public abstract function metodoAbstracto();
}
?>