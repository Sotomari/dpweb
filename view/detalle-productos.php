<!-- archivo: view/detalle-producto.php -->
<?php
// Recibir el ID del producto por la URL (ejemplo: detalle-producto.php?id=3)
$id = isset($_GET['id']) ? $_GET['id'] : 0;

// Datos simulados (deberías reemplazarlos luego con datos desde la BD)
$productos = [
    1 => ["nombre" => "Yogurt Natural", "precio" => 8.50, "descripcion" => "Producto fresco ideal para desayunos nutritivos.", "imagen" => "../view/img/producto1.jpg"],
    2 => ["nombre" => "Leche Deslactosada", "precio" => 4.80, "descripcion" => "Ideal para personas con intolerancia a la lactosa.", "imagen" => "../view/img/producto2.jpg"],
    3 => ["nombre" => "Mantequilla Light", "precio" => 6.20, "descripcion" => "Perfecta para acompañar tus panes o preparar recetas ligeras.", "imagen" => "../view/img/producto3.jpg"],
    4 => ["nombre" => "Galletas Integrales", "precio" => 3.50, "descripcion" => "Snack saludable con gran sabor y alto contenido de fibra.", "imagen" => "../view/img/producto4.jpg"],
    5 => ["nombre" => "Queso Fresco", "precio" => 12.00, "descripcion" => "Hecho con leche natural, ideal para tus desayunos o ensaladas.", "imagen" => "../view/img/producto5.jpg"],
    6 => ["nombre" => "Aceite Vegetal", "precio" => 9.50, "descripcion" => "De gran pureza, perfecto para freír o preparar tus comidas favoritas.", "imagen" => "../view/img/producto6.jpg"],
    7 => ["nombre" => "Pan Integral", "precio" => 4.00, "descripcion" => "Fuente de energía saludable para tus mañanas.", "imagen" => "../view/img/producto7.jpg"],
    8 => ["nombre" => "Jugo de Naranja", "precio" => 5.90, "descripcion" => "Natural y refrescante, rico en vitamina C.", "imagen" => "../view/img/producto8.jpg"],
    9 => ["nombre" => "Agua Mineral", "precio" => 2.50, "descripcion" => "Agua pura y ligera para mantenerte hidratado todo el día.", "imagen" => "../view/img/producto9.jpg"],
    10 => ["nombre" => "Cereal Avena Mix", "precio" => 11.50, "descripcion" => "Delicioso y saludable, ideal para un desayuno energético.", "imagen" => "../view/img/producto10.jpg"]
];

// Si el ID no existe, mostrar error
if (!isset($productos[$id])) {
    die("<div style='text-align:center; margin-top:50px;'><h3>Producto no encontrado</h3><a href='vista-productos.php'>Volver</a></div>");
}

$producto = $productos[$id];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $producto['nombre'] ?> - Detalle de Producto</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../view/css/vista-productos.css">
</head>
<body>

<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-5 text-center">
            <img src="<?= $producto['imagen'] ?>" class="img-fluid rounded shadow" alt="<?= $producto['nombre'] ?>">
        </div>
        <div class="col-md-7">
            <h2 class="fw-bold text-primary"><?= $producto['nombre'] ?></h2>
            <p class="mt-3"><?= $producto['descripcion'] ?></p>
            <h4 class="text-success">Precio: S/ <?= number_format($producto['precio'], 2) ?></h4>
            <button class="btn btn-warning mt-3"><i class="bi bi-cart-plus"></i> Agregar al carrito</button>
            <br><br>
            <a href="vista-productos.php" class="btn btn-outline-secondary mt-2">
                <i class="bi bi-arrow-left-circle"></i> Volver al catálogo
            </a>
        </div>
    </div>
</div>

</body>
</html>
