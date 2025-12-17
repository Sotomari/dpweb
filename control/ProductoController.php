
<?php
require_once("../model/ProductoModel.php");
require_once("../model/CategoriaModel.php");
require_once("../model/UsuarioModel.php"); // usuario model

$objProducto = new ProductoModel();
$objCategoria = new CategoriaModel();
$objUsuario = new UsuarioModel(); // usuario model

$tipo = $_GET['tipo'];
//registrar
if ($tipo == "registrar") {
    //print_r($_POST);
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_categoria = $_POST['id_categoria'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $id_proveedor = $_POST['id_proveedor'];


    /* validar que los campos no esten vacios*/
    if ($codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $id_categoria == "" || $fecha_vencimiento == "" || $id_proveedor == "") {

        echo json_encode(['status' => false, 'msg' => 'Error, campos vacíos']);
        exit;
    }
    //para imagen
    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['status' => false, 'msg' => 'error al subir imagen']);
        exit;
    }
    /*  if ($objProducto->existeProducto($codigo) > 0) {
        echo json_encode(['status' => false, 'msg' => 'Error, el código ya existe']);
        exit;
    }
        */
    //imagen
    $file = $_FILES['imagen'];
    $ext  = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $extPermitidas = ['jpg', 'jpeg', 'png'];
    // pregunata si existe el archivo
    if (!in_array($ext, $extPermitidas)) {
        echo json_encode(['status' => false, 'msg' => 'Formato de imagen no permitido']);
        exit;
    }
    //tamaño del archivo o de imagen
    if ($file['size'] > 5 * 1024 * 1024) { // 5MB
        echo json_encode(['status' => false, 'msg' => 'La imagen supera 2MB']);
        exit;
    }
    $carpetaUploads = "../uploads/productos/";
    if (!is_dir($carpetaUploads)) {
        @mkdir($carpetaUploads, 0775, true);
    }

    $nombreUnico = uniqid('prod_') . '.' . $ext;
    $rutaFisica  = $carpetaUploads . $nombreUnico;
    $rutaRelativa = "uploads/productos/" . $nombreUnico;

    if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
        echo json_encode(['status' => false, 'msg' => 'No se pudo guardar la imagen']);
        exit;
    }


    $id = $objProducto->registrar($codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento, $rutaRelativa, $id_proveedor);
    if ($id > 0) {
        echo json_encode(['status' => true, 'msg' => 'Registrado correctamente', 'id' => $id, 'img' => $rutaRelativa]);
    } else {
        @unlink($rutaFisica); // revertir archivo si falló BD
        echo json_encode(['status' => false, 'msg' => 'Error, falló en registro']);
    }
    exit;
}

if ($tipo == "ver_productos") {

    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $productos = $objProducto->verProductos();
    $arrProduct = array();
    if (count($productos)) {
        foreach ($productos as $producto) {
            $categoria = $objCategoria->ver($producto->id_categoria);
            $producto->categoria = $categoria->nombre;

            // AGREGAR ESTAS LÍNEAS PARA CARGAR EL PROVEEDOR
            if ($producto->id_proveedor && $producto->id_proveedor > 0) {
                $proveedor = $objUsuario->ver($producto->id_proveedor);
                $producto->proveedor = $proveedor ? $proveedor->razon_social : 'Sin asignar';
            } else {
                $producto->proveedor = 'Sin asignar';
            }

            array_push($arrProduct, $producto);
        }
        $respuesta = array('status' => true, 'msg' => '', 'data' => $arrProduct);
    }
    echo json_encode($respuesta);
    exit; // IMPORTANTE: agregar exit aquí
}

