<?php
if (isset($_POST['submit'])) {
    require('../controller/usuario.php');

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];    

    $objUsuario= new Usuario();
    if ($objUsuario->insertar($usuario, $clave)) {
        //echo 'Datos guardados.';
        header('location: administrar_usuario.php');        
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
        <form method="post" action="nuevo_usuario.php">
            <table>
                <tr>
                    <td>USUARIO</td>
                    <td><input type="text" name="usuario" id="usuario"/></td>
                </tr>
                <tr>
                    <td>CLAVE</td>
                    <td><input type="password" name="clave" id="clave"/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="submit" id="submit" value="AGREGAR USUARIO"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
