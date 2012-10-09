<?php
/* require('../controller/producto.php');
  $objProducto = new Producto();
  $consulta = $objProducto->mostrar_productos(); */
?>
<?php
$con = mysql_connect('localhost', 'root', 'mysql');
if (!$con)
    die("Mysql not conected");
$chk = mysql_select_db('db_empresa', $con);

// maximo por pagina 
$limit = 18;

// pagina pedida 
if (isset($_GET['pag'])) {
    $pag = (int) $_GET["pag"];
    if ($pag < 1) {
        $pag = 1;
    }
} else {
    $pag = 1;
}
$offset = ($pag - 1) * $limit;

if (!$chk)
    die("Database not connected");
$query = "SELECT SQL_CALC_FOUND_ROWS id, codigo, descripcion FROM tb_productos LIMIT $offset, $limit";

$sqlTotal = "SELECT FOUND_ROWS() as total";

$data = mysql_query($query);

$rsTotal = mysql_query($sqlTotal);

$rowTotal = mysql_fetch_assoc($rsTotal);
// Total de registros sin limit 
$total = $rowTotal["total"];
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <link rel="stylesheet" type="text/css" href="../estilo/estilo.css" />
        <title>:: Productos ::</title>        
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
                <a href="nuevo_producto.php"><img src="../img/add.png" alt="add" border="0"/>Nuevo Producto</a>
                <br/><br/>
                <table id="tablaProductos">                   
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>DESCRIPCION</th>                
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($datos = mysql_fetch_array($data)) {
                            ?>
                            <tr>
                                <td><?php echo $datos[1]; ?></td>
                                <td><?php echo $datos[2]; ?></td>                
                                <td><a href="actualizar_producto.php?id=<?php echo $datos[0]; ?>"><img src="../img/database_edit.png" alt="edit" border="0"/></a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>                    
                </table>                
            </div>
            <div id="paginador">

                <?php
                $totalPag = ceil($total / $limit);
                $links = array();
                for ($i = 1; $i <= $totalPag; $i++) {
                    $color = ( $i == $pag) ? 'style="color: #288EB5;" ' : '';
                    $links[] = "<a href=\"?pag=$i\" $color >$i</a>";
                }
                echo implode(" - ", $links);
                ?>

            </div>
        </div>
    </body>
</html>
