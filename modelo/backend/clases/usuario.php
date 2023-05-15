<?php

require_once("accesoDatos.php");
require_once("IBM.php");

class Usuario implements IBM
{
    public int $id;
    public string $nombre;
    public string $correo;
    public string $clave;
    public int $id_perfil;
    public string $perfil;
    
    public function __construct(string $nombre, string $correo, string $clave, int $id_perfil = -1, string $perfil = "", int $id = -1)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->perfil = $perfil;
        $this->id_perfil = $id_perfil;
        $this->id = $id;
    }

    public function ToJSON() : string
    {
        return json_encode(array("nombre" => $this->nombre, "correo" => $this->correo, "clave" => $this->clave));
    } 

    public function GuardarEnArchivo() : string
    {
        $path = "./archivos/usuarios.json";
        $retorno = array("exito" => false, "mensaje" => "[ERROR] - No se ha podido abrir el archivo");

        $archivo = fopen($path, "a");

        if($archivo)
        {   
            $escrito = fwrite($archivo, $this->ToJSON() . "\r\n");

            if ($escrito > 0)
            {
                $retorno = array("exito" => true, "mensaje" => "Usuario guardado con exito");
            }
            else
            {
                $retorno = array("exito" => false, "mensaje" => "[ERROR] - No se ha podido guardar el usuario");
            }
  
        }

        fclose($archivo);

        return json_encode($retorno);
    }

    public static function TraerTodoJSON()
    {
        $path = "./archivos/usuarios.json";
        $archivo = fopen($path, "r");
        $usuarios = array();
        
        if ($archivo)
        {
            while(($linea = fgets($archivo)))
            {
                $auxLinea = trim($linea);
                $auxUsuario = json_decode($auxLinea, true);

                array_push($usuarios, new Usuario($auxUsuario["nombre"], $auxUsuario["correo"], $auxUsuario["clave"]));
            }
        }

        fclose($archivo);

        return $usuarios;
    }

    public function Agregar() : bool
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->retornarConsulta("INSERT INTO usuarios (nombre, correo, clave, id_perfil)"
                                                    . "VALUES(:nombre, :correo, :clave, :id_perfil)");
        
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':correo', $this->correo, PDO::PARAM_STR);
        $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(':id_perfil', $this->id_perfil, PDO::PARAM_INT);

        return $consulta->execute();   
    }

    public static function TraerTodos()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

        $arrayUsuarios = array();

        $consulta = $objetoAccesoDato->retornarConsulta("SELECT nombre, correo, clave, id_perfil FROM usuarios");

        $consulta->execute(); 

        while($register = $consulta->fetch(PDO::FETCH_ASSOC))
        {
            $usuario = new Usuario($register["nombre"], $register["correo"], $register["clave"], $register["id_perfil"]);
            $usuario->innerJoinPerfil();
            $arrayUsuarios[] = $usuario;
        }

        return $arrayUsuarios;
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

    public static function TraerUno(string $correo, string $clave)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

        $consulta = $objetoAccesoDato->retornarConsulta("SELECT nombre, correo, clave, id_perfil FROM usuarios WHERE correo = :correo AND clave = :clave");
        $consulta->bindValue(":correo", $correo, PDO::PARAM_STR);
        $consulta->bindValue(":clave", $clave, PDO::PARAM_STR);
        $consulta->execute();

        $register = $consulta->fetch(PDO::FETCH_ASSOC);
        $usuario = new Usuario($register["nombre"], $register["correo"], $register["clave"], $register["id_perfil"]);
        $usuario->innerJoinPerfil();

        return $usuario;
    }

    public function Modificar(): string
    {
        $retorno = json_encode("exito=>false,mensaje=>[ERROR] - No se ha podido modificar el usuario");
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

        $consulta = $objetoAccesoDato->retornarConsulta("UPDATE usuarios SET nombre = :nombre, correo = :correo, clave = :clave, id_perfil = :id_perfil WHERE id = :id");
        $consulta->bindValue(":nombre", $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(":correo", $this->correo, PDO::PARAM_STR);
        $consulta->bindValue(":clave", $this->clave, PDO::PARAM_STR);
        $consulta->bindValue(":id_perfil", $this->id_perfil, PDO::PARAM_INT);
        $consulta->bindValue(":id", $this->id, PDO::PARAM_INT);

        $consulta->execute();

        if ($consulta->fetch() != 0)
        {
            $retorno = json_encode("exito=>true,mensaje=>[EXITO] - Usuario modificado correctamente");
        }

        return $retorno;
    }

    public static function Eliminar(int $id): string
    {
        $retorno = json_encode("exito=>false,mensaje=>[ERROR] - No se ha podido eliminar el usuario");
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

        $consulta = $objetoAccesoDato->retornarConsulta("DELETE FROM usuarios WHERE id = :id");
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);

        $consulta->execute();

        if ($consulta->fetch() != 0)
        {
            $retorno = json_encode("exito=>true,mensaje=>[EXITO] - Usuario eliminado correctamente");
        }

        return $retorno;
    }
}

?>