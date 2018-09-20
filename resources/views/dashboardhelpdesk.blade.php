@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')



<div class="container-fluid spark-screen">









    <?php
        $totalpeticionesfinalizadas=0;
        $totalpeticionesasignadas=0;
        $prioriedadbaja=0;
        $prioriedadmedia=0;
        $prioriedadalta=0;
    ?>
            @foreach ($consulta['peticiones'] as $item2)
            @if ($item2->idestado=='3')
            <?php $totalpeticionesfinalizadas++ ?>
            @endif


                @if ($item2->idestado=='1')
                    @if ( $item2->idprioridad=='1' )
                        <?php $prioriedadalta++ ?>
                        <?php $totalpeticionesasignadas++ ?>
                    @endif
                    @if ( $item2->idprioridad=='2' )
                        <?php $prioriedadmedia++ ?>
                        <?php $totalpeticionesasignadas++ ?>
                    @endif
                    @if ( $item2->idprioridad=='3' )
                        <?php $prioriedadbaja++ ?>
                        <?php $totalpeticionesasignadas++ ?>
                    @endif
                @endif
            @endforeach

            <div class="small-box bg-teal-gradient">
                    <div id="ntotal" class="inner">
                        <center>
                            <h2 style="font-size: 3em;"><strong>{{$totalpeticionesfinalizadas}}</strong></h3>     
                            <p>Total de Peticiones Asistidas</p>  
                        </center>         
                    </div>            
                    <div class="icon">
                        
                        <i class="fa fa-check-square-o" style="padding-right: 50px;"></i>
                    </div>
                    <a href="#" class="small-box-footer">Ver <i class="fa fa-eye"></i></a>
            </div>
            
        
    <div class="row">
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
                <div class="small-box bg-aqua">
                    <div id="ntotal" class="inner">
                        <h3>{{$totalpeticionesasignadas}}</h3>     
                        <p>Total de Peticiones Asignadas</p>           
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
                        <a href="#" class="small-box-footer">Ver <i class="fa fa-eye"></i>  </a>
                </div>
            </div>

    </div>


    <!-- --------- Grafica - - - ------->
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-folder-open"></i>
                <h3 class="box-title">Peticiones</h3>
            </div>
        
            <div style="height: 410px;overflow: auto;">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Fecha y Hora de Peticion</th>
                        <th>Solicitud</th>
                        <th>Tecnico Asignado</th>
                        <th >Fecha y Hora Inicio</th>
                        <th>Fecha y Hora Fin</th>
                        <th>Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($consulta['peticiones'] as $item2)
                        <?php $tecnicos='';
                              $finicio='';
                              $ffinal='';
                              $fasignacion='';
                        ?>
                            @foreach ($consulta['asig_tarea'] as $item)
                                @foreach ($consulta['user'] as $item3)
                                    @if ($item->peticion_idpeticion == $item2->idpeticion and $item->usuario_idUsuario==$item3->id )
                                    <?php $tecnicos=$tecnicos.' - '.$item3->name.' '.$item3->apellidos; 
                                          $finicio=$item->FechaInicio.' - '.substr($item->HoraInicial,0,5);
                                          $ffinal=$item->FechaLimite.' - '.substr($item->HoraLimite,0,5);
                                          $fasignacion=$item->FechaRegistro;
                                    ?>                            
                                    @endif  
                                @endforeach                                                          
                            @endforeach
                            @if ($item2->idestado=='1')
                                <tr>
                                    <td><?php echo $fasignacion ?></td>
                                    <td> <?php echo substr($item2->descripcion,0,30); ?></td>
                                    <td width="300" style="text-transform: capitalize"> <?php echo substr($tecnicos, 2, strlen($tecnicos)); ?></td> 
                                    <td><?php echo $finicio ?></td>
                                    <td><?php echo $ffinal ?></td>
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
                    </tbody>
                </table>
            </div>
        </div>


    <!-- --------- FIN Grafica - - - ------->

</div>

@endsection
