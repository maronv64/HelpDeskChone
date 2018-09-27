@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Register
@endsection


@section('main-content')





<div class="container-fluid spark-screen">
    <div class="row">
        <div class="">
            <div id="app">
                <div class="">
                    <div class="register-box-body"  >
   
                        <div class="row" >
                                <div class="col-md-10">
                                  <p> <h3>Mis Asignaciones</h3></p>              
                                </div>
                              </div>
                              <hr>

                              <div class="row">
                               <div class="col-md-3" align="center">
                               </div>
                                <div class="col-md-2" align="center">
                                 <div data-toggle="tooltip" data-placement="top" title="Su asignación se encuentra dentro de la fecha" style=" height: 80px;
                                                width:80px;
                                                background-color: #31B404;
                                                border-radius: 50%;
                                                display: inline-block;">
                                    <i style="margin-top: 16px;color: white" class="fa fa-check fa-fw fa-3x"></i>
                                   </div>
                                   <br>
                                  <label><b>Dentro de Fecha</b></label>
                                </div>
                                 <div class="col-md-2" align="center">
                                  <div data-toggle="tooltip" data-placement="top" title="Su asignación se ecnuentra en el nivel de tolerancia"  style=" height: 80px;
                                                width:80px;
                                                background-color: #FACC2E;
                                                border-radius: 50%;
                                                display: inline-block;">
                                    <i style="margin-top: 16px; color: white" class="fa fa-exclamation-triangle fa-fw fa-3x"></i>
                                   </div>
                                  <br>
                                  <label><b>Por Vencer</b></label>
                                </div>
                                <div class="col-md-2" align="center">
                                  <div data-toggle="tooltip" data-placement="top" title="Su asignación se encuentra vencida" style=" height: 80px;
                                                width:80px;
                                                background-color: #DF0101;
                                                border-radius: 50%;
                                                display: inline-block;">
                                    <i style="margin-top: 16px;color: white" class="fa fa-times fa-fw fa-3x"></i>
                                   </div>
                                   <br>
                                  <label><b>Vencida</b></label>
                                </div>
                                <div class="col-md-3" align="center">
                               </div>
                              </div>
                                <br>
                              <div class="table-responsive pre-scrollable">
                              
                              <table class="table table-hover table-bordered">
                                <thead>
                                  <tr>
                                      <th scope="col" style="text-align: center">Área</th>
                                      <th scope="col" style="text-align: center">Solicitante</th>
                                      <th scope="col" style="text-align: center">Prioridad</th>
                                      <th scope="col" style="text-align: center">Tipo Petición</th>
                                      <th scope="col" style="text-align: center">Observacion Petición</th>
                                      <th scope="col" style="text-align: center">Observacion Asignación</th>
                                      <th scope="col" style="text-align: center">Fecha/Hora Inicio</th>
                                      <th scope="col" style="text-align: center">Fecha/Hora Limite</th>
                                      <th scope="col" style="text-align: center">Tolerancia</th>
                                       <th scope="col" style="text-align: center">Alerta</th>
                                  </tr>
                                </thead>
                                <tbody id="tablamisasignaciones">
                                </tbody>
                              </table>
                         
                              </div>                     
                        </div>
                  <!-- /.form-box -->       
                </div><!-- /.register-box -->
                <br>    
           </div>
        </div>
    </div>
    <div>        
    </div>
</div>


@include('adminlte::layouts.partials.GestionAsigTareas.modalobserpeticion')
@include('adminlte::layouts.partials.GestionAsigTareas.modalobservacionasignacion')
@endsection
