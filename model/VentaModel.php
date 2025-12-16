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
//actualizar id
      public function actualizarCantidadTemporalByid($id, $cantidad)
    {
        $consulta = "UPDATE temporal_venta SET cantidad='$cantidad' WHERE id_producto='$id'";
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
        $consulta = "SELECT tv.*, p.nombre FROM temporal_venta tv INNER JOIN producto p ON tv.id_producto = p.id";
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            while ($objeto = $sql->fetch_object()) {
                array_push($arr_temporal, $objeto);
            }
        }
        return $arr_temporal;
    }
     public function eliminarTemporal($id)
    {
        $consulta = "DELETE FROM temporal_venta WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
    public function eliminarTemporales()
    {
        $consulta = "DELETE FROM temporal_venta";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
    public function listarVentas_Temporal(){

    }

    //---------------------- VENTAS REGISTRADAS (OFICIALES)----------------
    public function buscar_ultima_venta(){
        $consulta = "SELECT codigo FROM venta ORDER BY id DESC LIMIT 1";
        $sql = $this->conexion->query($consulta);
        return $sql->fetch_object();
    }
    public function registrar_venta($codigo, $fecha_venta, $id_cliente, $id_vendedor){
        $consulta = "INSERT INTO venta (codigo, fecha_hora, id_cliente, id_vendedor) VALUES ('$codigo', '$fecha_venta', '$id_cliente', '$id_vendedor')";
        $sql = $this->conexion->query($consulta);
        if($sql){
            return $this->conexion->insert_id;
        }
        return 0;
    }
    public function registrar_detalle_venta($id_venta, $id_producto, $precio, $cantidad){
        $consulta = "INSERT INTO detalle_venta (id_venta, id_producto, precio, cantidad) VALUES ('$id_venta', '$id_producto', '$precio', '$cantidad')";
        $sql = $this->conexion->query($consulta);
        return $sql;
    }
}

  

