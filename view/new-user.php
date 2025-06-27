<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maribel</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <Script>
        const base_url = '<?php echo BASE_URL; ?>';
    </Script>
        
 
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: yellow;">
        <div class="container-fluid">
            <a class="navbar-brand  bg-primary text-white px-3 py-2 rounded" href="#">logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Save</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>

    <div class="card">
        <h5 class="card-header text-center">SISTEMA DE VENTAS
    </div>
    </h5>
    <form id="frm_user" action="" method="">
        <div class="card-body">
            <div class="mb-3 row">
                <label for="nro_identidad" class="
                col-sm-2 col-form-label">nro Documento:</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="nro_identidad" name="nro_identidad" style="border: 2px solid blue;" required>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="razon_social" class="col-sm-2 col-form-label">razon social:</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="razon_social" name="razon_social" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="telelefono" class="col-sm-2 col-form-label">telefono:</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="telefono" name="telefono" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="correo" class="col-sm-2 col-form-label">correo:</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="correo" name="correo" style="border: 2px solid blue;" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="departamento" class="col-sm-2 col-form-label">departamento:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="departamento" name="departamento" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="provincia" class="col-sm-2 col-form-label">provincia:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="provincia" name="provincia" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="distrito" class="col-sm-2 col-form-label">distrito:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="distrito" name="distrito" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="cod_postal" class="col-sm-2 col-form-label">codigo postal:</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="cod_postal" name="cod_postal" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="direccion" class="col-sm-2 col-form-label">direccion:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="direccion" name="direccion" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="rol" class="col-sm-2 col-form-label">rol:</label>
                <div class="col-sm-8">
                    <select class="form-control" id="rol" name="rol" style="border: 2px solid blue;">
                        <option selected>Opciones</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Trabajador">Trabajador</option>
                    </select>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Registrar</button>
                <button type="reset" class="btn btn-info">Limpiar</button>
                <button type="button" class="btn btn-danger">Cancelar</button>

            </div>

        </div>
    </form>
</body>
<script src="<?php echo BASE_URL; ?>view/function/user.js"></script>
<script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>