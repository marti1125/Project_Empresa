
<?php
require('../controller/tienda_producto.php');
$objTP = new TiendaProducto();
$consulta = $objTP->mostrar_tienda_productos();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>:: Productos ::</title>
        <link rel="stylesheet" type="text/css" href="estilo/estilo.css" />
    </head>
    <body>
        <div id="contenido">
            <div id="menu">
                <ul id="button">
                    <li><a href="../bienvenidos.php">Inicio</a></li>
                    <li><a href="prodportienda.php">Tienda y sus Productos</a></li>
                    <li><a href="administrar_producto.php">Lista de Productos</a></li>
                </ul>
            </div>
            <div id="cuerpo" class="cuerpo_bien">
                <a href="nuevo_tienda_producto.php"><img src="../img/add.png" alt="add" border="0"/></a>
                <table border="1">
                    <tr>
                        <th>IDTIENDA</th>
                        <th>IDPRODUCTO</th>                
                        <th>CANTIDAD</th>
                        <th></th>
                    </tr>
                    <?php
                    while ($datos = mysql_fetch_array($consulta)) {
                        ?>
                        <tr>
                            <td><?php echo $datos[1]; ?></td>
                            <td><?php echo $datos[2]; ?></td>
                            <td><?php echo $datos[3]; ?></td>
                            <td><img src="../img/database_edit.png" alt="edit" border="0"/></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <div id="pie">
                <ul id="button">
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>
