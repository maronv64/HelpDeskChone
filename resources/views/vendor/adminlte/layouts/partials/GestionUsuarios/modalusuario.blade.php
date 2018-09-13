<div class="modal" tabindex="-1" role="dialog" id="actualizarusuariomodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <h3  class="modal-title"><b><i class="fa fa-user"></i>  Actualización de Datos</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      </div>
      <div class="modal-body">
         <form id="formregistromodal  method="post"> <!--   action="{{ url('/usuarioIngresar') }}" -->
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
                                        <option>Indefinido</option>
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
