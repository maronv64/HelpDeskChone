@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
        <div class="">
          <div id="app">
              <div class="">
 <!-- ---------------------------------modal -------------------------- -->


            <div class="modal" tabindex="-1" role="dialog" id="modalBuscarUsuario">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header" align="center">
                    <h3  class="modal-title"><b><i class="fa fa-user"></i>  Actualización de Datos</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </div>
                        <!-- -->

                        <div class="modal-body">
                                <form id=""  > 
                                            
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="text" name="iduser" id="iduser" hidden >
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <div class="form-group has-feedback" id="idareaup" >
                                                            <label> <b>Área:</b></label>
                                                            <select id="cmbAreas" class="form-control" required  >
                                                        
                                                            </select>      
                                                        <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8">
                                                        <div class="form-group has-feedback">
                                                            <label> <b>Nombres o Cédula:</b></label>
                                                            <input type="text" class="form-control" placeholder="Digite el Nombre o Cedula"  id="txtBuscar" required />
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                <div class="row">
                                                     <div class="table-responsive pre-scrollable">
          
                                                        <table class="table table-hover table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">Cédula</th>
                                                                <th scope="col">Usuario</th>
                                                                <th scope="col">Celular</th>
                                                                <th scope="col">Área</th>
                                                                <th scope="col">Email</th>
                                                                <th scope="col">Acciones</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="dgvUsuarios">
                                                            </tbody>
                                                        </table>
                                                    </div>                                                    
                                                </div>
                                                
                                                
                                                
                                </form>
                            </div>
                            <div class="modal-footer">
                                <!--
                                <button type="button" onclick="usuarioActualizar();" data-dismiss="modal" class="btn btn-primary">Actualizar</button>
                                -->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>

                        <!-- -->
                </div>
            </div>
            </div>

                <!-- ---------------------------------fin modal----------------------------------------------------------------- -->
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
                  <form enctype="multipart/form-data" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="row">
                       
                        <div class="row">
                            <!-- campo de Descripcion -->
                            <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label for="">Descripcion:</label>
                                    <input id="txtDescripcion"  type="text" class="form-control" placeholder="Describa su peticion"  required/>
                                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                </div>
                            </div>

                        </div>
                        
                        <div class="row">
                            <!-- combo de Tipo de Peticion -->
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="">Tipo de Peticion:</label>
                                    <select id="cmbTipoPeticiones"   class="form-control" required>
                                    <option disabled selected>Seleccione el tipo de Peticion</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <!-- combo  de Prioridad -->
                            <div class="col-md-4">
                                <div class="form-group has-feedback">  
                                    <label for="">Prioridad:</label>           
                                    <select id="cmbPrioridades"   class="form-control" required>
                                    <option disabled selected>Seleccione la Prioridad</option>
                                    </select>                                  
                                </div>
                            </div>
                            <!-- combo de Tipo de Estado -->
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label for="">Estado:</label>             
                                    <select id="cmbEstados"   class="form-control" required>
                                    <option disabled selected>Seleccione el Estado</option>
                                    </select>                                  
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-8">
                                
                                <div class="row">
                                     
                                
                                    <!-- txt de Usuario -->
                                    <div class="col-md-8    ">
                                        <div class="form-group has-feedback">
                                            <input disabled id="txtUsuario"  type="text" class="form-control" placeholder="Usuario"  required/>
                                            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class ="row">
                                            <div class="col-md-12">
                                                <a id="btnAgregarUsuario" class=" btn btn-info btn-block btn-flat " title="">Agregar Usuario</a>
                                            </div>
                                        </div>
                                    </div> 
                                    <br>
                                </div>
                                
                            </div>
                           
                            <div class="col-md-4 ">
                                    <div class ="row">
                                        <div class="col-md-12">
                                            <a id="btnEnviarPeticion" class=" btn btn-primary btn-block btn-flat " title="">Enviar Peticion</a>
                                        </div>
                                    </div>
                            </div>
                            
                        </div>

                    
                    </div>

                    

                  </form>
                </div><!-- /.form-box -->
              </div><!-- /.register-box -->
              <br>
          <!-- TABLA DE LISTA DE DISPOSITIVOS -->   
          </div>
        </div>
    </div>
    <div class="row register-box-body">
        <div class="row">
           <div class="col-md-10">
              <p> <h3>Lista de dispositivos registrados</h3></p>
            </div>
            <div class="col-md-2">
              <a id="btnMostrar" class="btn btn-info" title="">Listar Peticiones</a>
            </div>
        </div>
           
          <hr>
          <div class="table-responsive pre-scrollable">
            <table id="tablaDispositivos" class="table table-hover table-bordered">
            <thead>
              <tr>

                <th scope="col">Descripcion</th>
                <th scope="col">Tipo de Peticion</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Estado</th>
                <th scope="col">Usuario</th>
                <th scope="col">Area</th>
                <th scope="col"> <center> Acciones </center> </th> 
                
              </tr>
            </thead>
            <tbody id="dgvPeticiones">
              
            </tbody>
          </table>
          </div>       
      </div>
</div>
<script src="{{ asset('js/GestionPeticiones.js') }}" defer></script>
@endsection

