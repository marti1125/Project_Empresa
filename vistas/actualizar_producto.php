<?php
if (isset($_POST['submit'])) {
    require('../controller/producto.php');

    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];   
    $id = $_POST['id'];

    $objProducto = new Producto();
    if ($objProducto->actualizar($codigo, $descripcion, $id)) {
        //echo 'Datos guardados.';
        header('location: administrar_producto.php');        
    } else {
        echo 'Se produjo un error. Intente nuevamente.';
    }
}  else {
    
}
?>
<?php
if (isset($_GET['id'])) {

    require('../controller/producto.php');
    $objProducto = new Producto();
    $consulta = $objProducto->mostrar_producto($_GET['id']);    
    $producto = mysql_fetch_array($consulta);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <a href="administrar_producto.php"><img src="../img/atras.png" alt="volver"></a>
        <form action="actualizar_producto.php" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $producto[0]?>" />
            <table>
                <tr>
                    <td>CODIGO</td>
                    <td><input type="text" name="codigo" id="codigo" value="<?php echo $producto[1]?>"/></td>
                </tr>
                <tr>
                    <td>DESCRIPCION</td>
                    <td><input type="text" name="descripcion" id="descripcion" value="<?php echo $producto[2]?>"/></td>
                </tr>                
                <tr>                    
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" id="submit" value="ACTUALIZAR PRODUCTO"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
