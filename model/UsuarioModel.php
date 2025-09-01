<?php
// Se incluye el archivo de conexión para poder interactuar con la base de datos
require_once("../library/conexion.php");
// tendra todas las funciones relacionadas con la tabla persona 
class UsuarioModel
{
     private $conexion;
   
    function __construct()
    {
       
        $this->conexion = new Conexion();
        // Se establece la conexión y se guarda en el atributo $conexion
        $this->conexion = $this->conexion->connect();
    }
    // Método para registrar una nueva persona en la base de datos
    public function registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password)
    {
        $consulta = "INSERT INTO persona (nro_identidad, razon_social, telefono, correo, departamento, provincia, distrito, cod_postal, direccion, rol, password) VALUES ('$nro_identidad', '$razon_social', '$telefono', '$correo', '$departamento', '$provincia', '$distrito',' $cod_postal', '$direccion', '$rol', '$password')";
        // Se ejecuta la consulta
        $sql = $this->conexion->query($consulta);
       
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
            $sql = 0;
        }
        return $sql;
    }
    public function existePersona($nro_identidad)
    {
        $consulta = "SELECT * FROM persona WHERE nro_identidad='$nro_identidad'";
        $sql = $this->conexion->query($consulta);
        return $sql->num_rows;
    }
    // Método para buscar a una persona por su número de identidad, normalmente usado en el inicio de sesión
    public function buscarPersonaPorNroIdentidad($nro_identidad)
    {
        $consulta = "SELECT id, razon_social, password FROM persona WHERE nro_identidad='$nro_identidad' LIMIT 1";
        $sql = $this->conexion->query($consulta);
        // devuelve los datos como un objeto
        return $sql->fetch_object();
    }
    public function verUsuarios() {
        $arr_usuarios = array();
        $consulta = "SELECT * FROM persona";
        $sql = $this->conexion->query($consulta);

   
        while ($objeto = $sql->fetch_object()) {
           array_push($arr_usuarios, $objeto);
        
        }
        return $arr_usuarios;
    }
    //creando una nueva funcion ver
    public function ver($id){
        $consulta = "SELECT * FROM persona WHERE id='$id'";
        $sql = $this->conexion->query($consulta);
        //convierte en objeto
        return $sql->fetch_object();

    }
}


 