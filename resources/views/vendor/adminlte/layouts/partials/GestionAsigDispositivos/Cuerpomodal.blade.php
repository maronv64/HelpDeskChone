<div class = "register-box-body">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control form-control-sm" placeholder="Buscar Dispositivos"  id="buscar_dispositivos" onkeyup="filtro_dispositivos();">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <br>
                    </span>
                </div>                                                 
            </div> 
        </div>
        @include('adminlte::layouts.partials.GestionAsigDispositivos.TablaDispositivosA')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label> <b>Fecha de Recivido:</b></label>
                    <input type="date" class="form-control" id="" name="fechaRecivido"required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label> <b>Fecha de Entrega:</b></label>
                    <input type="date" class="form-control" id=""   name="fechaEntrega"required />
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="asignar_dispositivos" class="btn btn-primary" onClick='guardarAsignaciones()'>Asignar</button>
            <button type="button" class="btn btn-secondary" onclick="" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>

