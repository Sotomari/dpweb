<?php
require_once("../model/SesionModel.php");

$objSesion = new SesionModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {
    //print_r($_POST);
    $id_persona =  $_POST['id_persona'];
    $fecha_hora_inicio =  $_POST['fecha_hora_inicio'];
    $fecha_hora_fin =  $_POST['fecha_hora_fin'];
    $token =  $_POST['token'];
    $ip =  $_POST['ip'];



    /* validar que los campos no esten vacios*/
    if ($id_persona == "" || $fecha_hora_inicio == "" || $fecha_hora_fin == "" || $token == "" || $ip == "" ) {

        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        // validar si existe persona con el mismo nro_documento
        $existeSesion = $objSesion->existeSesion($id_persona);
        if ($existeSesion > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error: id_persona ya existe');
        } else {
            $respuesta = $objSesion->registrar($id_persona, $fecha_hora_inicio, $fecha_hora_fin, $token, $ip);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'REGISTRADO CORRECTAMENTE');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'ERROR: FALLO AL REGISTAR');
            }
        }
    }
    echo json_encode($arrResponse);
}