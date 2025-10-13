<!-- Contenedor donde se mostrará el formulario -->
<div id="formularioCliente" style="display:none;">
    <?php include_once "form-cliente.php"; ?>
</div>

<div class="container">
    <center>
        <h1>Lista de Clientes</h1>
    </center>
    <table class="table table-bordered table-strip">

        <thead>
            <tr>
                <th>Nro</th>
                <th>DNI</th>
                <th>Nombres y Apellidos</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody id="content_clientes">

        </tbody>
    </table>
</div>

<script src="<?= BASE_URL ?>view/function/user.js"></script> <!--para llamar a funcion-->
<!--<script>view_user();</script>-->