@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="">

				  
				<div class="row">
					<div class="">

						<div id="app">
							<div class="">
								<!--   <div class="register-logo">
									<a href="{{ url('/home') }}"><b>Help</b>Desk</a>
								</div> -->

								@if (count($errors) > 0)
									<div class="alert alert-danger">
										<strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif

								<div class="register-box-body"  >
									<p> <h3 id="prueba">Registre una nueva Peticion</h3></p>
									<hr>
									<form action="" method="">
										
										<div class="row">
											<div class="col-md-4">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" placeholder="Nombres" name="name" value=" "/>
													<span class="glyphicon glyphicon-user form-control-feedback"></span>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value=""/>
													<span class="glyphicon glyphicon-user form-control-feedback"></span>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" placeholder="Cédula" name="cedula" value=""/>
													<span class="glyphicon glyphicon-user form-control-feedback"></span>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-4">
												<div class="form-group has-feedback">
													<input type="text" class="form-control" placeholder="Celular" name="celular" value=""/>
													<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
												</div>
												
											</div>
											<div class="col-md-4">
												<div class="form-group has-feedback">
													<select class="form-control" id="sexo" name="sexo" >
														<option disabled selected>Sexo</option>
														<option>Femenino</option>
														<option>Masculino</option>
														<option>Indefinido</option>
													</select>
													<!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group has-feedback">
													<select class="form-control" id="estado" name="estado" >
														<option disabled selected>Estado</option>
														<option value="1">Activo</option>
														<option value="2">Inactivo</option>
													</select>
														
												<!--    <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
												</div>
											</div>
										</div>
																			
										<div class="row">
												
												<div class="col-md-1">
													<div class="form-group">
														<button id="btnMostrar1" type="button" class="btn btn-block btn-flat">Ver </button>
													</div>
												</div><!-- /.col -->
												<div class="col-md-8">
													<button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
												</div><!-- /.col -->
												
										</div>


									</form>

								

									@include('adminlte::auth.partials.social_login')

									<!-- <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a> -->
								</div><!-- /.form-box -->
							</div><!-- /.register-box -->
								<br>

								<!-- TABLA DE LISTA DE USUARIOS -->
								<div class="panel panel-default">

									<div class="panel-heading">

										<div class= "row">

											<div class="col-md-11">
												Home
											</div>
											
										</div>
										
									</div>

									<div class="panel-body">
										
										<div class="table-responsive">  

										<table class="table">
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
											<tbody id ="dgvPeticiones">
												
											</tbody>
										</table>
										</div>
									</div>

								</div>

								
						</div>


						

						@include('adminlte::auth.terms')

						
					</div>
				</div>


				
			</div>
		</div>
	</div>
	<script src="{{ asset('js/GestionPeticiones.js') }}" defer></script>
@endsection