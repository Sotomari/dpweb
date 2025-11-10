<!-- Contenedor donde se mostrará el formulario -->
<div id="formularioProveedor" style="display:none;">
    <?php include_once "form-proveedor.php"; ?>
</div>

<div class="container">
    <center>
        <h1>Lista de Proveedores</h1>
    </center>
    <table class="table table-bordered border-primary table-strip">

        <thead class="table-dark">
            <tr>
                <th class="text-center">Nro</th>
                <th class="text-center">DNI</th>
                <th class="text-center">Nombres y Apellidos</th>
                <th class="text-center">Correo</th>
                <th class="text-center">Rol</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Acciones</th>

            </tr>
        </thead>
        <tbody id="content_proveedor">

        </tbody>
    </table>
</div>

<script src="<?= BASE_URL ?>view/function/user.js"></script> <!--para llamar a funcion-->
<!--<script>view_user();</script>-->