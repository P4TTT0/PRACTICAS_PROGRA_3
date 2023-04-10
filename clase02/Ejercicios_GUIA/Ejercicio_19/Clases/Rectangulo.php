<?php
namespace figurasGeometricas;

require_once "FiguraGeometrica.php";

class Rectangulo extends FiguraGeometrica
{
    private float $_ladoUno;
    private float $_ladoDos;

    public function __construct(float $ladoUno, float $ladoDos)
    {
        $this->_ladoUno = $ladoUno;
        $this->_ladoDos = $ladoDos;

        parent::__construct();
    }

    protected function calcularDatos(): void
    {
        $this->_perimetro = 2 * ($this->_ladoUno + $this->_ladoDos);
        $this->_superficie = $this->_ladoUno * $this->_ladoDos;
    }

    public function dibujar(): string
    {
        $rectangulo = "";
        for ($i = 0; $i < $this->_ladoDos; $i++)
        {
            for($j = 0; $j < $this->_ladoUno; $j++)
            {
                $rectangulo = $rectangulo . "*";
            }
            $rectangulo = $rectangulo . "<br>";
        }

        return $rectangulo;
    }

    public function toString(): string
    {
        return parent::toString() . "Lado 1: $this->_ladoUno <br>
                                    Lado 2: $this->_ladoDos <br>";

    }
}
?>