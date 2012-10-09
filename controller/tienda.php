<?php

include_once("../conexion/dbconexion.php");

class Tienda {

    var $con;

    function Tienda() {
        $this->con = new DBConexion();
    }
    
    function insertar($nombre, $ubicacion) {
        if ($this->con->conectar() == true) {
            return mysql_query("INSERT INTO tb_tiendas (nombre, ubicacion) VALUES ('" . $nombre . "','" . $ubicacion . "')");
        }
    }
    
    function mostrar_tiendas() {
        if ($this->con->conectar() == true) {
            //return mysql_query("SELECT * FROM tb_tiendas ORDER BY id DESC");
            return mysql_query("SELECT * FROM tb_tiendas");
        } else {
            echo 'No hay conexion';
        }
    }

}

?>
