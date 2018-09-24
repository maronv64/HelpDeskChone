<form id="frm_ingresar_tipo_usuario"  method="post">
<div class="panel-group" id="accordion3">
    <div class="panel panel-default">
      <div class="bg-info expand btn btn-block" data-toggle="collapse" data-parent="#accordion3" href="#collapse4" >
            INGRESO DE TIPOS DE USUARIOS
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-8">
                    <img src="img/imagenes/Cuentasusuarios.png" alt="" class="img-responsive img-rounded">
                </div>
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <div>
                        <center><h3>Ingreso de nuevos tipos de usuarios</h3></center>  
                        </div>
                        <br>
                        <input required id="id_txt_tipo_usuario" type="text" class="form-control" placeholder="Descripcion del tipo de usuario" autocomplete="off" value="{{ old('dispositivo') }}" />
                        <br>
                        <button type="submit"  class="btn btn-primary btn-block rounded">Almacenar</button>
                    </div>
                </div>
            </div>                    
        </div>
      </div>
    </div>
  </div> 
</form>
@include('adminlte::layouts.partials.PanelConfiguracion.GestionTipoUsuarios.Tabla')  
