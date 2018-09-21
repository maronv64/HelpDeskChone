<div class="modal bd-example-modal-lg" tabindex="-1" role="dialog" id="modalAsignacion">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button> 
          <h3  class="modal-title"><b>Asignacion de Dispositivos</b></h3> 
      </div>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#menuDispositivos_disponibles">Dispositivos Disponibles</a></li>
        <li><a data-toggle="tab" href="#menuDispositivos_Usados">Dispositivos Usados</a></li>
      </ul>
      <div class="tab-content">
        <div id="menuDispositivos_disponibles" class="tab-pane fade in active">
          @include('adminlte::layouts.partials.GestionAsigDispositivos.Cuerpomodal')  
        </div>
        <div id="menuDispositivos_Usados" class="tab-pane fade">
          @include('adminlte::layouts.partials.GestionAsigDispositivos.Cuerpomodal2')  
        </div>
      </div>
    </div>
  </div>
</div>