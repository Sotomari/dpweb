<?php
require_once("../model/VentaModel.php");

$objVenta = new VentaModel();

// Verificamos el tipo de acción
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

$respuesta = array('status' => false, 'msg' => '', 'data' => []);

if ($tipo == "ver_ventas") {
    $ventas = $objVenta->verVentas();
    if ($ventas) {
        $respuesta['status'] = true;
        $respuesta['data'] = $ventas;
    } else {
        $respuesta['msg'] = "No hay ventas registradas";
    }
    echo json_encode($respuesta);
    exit;
}

if ($tipo == "registrar") {
    $fecha      = $_POST['fecha'];
    $total      = $_POST['total'];
    $id_vendedor = $_POST['id_vendedor'];
    $id_cliente = $_POST['id_cliente'];
    $estado     = $_POST['estado'];

    $id = $objVenta->registrar($fecha, $total, $id_vendedor, $id_cliente, $estado);
    if ($id > 0) {
        $respuesta['status'] = true;
        $respuesta['msg'] = "Venta registrada correctamente";
        $respuesta['id'] = $id;
    } else {
        $respuesta['msg'] = "Error al registrar la venta";
    }
    echo json_encode($respuesta);
    exit;
}

if ($tipo == "ver") {
    $id = $_POST['id_venta'] ?? 0;
    $venta = $objVenta->ver($id);
    if ($venta) {
        $respuesta['status'] = true;
        $respuesta['data'] = $venta;
    } else {
        $respuesta['msg'] = "Venta no encontrada";
    }
    echo json_encode($respuesta);
    exit;
}

if ($tipo == "actualizar") {
    $id         = $_POST['id'];
    $fecha      = $_POST['fecha'];
    $total      = $_POST['total'];
    $id_cliente = $_POST['id_cliente'];
    $id_vendedor = $_POST['id_vendedor'];
    $estado     = $_POST['estado'];

    $ok = $objVenta->actualizar($id, $fecha, $total, $id_vendedor, $id_cliente, $estado);
    if ($ok) {
        $respuesta['status'] = true;
        $respuesta['msg'] = "Venta actualizada correctamente";
    } else {
        $respuesta['msg'] = "Error al actualizar la venta";
    }
    echo json_encode($respuesta);
    exit;
}

if ($tipo == "eliminar") {
    $id = $_POST['id_venta'] ?? 0; // 

    $ok = $objVenta->eliminar($id);
    if ($ok) {
        $respuesta['status'] = true;
        $respuesta['msg'] = "Venta eliminada correctamente";
    } else {
        $respuesta['msg'] = "Error al eliminar la venta";
    }
    echo json_encode($respuesta);
    exit;
}

echo json_encode(["status" => false, "msg" => "Acción no válida"]);