<!-- ---------------------------------modal -------------------------- -->


<div class="modal" tabindex="-1" role="dialog" id="modalEditarPeticion">
    <div class="modal-dialog modal-sg"  role="document">
        <div class="modal-content">

            <div class="modal-header" align="center">
                <h3  class="modal-title"><b><i class="fa fa-user"></i>  Actualización de Datos</b></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </div>
                        <!-- -->
            <div class="modal-body">
                <form id=""  > 
                                            
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                                                
                    <div class="col-md-12">
                        <div class="row">

                            <div class="row">                                                            <!-- campo de Descripcion -->
                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <label for="">Descripcion:</label>
                                        <input id="txtDescripcionModal"  type="text" class="form-control" placeholder="Describa su peticion"  required/>
                                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">  
                                                                                         <!-- combo de Tipo de Peticion -->
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="">Tipo de Peticion:</label>
                                        <select id="cmbTipoPeticionesModal"   class="form-control" required>
                                            <option disabled selected>Seleccione el tipo de Peticion</option>
                                        </select>
                                    </div>
                                </div>
                                                            <!-- combo  de Prioridad -->
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">  
                                        <label for="">Prioridad:</label>           
                                        <select id="cmbPrioridadesModal"   class="form-control" required>
                                            <option disabled selected>Seleccione la Prioridad</option>
                                        </select>                                  
                                    </div>
                                </div>
                                                            <!-- combo de Tipo de Estado -->
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="">Estado:</label>             
                                        <select id="cmbEstadosModal"   class="form-control" required>
                                            <option disabled selected>Seleccione el Estado</option>
                                        </select>                                  
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-8">

                                    <div class="row">
                                        
                                        <div class="col-md-8    ">
                                            <div class="form-group has-feedback">
                                                <input disabled id="txtUsuarioModal"  type="text" class="form-control" placeholder="Usuario"  required/>
                                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class ="row">
                                                <div class="col-md-12">
                                                    <a id="btnAgregarUsuario2" class=" btn btn-info btn-block btn-flat " title=""> Usuario</a>
                                                </div>
                                            </div>
                                        </div> 
                                        <br>
                                    </div>
                                                                
                                </div>

                                <div class="col-md-4 ">
                                    <div class ="row">
                                        <div class="col-md-12">
                                            <a id="btnActualizarPeticion" class=" btn btn-primary btn-block btn-flat " title="">Actualizar Peticion</a>
                                        </div>
                                    </div>
                                </div>

                           </div>

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
 