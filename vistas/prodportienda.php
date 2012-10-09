<?php
if (isset($_POST['submit'])) {
    require('../controller/consultas.php');

    $objConsulta = new Consulta();
    $tienda = $_POST['tienda'];
    $mensaje = $objConsulta->mostrar_productos_por_tiendas($tienda);
}
?>
<?php
require('../controller/tienda.php');
$objTienda = new Tienda();
$consulta = $objTienda->mostrar_tiendas();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>:: Lista de Productos por Tienda ::</title>
        <link rel="stylesheet" type="text/css" href="../estilo/estilo.css" />
    </head>
    <body>
        <div id="contenido">
            <div id="menu">
                <ul id="button">
                    <li><a href="../bienvenidos.php">Inicio</a></li>
                    <li><a href="prodportienda.php">Tienda y sus Productos</a></li>
                    <li><a href="administrar_producto.php">Lista de Productos</a></li>
                    <li class="salir"><a href="logout.php">Salir</a></li>
                </ul>
            </div>
            <div id="cuerpo" class="cuerpo_tienda">
                <form method="post" action="prodportienda.php">            
                    <table border="0">
                        <tr>
                            <td>TIENDA</td>
                            <td>
                                <select name="tienda" id="tienda">
                                    <?php
                                    while ($datos = mysql_fetch_array($consulta)) {
                                        ?>

                                        <?php echo "<option value='$datos[1]'>$datos[1]</option>"; ?>                               

                                        <?php
                                    }
                                    ?>
                                </select> 
                            </td>
                        </tr>
                        <tr>                    
                            <td colspan="2" align="center">
                                <input type="submit" name="submit" id="submit" value="VER PRODUCTOS POR TIENDA"/>
                            </td>
                        </tr>
                    </table>
                </form>
                <table border="0">
                    <tr>                
                        <th>DESCRIPCION</th>
                        <th>CANTIDAD</th>
                    </tr>
                    <?php
                    while ($productos = mysql_fetch_array($mensaje)) {
                        ?>
                        <tr>                    
                            <td><?php echo $productos[1]; ?></td>
                            <td><?php echo $productos[2]; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <!--div id="pie">
                <ul id="button">
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </div-->
        </div>
    </body>
</html>
