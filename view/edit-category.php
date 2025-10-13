<!-- INICIO DE CUERPO DE PAGINA-->
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header text-center">EDITAR CATEGORIA</h5>
        <?php
        if (isset($_GET["views"])) {
            $ruta = explode("/", $_GET["views"]);
            //echo $ruta[1];
        }
        ?>

        <form id="frm_edit_category" action="" method="">
            <input type="hidden" id="id_categoria" name="id_categoria" value="<?= $ruta[1]; ?>">
            
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
             
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="<?= BASE_URL ?>category" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
    <script src="<?php echo BASE_URL; ?>view/function/category.js"></script>
    
    <script>
        edit_category();
    </script> 