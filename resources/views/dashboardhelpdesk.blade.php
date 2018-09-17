@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')



<div class="container-fluid spark-screen">

    <?php   $totalpeticiones=0;
            $prioriedadbaja=0;
            $prioriedadmedia=0;
            $prioriedadalta=0;
    ?>
        @foreach ($consulta['peticiones'] as $item)
        <?php $totalpeticiones++ ?>
            @if ($item->idprioridad=='1')
            <?php $prioriedadalta++ ?>
            @endif
            @if ($item->idprioridad=='2')
            <?php $prioriedadmedia++ ?>
            @endif
            @if ($item->idprioridad=='3')
            <?php $prioriedadbaja++ ?>
            @endif
        
        @endforeach
        
        


    <div class="row">
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div id="ntotal" class="inner">
                <h3>{{$totalpeticiones}}</h3>                
                </div>
                <p>Total de Pendientes</p>
                <div class="icon">
                <i class="fa fa-info"></i>
                </div>
                <a href="#" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                <h3>{{$prioriedadbaja}}</h3>
                <p>Peteciones Prioridad: Baja</p>
                </div>              
                <div class="icon">
                <i class="fa fa-flag-o"></i>
                </div>
                <a href="#" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                <h3>{{$prioriedadmedia}}</h3>
                <p>Peteciones Prioridad: Media</p>
                </div>
                <div class="icon">
                <i class="fa fa-flag-o"></i>
                </div>
                <a href="#" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
            </div>
            </div>

        <div class="col-lg-3 col-xs-6">
                <!-- small box -->
            <div class="small-box bg-red">
                    <div class="inner">
                    <h3>{{$prioriedadalta}}</h3>
                    <p>Peteciones Prioridad: Critica</p>
                    </div>
                    <div class="icon">
                    <i class="fa fa-flag-o"></i>
                    </div>
                    <a href="#" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
            </div>
        </div>

</div>

<div class="box box-primary">
        <div class="box-header with-border">
            <i class="fa fa-bar-chart"></i>
            <h3 class="box-title">Estadística</h3>

            <div class="box-tools pull-right">
                <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                -->
            </button>
        </div>
    </div>
            <div class="box-body no-padding">
            <div id="chart_div" style="position: relative; height: 250px; width: 100%;">
                
            </div>
            <div style="height:200px;overflow: auto;">  

    </div>

</div>
@endsection
