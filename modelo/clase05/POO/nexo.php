<?php

require_once ("accesoDatos.php");
require_once ("cd.php");

use Poo\AccesoDatos;
use Poo\Cd;

$op = isset($_POST['op']) ? $_POST['op'] : NULL;

switch ($op) {
    case 'accesoDatos':

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->retornarConsulta("select id, titel AS titulo, interpret AS interprete, "
                                                        . "jahr AS anio "
                                                        . "FROM cds");
        $consulta->execute();
        
        $consulta->setFetchMode(PDO::FETCH_INTO, new Cd);
        
        foreach ($consulta as $cd) {
        
            print_r($cd->mostrarDatos());
            print("\n");
        }

        break;
 
    case 'mostrarTodos':

        $cds = Cd::traerTodosLosCd();
        
        foreach ($cds as $cd) {
            
            print_r($cd->mostrarDatos());
            print("\n");
        }
    
        break;

    case 'insertarCd':
    
        $miCD = new Cd();
        $miCD->id = 66;
        $miCD->titulo = "Un título";
        $miCD->anio = 2018;
        $miCD->interprete = "Un cantante";
        
        $miCD->insertarElCD();

        echo "ok";
        
        break;

    case 'modificarCd':
    
        $id = $_POST['id'];        
        $titulo = $_POST['titulo'];
        $anio = $_POST['anio'];
        $interprete = $_POST['interprete'];
    
        echo Cd::modificarCD($id, $titulo, $anio, $interprete);
            
        break;

    case 'modificarCd_json':
    
        $obj = json_decode($_POST['obj_json']);
        $id = $obj->id;        
        $titulo = $obj->titulo;
        $anio = $obj->anio;
        $interprete = $obj->interprete;
 
        //var_dump($obj);  
         
        echo Cd::modificarCD($id, $titulo, $anio, $interprete);
            
        break;
    
    case 'eliminarCd':
    
        $miCD = new Cd();
        $miCD->id = 66;
        
        echo $miCD->eliminarCD($miCD);
        
        break;
        
    default:
        echo ":(";
        break;
}
