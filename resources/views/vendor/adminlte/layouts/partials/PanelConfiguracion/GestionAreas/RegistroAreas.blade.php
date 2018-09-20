                  <hr>
                  <form id="frm_registrardispositivo"  method="post">
                
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group has-feedback">
                          <input autocomplete="off" required id="add_nom_dispositivo" name="input_nom_dispositivo" type="text" class="form-control" placeholder="Descripcion del dispositivo" value="{{ old('dispositivo') }}" />
                          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        </div>
                        </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <input autocomplete="off" id="add_num_serie" name="input_num_serie" type="text" class="form-control" placeholder="Numero de serie" value="{{ old('num_serie') }}" required/>
                                    <span class="fa fa-barcode form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                           <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input autocomplete="off" id="add_color" name="input_color" type="text" class="form-control" placeholder="Color del dispositivo" value="{{ old('color') }}" required/>
                                      <span class="glyphicon glyphicon-tint form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input autocomplete="off" id="add_modelo" name="input_modelo" type="text" class="form-control" placeholder="Modelo" value="{{ old('modelo') }}" required />
                                      <span class="fa fa-car form-control-feedback"></span>
                                  </div>
                              </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input autocomplete="off" id="add_marca" name="input_marca" type="text" class="form-control" placeholder="Marca" value="{{ old('marca') }}" required/>
                                      <span class="fa fa-bookmark form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                                    <div class="col-md-12">
                                      <button type="submit"  class="btn btn-primary btn-block rounded">Almacenar</button>
                                    </div><!-- /.col -->
                          </div>
                  </form>
