
<!-- INICIO DE CUERPO DE PAGINA-->
 <div class="container-fluid"> 
    <div class="card">
        <h5 class="card-header text-center">REGISTRO DE USUARIO</h5>
    </div>
    
    
    <form id="frm_categoria" action="" method="">
        <div class="card-body">
            <div class="mb-3 row">
                <label for="nro_identidad" class="
                col-sm-2 col-form-label">nro Documento:</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="nro_identidad" name="nro_identidad" style="border: 2px solid blue;" required>

                </div>
            </div>
            <div class="mb-3 row">
                <label for="razon_social" class="col-sm-2 col-form-label">razon social:</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="razon_social" name="razon_social" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="telelefono" class="col-sm-2 col-form-label">telefono:</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="telefono" name="telefono" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="correo" class="col-sm-2 col-form-label">correo:</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="correo" name="correo" style="border: 2px solid blue;" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="departamento" class="col-sm-2 col-form-label">departamento:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="departamento" name="departamento" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="provincia" class="col-sm-2 col-form-label">provincia:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="provincia" name="provincia" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="distrito" class="col-sm-2 col-form-label">distrito:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="distrito" name="distrito" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="cod_postal" class="col-sm-2 col-form-label">codigo postal:</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" id="cod_postal" name="cod_postal" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="direccion" class="col-sm-2 col-form-label">direccion:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="direccion" name="direccion" style="border: 2px solid blue;" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="rol" class="col-sm-2 col-form-label">rol:</label>
                <div class="col-sm-8">
                    <select class="form-control" id="rol" name="rol" style="border: 2px solid blue;">
                        <option selected>Opciones</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Trabajador">Trabajador</option>
                    </select>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Registrar</button>
                <button type="reset" class="btn btn-info">Limpiar</button>
                <button type="button" class="btn btn-danger">Cancelar</button>

            </div>

        </div>
    </form>
    </div>
    </div>
<!-- FIN DE CUERPO DE PAGINA-->
<script src="<?php echo BASE_URL; ?>view/function/user.js"></script>
