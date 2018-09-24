@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Register
@endsection


@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
            <div id="app">
                    <div class="register-box-body"  >               
                        @include('adminlte::layouts.partials.PanelConfiguracion.TogleDesplegable')                
                    </div>
                <br>    
           </div>
    </div>
</div>
<script src="{{ asset('js/PanelConfiguracion/GestionPanelTipoDispositivos.js') }}" defer></script>
<script src="{{ asset('js/PanelConfiguracion/GestionPanelEspecialidad.js') }}" defer></script>
<script src="{{ asset('js/PanelConfiguracion/GestionPanelTipoUsuario.js') }}" defer></script>
<script src="{{ asset('js/PanelConfiguracion/GestionPanelAreas.js') }}" defer></script>

@endsection
