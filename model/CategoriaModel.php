<?php
require_once("../library/conexion.php");
class CategoriaModel
{
    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function registrar($nombre, $detalle)
    {
        $consulta = "INSERT INTO categoria (nombre, detalle) VALUES ('$nombre', '$detalle')";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
            $sql = 0;
        }
        return $sql;
    }

    public function existeCategoria($nombre)
    {
        $consulta = "SELECT * FROM categoria where nombre = '$nombre'";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;
    }


    /*metodo para listar */
    public function verCategorias()
    {
        $arr_categorias = array();
        $consulta = "SELECT * from categoria"; // where rol='Proveedor'
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_categorias, $objeto);
        }
        return $arr_categorias;
    }


    
//ver persona
    public function verProveedor()
    {
        $arr_proveedor = array();
        // solo los usuarios que tengan rol "Proveedor"
        $consulta = "SELECT id_persona, nombre FROM persona WHERE rol = 'Proveedor'";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_proveedor, $objeto);
        }
        return $arr_proveedor;
    }





    /*metodo para ver  */
    public function ver($id)
    {
        $consulta = "SELECT * FROM categoria WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    //metodo para actualizar
    public function actualizar($id_categoria, $nombre, $detalle)
    {
        $consulta = "UPDATE categoria SET nombre = '$nombre', detalle = '$detalle' WHERE id = '$id_categoria'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }

    //metodo para eliminar
    public function eliminar($id_categoria)
    {
        $consulta = "DELETE FROM categoria WHERE id='$id_categoria'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
}
