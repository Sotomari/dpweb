<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: " . BASE_URL . "login");
    exit();
}

$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil del Usuario</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h4>Perfil del Usuario</h4>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-md-6"><strong>N° Documento:</strong> <?php echo $usuario['nro_identidad']; ?></div>
                    <div class="col-md-6"><strong>Razón Social:</strong> <?php echo $usuario['razon_social']; ?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6"><strong>Teléfono:</strong> <?php echo $usuario['telefono']; ?></div>
                    <div class="col-md-6"><strong>Correo:</strong> <?php echo $usuario['correo']; ?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6"><strong>Departamento:</strong> <?php echo $usuario['departamento']; ?></div>
                    <div class="col-md-6"><strong>Provincia:</strong> <?php echo $usuario['provincia']; ?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6"><strong>Distrito:</strong> <?php echo $usuario['distrito']; ?></div>
                    <div class="col-md-6"><strong>Código Postal:</strong> <?php echo $usuario['cod_postal']; ?></div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6"><strong>Dirección:</strong> <?php echo $usuario['direccion']; ?></div>
                    <div class="col-md-6"><strong>Rol:</strong> <?php echo $usuario['rol']; ?></div>
                </div>
                <div class="text-center mt-4">
                    <a href="<?php echo BASE_URL; ?>home" class="btn btn-secondary">Volver</a>
                    <a href="<?php echo BASE_URL; ?>logout.php" class="btn btn-danger">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
