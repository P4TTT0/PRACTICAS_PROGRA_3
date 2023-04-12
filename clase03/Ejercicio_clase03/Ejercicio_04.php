<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 04</title>
  </head>
  <body>
    <h1>MODIFICAR</h1>
    <form action = "nexo.php" method = "post">
        <label for="accion">Accion:</label>
        <input type="text" name="accion"><br><br>
        <label for="legajo">Legajo:</label>
        <input type="text" name="legajo"><br><br>
        <h3>Datos a remplazar:</h3><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido"><br><br>
        <input type="submit" value="ENVIAR"><br><br>
        <a href="./index.php">MENU PRINCIPAL</a>
    </form>
  </body>
</html>