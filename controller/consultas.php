<?php

include_once("../conexion/dbconexion.php");

class Consulta {

    var $con;

    function Consulta() {
        $this->con = new DBConexion();
    }
    
    function mostrar_productos_por_tiendas($tienda) {
        if ($this->con->conectar() == true) {
            return mysql_query("select t.nombre, p.descripcion, tp.cantidad from tb_tiendas as t, tb_productos as p, tb_tienda_producto as tp where  t.id = tp.idTienda and p.id = tp.idProducto  and t.nombre = '" . $tienda . "'");
        } else {
            echo 'No hay conexion';
        }
    }

}

?>
