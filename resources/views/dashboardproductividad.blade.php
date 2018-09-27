@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="small-box bg-teal-gradient">
				<div id="ntotal" class="inner">
					<center>
						<h2 style="font-size: 3em;"><strong>15</strong></h3>     
						<p>Equipo Tecnico</p>  
					</center>         
				</div>            
				<div class="icon">
					
					<i class="fa fa-user" style="padding-right: 50px;"></i>
				</div>
				<br>
		</div>

		<div class="box box-primary collapsed-box">
			<div class="box-header with-border">
			
			
				<h3 class="box-title">Donut Chart</h3>
	
				<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				</div>
			</div>
			<div class="box-body">
				<div class="chart" id="sales-chart" style="height: 250px; position: relative;">
				
				</div>
			</div>
				<!-- /.box-body -->
			</div>
		
			  <!-- /.box -->

	
	</div>
	

@endsection
