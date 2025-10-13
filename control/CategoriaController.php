<?php
require_once("../model/CategoriaModel.php");

$objCategoria = new CategoriaModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {
    //print_r($_POST);
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];

    /* validar que los campos no esten vacios*/
    if ($nombre == "" || $detalle == "") {

        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        // validar si existe categoria con el mismo nombre
        $existeCategoria = $objCategoria->existeCategoria($nombre);
        if ($existeCategoria > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error: nombre ya existe');
        } else {
            $respuesta = $objCategoria->registrar($nombre, $detalle);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'REGISTRADO CORRECTAMENTE');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'ERROR: FALLO AL REGISTAR');
            }
        }
    }
    echo json_encode($arrResponse);
}


/* ver categorias registrados*/
if ($tipo == "ver_categorias") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $categorias = $objCategoria->verCategorias();
    if (count($categorias)) {
        $respuesta = array('status' => true, 'msg' => '', 'data' => $categorias);
    }
    echo json_encode($respuesta);
}


/*ver para editar */
if ($tipo == "ver") {
    $id_categoria = $_POST['id_categoria'];
    $respuesta = array('status' => false, 'msg' => '');
    $categoria = $objCategoria->ver($id_categoria);

    if ($categoria) {
        $respuesta['status'] = true;
        $respuesta['data'] = $categoria; //corregido
    } else {
        $respuesta['msg'] = 'Error, la categoría no existe';
    }
    echo json_encode($respuesta);
    exit;
}

/*para actualizar*/
if ($tipo == "actualizar") {
    //print_r($_POST);
    $id_categoria = $_POST['id_categoria'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    
    if ($id_categoria == "" || $nombre == "" || $detalle == "" ) {

        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        $existeID = $objCategoria->ver($id_categoria);
        if (!$existeID) {
            //devolver respuesta
            $arrResponse = array('status' => false, 'msg' => 'Error, categoria no existe en BD');
            echo json_encode($arrResponse);
            //cerrar funcion
            exit;
        } else {
            //actualizar
            $actualizar = $objCategoria->actualizar($id_categoria, $nombre, $detalle);
            if ($actualizar) {
                $arrResponse = array('status' => true, 'msg' => "Actualizado correctamente");
            } else {
                $arrResponse = array('status' => false, 'msg' => $actualizar);
            }
            echo json_encode($arrResponse);
            exit;
        }
    }
}


// Metodo para Elimar datos de Usuario
if ($tipo == "eliminar") {
    // El JS envía 'id', no 'id_persona'
    $id_categoria = $_POST['id_categoria'];
    $respuesta = array('status' => false, 'msg' => '');
    $resultado = $objCategoria->eliminar($id_categoria);
    if ($resultado) {
        $respuesta = array('status' => true, 'msg' => 'Eliminado Correctamente');
    }else {
        $respuesta = array('status' => false, 'msg' => $resultado);
    }
    echo json_encode($respuesta);
}
