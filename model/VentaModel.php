<?php
require_once("../library/conexion.php");
class VentaModel
{
    private $conexion;

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    //registrar un producto
    public function registrar_temporal($id_producto, $precio, $cantidad)
    {
        $consulta = "INSERT INTO temporal_venta (id_producto, precio, cantidad) VALUES ('$id_producto','$precio', '$cantidad')";
        $sql = $this->conexion->prepare($consulta);
        if ($sql->execute()) {
            return  $this->conexion->insert_id;
        } else {
            return 0;
        }
    }

    //atualizar
    public function actualizarCantidadTemporal($id_producto, $cantidad)
    {
        $consulta = "UPDATE temporal_venta SET cantidad='$cantidad' WHERE id_producto='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }

    //buscar por id
    public function buscarTemporal($id_producto)
    {

        $consulta = "SELECT * FROM temporal_venta WHERE id_producto='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    //buscar todo
    public function buscarTemporales()
    {
        $arr_temporal = array();
        $consulta = "SELECT * FROM temporal_venta";
        $sql = $this->conexion->query($consulta);
        while ($objeto = $sql->fetch_object()) {
            array_push($arr_temporal_venta, $objeto);
        }
        return $arr_temporal();
    }

     // ⭐⭐ LISTAR TEMPORAL (FALTABA) ⭐⭐
    public function verTemporal()
    {
        $consulta = "SELECT t.id_producto, t.precio, t.cantidad, p.nombre 
                     FROM temporal_venta t
                     INNER JOIN productos p ON t.id_producto = p.id";
        $sql = $this->conexion->query($consulta);

        $lista = [];
        while ($row = $sql->fetch_object()) {
            $lista[] = $row;
        }

        return $lista;
    }



    //eliminar por id
    public function eliminarTemporal($id_producto)
    {

        $consulta = "SELECT FROM temporal_venta WHERE id_producto='$id_producto'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }

    //eliminar todo
    public function eliminarTemporales()
    {
        $consulta = "DELETE FROM temporal_venta";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }





    public function RegistrarVenta($total)
    {
        $consulta = "INSERT INTO ventas(total) VALUES ($total)";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            return $this->conexion->insert_id;
        }
        return 0;
    }
    public function registrarDetalle($id_venta, $id_producto, $cantidad, $precio)
    {
        $consulta = "INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio) VALUES ($id_venta, $id_producto, $cantidad, $precio)";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
    public function limpiarTemporal()
    {
        $consulta = "DELETE FROM temporal_venta";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
}
