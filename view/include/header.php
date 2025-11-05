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
<style>
    body {
        background: #d41f3dff;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #06df06ff, #ac1212ff);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #6ab5fcff, #78ecfcff);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    .nav-link {
        color: black;

    }

    .logo {
        width: 100px;
        /* Tamaño del contenedor reducido */
        height: 100px;
        border-radius: 50%;
        /* Hace el contenedor perfectamente circular */
        background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
        display: flex;
        align-items: center;
        /* Centra verticalmente la imagen */
        justify-content: center;
        /* Centra horizontalmente la imagen */
        box-shadow: 0 10px 25px rgba(36, 35, 35, 0.6);
        overflow: hidden;
        /* Oculta cualquier parte de la imagen que sobresalga */
        margin-left: 40px;
        /* Alineación hacia la derecha (puedes cambiar según el diseño) */
        position: relative;
    }

    .logo img {
        width: 90%;
        /* Hace que la imagen encaje perfectamente dentro del círculo */
        height: 90%;
        object-fit: cover;
        /* Ajusta la imagen sin deformarla */
        border-radius: 50%;
        /* Asegura que la imagen también sea circular */
        border: 2px solid white;
        /* Borde decorativo */
        box-shadow: 0 0 8px rgba(255, 255, 255, 0.5);
        /* Sombra suave */
    }

    /*  Estilo general de los enlaces */
    .navbar .nav-link {
        color: black;
        /* color de texto normal */
        padding: 6px 15px;
        /* reduce tamaño del botón */
        border-radius: 5px;
        /* esquinas redondeadas */
        transition: 0.3s ease;
        /* animación suave */
    }

    /*  Efecto hover (cuando pasa el mouse) */
    .navbar .nav-link:hover {
        background-color: white;
        /* color de fondo al pasar el mouse */
        color: #064df3fe;
        /* cambia el color del texto */
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #07105384;"> 

        <div class="logo">
            <img src="<?php echo BASE_URL; ?>view/include/img/logo.png" alt="Logo ">
        </div>

        <div class="container-fluid">
            <!-- <a class="navbar-brand  bg-primary text-white px-3 py-2 rounded" href="#" img src="view/include/img/logo.png" alt="Logo ">logo</a>-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>users">Users</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>new-product"> new-product</a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>products">products</a>
                    </li>
-->
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo BASE_URL; ?>new-categoria">new-Categorias</a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo BASE_URL; ?>category">Category</a>
                    </li>
-->
                    <!--
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo BASE_URL; ?>cliente">Cliente</a>
                    </li>
-->
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo BASE_URL; ?>new-cliente">new-Cliente</a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo BASE_URL; ?>proveedor">Proveedor</a>
                    </li>
-->
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo BASE_URL; ?>new-proveedor">new-Proveedor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo BASE_URL; ?>venta">Venta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo BASE_URL; ?>new-venta">new-Venta</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link " href="<?php echo BASE_URL; ?>vista-cliente">vista-cliente</a>
                    </li>


                    <!--<li class="nav-item">
                        <a class="nav-link" href="#">Clients</a>
                    </li>
-->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sales </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

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
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>perfil">Perfil</a></li>
                                <li><button type="button" onclick="cerrar_sesion();">cerrar_sesion</button></li>
                                <!--<a href="<?= BASE_URL ?>logout" class="btn btn-danger btn-sm">Cerrar Sesión</a>-->

                            </ul>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
    
    <!-- Botón NUEVO global -->
    <div class="d-flex justify-content-end me-4">
        <button class="btn btn-warning" id="btnNuevo" onclick="redirigirNuevo()"> +Nuevo</button>
    </div>
    <script>
        function redirigirNuevo() {
            // Obtener la URL actual
            let url = window.location.href;

            // Validar en qué sección estás
            if (url.includes("user") || url.includes("usuarios")) {
                window.location.href = base_url + "new-user";
            } else if (url.includes("product") || url.includes("producto")) {
                window.location.href = base_url + "new-product";
            } else if (url.includes("category") || url.includes("categoria")) {
                window.location.href = base_url + "new-categoria";
            } else if (url.includes("cliente")) {
                window.location.href = base_url + "new-cliente";
            } else if (url.includes("proveedor")) {
                window.location.href = base_url + "new-proveedor";
            } else {
                alert("Selecciona una sección (Usuarios, Productos, Categorías, Clientes o Proveedores)");
            }
        }
    </script>