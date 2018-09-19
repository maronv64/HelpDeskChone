                  <p> <h3>Gestion de tipos de usuarios</h3></p>
                  <hr>
                  <form id="frm_registrardispositivo"  method="post">
                
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="img/imagenes/Cuentasusuarios.png" alt="" class="img-responsive img-rounded">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <div>
                                <center><h3>Ingreso de nuevos tipos de usuarios</h3></center>  
                                </div>
                                <br>
                                <input required id="" type="text" class="form-control" placeholder="Descripcion del tipo de usuario" autocomplete="off" value="{{ old('dispositivo') }}" />
                                <br>
                                <a class="btn btn-primary btn-block rounded">Almacenar</a>
                            </div>
                        </div>
                    </div>
                        
                  </form>
