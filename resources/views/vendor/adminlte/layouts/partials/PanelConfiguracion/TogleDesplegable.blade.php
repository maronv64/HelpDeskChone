<ul class="nav nav-tabs">
  <li class="active"><a id="id_toggle_tipo_usuarios" data-toggle="tab" href="#menuTipoUsuarios">Tipos de usuarios</a></li>
  <li><a id="id_toggle_areas" data-toggle="tab" href="#menuAreas">Areas</a></li>
  <li><a id="id_toggle_especialidades" data-toggle="tab" href="#menuEspecialidades">Especialidades</a></li>
  <li><a id="id_toggle_tipo_dispositivos" data-toggle="tab" href="#menuTiposDispositivos">Tipos de dispositivos</a></li>
</ul>

<div class="tab-content">
  <div id="menuTipoUsuarios" class="tab-pane fade in active">
        @include('adminlte::layouts.partials.PanelConfiguracion.GestionTipoUsuarios.RegistroTipoUser')                  
  </div>
  <div id="menuAreas" class="tab-pane fade">
        @include('adminlte::layouts.partials.PanelConfiguracion.GestionAreas.RegistroAreas')                  
  </div>
  <div id="menuEspecialidades" class="tab-pane fade">
        @include('adminlte::layouts.partials.PanelConfiguracion.GestionEspecialidades.RegistroEspecialidades')                  
  </div>
  <div id="menuTiposDispositivos" class="tab-pane fade">
        @include('adminlte::layouts.partials.PanelConfiguracion.GestionTipoDispositivos.RegistroTipoDispositivos')                   
  </div>
</div>

