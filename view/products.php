<style>
@media print {

  /* OCULTAR TODO MENOS LA TABLA */
  body * {
    visibility: hidden;
  }

  .container, 
  .container * {
    visibility: visible;
  }

  /* Centrar la tabla contenedora */
  .container {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    top: 0;
    width: 90%;
    text-align: center;
  }

  /* Ocultar botones y acciones */
  .btn, .acciones, button, .no-print,
  th:last-child, td:last-child {
    display: none;
    visibility: hidden;
  }

  /* Estilo de tabla */
  table {
    width: 100% ;
    margin: auto;
    border-collapse: collapse;
  }

  th, td {
    text-align: center;
    vertical-align: middle;
  }

  /* Centrar los códigos de barras */
  img {
    display: block;
    margin: 0 auto;
    max-width: 100%;
  }

  @page {
    size: A4;
    margin: 10mm;
  }
}
</style>




<div class="container">
    <center>
        <h1>Lista de Productos </h1>
    </center>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th class="text-center">Nro</th>
                <th class="text-center">Código</th>
                <th class="text-center">Nombre del Producto</th>
                <!--<th class="text-center">detalle</th>-->
                <th class="text-center">Precio</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Categoría</th>
                <th class="text-center">fecha_vencimiento</th>
                <th class="text-center">Código Barra</th>
                <th class="text-center">Proveedor</th>
               <!-- <th>imagen</th>-->
                <th>Acciones</th>


            </tr>
        </thead>
        <tbody id="content_products">
            <!-- Aquí se insertarán los productos dinámicamente -->
        </tbody>
    </table>
</div>

<!-- Llamamos al archivo JS para manejar los productos -->
<script src="<?= BASE_URL ?>view/function/product.js"></script>
<script src="<?= BASE_URL ?>view/function/JsBarcode.all.min.js"></script>