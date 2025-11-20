<div class="container-fluid mt-4 row">
  <h2 class="text-center fw-bold">VISTA DE PRODUCTOS</h2>
  <div class="col-9">
    <div class="card">
      <div class="card-body">
        <!-- Contenedor flex para título e input en la misma línea -->
        <div class="d-flex align-items-center justify-content-center gap-3 mb-4">
          <h5 class="card-title mb-0">Busqueda de Productos</h5>
          <div style="width: 250px;">
            <input type="text"
              class="form-control input-busqueda"
              placeholder="Buscar producto por nombre o código"
              id="busqueda_venta"
              onkeypress="view_imagen();">
          </div>

        </div>
        <!-- Contenedor donde se mostrarán los productos -->
        <div class="row container-fluid" id="product-image"></div>
      </div>
    </div>
  </div>
  <style>
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
      border: 2px solid #007bff;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
      background: #f8f9fa;
      width: 350px;
      /* Reduce el ancho */
    }
  </style>
  <div class="col-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Lista de Compra</h5>
        <div class="row" style="min-height: 500px;">
          <div class="col-12">
            <table class="table">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Precio</th>
                  <th>Total</th>
                  <th>SubTotal</th>
                  <th>AC</th>
                </tr>
              </thead>
              <tbody id="lista_compra">
                <tr>
                  <td>Producto 1</td>
                  <td>2</td>
                  <td>$10.00</td>
                  <td>$20.00</td>
                  <td>$30.00</td>
                  <td><button class="btn btn-danger btn-sm">X</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-end">
            <h4>Subtotal : <label id="">$20.00</label></h4>
            <h4>Igv : <label id="">$20.00</label></h4>
            <h4>Total : <label id="">$20.00</label></h4>
            <button class="btn btn-success">Realizar Venta</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?= BASE_URL ?>view/function/product.js"></script>
<script src="<?php echo BASE_URL; ?>view/function/venta.js"></script>