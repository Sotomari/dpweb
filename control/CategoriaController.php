<?php
require_once("../model/CategoriaModel.php");
$objCategoria = new CategoriaModel();

$tipo = $_GET['tipo'];
if ($tipo == "registrar") {
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];

    if ($nombre == "" || $detalle == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error: campos vacíos');
    } else {
        $existe = $objCategoria->existeCategoria($nombre);
        if ($existe > 0) {
            $arrResponse = array('status' => false, 'msg' => 'La categoría ya existe');
        } else {
            $registrado = $objCategoria->registrar($nombre, $detalle);
            if ($registrado) {
                $arrResponse = array('status' => true, 'msg' => 'Categoría registrada correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al registrar en base de datos');
            }
        }
    }
    echo json_encode($arrResponse);
}



