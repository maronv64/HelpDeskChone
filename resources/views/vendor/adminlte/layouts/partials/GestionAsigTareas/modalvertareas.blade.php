<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modalvertareas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-question-circle-o" aria-hidden="true"></i><b>   Información</b></h4>
      </div>
      <div class="modal-body">
            <div class="row">
              <div class="col-md-12" align="center">
                <p>Este Técnico tiene tareas pendientes en este horario</p>
              </div>
            </div>
             <div class="row">
              <div class="col-md-12" align="center">
                <button  class="btn btn-primary" onclick="mostrartablatareas();"> Ver</button>
              </div>
            </div>

            <div class="row">
              <br>
              <div class="col-md-12">
                <div class="table-responsive pre-scrollable" style="height: 150px" id="tareastabla" hidden >
                
                <table class="table table-hover table-bordered"  >
                  <thead>
                    <tr>
                      <th scope="col" style="text-align: center">Área</th>
                      <th scope="col" style="text-align: center">Fecha/Hora Inicio</th>
                      <th scope="col" style="text-align: center">Fecha/Hora Limite</th>
                      
                    </tr>
                  </thead>
                  <tbody id="tablavertareas">
                  </tbody>
                </table>
                </div>
              </div>
           </div>
        </div>
    </div>
  </div>
</div>

<div class="alert" role="alert" id="result"></div>