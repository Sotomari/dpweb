
    <div class="container-fluid">
        <div class="card">
            <center>   
               <h5 class="card-header text-center bg-primary text-white">INGRESA LOS DATOS</h5>
            </center> 
            <form id="frm_sesion" action="" method="">
                <div class="card-body">
                    <div class="mb-3 row">

                        <div class="mb-3 row">
                            <label for="id_persona" class="col-sm-4 col-form-label"><strong>id_persona:</strong></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="id_persona" name="id_persona" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="fecha_hora_inicio" class="col-sm-4 col-form-label"><strong>fecha_hora_inicio:</strong></label>
                            <div class="col-sm-8">
                                <input type="datetime" class="form-control" id="fecha_hora_inicio" name="fecha_hora_inicio" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="fecha_hora_fin" class="col-sm-4 col-form-label"><strong>fecha_hora_fin:</strong></label>
                            <div class="col-sm-8">
                                <input type="datetime" class="form-control" id="fecha_hora_fin" name="fecha_hora_fin" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="token" class="col-sm-4 col-form-label"><strong>token:</strong></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="token" name="token" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="ip" class="col-sm-4 col-form-label"><strong>ip:</strong></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ip" name="ip" required>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary">Registrar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="<?php echo BASE_URL; ?>view/function/sesion.js"></script>