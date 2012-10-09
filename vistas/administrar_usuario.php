<?php
require('../controller/usuario.php');
$objUsuario = new Usuario();
$consulta = $objUsuario->mostrar_usuarios();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <a href="../index.php"><img src="../img/atras.png" alt="volver"></a>
        <a href="nuevo_usuario.php"><img src="../img/add.png" alt="add" border="0"/></a>
        <table>
            <tr>
                <th>USUARIO</th>
                <th>CLAVE</th>
                <th></th>
                <th></th>
            </tr>
            <?php
            while($datos=mysql_fetch_array($consulta))
            {
            ?>
            <tr>
                <td><?php echo $datos[1]; ?></td>
                <td><?php echo $datos[2]; ?></td>
                <td><img src="../img/database_edit.png"/></td>
                <td><img src="../img/delete.png"/></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>
