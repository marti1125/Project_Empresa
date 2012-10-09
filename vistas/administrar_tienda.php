<?php
require('../controller/tienda.php');
$objTienda = new Tienda();
$consulta = $objTienda->mostrar_tiendas();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <a href="../index.php"><img src="../img/atras.png" alt="volver"></a>
        <a href="nuevo_tienda.php"><img src="../img/add.png" alt="add" border="0"/></a>
       <table>
            <tr>
                <th>NOMBRE</th>
                <th>UBICACION</th>
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
