<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        /* Título principal */
        h1 {
            background-color: lightseagreen;
            color: white;
            margin: 0;
            padding: 15px 0;
            font-family: Arial, sans-serif;
            font-weight: bold;
            /*  Esto pone el texto en negrita */
        }

        /* Fondo general */
        body {
            margin: 0;
            padding: 0;
            background-image: url('view/img/bambu.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100vw;
            font-family: Arial, sans-serif;
        }

        /* Contenedor principal */
        .principal {
            display: flex;
            justify-content: center;
            /* Centra horizontalmente */
            align-items: center;
            /* Centra verticalmente */
            flex-wrap: wrap;
            /* Permite bajar los cuadros si no hay espacio */
            gap: 40px;
            /* Espaciado entre los cuadros */
            background-color: transparent;
            padding: 40px;
        }

        /* Cuadro individual */
        .cuadro {
            background-color: lightseagreen;
            border-radius: 10px;
            width: 250px;
            height: 280px;
            text-align: center;
            padding: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Efecto hover */
        .cuadro:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        /* Texto del título dentro del cuadro */
        .cuadro strong {
            display: block;
            color: white;
            font-size: 20px;
            text-transform: capitalize;
            margin-bottom: 10px;
        }

        /* Imagen dentro del cuadro */
        .cuadro img {
            width: 200px;
            height: 200px;
            object-fit: contain;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <center>
                <h1 class="card-header">Welcome to my world</h1>
            </center>

            <div class="home">
                <section class="principal">
                    <div class="cuadro">
                        <strong>user</strong>
                        <a href="users">
                            <img src="view/home/user.png" alt="user">
                        </a>
                    </div>

                    <div class="cuadro">
                        <strong>products</strong>
                        <a href="products">
                            <img src="view/home/products.png" alt="products">
                        </a>
                    </div>

                    <div class="cuadro">
                        <strong>category</strong>
                        <a href="category">
                            <img src="view/home/category.png" alt="category">
                        </a>
                    </div>

                    <div class="cuadro">
                        <strong>cliente</strong>
                        <a href="cliente">
                            <img src="view/home/cliente.png" alt="cliente">
                        </a>
                    </div>

                    <div class="cuadro">
                        <strong>venta</strong>
                        <a href="venta">
                            <img src="view/home/detalle.png" alt="detalle">
                        </a>
                    </div>

                    <div class="cuadro">
                        <strong>proveedor</strong>
                        <a href="proveedor">
                            <img src="view/home/proveedor.png" alt="proveedor">
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>