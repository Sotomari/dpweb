<?php
$tipo = $_GET['tipo'];
if ($tipo == "registrar") {
    //print_r($_POST);
    $Nro_identidad = $_POST['Nro_identidad'];
    $Razon_Social = $_POST['Razon_Social'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $Departamento = $_POST['Departamento'];
    $Provincia = $_POST['Provincia'];
    $Distrito = $_POST['Distrito'];
    $Cod_Postal= $_POST['Cod_Postal'];
    $Direccion = $_POST['Direccion'];
    $Rol = $_POST['Rol'];

    if ($Nro_identidad =="" ||  $Razon_Social =="" || $telefono =="" || $correo =="" || $Departamento =="" || $Distrito == ""||   $Cod_Postal ==""|| $Direccion =="" || $Rol =="") {
        
    $arrRespuesta = array('status'=> true, 'msg'=>'Procedemos a registrar');
    
    }else {
         $arrRespuesta = array('status'=> true, 'msg'=>'Procedemos a registrar');
    }
    echo json_encode($arrRespuesta);

}

