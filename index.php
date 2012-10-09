<?php
require_once 'config.php';

// Is the user already logged in? Redirect him/her to the private page

if ($_SESSION['username']) {
    header("Location: bienvenidos.php");
    exit;
}

if (isSet($_POST['submit'])) {
    $do_login = true;

    include_once 'do_login.php';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>:: Login ::</title>
        <link rel="stylesheet" type="text/css" href="estilo/estilo.css" />
    </head>
    <body>
        <div id="formulario">
            <form  name="login" method="post" action="index.php">
                <?php
                if (isSet($login_error)) {
                    echo 'error!';
                }
                ?>
                <fieldset>
                    <legend>LOGIN</legend>
                    Usuario<input type="text" name="username" id="name"/><br/>
                    Clave<input type="password" name="password"/><br/>
                    <input type="checkbox" name="autologin" value="1" id="olvido">Recordar Usuario<br/>
                    <input type="submit" value="Ingresar" id="submit" name="submit" />
                    </filedset>
            </form>
        </div>
    </body>
</html>
