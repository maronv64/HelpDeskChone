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
                    <!--   <div class="register-logo">
                        <a href="{{ url('/home') }}"><b>Help</b>Desk</a>
                    </div> 
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif-->


                    <div class="register-box-body"  >
   
                        <div class="row" >
                                <div class="col-md-10">
                                  <p> <h3>Mis Asignaciones</h3></p>              
                                </div>
                              </div>
                              <hr>
                              <div class="table-responsive pre-scrollable">
                              
                              <table class="table table-hover table-bordered">
                                <thead>
                                  <tr>
                                      <th scope="col" style="text-align: center">Área</th>
                                      <th scope="col" style="text-align: center">Solicitante</th>
                                      <th scope="col" style="text-align: center">Fecha/Hora Inicio</th>
                                      <th scope="col" style="text-align: center">Fecha/Hora Limite</th>
                                      <th scope="col" style="text-align: center">Prioridad</th>
                                      <th scope="col" style="text-align: center">Tipo Petición</th>
                                      <th scope="col" style="text-align: center">Observacion Petición</th>
                                      <th scope="col" style="text-align: center">Observacion Asignación</th>
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
    <div >
        <!-- TABLA DE LISTA DE USUARIOS -->
        
    </div>
</div>

<!--MODAL PARA CONFIRMACIÓN DE ELIMINACIÓN-->
@endsection
