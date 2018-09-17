   <p> <h3><b><i class="fa fa-user"></i>    Registre un nuevo Usuario</b></h3></p>
                      <hr>
                   <form id="frm_registrarUsuario"  method="post"> <!--   action="{{ url('/usuarioIngresar') }}" -->
                      @csrf
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label><b>Nombres:</b></label>
                                      <input type="text" class="form-control" placeholder="Nombres"  id="name" name="name" value="{{ old('name') }}" required />
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                      <label><b>Apellidos:</b></label>
                                      <input type="text" class="form-control" id="apellidos"   placeholder="Apellidos" name="apellidos" value="{{ old('apellidos') }}"required />
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label><b>Cédula:</b></label>
                                      <input type="text" class="form-control" id="cedula" placeholder="Cédula" name="cedula" value="{{ old('cedula') }}"required />
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>
                           <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label><b>Celular:</b></label>
                                      <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular" value="{{ old('celular') }}"required />
                                      <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                  </div>
                                 
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                    <label><b>Sexo:</b></label>
                                    <select class="form-control" id="sexo" name="sexo" required >
                                        <option selected>Femenino</option>
                                        <option>Masculino</option>
                                     </select>
                                      <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                              </div>
                                <div class="col-md-4">
                                   <div class="form-group has-feedback"  id="idarea" >
                                      <label><b>Área:</b></label>
                                      <select class="form-control" required name="idarea" id="cmb_area" >
                                      </select>      
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
                                    
                                      </select>        
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                               </div>
                               <div class="col-md-4">
                                <div class="form-group has-feedback">
                                     <label><b>Email:</b></label>
                                      <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" id="email" name="email" value="{{ old('email') }}"required />
                                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                  </div>
                               </div>
                          </div>
                          
                          <div class="row">
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password"required />
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                               </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input type="password" class="form-control" id="password_confirmation" placeholder=" Confirmar contraseña" name="password_confirmation"required />
                                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                  </div>
                              </div>
                               <div class="col-md-4">
                                 <button type="submit"  class="btn btn-primary btn-block btn-flat">Registrarse</button>
                               </div>
                          </div>
                        
                     <div class="row">
                            <div class="col-md-12">
                            </div> 
                       </div>


                    </form>
