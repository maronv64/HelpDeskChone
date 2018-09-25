@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Register
@endsection


@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="">
            <div id="app">
                <div class="">
                    <!--   <div class="register-logo">
                        <a href="{{ url('/home') }}"><b>Help</b>Desk</a>
                    </div> 
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif-->
                    <div class="register-box-body"  >
                 
                                @include('adminlte::layouts.partials.GestionAsigTareas.Tablaregistro')
                            
                
                
                            
                    </div>
                  <!-- /.form-box -->       
                </div><!-- /.register-box -->
                <br>    
           </div>
        </div>
    </div>
    <div >
        <!-- TABLA DE LISTA DE USUARIOS -->
        
    </div>
</div>
<!--   MODAL PARA ACTUALIZAR DATOS USUARIOS -->
@include('adminlte::layouts.partials.GestionAsigTareas.modalasignacion')  
@include('adminlte::layouts.partials.GestionAsigTareas.modaldatospeticion') 
@include('adminlte::layouts.partials.GestionAsigTareas.modalmuestraobservacion') 
@include('adminlte::layouts.partials.GestionAsigTareas.modalvertareas') 
<!--MODAL PARA CONFIRMACIÓN DE ELIMINACIÓN-->
@endsection
