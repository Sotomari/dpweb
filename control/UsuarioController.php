<?php
require_once("../model/UsuarioModel.php");
$objPersona = new UsuarioModel();
$tipo = $_GET['tipo'];
if ($tipo == "registrar") {
   //print_r($_POST);
   //$id_persona = $_POST['id_persona'];
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
   //ENCRIPTANDO DNI nro_identidad PARA UTILIZARLO COMO CONTRASEÑA
   $password = password_hash($nro_identidad, PASSWORD_DEFAULT);
   // Validación de campos vacíos
   if ($nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == "" || $provincia == "" || $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "") {
      $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
   } else {
      //validacion si existe la misma persona con el mismo dni
      $existePersona = $objPersona->existePersona($nro_identidad);
      if ($existePersona > 0) {
         // Si ya existe, se devuelve un mensaje de error
         $arrResponse = array('status' => false, 'msg' => 'Error, nro de documento ya existe');
      } else {
         // Si no existe, se intenta registrar a la persona
         $respuesta = $objPersona->registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password);
         if ($respuesta) {
            $arrResponse = array('status' => true, 'msg' => 'Registrado Correctamente');
         } else {
            $arrResponse = array('status' => false, 'msg' => 'Error, fallo en registro');
         }
      }
   }
   echo json_encode($arrResponse);
}

/* para iniciar sesion*/
if ($tipo == "iniciar_sesion") {
   $nro_identidad = $_POST['username'];
   $password = $_POST['password'];
   if ($nro_identidad == "" || $password == "") {
      $respuesta = array('status' => false, 'msg' => 'Error, campos vacios');
   } else {
      // Verifica si el usuario existe en la base de datos
      $existePersona = $objPersona->existePersona($nro_identidad);
      if (!$existePersona) {
         // Si no existe el usuario
         $respuesta = array('status' => false, 'msg' => 'Error, usuario no registrado');
      } else {
         // Se obtiene el objeto persona con sus datos (id, razon_social y password)
         $persona = $objPersona->buscarPersonaPorNroIdentidad($nro_identidad);
         // Se compara la contraseña ingresada con la almacenada (encriptada)
         if (password_verify($password, $persona->password)) {
            session_start();
            $_SESSION['ventas_id'] = $persona->id;
            $_SESSION['ventas_usuario'] = $persona->razon_social;
            $respuesta = array('status' => true, 'msg' => 'ok');
         } else {
            $respuesta = array('status' => false, 'msg' => 'Error, contraseña incorecta');
         }
      }
   }
   echo json_encode($respuesta);
}

if ($tipo == "ver_usuarios") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $usuarios = $objPersona->verUsuarios();
    if (count($usuarios)) {
        $respuesta = array('status' => true, 'msg' => '', 'data' => $usuarios);
    }
    echo json_encode($respuesta);
}

/*ver para editar */
if ($tipo == "ver") {
    //print_r($_POST);
    $respuesta = array('status' => false, 'msg' => '');
    $id_persona = $_POST['id_persona'];
    $usuario = $objPersona->ver($id_persona);
    if ($usuario) {
        $respuesta['status'] = true;
        $respuesta['data'] = $usuario;
    } else {
        $respuesta['msg'] = 'Error, usuario no existe';
    }
    echo json_encode($respuesta);
}

/*
if ($tipo == "ver_usuarios") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $usuarios = $objPersona->verUsuarios();
    if (count($usuarios)) {
        $respuesta = array('status' => true, 'msg' => '', 'data' => $usuarios);
    }
    echo json_encode($respuesta);
}
*/


/*

// VER TODOS LOS PROVEEDORES
if ($tipo == "ver_proveedores") {
    //print_r($_POST);
    $respuesta = array('status' => false, 'msg' => '');
    $id_proveedor = $_POST['id_proveedor'];
    $proveedores = $objPersona->ver($id_proveedor);
    if ($proveedores) {
        $respuesta['status'] = true;
        $respuesta['data'] = $proveedores;
    } else {
        $respuesta['msg'] = 'Error, proveedor no existe';
    }
    echo json_encode($respuesta);
   }
*/


if ($tipo == "actualizar") {
   //print_r($_POST);
   $id_persona = $_POST['id_persona'];
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
   if ($id_persona == "" || $nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == "" || $provincia == "" || $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "") {
      $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
   } else {
      $existeID = $objPersona->ver($id_persona);
      if (!$existeID) {
         //devolver mensaje
         $arrResponse = array('status' => false, 'msg' => 'Error, usuario no existe en base de datos');
         echo json_encode($arrResponse);
         //cerrar funcion
         exit;
      } else {
         //actualizar
         $actualizar = $objPersona->actualizar($id_persona, $nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol);
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

//para eliminar
if ($tipo == "eliminar") {
    //print_r($_POST);
    $id_persona = $_POST['id_persona'];
    $respuesta = array('status' => false, 'msg' => '');
    $resultado = $objPersona->eliminar($id_persona);
    if ($resultado) {
        $respuesta = array('status' => true, 'msg' => 'Eliminado Correctamente');
    }else {
        $respuesta = array('status' => false, 'msg' => $resultado);
    }
    echo json_encode($respuesta);
}




/* para cerrar sesion */
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
if ($tipo == 'cerrar_sesion') {
    session_start();
    session_destroy();
    echo json_encode(['status' => true, 'msg' => 'Sesión cerrada correctamente']);
    exit;
}


if ($tipo == "ver_clientes") {
   $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
   $usuarios = $objPersona->verClientes();
   if (count($usuarios)) {
      $respuesta = array('status' => true, 'msg' => '', 'data' => $usuarios);
   }
   echo json_encode($respuesta);
}



//ver proveedores
if ($tipo == "ver_proveedores") {
   $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
   $usuarios = $objPersona->verProveedores();
   if (count($usuarios)) {
      $respuesta = array('status' => true, 'msg' => '', 'data' => $usuarios);
   }
   echo json_encode($respuesta);
}

// Buscar cliente por DNI para ventas
if ($tipo == "buscar_por_dni") {
    $dni = isset($_POST['dni']) ? trim($_POST['dni']) : '';
    
    if ($dni == "") {
        $respuesta = array('status' => false, 'msg' => 'Error, DNI vacío');
    } else {
        // Usar el método buscar_por_dni del modelo
        $persona = $objPersona->buscar_por_dni($dni);
        
        if ($persona) {
            $respuesta = array(
                'status' => true, 
                'msg' => 'Cliente encontrado',
                'data' => array(
                    'id' => $persona->id,
                    'razon_social' => $persona->razon_social,
                    'nro_identidad' => $persona->nro_identidad,
                    'telefono' => isset($persona->telefono) ? $persona->telefono : '',
                    'correo' => isset($persona->correo) ? $persona->correo : ''
                )
            );
        } else {
            $respuesta = array('status' => false, 'msg' => 'Cliente no encontrado con DNI: ' . $dni);
        }
    }
    
    echo json_encode($respuesta);
    exit;
}