@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Register
@endsection


@section('main-content')
<div class="container-fluid spark-screen">
    <div>
        <!-- TABLA DE LISTA DE USUARIOS -->
        @include('adminlte::layouts.partials.GestionAsigDispositivos.TablaUsuarios')    
    </div>
</div>

<!--   MODAL PARA ACTUALIZAR DATOS USUARIOS -->
@include('adminlte::layouts.partials.GestionAsigDispositivos.modalasig')  
<!--MODAL PARA CONFIRMACIÓN DE ELIMINACIÓN-->

<script src="{{ asset('js/GestionAsigDispositivos.js') }}" defer></script>

@endsection
