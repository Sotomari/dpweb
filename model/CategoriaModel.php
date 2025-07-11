<?php
require_once("../library/conexion.php");

class CategoriaModel {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function registrar($nombre, $detalle) {
        $sql = "INSERT INTO categoria (nombre, detalle) VALUES ('$nombre', '$detalle')";
        $res = $this->conexion->query($sql);
        return $res ? $this->conexion->insert_id : 0;
    }

    public function existeCategoria($nombre) {
        $sql = "SELECT * FROM categoria WHERE nombre = '$nombre'";
        $res = $this->conexion->query($sql);
        return $res->num_rows;
    }
}