/*ver para editar */
if ($tipo == "ver") {
    //print_r($_POST);
    $respuesta = array('status' => false, 'msg' => '');
    $id_producto = $_POST['id_producto'];
    $producto = $objProducto->ver($id_producto);
    if ($producto) {
        $categoria = $objCategoria->ver($producto->id_categoria);
        $proveedor = $objUsuario->ver($producto->id_proveedor);
        $producto->categoria = $categoria->nombre;
        $producto->proveedor = $proveedor->razon_social;
        $respuesta['status'] = true;
        $respuesta['data'] = $producto;
    } else {
        $respuesta['msg'] = 'Error, producto no existe';
    }
    echo json_encode($respuesta);
}
if ($tipo == "actualizar") {
    //print_r($_POST);
    $id_producto = $_POST['id_producto'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_categoria = $_POST['id_categoria'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $id_proveedor = $_POST['id_proveedor'];


    /* validar que los campos no esten vacios*/
    if ($id_producto == "" || $codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $id_categoria == "" || $fecha_vencimiento == "" || $id_proveedor == "") {

        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacíos');
    }

    $existeID = $objProducto->ver($id_producto);
    if (!$existeID) {
        $arrResponse = array('status' => false, 'msg' => 'Error, producto no existe en BD');
        echo json_encode($arrResponse);
        //cerrar funcion
        exit;
    }
    // Verificar si se subió una nueva imagen
    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        // No se subió nueva imagen, mantener la actual
        $imagen = $existeID->imagen;
    } else {
        // Se subió una nueva imagen
        $file = $_FILES['imagen'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $extPermitidas = ['jpg', 'jpeg', 'png'];

        if (!in_array($ext, $extPermitidas)) {
            echo json_encode(['status' => false, 'msg' => 'Formato de imagen no permitido']);
            exit;
        }

        if ($file['size'] > 5 * 1024 * 1024) {
            echo json_encode(['status' => false, 'msg' => 'La imagen supera 5MB']);
            exit;
        }

        $carpetaUploads = "../uploads/productos/";
        if (!is_dir($carpetaUploads)) {
            @mkdir($carpetaUploads, 0775, true);
        }

        $nombreUnico = uniqid('prod_') . '.' . $ext;
        $rutaFisica = $carpetaUploads . $nombreUnico;
        $imagen = "uploads/productos/" . $nombreUnico;

        if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
            echo json_encode(['status' => false, 'msg' => 'No se pudo guardar la imagen']);
            exit;
        }

        // ELIMINAR LA IMAGEN ANTERIOR SI EXISTE Y ES DIFERENTE
        if (!empty($existeID->imagen) && file_exists("../" . $existeID->imagen)) {
            @unlink("../" . $existeID->imagen);
        }
    }

    // Actualizar producto
    $actualizar = $objProducto->actualizar($id_producto, $codigo, $nombre, $detalle, $precio, $stock, $id_categoria, $fecha_vencimiento, $id_proveedor, $imagen);

    if ($actualizar) {
        $arrResponse = array('status' => true, 'msg' => "Producto actualizado correctamente");
    } else {
        $arrResponse = array('status' => false, 'msg' => 'Error al actualizar producto');
    }

    echo json_encode($arrResponse);
    exit;
}
//echo se se envie la imagen;
/*$file = $_FILES['imagen'];
                $ext  = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $extPermitidas = ['jpg', 'jpeg', 'png'];
                if (!in_array($ext, $extPermitidas)) {
                    echo json_encode(['status' => false, 'msg' => 'Formato de imagen no permitido']);
                    exit;
                }
                if ($file['size'] > 5 * 1024 * 1024) { // 5MB
                    echo json_encode(['status' => false, 'msg' => 'La imagen supera 2MB']);
                    exit;
                }
                $carpetaUploads = "../uploads/productos/";
                if (!is_dir($carpetaUploads)) {
                    @mkdir($carpetaUploads, 0775, true);
                }
                $nombreUnico = uniqid('prod_') . '.' . $ext;
                $rutaFisica  = $carpetaUploads . $nombreUnico;
                $imagen = "uploads/productos/" . $nombreUnico;
                if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
                    echo json_encode(['status' => false, 'msg' => 'No se pudo guardar la imagen']);
                    exit;
                }
                //eliminar la imagen anterior
                if (file_exists("../" . $producto->imagen)) {
                    @unlink("../" . $producto->imagen);
                }
                $imagen= $rutaRelativa;*/

/*
/* Método para Eliminar producto */
if ($tipo == "eliminar") {
    $id_producto = isset($_POST['id']) ? $_POST['id'] : '';

    if ($id_producto == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, ID vacío');
    } else {
        $existeId = $objProducto->ver($id_producto);
        if (!$existeId) {
            $arrResponse = array('status' => false, 'msg' => 'Error, producto no existe en Base de Datos');
        } else {
            // ELIMINAR LA IMAGEN DEL SERVIDOR PRIMERO
            if (!empty($existeId->imagen) && file_exists("../" . $existeId->imagen)) {
                @unlink("../" . $existeId->imagen);
            }
            $eliminar = $objProducto->eliminar($id_producto);
            if ($eliminar) {
                $arrResponse = array('status' => true, 'msg' => 'Producto eliminado correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el producto');
            }
        }
    }
    echo json_encode($arrResponse);
    exit;
}




if ($tipo == "buscar_producto_venta") {
    $dato = $_POST['dato'];
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $productos = $objProducto->BuscarProductoByNombreOrCodigo($dato);
    $arrProduct = array();
    if (count($productos)) {
        foreach ($productos as $producto) {
            $categoria = $objCategoria->ver($producto->id_categoria);
            $producto->categoria = $categoria->nombre;
            array_push($arrProduct, $producto);
         }
        $respuesta = array('status' => true, 'msg' => '', 'data' => $arrProduct);
    }
    echo json_encode($respuesta);
    
}



