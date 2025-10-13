

<!-- INICIO DE CUERPO DE PAGINA-->
 
 <div class="container-fluid"> 
        <div class="card">
        <h5 class="card-header text-center bg-primary text-white">REGISTRAR CATEGORÍA</h5>
        <form id="frm_category" action="" method="">
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nombre" name="nombre" style="border: 2px solid blue;" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="detalle" class="col-sm-2 col-form-label">Detalle:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="detalle" name="detalle" rows="3" style="border: 2px solid blue;" required></textarea>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="reset" class="btn btn-info">Limpiar</button>
                      <a href="<?= BASE_URL ?>category" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
    
    </div>
    <!-- FIN DE CUERPO DE PAGINA-->
    <script src="<?php echo BASE_URL; ?>view/function/category.js"></script>

