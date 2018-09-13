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
                          <!--   <div class="col-md-3">
                                <label class="lcontainer" style="color: blue; font-size: 14px">Aceptar Terminos y Condiciones
                                       <input type="checkbox" name="terms" required >
                                      <span class="lcheckmark"></span>
                                </label>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">Ver </button>
                                </div>
                            </div>-->
                            <div class="col-md-12">
                                <button type="submit"  class="btn btn-primary btn-block btn-flat">Registrarse</button>
                            </div> 
                       </div>


                    </form>
