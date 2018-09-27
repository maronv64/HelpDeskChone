<div class="modal-body">
    <form id="formmodalactualizarPanel"  method="post"> 
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <div class="row">
                <div class="col-md-12">
                    <center><h4 id="id_titulo_panel"></h4></center>
                    <div id="id_ingresar_todo_aqui">                       
                    </div>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <br>
                        </span>
                    </div>                                                 
                </div> 
            </div>
            <div class="modal-footer">
                <button type="submit" id="id_modalPanel_validar" class="btn btn-primary">Validar</button>
                <button type="button" id="id_modalPanel_cerrar" class="btn btn-secondary" onclick="" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </form>      
</div>