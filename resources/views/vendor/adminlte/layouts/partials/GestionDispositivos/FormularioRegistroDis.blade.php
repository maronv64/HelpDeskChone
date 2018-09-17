<p> <h3>Registre un nuevo Dispositivo</h3></p>
<hr>
<form enctype="multipart/form-data" method="post" onsubmit='return validarDispositivos()'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group has-feedback">
                <input required id="add_nom_dispositivo" name="input_nom_dispositivo" type="text" class="form-control" placeholder="Descripcion del dispositivo" value="{{ old('dispositivo') }}" />
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
                <span class="fa fa-barcode form-control-feedback"></span>
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
                <span class="fa fa-car form-control-feedback"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group has-feedback">
                <input id="add_marca" name="input_marca" type="text" class="form-control" placeholder="Marca" value="{{ old('marca') }}" required/>
                <span class="fa fa-bookmark form-control-feedback"></span>
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
            <a id="guardar_datos" class="btn btn-info  btn-block rounded" title="">Almacenar</a>
            <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Almacenar</button> -->
        </div><!-- /.col -->
    </div>
</form>