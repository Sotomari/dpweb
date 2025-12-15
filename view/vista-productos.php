<div class="container-fluid mt-4 row">
  <h2 class="text-center fw-bold">VISTA DE PRODUCTOS</h2>
  <div class="col-9">
    <div class="card">
      <div class="card-body">
        <!-- Contenedor flex para título e input en la misma línea -->
        <div class="d-flex align-items-center justify-content-center gap-3 mb-4">
          <h5 class="card-title mb-0">Busqueda de Productos</h5>
          <div style="width: 100%; max-width: 350px;">

            <input type="text"
              class="form-control input-busqueda"
              placeholder="Buscar producto por nombre o código"
              id="busqueda_venta"
              onkeypress="view_imagen();">
            <input type="hidden" id="id_producto_venta">
            <input type="hidden" id="producto_precio_venta">
            <input type="hidden" id="producto_cantidad_venta" value="1">
          </div>
        </div>

        <!--  CARRUSEL  -->
        <div class="carrusel-contenedor mt-4">
          <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="view/include/galletas.png" class="d-block w-100" alt="img1">
              </div>
              <div class="carousel-item">
                <img src="uploads/yogurt.jpg" class="d-block w-100" alt="img2">
              </div>
              <div class="carousel-item">
                <img src="view/include/golosinas.png.jpg" class="d-block w-100" alt="img3">
              </div>
              <div class="carousel-item">
                <img src="uploads/productos/prod_692727e115119.png" class="d-block w-100" alt="img5">
              </div>
              <div class="carousel-item">
                <img src="uploads/cookies -oreo.png" class="d-block w-100" alt="img4">
              </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
        </div>


        <!-- Contenedor donde se mostrarán los productos -->
        <div class="row container-fluid" id="product-image"></div>
      </div>
    </div>
  </div>
  <style>
    .buscador-contenedor {
      text-align: center;
      margin-bottom: 20px;
    }

    .input-busqueda {
      width: 300px;
      height: 35px;
      margin-left: 10px;
    }

    .carrusel-contenedor {
      width: 60%;
      margin: auto;
      background: white;
      padding: 15px;
      border-radius: 12px;
      border: 3px solid #00aaff91;
      box-shadow: 0 0 10px rgba(31, 32, 32, 0.1);
    }


    #product-image {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      justify-content: center;
      margin-top: 15px;
    }

    /* Tarjeta del producto */
    .card-product {
      width: 240px;
      background: #fff;
      border-radius: 10px;
      padding: 12px;
      text-align: center;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
      display: flex;
      flex-direction: column;
    }

    /* Imagen misma medida */
    .card-product img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      /* Mantiene proporción, no deforma */
      border-radius: 6px;
    }

    /* Nombre */
    .card-product .nombre {
      font-weight: bold;
      margin-top: 8px;
      font-size: 17px;
    }

    /* Detalle */
    .card-product .detalle {
      font-size: 14px;
      min-height: 45px;
      color: #444;
    }

    /* Precio y stock */
    .card-product .precio,
    .card-product .stock {
      font-size: 15px;
      margin: 4px 0;
    }

    /* Contenedor de botones */
    .botones {
      display: flex;
      gap: 8px;
      justify-content: center;
      margin-top: auto;
    }


    /* Estilo general de botones */
    .card-product button {
      flex: 1;
      padding: 8px;
      font-size: 14px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    /* Botón Ver */
    .btn-detalle {
      background-color: #007bff;
      color: #fff;
    }

    /* Botón Agregar */
    .btn-agregar {
      background-color: #28a745;
      color: #fff;
    }

    .btn-detalle:hover {
      background-color: #094eb1;
    }

    .btn-agregar:hover {
      background-color: #146c43;
    }


    .input-busqueda {
      height: 50px !important;
      /* Igual que la imagen */
      font-size: 18px;
      padding: 10px;
      border-radius: 12px;
      border: 2px solid #121315eb;
      box-shadow: 0 2px 6px rgba(3, 32, 253, 0.31);
      background: #f8f9fa;
      width: 350px;
      /* Reduce el ancho */
    }

    .input-busqueda {
      width: 100% !important;
      /* SE ADAPTA AL TAMAÑO */
      max-width: 350px;
      /* Tamaño máximo */
      height: 50px;
      font-size: 18px;
      padding: 10px;
      border-radius: 12px;
      border: 2px solid #121315eb;
      box-shadow: 0 2px 6px rgba(3, 32, 253, 0.31);
      background: #f8f9fa;
      box-sizing: border-box;
    }

    @media (max-width: 600px) {
      .input-busqueda {
        max-width: 100% !important;
        font-size: 16px;
      }
    }

    .table {
      width: 100%;
      table-layout: fixed;
      /* fuerza a que las columnas se ajusten */
      word-wrap: break-word;
    }




    .table td,
    .table th {
      font-size: 10px;
      /* Reduce texto */
    }
  </style>
  <div class="col-3">
    <div class="card">
      <div class="card-body">
        <!--<h5 class="card-title">Lista de Compra</h5>-->
        <h5 class="text-center fw-bold fs-4 mb-3">Lista de Compra</h5>
        <div class="row" style="min-height: 500px;">
          <div class="col-12 table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Subtotal</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody id="lista_compra">

              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-end">
            <h4>Subtotal : <label id="subtotal_general"></label></h4>
            <h4>Igv : <label id="igv_general"></label></h4>
            <h4>Total : <label id="total"></label></h4>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Realizar Venta</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Venta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_venta">
          <div class="row">
            <div class="col-md-6">
              <label for="cliente_dni" class="form-label">DNI del Cliente</label>
              <input type="text" class="form-control" id="cliente_dni" name="cliente_dni" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="11">
            </div>
            <div class="col-md-6">
              <button type="button" class="btn btn-primary mt-4" onclick="buscar_cliente_venta();">Buscar Cliente</button>
            </div>
            <div class="col-md-12">
              <label for="cliente_nombre" class="form-label">Nombre del Cliente</label>
              <input type="text" class="form-control" id="cliente_nombre" name="cliente_nombre" readonly>
              <input type="hidden" class="form-control" id="id_cliente_venta">
            </div>
            <div class="col-md-3">
              <label for="fecha_venta">fecha de venta</label>
              <input type="datetime" class="form-control" id="fecha_venta" name="fecha_venta" value="<?= date('Y-m-d H:i') ?>">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="registrarVenta();">Registrar Venta</button>
      </div>
    </div>
  </div>
</div>

<script src="<?= BASE_URL ?>view/function/product.js"></script>
<script src="<?php echo BASE_URL; ?>view/function/venta.js"></script>
<script>
  let input = document.getElementById("busqueda_venta");
  input.addEventListener('keydown', (event) => {
    if (event.key == 'Enter') {
      agregar_producto_temporal();
    }
  });
  listar_temporales();
  act_subt_general();
</script>