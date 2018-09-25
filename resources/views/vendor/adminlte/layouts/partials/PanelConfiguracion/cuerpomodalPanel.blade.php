<div class="modal-body">
    <form id="formmodalactualizarPanel"  method="post"> 
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="id_ingresar_todo_aqui">
            <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-sm" placeholder=""  id="buscar_dispositivos">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <br>
                            </span>
                        </div>                                                 
                    </div> 
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" onclick="" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </form>      
</div>