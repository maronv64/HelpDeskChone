@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="">
            <div id="app">
                <div class="">

                    <div id="verModalModicarPeticion">
                    @include('adminlte::layouts.partials.GestionPeticiones.modalEditarPeticionNorm')
                    </div>

                    <!-- si no esta logeado -->
                    @if (Auth::guest()) 
                        <input type="text" name="idmiuser" id="idmiuser" value="0" hidden >
                    @else
                        <input type="text" name="idmiuser" id="idmiuser" value="{{Auth::user()->id}}" hidden >       
                    @endif
                
                    <input type="text" name="idmiestado" id="idmiestado"  hidden >
                    <input type="text" name="idpeticionN" id="var_idpeticionN" hidden >

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-----------------------------------------formulario------------------------------------------------------------------>
                    <div class="register-box-body"  >
                        <p> <h3>Registre una nueva Peticion</h3></p>
                        <hr>
                        <form enctype="multipart/form-data">
                        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        -->
                            <div class="row">
                            
                                <div class="row">
                                    <!-- campo de Descripcion -->
                                    <div class="col-md-12">
                                        <div class="form-group has-feedback">
                                            <label for="">Descripcion:</label>
                                            <input id="txtDescripcionN"  type="text" class="form-control" placeholder="Describa su peticion"  required/>
                                            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="row">
                                    <!-- combo de Tipo de Peticion -->
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <label for="">Tipo de Peticion:</label>
                                            <select id="cmbTipoPeticionesN"   class="form-control" required>
                                                <option disabled selected>Seleccione el tipo de Peticion</option>
                                            </select>                                    
                                        </div>
                                    </div>
                                    <!-- combo  de Prioridad -->
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">  
                                            <label for="">Prioridad:</label>           
                                            <select id="cmbPrioridadesN"   class="form-control" required>
                                                <option disabled selected>Seleccione la Prioridad</option>
                                            </select>                                  
                                        </div>
                                    </div>

                                    <div class="col-md-4 ">
                                        <label for=""> <label for=""></label>  </label>  
                                        <div class ="row">
                                            <div class="col-md-12">
                                                <a id="btnEnviarPN" class=" btn btn-primary btn-block btn-flat " title="">Enviar Peticion</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </form>
                    </div><!-- /.form-box -->
                </div><!-- /.register-box -->
                <br>  
            </div>
        </div>
    </div>
    <div class="row register-box-body">
        <div class="row">
            <div class="col-md-3">
              <p> <h3> Lista de Peticiones</h3></p>
            </div>
              
            <div  class="col-md-9" >
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-feedback">
                            <label> <b>Tipo de Filtro:</b></label>
                            <select id="cmbTipoBusqueda"   class="form-control" required>
                                <!-- <option disabled selected>Seleccione el tipo de Peticion</option> -->
                                <option value="Todas" selected>Todas</option>
                                <option value="TipoPeticion" >Por Tipo de Peticion</option>
                                <option value="Prioridad" >Por Prioridad</option>
                                <option value="Estado" >Por Estado</option>
                                <option value="Fecha" >Por Fecha</option>
                            </select>
                        </div>
                    </div>
                    <div id="contenedor" class="col-md-8" >
                        <input type="hidden" class="form-control" id="dtpFechaFiltro2N" value = "<?php echo date("Y-m-d");?>" />
                        <div class="row">
                            <div id="panelBuscarN" class="col-md-6">
                               
                            </div>
                            <div id="panelBuscartxtN" class="col-md-6">
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>     
          
        </div>
           
          <hr>
          <div class="table-responsive pre-scrollable">
            <table id="" class="table table-hover table-bordered">
                <thead>
                <tr>

                    <th scope="col">Descripcion</th>
                    <th scope="col">Tipo de Peticion</th>
                    <th scope="col">Prioridad</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha</th>
                    <th scope="col"> <center> Acciones </center> </th> 
                    
                </tr>
                </thead>
                <tbody id="dgvMisPeticiones">
                
                </tbody>
            </table>
          </div>       
    </div>
</div>
<script src="{{ asset('js/GestionPeticionesNorm.js') }}" defer></script>
<script src="{{ asset('js/GestionFiltroPeticionesNorm.js') }}" defer></script>
@endsection

