<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Categoría</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <script>const base_url = '<?php echo BASE_URL; ?>';</script>
</head>
<body>
    <div class="card m-5">
        <h5 class="card-header text-center bg-primary text-white">REGISTRAR CATEGORÍA</h5>
        <form id="frm_categoria">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nombre" name="nombre" style="border: 2px solid blue;" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="detalle" class="col-sm-2 col-form-label">Detalle:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="detalle" name="detalle" rows="3" style="border: 2px solid blue;" required></textarea>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="reset" class="btn btn-info">Limpiar</button>
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </form>
    </div>

    <script src="<?php echo BASE_URL; ?>view/function/categoria.js"></script>
    <script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
