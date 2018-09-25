
 <div class="modal-body">
         <form id="formasig"  method="post"> 
                      
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="text" name="idpeticionasig" id="idpeticionasig" hidden >
                          <input type="text" name="idusuarioasig" id="idusuarioasig" hidden >
                          
                            <div class="row">
                                <div class="col-md-12">
                                      <input type="text" class="form-control form-control-sm" placeholder="Buscar Técnicos"  id="buscar_tecnicos" onkeyup="filtrotecnicos();">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                          <br>
                                        </span>
                                      </div>                                                 
                                </div> 
                            </div>
                                       <!--TABLA DE LISTA DE TECNICOS-->
                            <div class="row">
                              <div class="col-md-12">
                                <div class="table-responsive pre-scrollable" style="height: 150px" >
                                
                                <table class="table table-hover table-bordered"  >
                                  <thead>
                                    <tr>
                                      <th scope="col" style="text-align: center">Técnico</th>
                                      <th scope="col" style="text-align: center">Especialidad</th>
                                      <th scope="col" style="text-align: center">Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody id="tablaasignartecnico">
                                  </tbody>
                                </table>
                                </div>
                              </div>
                            </div>
                            <!--   <div class="col-md-6">
                                <div class="table-responsive pre-scrollable" style="height: 200px" id="tabladetecnicosasignados" hidden >
                                
                                <table class="table table-hover table-bordered">
                                  <thead >
                                    <tr>
                                      <th scope="col" hidden>id</th>
                                      <th scope="col" style="text-align: center">Técnico</th>
                                      <th scope="col" style="text-align: center">Especialidad</th>
                                      <th scope="col" style="text-align: center">Acción</th>
                                    </tr>
                                  </thead>
                                  <tbody id="tecnicosasignadostable">
                                  </tbody>
                                </table>
                                </div>
                              </div> -->
                          
                          <br>

                          <div class="row">
                              <div class="col-md-8">
                                 <div class="row">
                                <div class="col-md-7">
                                  <div class="form-group has-feedback">
                                      <label> <b>Fecha Inicial:</b></label>
                                      <input type="date" class="form-control" id="fechainicialAsig" name="fechainicialAsig"required value="<?php echo date("Y-m-d");?>" />
                                  </div>
                                </div>
                                 <div class="col-md-5">
                                    <div class="form-group has-feedback">
                                          <label> <b>Hora Inicial:</b></label>
                                          <input type="time" class="form-control" id="horainicialAsig" name="horainicialAsig"required value="<?php echo date("H:i");?>" />
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-7">
                                      <div class="form-group has-feedback">
                                      <label> <b>Fecha Límite:</b></label>
                                      <input type="date" class="form-control" id="fechafinalAsig"   name="fechafinalAsig"required />
                                      </div>
                                  </div>
                                   <div class="col-md-5">
                                      <div class="form-group has-feedback">
                                      <label> <b>Hora Límite:</b></label>
                                      <input type="time" class="form-control" id="horafinalAsig"   name="horafinalAsig"required />
                                      </div>
                                  </div>

                                
                                </div>



                                     
                                
                              </div>
                             
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Observación:</b></label>
                                      <textarea class="form-control" id="observacionAsig" rows="5" style="resize: none" required ></textarea>
                                  </div>
                              </div>
                   
                              
                            
                          </div>
                         

                                           <!--TABLA DE LISTA DE TECNICOS ASIGNADOS-->
                            <div class="row">
                              <div class="col-md-12">
                                <div class="table-responsive pre-scrollable" style="height: 150px" >
                                
                                <table class="table table-hover table-bordered"  >
                                  <thead>
                                    <tr>
                                      <th scope="col" style="text-align: center">Técnico</th>
                                      <th scope="col" style="text-align: center">Fecha/Hora Inicial</th>
                                      <th scope="col" style="text-align: center">Fecha/Hora Limite</th>
                                      <th scope="col" style="text-align: center">Observación</th>
                                    </tr>
                                  </thead>
                                  <tbody id="tablaasignacionporpeticion">
                                  </tbody>
                                </table>
                                </div>
                              </div>
                            </div>
                     
                             <div class="modal-footer">
                              <button type="submit" id="botonasignar" class="btn btn-primary">Asignar</button>
                              <button type="button" class="btn btn-secondary" onclick="limpiarmodalasignacion()" data-dismiss="modal">Cerrar</button>
                            </div>
         </form>
      </div>



   