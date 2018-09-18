<div class = "register-box-body">
    <div class="modal-body">
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
            <button type="submit" id="" class="btn btn-primary">Asignar</button>
            <button type="button" class="btn btn-secondary" onclick="" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>

