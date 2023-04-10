<?php
namespace figurasGeometricas;

require_once "FiguraGeometrica.php";

class Triangulo extends FiguraGeometrica
{
    private float $_altura;
    private float $_base;

    public function __construct(float $_altura, float $_base)
    {
        $this->_altura = $_altura;
        $this->_base = $_base;

        parent::__construct();
    }

    protected function calcularDatos(): void
    {
        $ladosTriangulo = sqrt(pow($this->_altura, 2) + pow(($this->_base / 2), 2));
        $this->_perimetro = $this->_base + $ladosTriangulo + $ladosTriangulo;
        $this->_superficie = ($this->_altura * $this->_base) / 2; 
    }

    public function dibujar(): string
    {
        //Declaramos el triangulo.
        $triangulo = "";
        //Declaramos e instanciamos la cantidad de espacios que abra en la primer fila del triangulo.
        //Para cada fila ira decrementando.
        //La cantidad de espacios que habra de izquierda a derecha es la base / 2 redondeado para abajo. // 9 / 2 = 4
        /*1234* -> 4 espacios de izquierda a derecha
          123***
          12*****
          1*******
          ********* -> base de 9
          */
        $espacios = floor($this->_base / 2);
        //Recorremos cada fila del triangulo en relacion a la altura del mismo.
        for ($i = 0; $i < $this->_altura; $i++)
        {
            //Declaramos e instanciamos la cantidad de asteriscos por cada fila
            //La cantidad de astericos que abra en cada fila sera la base - la cantidad de espacios * 2 // 9 - (4 * 2) = 1
            $cantidadAsteriscos = $this->_base - ($espacios * 2);
            //Imprimimos la cantidad de espacios en cada fila
            for($j = 0; $j < $espacios; $j++)
            {
                $triangulo .= "p";
            }
            //Imprimimos la cantidad de astericos en la fila actual
            for ($k = 0; $k < $cantidadAsteriscos; $k++)
            {
                $triangulo .= "*";
            }
            //Bajamos a la siguiente fila con un salto de linea.
            $triangulo .= "<br>";
            //Decrementamos la cantidad de espacios para la siguiente fila.
            $espacios--;
        }
        return $triangulo;
    }

    public function toString(): string
    {
        return parent::toString() . "Altura: $this->_altura <br>
                                    Base: $this->_base <br>";
    }
}
?>