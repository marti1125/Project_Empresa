<?php
require('../controller/tienda.php');
$objTienda = new Tienda();
$consulta = $objTienda->mostrar_tiendas();
?>
<?php
require('../controller/producto.php');
$objProducto = new Producto();
$consulta2 = $objProducto->mostrar_productos();
?>
<?php
if (isset($_POST['submit'])) {
    require('../controller/tienda_producto.php');

    $idTienda = $_POST['tienda'];
    $idProducto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    $objTP= new TiendaProducto();
    if ($objTP->insertar($idTienda, $idProducto, $cantidad)) {
        //echo 'Datos guardados.';
        header('location: administrar_tienda_producto.php');        
    } else {
        echo 'Se produjo un error. Intente nuevamente.';
    }
}  else {
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <a href="administrar_tienda_producto.php"><img src="../img/atras.png" alt="volver"></a>
        <form method="post" action="nuevo_tienda_producto.php">
            <table>
                <tr>
                    <td>TIENDA</td>
                    <td>
                        <select name="tienda" id="tienda">
                            <?php
                            while ($datos = mysql_fetch_array($consulta)) {
                                ?>

                                <?php echo "<option value='$datos[0]'>$datos[1]</option>"; ?>                               

                                <?php
                            }
                            ?>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td>PRODUCTO</td>
                    <td>
                        <select name="producto" id="producto">
                            <?php
                            while ($datos2 = mysql_fetch_array($consulta2)) {
                                ?>

                                <?php echo "<option value='$datos2[0]'>$datos2[2]</option>"; ?>                               

                                <?php
                            }
                            ?>
                        </select> 
                    </td>
                </tr>
                <tr>
                    <td>CANTIDAD</td>
                    <td><input type="text" name="cantidad" id="cantidad"/></td>
                </tr>
                <tr>                    
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" id="submit" value="AGREGAR PRODUCTO A TIENDA"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
