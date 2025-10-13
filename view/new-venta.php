<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">Registro de Venta</div>
        <div class="card-body">
            <form id="frm_venta" enctype="multipart/form-data">
                <input type="hidden" id="id_venta" name="id_venta">

                <div class="mb-3 row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="total" class="col-sm-2 col-form-label">Total</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="total" name="total" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="id_cliente" class="col-sm-2 col-form-label">Cliente</label>
                    <div class="col-sm-8 row">
                        <select id="id_cliente" name="id_cliente" class="form-control" required>
                            <option value="">Seleccione Cliente</option>
                            <!-- cargado con JS -->
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="id_vendedor" class="col-sm-2 col-form-label">Vendedor</label>
                    <div class="col-sm-8 row">
                        <select id="id_vendedor" name="id_vendedor" class="form-control" required>
                            <option value="">Seleccione Vendedor</option>
                            <!-- cargado con JS -->
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>