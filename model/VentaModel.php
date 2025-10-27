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

    //  Ver todas las ventas
    public function verVentas()
    {
        $arr_ventas = array();
        $consulta = "SELECT * FROM venta";
        $sql = $this->conexion->query($consulta);

        while ($objeto = $sql->fetch_object()) {
            array_push($arr_ventas, $objeto);
        }
        return $arr_ventas;
    }

    //  Ver una venta por ID
    public function ver($id)
    {
        $id = intval($id);
        $consulta = "SELECT * FROM venta WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }

    //  Registrar nueva venta
    public function registrar($fecha, $total, $id_vendedor, $id_cliente, $estado)
    {
        $fecha       = $this->conexion->real_escape_string($fecha);
        $total       = floatval($total);
        $id_vendedor  = intval($id_vendedor);
        $id_cliente  = intval($id_cliente);

        $consulta = "INSERT INTO venta (fecha, total, id_vendedor, id_cliente, estado) VALUES ('$fecha', $total, $id_vendedor, $id_cliente, $estado)";
        $sql = $this->conexion->query($consulta);

        if ($sql) {
            return $this->conexion->insert_id;
        }
        return 0;
    }

    //  Actualizar venta
    public function actualizar($id_venta, $fecha, $total, $id_vendedor, $id_cliente)
    {
        $id_venta   = intval($id_venta);
        $fecha      = $this->conexion->real_escape_string($fecha);
        $total      = floatval($total);
        $id_vendedor = intval($id_vendedor);
        $id_cliente = intval($id_cliente);

        $consulta = "UPDATE venta SET fecha='$fecha', total=$total, id_vendedor=$id_vendedor, id_cliente=$id_cliente  WHERE id='$id_venta'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }

    // Eliminar venta
    public function eliminar($id_venta)
    {
        $id_venta = intval($id_venta);
        $consulta = "DELETE FROM venta WHERE id='$id_venta'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
}
