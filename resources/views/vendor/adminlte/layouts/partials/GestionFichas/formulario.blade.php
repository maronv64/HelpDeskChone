   <p> <h3><b><i class="fa fa-user"></i>  Registro de Soporte Técnico Informático</b></h3></p>
                      <hr>

                <div class="panel panel-primary">  
                <div class="panel-heading">
           <h3 class="panel-title">Ficha</h3>
              </div>    
              <div class="row">
                <div class="col-md-12">
                   <form id="formFicha"  method="post"> 
                      @csrf    
                           <div class="col-md-12">                  
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <br>
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group has-feedback">
                                      <label><b>Fecha Inicio:</b></label>
                                
                                  </div>
                              </div>
                              <div class="col-md-3">
                                   <div class="form-group has-feedback">
                                      <label><b>Fecha Limite:</b></label>
                                  
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group has-feedback">
                                      <label><b>Hora Inicio:</b></label>
                      
                                  </div>
                              </div>
                               <div class="col-md-3">
                                  <div class="form-group has-feedback">
                                      <label><b>Hora Limite:</b></label>
                      
                                  </div>
                              </div>
                          </div>
                           <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group has-feedback">
                                     <label><b>Dir/Subdir/Empr:</b></label> <br>
                                     <input type="text" class="form-control" placeholder="Dir/Subdir/Empr"  id="dire" name="dire" value="{{ old('dire') }}" required />
                                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  
                                  </div>
                                 
                              </div>
                              <div class="col-md-3">
                                   <div class="form-group has-feedback">
                                     <label><b>Medio Petición:</b></label>
                                      <select class="form-control" required  name="idmediopeticion" id="idmediopeticion">
                                      <option>Personal</option>
                                      <option>Correo</option>
                                      <option>Documental</option>
                                      <option>Teléfono</option>
                                      </select>  
                                  </div>
                              </div>
                                <div class="col-md-3">
                                   <div class="form-group has-feedback"  id="idarea" >
                                        <label><b>Tipo Mantenimiento</b></label>
                                      <select class="form-control" required  name="idtipope" id="idtipope">
                                        <option>Preventivo</option>
                                        <option>Correctivo</option>
                                        <option>Asitencia</option>                                  
                                      </select>  
                                
                                  </div>
                              </div>
                          </div>


                        <div class="panel panel-info">  
                          <div class="panel-heading">
                            <h3 class="panel-title"><b>Dispositivos</b></h3>
                          </div>
 
                          <div class="table-responsive pre-scrollable" style="height: 250px">
                          
                          <table class="table table-hover table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Cod. Activo</th>
                               <th scope="col">Serial</th>
                                <th scope="col">Dispositivo</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col" colspan="2" style="text-align: center">Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="dispotivosficha">
                            </tbody>
                          </table>
                          </div>
                        </div>

                          <div class="row">
                             <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label> <b>Tipo Propblema:</b></label>
                                    <textarea class="form-control" id="tipoproblema" rows="5" style="resize: none" required ></textarea>
                                </div>
                             </div>
                          </div>

                          <div class="row">
                             <div class="col-md-12">
                                <div class="form-group has-feedback">
                                    <label> <b>Detalle de Reparación:</b></label>
                                    <textarea class="form-control" id="detallereaparacion" rows="5" style="resize: none" required ></textarea>
                                </div>
                             </div>
                          </div>

                          <div class="row">
                              <div class="col-md-7">
                                  <div class="form-group has-feedback">
                                  <label> <b>Fecha Solución:</b></label>
                                  <input type="date" class="form-control" id="fechasol"   name="fechasol"required />
                                  </div>
                              </div>
                               <div class="col-md-5">
                                  <div class="form-group has-feedback">
                                  <label> <b>Hora:</b></label>
                                  <input type="time" class="form-control" id="horasol"   name="horasol"required />
                                  </div>
                              </div>
                          </div>
                            <div class="row">
                              <div class="col-md-7">
                                  <div class="form-group has-feedback">
                                  <label> <b>Fecha Entrega:</b></label>
                                  <input type="date" class="form-control" id="fechaentre"   name="fechaentre"required />
                                  </div>
                              </div>
                               <div class="col-md-5">
                                  <div class="form-group has-feedback">
                                  <label> <b>Hora:</b></label>
                                  <input type="time" class="form-control" id="horaentre"   name="horaentre"required />
                                  </div>
                              </div>
                          </div>
                     
                     
                                                    
                          <div class="row">
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                       
                                  </div>
                               </div>
                              <div class="col-md-5">
                                  <div class="form-group has-feedback">
                      
                                  </div>
                              </div>
                               <div class="col-md-3">
                                 <button type="submit"  class="btn btn-primary btn-block btn-flat">Enviar Ficha</button>
                               </div>
                               <br>
                               <br>
                          </div>
                        
                     <div class="row">
                            <div class="col-md-12">
                            </div> 
                       </div>
                  </div>
                    </form>
                       </div>
                      </div>
                  </div>
