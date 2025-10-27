
<!-- INICIO DE CUERPO DE PÁGINA -->
<!--
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header text-center bg-primary text-white">EDITAR DATOS DEL PROVEEDOR</h5>
        <?php
        if (isset($_GET["views"])) {
            $ruta = explode("/", $_GET["views"]);
            // echo $ruta[1];
        }
        ?>
        <form id="frm_edit_proveedor" action="" method="POST">
            <input type="hidden" id="id_proveedor" name="id_proveedor" value="<?= $ruta[1]; ?>">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="ruc" class="col-sm-2 col-form-label">RUC:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ruc" name="ruc" style="border: 2px solid blue;" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="razon_social" class="col-sm-2 col-form-label">Razón Social:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="razon_social" name="razon_social" style="border: 2px solid blue;" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="telefono" name="telefono" style="border: 2px solid blue;" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="correo" class="col-sm-2 col-form-label">Correo Electrónico:</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="correo" name="correo" style="border: 2px solid blue;" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="direccion" class="col-sm-2 col-form-label">Dirección:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="direccion" name="direccion" style="border: 2px solid blue;" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="departamento" class="col-sm-2 col-form-label">Departamento:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="departamento" name="departamento" style="border: 2px solid blue;" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="provincia" class="col-sm-2 col-form-label">Provincia:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="provincia" name="provincia" style="border: 2px solid blue;" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="distrito" class="col-sm-2 col-form-label">Distrito:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="distrito" name="distrito" style="border: 2px solid blue;" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="cod_postal" class="col-sm-2 col-form-label">Código Postal:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="cod_postal" name="cod_postal" style="border: 2px solid blue;" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="estado" name="estado" style="border: 2px solid blue;" required>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-4 col-form-label"></label>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="<?= BASE_URL ?>proveedores" class="btn btn-warning">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- FIN DE CUERPO DE PÁGINA -->

<script src="<?php echo BASE_URL; ?>view/function/user.js"></script>

<!--<script>
    edit_proveedor();
</script>
