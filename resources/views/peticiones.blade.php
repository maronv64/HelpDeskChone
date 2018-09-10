@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>

					<div class="panel-body">
						 
						 <table id="dgvPeticiones" class="table table-condensed">
							<thead>
								<tr>
									<th>Descripcion</th>
									<th>Tipo de Peticion</th>
									<th>Prioridad</th>
									<th>Estado</th>
									<th>Usuario</th>
									<th>Area</th>
									
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection