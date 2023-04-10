<?php
namespace figurasGeometricas;

abstract class FiguraGeometrica
{
    protected string $_color;
    protected float $_perimetro;
    protected float $_superficie;

    public function __construct(string $_color = "White")
    {
        $this->_color = $_color;
        $this->calcularDatos();
    }

    protected abstract function calcularDatos() : void;
    public abstract function dibujar() : string;

    public function getColor() : string
    {
        return $this->_color;
    }

    public function setColor(string $color) : void
    {
        $this->_color = $color;
    }

    public function toString() : string
    {
        return "COLOR: $this->_color <br>
                PERIMETRO: $this->_perimetro <br>
                SUPERFICIE: $this->_superficie <br>";
    }
}
?>