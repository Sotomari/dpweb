<!--
<div class="container">
  <div class="car">
    <h3 class="text-center text-black fw-bold">VISTA DE PRODUCTOS</h3>
    <h3 class="new-product">
      <!--<a class="nav-link" href="<?php echo BASE_URL; ?>new-product">Nuevo Producto</a>-->
</h3>
</div>

<div class="container-fluid mt-4 row">
  <div class="row">
    <div class="col-12 text-end">


    </div>
    <!--  Columna izquierda: productos -->
    <div class="col-md-9">
      <h2 class="text-center fw-bold mb-4">VISTA DE PRODUCTOS</h2>
      <div id="product-image" class="d-flex flex-wrap justify-content-center gap-4">

        <!-- Aquí se cargan los productos desde JS -->
      </div>
    </div>

    <!--  Columna derecha: carrito -->
    <div class="col-md-3">
      <div class="card shadow carrito-compra">
        <div class="card-header bg-primary text-white text-center fw-bold">
          Carrito de Compras
        </div>
        <div class="card-body" id="carrito-lista">
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
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="lista_compra">
                  <tr>
                    <td>Producto 1</td>
                    <td>2</td>
                    <td>$10.00</td>
                    <td>$20.00</td>
                    <td><button class="btn btn-danger btn-sm">Eliminar</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <p><strong>Subtotal:</strong> <span id="subtotal">S/ 0.00</span></p>
          <p><strong>IGV (18%):</strong> <span id="igv">S/ 0.00</span></p>
          <p><strong>Total:</strong> <span id="total">S/ 0.00</span></p>
          <button class="btn btn-success w-100 mt-2">Finalizar Compra</button>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  #product-image {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 25px;
    padding: 20px;
  }

  /* Tarjeta principal */
  .card-product {
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    padding: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
  }

  .card-product:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
  }

  /* Imagen */
  .card-product img {
    width: 100%;
    height: 160px;
    object-fit: contain;
    border-radius: 8px;
    background-color: #fdfdfd;
    padding: 8px;
    margin-bottom: 10px;
  }

  /* Nombre */
  .card-product .nombre {
    font-weight: 700;
    text-transform: uppercase;
    color: #222;
    font-size: 1rem;
    margin-bottom: 4px;
  }

  /* Descripción */
  .card-product .detalle {
    font-size: 0.9rem;
    color: #444;
    margin: 4px 0 8px;
    height: 2.6em;
    overflow: hidden;
  }

  /* Precio */
  .card-product .precio {
    font-weight: bold;
    font-size: 1rem;
    color: #007bff;
    /* azul suave */
    margin-bottom: 10px;
  }

  /* Botones dentro del mismo cuadro */
  .botones {
    display: flex;
    justify-content: space-between;
    gap: 8px;
  }

  /* Botón Ver Detalle */
  .btn-detalle {
    flex: 1;
    background-color: #17a2b8;
    /* celeste */
    color: white;
    border: none;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 0.85rem;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .btn-detalle:hover {
    background-color: #138496;
    transform: scale(1.05);
  }

  /* Botón Agregar */
  .btn-agregar {
    flex: 1;
    background-color: #28a745;
    /* verde */
    color: white;
    border: none;
    padding: 6px 10px;
    border-radius: 6px;
    font-size: 0.85rem;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
  }

  .btn-agregar:hover {
    background-color: #1e7e34;
    transform: scale(1.05);
  }






  /*  Estilos generales del contenedor de productos */
  #product-image {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: start;
  }

  /*  Tarjetas de producto */
  .card-product {
    width: 220px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
    padding: 1rem;
    text-align: center;
    transition: transform 0.3s ease;
  }

  .card-product:hover {
    transform: scale(1.05);
  }

  .card-product img {
    width: 100%;
    height: 150px;
    object-fit: contain;
    margin-bottom: 10px;
  }

  /* Botones */
  .card-product .botones button {
    margin: 4px;
    border: none;
    border-radius: 6px;
    padding: 6px 10px;
    cursor: pointer;
  }

  .btn-detalle {
    background-color: #0dcaf0;
    color: white;
  }

  .btn-agregar {
    background-color: #198754;
    color: white;
  }

  /*  Panel del carrito */
  .carrito-compra {
    position: sticky;
    top: 80px;
    border-radius: 15px;
  }

  #carrito-lista {
    max-height: 300px;
    overflow-y: auto;
  }

  #carrito-lista .item {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #ccc;
    padding: 6px 0;
  }
</style>


<div class="responsive">
  <div class="product-image" id="product-image">
    <div class="loading">Cargando productos...</div>

  </div>

</div>
</div>

<script src="<?php echo BASE_URL; ?>view/function/product.js"></script>
<script src="<?php echo BASE_URL; ?>view/function/venta.js"></script>