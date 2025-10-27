<div class="container">
    <center>
        <h1>Lista de Productos </h1>
    </center>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Código</th>
                <th>Nombre del Producto</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>fecha_vencimiento</th>
                <th>Proveedor</th>
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