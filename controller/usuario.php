<?php

include_once("../conexion/dbconexion.php");

class Usuario {

    var $con;

    function Usuario() {
        $this->con = new DBConexion();
    }

    function insertar($usuario, $clave) {
        if ($this->con->conectar() == true) {
            return mysql_query("INSERT INTO tb_usuarios (usuario, clave) VALUES ('" . $usuario . "','" . $clave . "')");
        }
    }

    function mostrar_usuarios() {
        if ($this->con->conectar() == true) {
            //return mysql_query("SELECT * FROM tb_usuarios ORDER BY id DESC");
            return mysql_query("SELECT * FROM tb_usuarios");
        } else {
            echo 'No hay conexion';
        }
    }

}

?>
