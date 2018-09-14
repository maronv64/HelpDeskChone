 <div class="register-box-body">
    <form enctype="multipart/form-data" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group has-feedback">
                    <label for="">Descripcion</label>
                    <input id="modal_descripcion" type="text" class="form-control" value="{{ old('modal_descripcion') }}" required/>
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
                    <input id="modal_serie" type="text" class="form-control" value="{{ old('modal_serie') }}" required/>
                    <span class="fa fa-barcode form-control-feedback"></span>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group has-feedback">
                    <label for="">Color</label>
                    <input id="modal_color" type="text" class="form-control" value="{{ old('modal_color') }}" required/>
                    <span class="glyphicon glyphicon-tint form-control-feedback"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group has-feedback">
                    <label for="">Modelo</label>
                    <input id="modal_modelo" type="text" class="form-control" value="{{ old('modal_modelo') }}" required />
                    <span class="fa fa-car form-control-feedback"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group has-feedback">
                    <label for="">Marca</label>
                    <input id="modal_marca" type="text" class="form-control" value="{{ old('modal_marca') }}" required/>
                    <span class="fa fa-bookmark form-control-feedback"></span>
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
                <a id="modal_validar_cambios" class="btn bg-aqua-active btn-block rounded" title="">Validar cambios</a>
            </div><!-- /.col -->
        </div>
    </form>
</div>