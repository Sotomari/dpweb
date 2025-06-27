<?php
require_once("../model/UsuarioModel.php");
$objPersona = new UsuarioModel();
$tipo = $_GET['tipo'];
if ($tipo == "registrar") {
    //print_r($_POST);
    $nro_identidad = $_POST['nro_identidad'];
    $razon_social = $_POST['razon_social'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $departamento = $_POST['departamento'];
    $provincia = $_POST['provincia'];
    $distrito = $_POST['distrito'];
    $cod_postal = $_POST['cod_postal'];
    $direccion = $_POST['direccion'];
    $rol = $_POST['rol'];
    //INCREPTANDO DNI PARA UTILIZARLO COMO CONTRASEÑA
    $password = password_hash($nro_identidad, PASSWORD_DEFAULT);

    if ($nro_identidad == "" ||  $razon_social == "" || $telefono == "" || $correo == "" || $departamento == "" || $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "") {

        $arrResponse  = array('status' => true, 'msg' => 'Procedemos a registrar');
    } else {
        //validacion sii exixte persona con el mismo dni
        $existePersona = $objPersona->existePersona($nro_identidad);
        if ($existePersona > 0) {
            $arrResponse = array('status' => false, 'msg' => 'error, nro de documento ya exixte');
        } else {

            $respuesta = $objPersona->registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password);
         if ($respuesta){
            $arrResponse = array('status'=> true, 'msg'=>'Procedemos a registrar');
         
         }else{
            $arrResponse = array('status' => false, 'msg'=>'error, fallo el registro');
         }
         
        }
    }
    echo json_encode($arrResponse);
}
