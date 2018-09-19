 <div class="register-box-body">
    <form enctype="multipart/form-data" method="post" id="frm_modal_registrardispositivo">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group has-feedback">
                    <label for="">Descripcion</label>
                    <input autocomplete="off" id="modal_descripcion" type="text" class="form-control" value="{{ old('modal_descripcion') }}" required/>
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
                    <input autocomplete="off" id="modal_serie" type="text" class="form-control" value="{{ old('modal_serie') }}" required/>
                    <span class="fa fa-barcode form-control-feedback"></span>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group has-feedback">
                    <label for="">Color</label>
                    <input autocomplete="off" id="modal_color" type="text" class="form-control" value="{{ old('modal_color') }}" required/>
                    <span class="glyphicon glyphicon-tint form-control-feedback"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group has-feedback">
                    <label for="">Modelo</label>
                    <input autocomplete="off" id="modal_modelo" type="text" class="form-control" value="{{ old('modal_modelo') }}" required />
                    <span class="fa fa-car form-control-feedback"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group has-feedback">
                    <label for="">Marca</label>
                    <input autocomplete="off" id="modal_marca" type="text" class="form-control" value="{{ old('modal_marca') }}" required/>
                    <span class="fa fa-bookmark form-control-feedback"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <button id="modal_validar_cambios" type="submit"  class="btn btn-primary btn-block rounded">Validar cambios</button>
            </div><!-- /.col -->
            <div class="col-md-2">
                <button type="button" class="btn btn-secondary btn-block rounded" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </form>
</div>