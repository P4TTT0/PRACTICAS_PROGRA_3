<?php
namespace Poo;
use PDO;

class Cd
{
    public int $id;
    public string $titulo;
    public string $interprete;
    public int $anio;

    public function mostrarDatos() : string
    {
        return $this->id . " - " . $this->titulo . " - " . $this->interprete . " - " . $this->anio;
    }
    
    public static function traerTodosLosCd()
    {    
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT id, titel AS titulo, interpret AS interprete, "
                                                        . "jahr AS anio FROM cds");        
        
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new Cd);                                                

        return $consulta; 
    }
    
    public function insertarElCD()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->retornarConsulta("INSERT INTO cds (id, titel, interpret, jahr)"
                                                    . "VALUES(:id, :titulo, :cantante, :anio)");
        
        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindValue(':titulo', $this->titulo, PDO::PARAM_STR);
        $consulta->bindValue(':anio', $this->anio, PDO::PARAM_INT);
        $consulta->bindValue(':cantante', $this->interprete, PDO::PARAM_STR);

        $consulta->execute();   
    }
    
    public static function modificarCD(int $id, string $titulo, int $anio, string $cantante)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->retornarConsulta("UPDATE cds SET titel = :titulo, interpret = :cantante, 
                                                        jahr = :anio WHERE id = :id");
        
        $consulta->bindValue(':id', $id, PDO::PARAM_INT);
        $consulta->bindValue(':titulo', $titulo, PDO::PARAM_STR);
        $consulta->bindValue(':anio', $anio, PDO::PARAM_INT);
        $consulta->bindValue(':cantante', $cantante, PDO::PARAM_STR);

        return $consulta->execute();
    }

    public static function eliminarCD(Cd $cd)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta =$objetoAccesoDato->retornarConsulta("DELETE FROM cds WHERE id = :id");
        
        $consulta->bindValue(':id', $cd->id, PDO::PARAM_INT);

        return $consulta->execute();
    }
    
}