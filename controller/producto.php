<?php

include_once("../conexion/dbconexion.php");

class Producto {

    var $con;

    function Producto() {
        $this->con = new DBConexion();
    }

    function insertar($codigo, $descripcion) {
        if ($this->con->conectar() == true) {
            return mysql_query("INSERT INTO tb_productos (codigo, descripcion) VALUES ('" . $codigo . "','" . $descripcion . "')");
        }
    }

    function actualizar($codigo, $descripcion, $id) {
        if ($this->con->conectar() == true) {
            //print_r($campos);
            return mysql_query("UPDATE tb_productos SET codigo = '" . $codigo . "', descripcion = '" . $descripcion . "' WHERE id = " . $id);
        }
    }

    function mostrar_producto($id) {
        if ($this->con->conectar() == true) {
            return mysql_query("SELECT * FROM tb_productos WHERE id=" . $id);
        }
    }

    function mostrar_productos() {
        if ($this->con->conectar() == true) {
            //return mysql_query("SELECT * FROM tb_productos ORDER BY id DESC");
            return mysql_query("SELECT * FROM tb_productos");
        } else {
            echo 'No hay conexion';
        }
    }

}

?>
