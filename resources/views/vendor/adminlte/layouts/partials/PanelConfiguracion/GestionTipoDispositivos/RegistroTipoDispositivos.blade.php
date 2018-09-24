<form id="frm_ingresar_tipos_dispositivos"  method="post">
<div class="panel-group" id="accordion1">
    <div class="panel panel-default">
      <div class="bg-info expand btn btn-block" data-toggle="collapse" data-parent="#accordion1" href="#collapse2" >
            <p>
                GESTION DE TIPO DE DISPOSITIVOS
            </p>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-8">
                    <img src="img/imagenes/dispositivos.jpeg" alt="" class="img-responsive img-rounded">
                </div>
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <div>
                        <center><h3>Ingreso de nuevos tipos de dispositivos</h3></center>  
                        </div>
                        <br>
                        <input required id="id_txt_tipo_dispositivo" type="text" class="form-control" placeholder="Descripcion del tipo de dispositivo" autocomplete="off" value="{{ old('') }}" />
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
@include('adminlte::layouts.partials.PanelConfiguracion.GestionTipoDispositivos.TablaDispositivos')  




