@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
        <div class="">
          <div id="app">
              <div class="">

<!-- -->

            <div id="verModalModicarPeticion">
            @include('adminlte::layouts.partials.GestionPeticiones.modalEditarPeticion')
            </div>


            <input type="text" name="iduser" id="iduser" hidden >
            <input type="text" name="idpeticion" id="var_idpeticion" hidden >
 <!-- ---------------------------------modal -------------------------- -->


            <div class="modal" tabindex="-1" role="dialog" id="modalBuscarUsuario1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header" align="center">
                    <h3  class="modal-title"><b><i class="fa fa-user"></i>  Actualización de Datos</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </div>
                        <!-- -->

                        <div class="modal-body">
                                <form id=""  > 
                                            
                                                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                                
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
                                                            <label> <b>Escriba la Busqueda:</b></label>
                                                            <input type="text" class="form-control" placeholder="Digite el Nombre o Apellidos o Cedula"  id="txtBuscar1" required />
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                <div class="row">
                                                     <div class="table-responsive pre-scrollable">
          
                                                        <table class="table table-hover table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">Cédula</th>
                                                                <th scope="col">Nombre</th>
                                                                <th scope="col">Apellidos</th>
                                                                <th scope="col">Celular</th>
                                                                <th scope="col">Área</th>
                                                                <th scope="col">Email</th>
                                                                <th scope="col">Acciones</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="dgvUsuarios1">
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
                <p> <h2><center> Administrador de Peticiones </center></h2></p>
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
                                        <!-- <div class ="row">
                                            <div class="col-md-12">
                                                <a id="btnEnviarP" class=" btn btn-info btn-block btn-flat " title="">Enviar Peticion</a>
                                            </div>
                                        </div> -->
                                    <div class ="row">
                                        <div class="col-md-12">
                                            <a id="btnEnviarP" class=" btn btn-primary btn-block btn-flat " title="">Enviar Peticion</a>
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
                                <option value="Usuario" >Por Usario</option>
                                <option value="Fecha" >Por Fecha</option>
                            </select>
                        </div>
                    </div>
                    <div id="contenedor" class="col-md-8" >
                        <input type="hidden" class="form-control" id="dtpFechaFiltro2" value = "<?php echo date("Y-m-d");?>" />
                        <div class="row">
                            <div id="panelBuscar" class="col-md-6">
                                <!-- <div class="form-group has-feedback">                                                                   
                                    <label> <b>Escriba la Busqueda:</b></label>                                                         
                                    <input type="text" class="form-control" placeholder="Escriba aquí"  id="txtFiltroGeneral" required />      
                                </div> -->
                            </div>
                            <div id="panelBuscartxt" class="col-md-6">
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>     
            
            <!-- <div class="col-md-2">
                <br>
                <div class ="row">
                    <div class="col-md-12">
                        <a id="btnVerFiltro" class=" btn btn-info btn-block btn-flat " title="">Filtro</a>
                    </div>
                </div>
            </div>  -->
          
        </div>
           
          <hr>
        <div class="row">
            <div class="table-responsive pre-scrollable">
                <table id="" class="table table-hover table-bordered">
                    <thead>
                    <tr>

                        <th scope="col">Descripcion</th>
                        <th scope="col">Tipo de Peticion</th>
                        <th scope="col">Prioridad</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Area</th>
                        <th scope="col">Fecha de Creacion</th>
                        <th scope="col">Fecha de Modificacion</th>
                        <th scope="col"> <center> Acciones </center> </th> 
                        
                    </tr>
                    </thead>
                    <tbody id="dgvPeticiones">
                    
                    </tbody>
                </table>
            </div>   
        </div>    
    </div>
</div>
<script src="{{ asset('js/GestionPeticiones4.js') }}" defer></script>
<script src="{{ asset('js/GestionFiltroPeticiones.js') }}" defer></script>
@endsection

