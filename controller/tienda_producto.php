<?php

include_once("../conexion/dbconexion.php");

class TiendaProducto {

    var $con;

    function TiendaProducto() {
        $this->con = new DBConexion();
    }

    function insertar($idTienda, $idProducto, $cantidad) {
        if ($this->con->conectar() == true) {
            return mysql_query("INSERT INTO tb_tienda_producto (idTienda, idProducto, cantidad) VALUES ('" . $idTienda . "','" . $idProducto . "','" . $cantidad . "')");
        }
    }
    
    function mostrar_tienda_productos() {
        if ($this->con->conectar() == true) {
            //return mysql_query("SELECT * FROM tb_productos ORDER BY id DESC");
            return mysql_query("SELECT * FROM tb_tienda_producto");
        } else {
            echo 'No hay conexion';
        }
    }

}

?>
