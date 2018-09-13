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
                  </div> -->

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

                  <div class="register-box-body"  >
                      <p> <h3><b><i class="fa fa-user"></i>    Registre un nuevo Usuario</b></h3></p>
                      <hr>
                   <form id="frm_registrarUsuario"  method="post"> <!--   action="{{ url('/usuarioIngresar') }}" -->
                      @csrf
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control" placeholder="Nombres"  id="name" name="name" value="{{ old('name') }}" required />
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                      <input type="text" class="form-control" id="apellidos"   placeholder="Apellidos" name="apellidos" value="{{ old('apellidos') }}"required />
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control" id="cedula" placeholder="Cédula" name="cedula" value="{{ old('cedula') }}"required />
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>
                           <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular" value="{{ old('celular') }}"required />
                                      <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                  </div>
                                 
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                    <select class="form-control" id="sexo" name="sexo" required >
                                        <option disabled selected>Sexo</option>
                                        <option>Femenino</option>
                                        <option>Masculino</option>
                                     </select>
                                      <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                              </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <select class="form-control" id="estado" name="estado" required >
                                        <option disabled selected>Estado</option>
                                        <option >Activo</option>
                                        <option >Inactivo</option>
                                      </select>
                                          
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                    <label><b>Tipo de Usuario:</b></label>
                                      <select class="form-control" id="idtipousuario" required name="idtipousuario" onchange="mostrarcampostecnicosregistro(this.value)"  >
                                      </select>            
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                               </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback" hidden id="idextratecnico" >
                                      <label><b>Especialización:</b></label>
                                      <select class="form-control" required  name="idextratecnico" id="cmb_extratecnico">
                                        <option> Mantenimiento</option>
                                        <option> Sistemas</option>
                                        <option> Redes</option>
                                      </select>        
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                               </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback"  id="idarea" >
                                      <label><b>Área:</b></label>
                                      <select class="form-control" required name="idarea" id="cmb_area" >

                                      
                                      </select>      
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                               </div>
                          </div>
                          
                          <div class="row">
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" id="email" name="email" value="{{ old('email') }}"required />
                                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                  </div>
                               </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password"required />
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                               </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="password" class="form-control" id="passwordconfir" placeholder=" Confirmar contraseña" name="password_confirmation"required />
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>
                        
                      <div class="row">
                            <div class="col-md-3">
                                <label class="lcontainer" style="color: blue; font-size: 14px">Aceptar Terminos y Condiciones
                                       <input type="checkbox" name="terms" required >
                                      <span class="lcheckmark"></span>
                                </label>
                            </div><!-- /.col -->
                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">Ver </button>
                                </div>
                            </div><!-- /.col -->
                            <div class="col-md-8">
                                <button type="submit"  class="btn btn-primary btn-block btn-flat">Registrarse</button>
                            </div><!-- /.col -->
                       </div>


                    </form>

                   

                      @include('adminlte::auth.partials.social_login')

                      <!-- <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a> -->
                  </div><!-- /.form-box -->
              </div><!-- /.register-box -->
                <br>

                  <!-- TABLA DE LISTA DE USUARIOS -->

                 
          </div>

          @include('adminlte::auth.terms')

          <script>
              $(function () {
                  $('input').iCheck({
                      checkboxClass: 'icheckbox_square-blue',
                      radioClass: 'iradio_square-blue',
                      increaseArea: '20%' // optional
                  });
              });
          </script>
        </div>
    </div>
      <div>

        <div class="row register-box-body">
          <div class="row">
            <div class="col-md-10">
              <p> <h3>Lista de Usuarios</h3></p>              
            </div>
            <div class="col-md-2">
               <button class='btn btn-info' onclick="UsuarioMostrar()" >Mostrar Usuarios</button>        
            </div>
          </div>
          <hr>
          <div class="table-responsive pre-scrollable">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th scope="col">Cédula</th>
                <th scope="col">Usuario</th>
                <th scope="col">Celular</th>
                <th scope="col">Sexo</th>
                <th scope="col">Estado</th>
                <th scope="col">Tipo Usuario</th>
                <th scope="col">Especialización</th>
                <th scope="col">Área</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody id="tablausuarios">
            </tbody>
          </table>
          </div>
      </div>
      </div>
  </div>


  <!--   MODAL PARA ACTUALIZAR DATOS USUARIOS -->
  <div class="modal" tabindex="-1" role="dialog" id="actualizarusuariomodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <h3  class="modal-title"><b><i class="fa fa-user"></i>  Actualización de Datos</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      </div>
      <div class="modal-body">
         <form id="frm_registrarUsuario"  method="post"> <!--   action="{{ url('/usuarioIngresar') }}" -->
                      @csrf
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="text" name="idusuarioup" id="idusuarioup" hidden >
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Nombres:</b></label>
                                      <input type="text" class="form-control" placeholder="Nombres"  id="nameup" name="nameup"required />
                                  </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                      <label> <b>Apellidos:</b></label>
                                      <input type="text" class="form-control" id="apellidosup"   placeholder="Apellidos" name="apellidosup"required />
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Cédula:</b></label>
                                      <input type="text" class="form-control" id="cedulaup" placeholder="Cédula" name="cedulaup" required />
                                  </div>
                              </div>
                          </div>
                           <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Celular:</b></label>
                                      <input type="text" class="form-control" id="celularup" placeholder="Celular" name="celularup" required />
                                  </div>
                                 
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                    <label> <b>Sexo:</b></label>
                                    <select class="form-control" id="sexoup" name="sexoup" required >
                                        <option disabled selected>Sexo</option>
                                        <option>Femenino</option>
                                        <option>Masculino</option>
                                     </select>
                                      <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                              </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Estado:</b></label>
                                      <select class="form-control" id="estadoup" name="estadoup" required >
                                        <option disabled selected>Estado</option>
                                        <option>Activo</option>
                                        <option>Inactivo</option>
                                      </select>
                                          
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Tipo Usuario:</b></label>
                                      <select class="form-control" id="idtipousuarioup" required name="idtipousuarioup" onchange="mostrarcampostecnicosactualizar(this.value)">
                                      </select>            
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                               </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback" id="idextratecnicoup" hidden>
                                      <label> <b>Especialización:</b></label>
                                      <select class="form-control" required  name="idextratecnicoup" id="cmb_extratecnicoup">
                                        <option> Mantenimiento</option>
                                        <option> Sistemas</option>
                                        <option> Redes</option>
                                      </select>        
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                               </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback" id="idareaup" >
                                      <label> <b>Área:</b></label>
                                      <select class="form-control" required name="idareaup" id="cmb_areaup" >
                                  
                                      </select>      
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                               </div>
                          </div>
                          
                          <div class="row">
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Email:</b></label>
                                      <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" id="emailup" name="emailup" required />
                                  </div>
                               </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Contraseña:</b></label>
                                      <input type="password" class="form-control" id="passwordup" placeholder="Contraseña" name="passwordup"required />
                                  </div>
                               </div>
                          </div>
                      </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="usuarioActualizar();" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection
