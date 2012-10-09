<?php
if (isset($_POST['submit'])) {
    require('../controller/tienda.php');

    $nombre = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];    

    $objTienda= new Tienda();
    if ($objTienda->insertar($nombre, $ubicacion)) {
        //echo 'Datos guardados.';
        header('location: administrar_tienda.php');        
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
        <form method="post" action="nuevo_tienda.php">
            <table>
                <tr>
                    <td>NOMBRE</td>
                    <td><input type="text" name="nombre" id="nombre"/></td>
                </tr>
                <tr>
                    <td>UBICACION</td>
                    <td><input type="text" name="ubicacion" id="ubicacion"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" id="submit" value="AGREGAR TIENDA"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
