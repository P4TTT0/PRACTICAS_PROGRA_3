<?php

require_once(".\clases\Usuario.php");

?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>CORREO</th>
            <th>PERFIL</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $usuarios = Usuario::TraerTodos();

            foreach($usuarios as $usuario)
            {
                echo "<tr>";
                echo "<td>" . $usuario->nombre . "</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>