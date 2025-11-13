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