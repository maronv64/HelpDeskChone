@extends('adminlte::layouts.app')
@section('main-content')
<div class="container-fluid spark-screen">
  <div class="row">
        <div class="">
          <div id="app">
              <div class="">
                <!--modal-->
                <div class='modal fade bd-example-modal-lg' id='miModalnuevo' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden="true">
                    <div class='modal-dialog modal-lg' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                <h4 class='modal-title' id='myModalLabel'>Modificar </h4>
                            </div>
                            <div class="register-box-body">
                                <form enctype="multipart/form-data" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <label for="">Descripcion</label>
                                            <input id="modal_descripcion" type="text" class="form-control" value="{{ old('dispositivo') }}" required/>
                                            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <label for="">Tipo Dispositivo</label>
                                            <select class="form-control" id="modal_tipo_dispositivo" required>
                                                @if(isset($tiposDispositivos))
                                                @foreach ($tiposDispositivos as $item)
                                                    <option value="{{$item->idtipodispositivos}}">{{$item->descripcion}}</option>
                                                @endforeach
                                                @endif

                                            </select>
                                            <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                        <label for="">Serie</label>
                                        <input id="modal_serie" type="text" class="form-control" value="{{ old('num_serie') }}" required/>
                                        <span class="glyphicon glyphicon-certificate form-control-feedback"></span>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <label for="">Color</label>
                                            <input id="modal_color" type="text" class="form-control" value="{{ old('color') }}" required/>
                                            <span class="glyphicon glyphicon-tint form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <label for="">Modelo</label>
                                            <input id="modal_modelo" type="text" class="form-control" value="{{ old('modelo') }}" required />
                                            <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <label for="">Marca</label>
                                            <input id="modal_marca" type="text" class="form-control" value="{{ old('marca') }}" required/>
                                            <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <label for="">Estado</label>
                                            <select id="modal_estado" class="form-control" required>
                                                <option value="Activo">Activo</option>
                                                <option value="Inactivo">Inactivo</option>
                                            </select>
                                            <!--  fffff  <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a id="guardar_datos" class="btn btn-primary btn-block btn-flat" title="">Almacenar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                </div>
                  <!--fin modal-->
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <div class="register-box-body"  >
                  <p> <h3>Registre un nuevo Dispositivo</h3></p>
                  <hr>
                  <form enctype="multipart/form-data" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group has-feedback">
                          <input id="add_nom_dispositivo" name="input_nom_dispositivo" type="text" class="form-control" placeholder="Descripcion del dispositivo" value="{{ old('dispositivo') }}" required/>
                          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group has-feedback">
                        <select class="form-control" id="add_tipodispositivo" name="input_tipodispositivo" required>
                        <option disabled selected>Tipo de dispositivo</option>
                        @if(isset($tiposDispositivos))
                          @foreach ($tiposDispositivos as $item)
                            <option value="{{$item->idtipodispositivos}}">{{$item->descripcion}}</option>
                          @endforeach
                        @endif

                                      </select>
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group has-feedback">
                                      <input id="add_num_serie" name="input_num_serie" type="text" class="form-control" placeholder="Numero de serie" value="{{ old('num_serie') }}" required/>
                                      <span class="glyphicon glyphicon-certificate form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>
                           <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input id="add_color" name="input_color" type="text" class="form-control" placeholder="Color del dispositivo" value="{{ old('color') }}" required/>
                                      <span class="glyphicon glyphicon-tint form-control-feedback"></span>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input id="add_modelo" name="input_modelo" type="text" class="form-control" placeholder="Modelo" value="{{ old('modelo') }}" required />
                                      <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                  </div>
                              </div>
                               <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <input id="add_marca" name="input_marca" type="text" class="form-control" placeholder="Marca" value="{{ old('marca') }}" required/>
                                      <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>
                           <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                      <select id="add_cod_activo" name="add_estado" class="form-control" required>
                                        <option disabled selected>Estado del dispositivo</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                      </select>
                                   <!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                                    <div class="col-md-12">
                                      <a id="guardar_datos" class="btn btn-primary btn-block btn-flat" title="">Almacenar</a>
                                        <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Almacenar</button> -->
                                    </div><!-- /.col -->
                          </div>
                  </form>
                </div><!-- /.form-box -->
              </div><!-- /.register-box -->
              <br>
          <!-- TABLA DE LISTA DE DISPOSITIVOS -->   
          </div>
        </div>
    </div>
    <div>
      <div class="register-box-body">
      <p> <h3>Lista de dispositivos registrados</h3></p>
      <hr>
      <table id="tablaDispositivos" class="table table-hover table-bordered">
        <thead>
          <tr>
            <th scope="col">Id dispositivo</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Tipo de dispositivo</th>
            <th scope="col">Serie</th>
            <th scope="col">Color</th>
            <th scope="col">Modelo</th>
            <th scope="col">Marca</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
         <tbody>
              <tr>
              </tr>
          </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
