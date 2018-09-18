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
    @foreach ($consulta['asig_tarea'] as $item)
        @foreach ($consulta['peticiones'] as $item2)
            @if ($item->peticion_idpeticion == $item2->idpeticion)
                @if ( $item2->idprioridad=='1' )
                    <?php $prioriedadalta++ ?>
                    <?php $totalpeticiones++ ?>
                @endif
                @if ( $item2->idprioridad=='2' )
                    <?php $prioriedadmedia++ ?>
                    <?php $totalpeticiones++ ?>
                @endif
                @if ( $item2->idprioridad=='3' )
                    <?php $prioriedadbaja++ ?>
                    <?php $totalpeticiones++ ?>
                @endif
            @endif
        @endforeach
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
                        <p>Peteciones Prioridad: Alta</p>
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
                <h3 class="box-title">Peticiones</h3>
            </div>
        
            <div style="height: 300px;overflow: auto;">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Fecha y Hora de Peticion</th>
                        <th>Solicitud</th>
                        <th>Tecnico Asignado</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($consulta['asig_tarea'] as $item)
                            @foreach ($consulta['peticiones'] as $item2)
                                @foreach ($consulta['user'] as $item3)
                                    @if ($item->peticion_idpeticion == $item2->idpeticion and $item->usuario_idUsuario==$item3->id )
                                        <tr>
                                            <td>{{$item2->created_at}}</td>
                                            <td style="text-transform: capitalize"> <?php echo substr($item2->descripcion,0,30); ?></td>
                                            <td style="text-transform: capitalize">{{$item3->name}} &nbsp; {{$item3->apellidos}}</td> 
                                            <td>{{$item->FechaInicio}}</td>
                                            <td>{{$item->FechaLimite}}</td>
                                            @if ($item2->idprioridad=='1')
                                                <td>
                                                        <i class="fa fa-flag" style="color:red" ></i>                                                
                                                </td>
                                            @endif
                                            @if ($item2->idprioridad=='2')
                                                <td>
                                                        <i class="fa fa-flag" style="color:orange" ></i>                                                
                                                </td>
                                            @endif
                                            @if ($item2->idprioridad=='3')
                                                <td>
                                                        <i class="fa fa-flag" style="color:green" ></i>                                                
                                                </td>
                                            @endif
                                        </tr>                                  
                                    @endif  
                                @endforeach                                        
                                                            
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    <!-- --------- FIN Grafica - - - ------->

</div>

@endsection
