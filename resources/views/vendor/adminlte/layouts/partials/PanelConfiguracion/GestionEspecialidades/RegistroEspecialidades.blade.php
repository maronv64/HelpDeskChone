<form id="frm_ingresar_tipos_user"  method="post">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="btn-secondary expand btn btn-block" data-toggle="collapse" data-parent="#accordion" href="#collapse1" >
        <h4>
            INGRESO DE ESPECIALIDADES
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-8">
                    <img src="img/imagenes/especializacion.jpg" alt="" class="img-responsive img-rounded">
                </div>
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <div>
                        <center><h3>Ingreso de nuevas especialidaes</h3></center>  
                        </div>
                        <br>
                        <input required id="" type="text" class="form-control" placeholder="Descripcion del tipo de usuario" autocomplete="off" value="{{ old('dispositivo') }}" />
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
@include('adminlte::layouts.partials.PanelConfiguracion.GestionEspecialidades.TablaEspecialidades')  
