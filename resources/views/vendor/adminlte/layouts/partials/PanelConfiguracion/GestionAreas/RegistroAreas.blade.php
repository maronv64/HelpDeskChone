<form id="frm_ingresar_areas"  method="post">
<div class="panel-group" id="accordion2">
    <div class="panel panel-default">
      <div class="bg-info expand btn btn-block" data-toggle="collapse" data-parent="#accordion2" href="#collapse3" >
            REGISTRO DE AREAS
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <input autocomplete="off" required id="id_nombre_areas" type="text" class="form-control" placeholder="Nombre del area" value="{{ old('id_nombre_areas') }}" />
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <input autocomplete="off" id="id_correo_areas" type="email" class="form-control" placeholder="Correo" value="{{ old('id_correo_areas') }}" required/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <input autocomplete="off" id="id_ext_telef_areas" type="text" class="form-control" placeholder="Extensión telefonica" value="{{ old('id_ext_telef_areas') }}" required />
                        <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group has-feedback">
                        <input autocomplete="off" id="id_siglas_area" type="text" class="form-control" placeholder="Siglas" value="{{ old('id_siglas_area') }}" required/>
                        <span class="glyphicon glyphicon-sort-by-alphabet form-control-feedback"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-12">
                        <button type="submit"  class="btn btn-primary btn-block rounded">Almacenar</button>
                    </div>
            </div>
        </div>
      </div>
    </div>
  </div>              
</form>
@include('adminlte::layouts.partials.PanelConfiguracion.GestionAreas.TablaAreas')  
