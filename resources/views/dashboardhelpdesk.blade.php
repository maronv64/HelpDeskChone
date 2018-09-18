@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')



<div class="container-fluid spark-screen">

    <?php   
        $totalpeticiones=0;
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
                        <p>Total de Pendientes</p>           
                    </div>            
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


    <!-- --------- Grafica - - - ------->
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-bar-chart"></i>
                <h3 class="box-title">Estadística</h3>
            </div>
        
            <div style="height: 300px;overflow: auto;">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Fecha y Hora de Peticion</th>
                        <th>Solicitud</th>
                        <th>Tecnico Asignado</th>
                        <th>Daily CPM</th>
                        <th>Ganancias De Referidos</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($consulta['peticiones'] as $item)
                            <tr>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->descripcion}}</td>
                                <td>$0,0264</td>
                                <td>
                                    $2,030769                            
                                </td>
                                <td>$0,00</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    <!-- --------- FIN Grafica - - - ------->

</div>

@endsection
