<div class="container mt-4">
    <div class="card shadow-lg">
        <h5 class="card-header text-center bg-primary text-white">REGISTRO DE VENTAS</h5>

        <div class="card-body" action="" method="">
            <form id="frm_venta" enctype="multipart/form-data" class="row g-3">
                <input type="hidden" id="id_venta" name="id_venta">

                <!-- FILA 1: Fecha y Total -->
                <div class="col-md-6">
                    <label for="fecha" class="form-label fw-bold">Fecha</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                </div>

                <div class="col-md-6">
                    <label for="total" class="form-label fw-bold">Total</label>
                    <input type="number" class="form-control" id="total" name="total" required placeholder="0.00">
                </div>

                <!-- FILA 2: Cliente y Vendedor -->
                <div class="col-md-6">
                    <label for="id_cliente" class="form-label fw-bold">Cliente</label>
                    <select id="id_cliente" name="id_cliente" class="form-select" required>
                        <option value="">Seleccione Cliente</option>
                        <!-- cargado con JS -->
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="id_vendedor" class="form-label fw-bold">Vendedor</label>
                    <select id="id_vendedor" name="id_vendedor" class="form-select" required>
                        <option value="">Seleccione Vendedor</option>
                        <!-- cargado con JS -->
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="reset" class="btn btn-info">Limpiar</button>
                    <!--<button type="button" class="btn btn-danger" onclick="location.href='<?= BASE_URL ?>clientes'">Cancelar</button>-->

                   <a href="<?= BASE_URL ?>ventas" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo BASE_URL; ?>view/function/venta.js"></script>

