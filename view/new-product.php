<!-- INICIO DE CUERPO DE PAGINA-->
 
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header text-center bg-primary text-white">REGISTRO DE PRODUCTOS</h5>

        <form id="frm_products" enctype="multipart/form-data">
            <div class="card-body">

                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-2 col-form-label">Código:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="codigo" name="codigo" style="border: 2px solid blue;" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nombre" name="nombre" style="border: 2px solid blue;" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="detalle" class="col-sm-2 col-form-label">Detalle:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="detalle" name="detalle" style="border: 2px solid blue;" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="precio" name="precio" style="border: 2px solid blue;" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="stock" class="col-sm-2 col-form-label">Stock:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="stock" name="stock" style="border: 2px solid blue;" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="id_categoria" class="col-sm-2 col-form-label">Categoría:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="id_categoria" id="id_categoria" style="border: 2px solid blue;" required>
                            <option value="" disabled selected>Seleccione</option>


                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="fecha_vencimiento" class="col-sm-2 col-form-label">Vencimiento:</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" style="border: 2px solid blue;" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="imagen" class="col-sm-2 col-form-label">Imagen:</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="imagen" name="imagen" accept=".jpg, .jpeg, .png" style="border: 2px solid blue;" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="id_proveedor" class="col-sm-2 col-form-label">Proveedor:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="id_proveedor" id="id_proveedor" style="border: 2px solid blue;" required >
                            <option value="" disabled selected>Seleccione</option>
                 
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="reset" class="btn btn-info">Limpiar</button>
                 <a href="<?= BASE_URL ?>products" class="btn btn-danger">Cancelar</a>

                </div>

            </div>
        </form>
    </div>
</div>
<!-- FIN DE CUERPO DE PAGINA-->

<script src="<?php echo BASE_URL; ?>view/function/product.js"></script>
<script>
    cargar_categorias();
    cargar_proveedores();
</script>