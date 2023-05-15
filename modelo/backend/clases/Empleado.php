<?php

require_once("accesoDatos.php");
require_once("usuario.php");
require_once("ICRUD.php");

class Empleado extends Usuario implements ICRUD
{
    public string $foto;
    public int $sueldo;

    public function __construct (int $sueldo, string $nombre, string $correo, string $clave, int $id_perfil = -1, string $perfil = "", int $id = -1)
    {
        $this->foto = "./empleados/fotos/";
        $this->sueldo = $sueldo;
        parent::__construct($nombre, $correo, $clave, $id_perfil, $perfil, $id);
    }

    public static function TraerTodoJSON()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

        $consulta = $objetoAccesoDato->retornarConsulta("SELECT * FROM empleados");

        $consulta->execute();

        while($register = $consulta->fetch(PDO::FETCH_ASSOC))
        {
            $empleado = new Empleado($register["foto"], $register["sueldo"], $register["nombre"], $register["correo"], $register["clave"], $register["id_perfil"]);
            $empleado->innerJoinPerfil();
            $empleados[] = $empleado;
        }

        return $empleados;
    }

    public function innerJoinPerfil()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

        $consulta = $objetoAccesoDato->retornarConsulta("SELECT (descripcion) FROM perfiles WHERE id = :id");
        $consulta->bindValue(":id", $this->id_perfil, PDO::PARAM_INT);

        $consulta->execute();

        $register = $consulta->fetch(PDO::FETCH_ASSOC);
        $this->perfil = $register["descripcion"];
    }

    public function Agregar(): bool
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $this->foto .= $this->nombre . "." . date("His") . "." . pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);

        $consulta = $objetoAccesoDato->retornarConsulta("INSERT INTO empleados (nombre, correo, clave, id_perfil, foto, sueldo)"
                                                    . "VALUES(:nombre, :correo, :clave, :id_perfil, :foto, :sueldo)");
        
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':id_perfil', $this->id_perfil, PDO::PARAM_INT);
        $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
        $consulta->bindValue(':sueldo', $this->sueldo, PDO::PARAM_INT);

        move_uploaded_file($_FILES["foto"]["tmp_name"], $this->foto);

        return $consulta->execute(); 
    }

    public function Modificar() : string
    {
        $retorno = json_encode("exito=>false,mensaje=>[ERROR] - No se ha podido modificar el usuario");
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

        try
        {
            Empleado::BorrarFoto($this->id);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

        $this->foto .= $this->nombre . "." . date("His") . "." . pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);

        $consulta = $objetoAccesoDato->retornarConsulta("UPDATE empleados SET nombre = :nombre, correo = :correo, clave = :clave, id_perfil = :id_perfil, foto = :foto, sueldo = :sueldo 
                                                        WHERE id = :id");

        $consulta->bindValue(":nombre", $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(":correo", $this->correo, PDO::PARAM_STR);
        $consulta->bindValue(":clave", $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(":id_perfil", $this->id_perfil, PDO::PARAM_INT);
        $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
        $consulta->bindValue(':sueldo', $this->sueldo, PDO::PARAM_INT);
        $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);

        $consulta->execute();
        
        
        move_uploaded_file($_FILES["foto"]["tmp_name"], $this->foto);

        if ($consulta->fetch() != 0)
        {
            $retorno = json_encode("exito=>true,mensaje=>[EXITO] - Usuario modificado correctamente");
        }

        return $retorno;
    }

    public static function Eliminar(int $id) : string
    {

        $retorno = json_encode("exito=>false,mensaje=>[ERROR] - No se ha podido eliminar el usuario");
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

        try
        {
            Empleado::BorrarFoto($id);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    
        $consulta = $objetoAccesoDato->retornarConsulta("DELETE FROM empleados WHERE id = :id");
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
    
        $consulta->execute();
    
        if ($consulta->fetch() != 0)
        {
            $retorno = json_encode("exito=>true,mensaje=>[EXITO] - Usuario eliminado correctamente");
        }
    
        return $retorno;
    }


    public static function BorrarFoto(int $id)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT foto FROM empleados WHERE id = :id");

        $consulta->bindValue(':id', $id, PDO::PARAM_INT);

        $consulta->execute();

        $register = $consulta->fetch(PDO::FETCH_ASSOC);

        unlink($register["foto"]);
    }
}
?>