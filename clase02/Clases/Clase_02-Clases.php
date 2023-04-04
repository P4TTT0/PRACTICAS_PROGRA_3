<?php
//El modificador de visibilidad DEFAULT de PHP es PUBLIC
//Las clases no pueden tener modificadores de visibilidad
//No hay eventos
//No hay propiedades
//No hay delegados
//Cualquier metodo puede ser modificado en sus clases derivadas
//palabra reservada EXTENDS para realizar HERENCIA de clase padre
//palabra reservada IMPLEMENTS para realizar HERENCIA de INTERFAZ
class clasePrueba extends otraClase implements IUnaInterface
{
    //Atributos
    private string $cadena;
    public int $numero;
    protected bool $booleano;

    //Constructor
    public function __construct(bool $booleano) 
    {
        parent::__construct();

        $this->cadena = "Hola";
        $this->numero = 123;
        $this->booleano = $booleano;
    }

    //METODO PUBLICO DE INSTANCIA
    public function mostrar() : string
    {
        return $this->cadena . "-" . $this->numero . "-";
    }

    //METODO PRIVADO DE UNA INSTANCIA
    private function mostrarPrivado() : string
    {
        return $this->booleano . " BOOLEANO";
    }

    //METODO DE CLASE 
    public static function mostrarTest(clasePrueba $obj) : string
    {
        return $obj->mostrarPrivado();
    }

    //METODO ABSTRACTO
    public function metodoAbstracto()
    {
        echo "Soy un metodo ABRSTRACTO y debo ser implementado OBLIGATORIAMENTE";
    }

    //METODO GETTER
    public function getAtributo() : bool
    {
        return $this->booleano;
    }
}
?>