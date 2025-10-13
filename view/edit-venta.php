<div class="container mt-4">
    <div class="card">
       <h5 class="card-header text-center bg-primary text-white">Editar Venta</h5>
        <div class="card-body">
            <form id="frm_venta">
                <input type="hidden" id="id_venta" name="id_venta">

                <div class="mb-3 row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" style="border: 2px solid blue;" required>
                </div>

                <div class="mb-3 row">
                    <label for="total" class="col-sm-2 col-form-label">Total</label>
                    <input type="number" class="form-control" id="total" name="total" style="border: 2px solid blue;" required>
                </div>

                <div class="mb-3 row">
                    <label for="id_cliente" class="col-sm-2 col-form-label">Cliente</label>
                    <select id="id_cliente" name="id_cliente" class="form-control" style="border: 2px solid blue;" required>
                        <option value="">Seleccione Cliente</option>
                        <!-- cargado con JS -->
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- FIN DE CUERPO DE PAGINA-->
    <script src="<?php echo BASE_URL; ?>view/function/venta.js"></script>

    <script>
        edit_venta();
    </script>