<?php
if (isset($_POST['submit'])) {
    require('../controller/producto.php');

    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];    

    $objProducto = new Producto();
    if ($objProducto->insertar($codigo, $descripcion)) {
        //echo 'Datos guardados.';
        header('location: administrar_producto.php');        
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
        <a href="administrar_producto.php"><img src="../img/atras.png" alt="volver"></a>
        <form action="nuevo_producto.php" method="post">
            <table>
                <tr>
                    <td>CODIGO</td>
                    <td><input type="text" name="codigo" id="codigo"/></td>
                </tr>
                <tr>
                    <td>DESCRIPCION</td>
                    <td><input type="text" name="descripcion" id="descripcion"/></td>
                </tr>                
                <tr>                    
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" id="submit" value="AGREGAR PRODUCTO"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
