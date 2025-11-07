<div class="container">
  <div class="car">
    <h3 class="text-center text-black fw-bold">VISTA DE PRODUCTOS</h3>
    <h3 class="new-product">
      <!--<a class="nav-link" href="<?php echo BASE_URL; ?>new-product">Nuevo Producto</a>-->
    </h3>
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
  color: #007bff; /* azul suave */
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
  background-color: #17a2b8; /* celeste */
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
  background-color: #28a745; /* verde */
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


  </style>

  <div class="responsive">
    <div class="product-image" id="product-image">
      <div class="loading">Cargando productos...</div>

    </div>

  </div>
</div>

<script src="<?php echo BASE_URL; ?>view/function/product.js"></script>