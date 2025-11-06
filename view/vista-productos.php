<div class="container">
  <div class="arriba">
    <h3 class="mt-3" style="color: white;">VISTA DE PRODUCTOS</h3>
    <h3 class="new-product">
      <a class="nav-link" href="<?php echo BASE_URL; ?>new-product">Nuevo Producto</a>
    </h3>
  </div>
  <style>
    .arriba {
      gap: 5rem;
      display: flex;
    }

    .new-product {
      margin-top: 15px;
    }

    .product-view {
      margin-top: 15px;
    }

    .nav-link {
      color: white;
    }
  </style>
  <style>
    #product-image {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      /*display: flex;
            gap: 20px;
            overflow-x: auto;
            padding-bottom: 15px;*/
    }

    .card-product {
      background: white;
      border-radius: 10px;
      width: 180px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      padding: 10px;
      flex: 0 0 auto;
      position: relative;
      font-size: 14px;
    }

    .card-product img {
      width: 100%;
      height: 160px;
      object-fit: contain;
      border-radius: 8px;
      margin-bottom: 8px;
    }

    .card-product .nombre {
      font-weight: 700;
      text-transform: uppercase;
      font-size: 0.85rem;
      margin-bottom: 2px;
      color: #222;
    }

    .card-product .detalle {
      font-weight: 400;
      font-size: 0.85rem;
      line-height: 1.2em;
      height: 2.6em;
      overflow: hidden;
      margin-bottom: 8px;
      color: #444;
    }

    .card-product .precio {
      font-weight: 700;
      font-size: 1rem;
      color: #222;
      display: flex;
      align-items: baseline;
      gap: 6px;
    }
  </style>

  <div class="responsive">
    <div class="product-image" id="product-image">
      <div class="loading">Cargando productos...</div>

    </div>

  </div>
</div>

<script src="<?php echo BASE_URL; ?>view/function/product.js"></script>