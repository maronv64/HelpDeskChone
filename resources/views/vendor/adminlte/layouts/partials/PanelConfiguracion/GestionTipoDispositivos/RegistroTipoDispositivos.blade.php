                  <form id="frm_ingresar_tipos_dispositivos"  method="post">
                
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="img/imagenes/dispositivos.jpg" alt="" class="img-responsive img-rounded">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <div>
                                <center><h3>Ingreso de nuevos tipos de dispositivos</h3></center>  
                                </div>
                                <br>
                                <input required id="" type="text" class="form-control" placeholder="Descripcion del tipo de usuario" autocomplete="off" value="{{ old('') }}" />
                                <br>
                                <button type="submit"  class="btn btn-primary btn-block rounded">Almacenar</button>
                            </div>
                        </div>
                    </div>                    
                  </form>
                  @include('adminlte::layouts.partials.PanelConfiguracion.GestionTipoDispositivos.TablaDispositivos')  
