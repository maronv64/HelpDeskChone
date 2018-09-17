
 <div class="modal-body">
         <form id="formasig"  method="post"> 
                      
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="text" name="idpeticionasig" id="idpeticionasig" hidden >
                          <input type="text" name="idusuarioasig" id="idusuarioasig" hidden >
                          
                            <div class="row">
                                <div class="col-md-4">
                                      <input type="text" class="form-control form-control-sm" placeholder="Buscar Técnicos" onkeyup="" id="buscar_tecnicos">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                          <br>
                                        </span>
                                      </div>                                                 
                                </div> 
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-6">
                                  <h4><p>Técnicos Asignados</p></h4>
                                </div>

                              </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="table-responsive pre-scrollable" style="height: 200px" >
                                
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

                              <div class="col-md-6">
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
                              </div>
                            </div>

                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Fecha Inicial:</b></label>
                                      <input type="date" class="form-control" id="fechainicialAsig" name="fechainicialAsig"required />
                                  </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                      <label> <b>Fecha Límite:</b></label>
                                      <input type="date" class="form-control" id="fechafinalAsig"   name="fechafinalAsig"required />
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <label> <b>Observación:</b></label>
                                      <textarea class="form-control" id="observacionAsig" rows="3"></textarea>
                                  </div>
                              </div>
                          </div>
                     
                             <div class="modal-footer">
                              <button type="submit" id="botonasignar" data-toggle='modal' data-target='#mi-modal2'  class="btn btn-primary">Asignar</button>
                              <button type="button" class="btn btn-secondary" onclick="limpiartablatacnicos()" data-dismiss="modal">Cerrar</button>
                            </div>
         </form>
      </div>



   