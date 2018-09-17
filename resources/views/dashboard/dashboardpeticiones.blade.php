@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')

<div class="box box-primary">
    <div class="box-header with-border">
        <i class="fa fa-edit"></i>
        <h3 class="box-title">Asignar Actividades</h3>
    <div class="register-box-body"  >
            
            <form action="http://127.0.0.1:8000/register" method="post">
                <input type="hidden" name="_token" value="1qzKMK3opweQ3HdAVndJu88n3QgFzKVzM65klnfQ">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Nombres" name="name" value=""/>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value=""/>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Cédula" name="cedula" value=""/>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Celular" name="celular" value=""/>
                            <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                        </div>
                       
                    </div>
                    <div class="col-md-4">
                         <div class="form-group has-feedback">
                          <select class="form-control" id="sexo" name="sexo" >
                              <option disabled selected>Sexo</option>
                              <option>Femenino</option>
                              <option>Masculino</option>
                              <option>Indefinido</option>
                           </select>
                            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="form-group has-feedback">
                            <select class="form-control" id="estado" name="estado" >
                              <option disabled selected>Estado</option>
                              <option value="1">Activo</option>
                              <option value="2">Inactivo</option>
                            </select>
                                
                         <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-md-4">
                        <div class="form-group has-feedback">
                            <select class="form-control" id="idtipousuario" name="idtipousuario" onchange="mostrarcampostecnicos(this.value)"  >
                              <option disabled selected>Tipo Usuario</option>
                              <option value="1">Administrador</option>
                              <option value="2">Jefe Tecnología</option>
                              <option value="3">Secretari@</option>
                              <option value="4">Técnico</option>
                              <option value="5">Usuario Final</option>
                            </select>            
                         <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group has-feedback" hidden id="idextratecnico">
                            <select class="form-control"  name="idextratecnico" >
                              <option  disabled selected>Especialización</option>
                              <option value="1">Sistemas</option>
                            </select>        
                         <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group has-feedback" hidden  id="idarea">
                            <select class="form-control" name="idarea" >
                              <option disabled selected>Área</option>
                              <option value="1">Rentas</option> 
                              <option value="2">Contraluria</option>
                            </select>      
                         <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                        </div>
                     </div>
                </div>
                
                <div class="row">
                     <div class="col-md-4">
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Email" name="email" value=""/>
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Contraseña" name="password"/>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                     </div>
                    <div class="col-md-4">
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder=" Confirmar contraseña" name="password_confirmation"/>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                    </div>
                </div>
              
            <div class="row">
                  <!-- /.col -->
                  <div class="col-md-8">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Asignar Actividad</button>
                  </div><!-- /.col -->
        </div>
            </form>
        </div><!-- /.form-box -->
    </div><!-- /.register-box -->

        
                  


            <div style="height: 300px;overflow: auto;">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Peticion</th>
                        <th>Tecnico</th>
                        <th>Duracion (Horas)</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                            <tbody>
                            <tr>
                            <td>1-9-2018</td>
                            <td>Revisar Conexion</td>
                            <td>Maron Vera</td>
                            <td>2</td>
                            <td>11/09/2018 - 09:00</td>
                            <td>11/09/2018 - 11:00</td>
                            <td>
    
                                 <button type="button" class="btn btn-primary btn-xs">Ver</button>
                                 <button type="button" class="btn btn-warning btn-xs">Editar</button>
                                 <button type="button" class="btn btn-danger btn-xs">Eliminar</button>
                                
                            </td>
                        </tr>                 
                        </tbody>
                    </table>
            </div>
        </div>
    </div> 
    @endsection
    