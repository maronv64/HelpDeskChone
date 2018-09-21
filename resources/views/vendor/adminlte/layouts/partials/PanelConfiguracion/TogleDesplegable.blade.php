<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#menuTipoUsuarios">Tipos de usuarios</a></li>
  <li><a data-toggle="tab" href="#menuAreas">Areas</a></li>
  <li><a data-toggle="tab" href="#menuEspecialidades">Especialidades</a></li>
  <li><a data-toggle="tab" href="#menuTiposDispositivos">Tipos de dispositivos</a></li>
</ul>

<div class="tab-content">
  <div id="menuTipoUsuarios" class="tab-pane fade in active">
    <h3>Gestion de tipos de usuarios</h3>
        @include('adminlte::layouts.partials.PanelConfiguracion.GestionTipoUsuarios.RegistroTipoUser')                  
  </div>
  <div id="menuAreas" class="tab-pane fade">
    <h3>Gestion de areas</h3>
        @include('adminlte::layouts.partials.PanelConfiguracion.GestionAreas.RegistroAreas')                  
  </div>
  <div id="menuEspecialidades" class="tab-pane fade">
        @include('adminlte::layouts.partials.PanelConfiguracion.GestionEspecialidades.RegistroEspecialidades')                  
  </div>
  <div id="menuTiposDispositivos" class="tab-pane fade">
    <h3>Gestion de tipos de dispositivos</h3>
        @include('adminlte::layouts.partials.PanelConfiguracion.GestionTipoDispositivos.RegistroTipoDispositivos')                   
  </div>
</div>