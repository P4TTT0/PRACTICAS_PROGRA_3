<?php
$destino = "uploads/" . $_FILES["archivo"] ["name"];

var_dump($_FILES);die();

//RECUPERO LA EXTESION DEL ARCHIVO
$tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);

$uploadOk = true;

//VERIFICAMOS SI EXISTEUN ARCHIVO CON EL MISMO NOMBRE
if(file_exists($destino))
{
    echo "<h2>El archivo ya existe. </h2>";
    $uploadOk = false;
}
//VERIFICO EL TAMAÑO MAXIMO QUE PERMITIO SUBIR
if($_FILES["archivo"]["size"] > 5000000)
{
    echo "<h2>El archivo es demasiado grande. </h2>";
    $uploadOk = false;
}

//VERIFICO QUE SEA UNA IMAGEN
$esImagen = getimagesize($_FILES["archivo"] ["tmp_name"]);

if ($esImagen === false)
{
    if($tipoArchivo != "doc" && $tipoArchivo != "txt")
    {
        echo "<h2>Solo se permiten subir archivos [.doc] [.txt]. </h2>";
        $uploadOk = false;
    }
}
else
{
    if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif")
    {
        echo "<h2>Solo se permiten subir archivos [.jpg] [.jpeg]. </h2>";
        $uploadOk = false;
    }
}

//VERIFICO SI HUBO ALGUN ERROR 
if($uploadOk === false)
{
    echo "<h2>[ERROR] - No se pudo subir el archivo";
}
else
{
    //MUEVO EL ARCHIVO DEL TEMPORAL
    if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino))
    {
        echo "El archivo " . basename($_FILES["archivo"] ["name"]) . "se ha subido correctamente";
    }
    else
    {
        echo "Ocurrio un error mientras se subia el archivo, intenta mas tarde.";
    }
}
?>