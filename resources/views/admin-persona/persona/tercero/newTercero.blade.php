<!DOCTYPE html>
<html>
<head>
	<title>TERCERO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/jquery.bxslider.css')!!}
	<!-- <link rel="stylesheet" type="text/css" href="css/estilos.css"> -->
	<!-- PARA DATA TABLE -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
	
	<style type="text/css" media="screen">
		#dpd1{
			width:300px;
		}
		#map { height: 20%; }
	</style>

<!--Aqui viene la magia-->

	<style>
		#map-canvas{
			height: 500px;
			width: 500px;
			margin: 0px;
			padding: 0px;
		}
	</style>


<!-- 	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->

</head>
<body>

@extends('layouts.headerandfooter-al-admin-persona')
@section('content')
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
				<br>
				<br>
					<p class="lead"><strong>REGISTRAR TERCERO</strong></p>
			  	</div>
				</div>
			</div>	
		</div>


		<div class="container">
			<form method="POST" action="/tercero/new/tercero" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				<!-- VALIDACION CON FE INICIO -->
				<div class="col-sm-4"></div>
				<div class="">
		  			@if ($errors->any())
		  				<ul class="alert alert-danger fade in">
		  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  					@foreach ($errors->all() as $error)
		  						<li>{{$error}}</li>
		  					@endforeach
		  				</ul>
		  			@endif
			  		
				</div>

				<div class="row">
					<div class="col-sm-12 text-center">
						<div role="tabpanel">
							<ul class="nav nav-pills nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Paso 1: Datos Básicos</a></li>
							</ul>
						</div>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="seccion1">	
									<br>
										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
									<br>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nombre:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="nombre" name="nombre" placeholder="Nombre" style="max-width: 250px" value="{{old('nombre')}}"  >
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Paterno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="ap_paterno" name="ap_paterno" placeholder="Apellido Paterno" style="max-width: 250px" value="{{old('ap_paterno')}}">
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Materno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="ap_materno" name="ap_materno" placeholder="Apellido Materno" style="max-width: 250px" value="{{old('ap_materno')}}">
											</div>	
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Sexo:</label>
											</div>
											<div class="col-sm-6 text-left" style="float: right">											
													<div>
														{{ Form::radio('sexo', 'masculino', 'selected') }}Masculino
													</div>
													<div>
														{{ Form::radio('sexo', 'femenino'   ) }}Femenino
													</div>
											</div>	
										</div>
									</div>

									
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Fecha de Nacimiento:</label>
											</div>
											<div class="col-sm-1">
												<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha Nacimiento" style="width: 250px" value="{{old('fecha_nacimiento')}}">

											</div>	
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nacionalidad:</label>
											</div>
											<div class="col-sm-6 text-left" >
													<input checked onchange="document.getElementById('doc_identidad').disabled = false; document.getElementById('carnet_extranjeria').disabled = true;" onclick=" document.getElementById('carnet_extranjeria').value = '';" type="radio" name="nacionalidad" value="peruano" {{ (old('nacionalidad') == "peruano") ? 'checked="true"' : '' }}/>peruano&nbsp&nbsp&nbsp
													<input onchange="document.getElementById('carnet_extranjeria').disabled = false; document.getElementById('doc_identidad').disabled = true;" onclick=" document.getElementById('doc_identidad').value = ''; " type="radio" name="nacionalidad" value="extranjero" {{ (old('nacionalidad') == "extranjero") ? 'checked="true"' : '' }}/>Extranjero

											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">DNI:</label>
											</div>
											<div class="col-sm-6">
											<!--Se hace validacion para que acepte solo numeros pero que sea un texto-->
												<input  type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="doc_identidad" name="doc_identidad" placeholder="DNI" maxlength="8" style="max-width: 250px" value="{{old('doc_identidad')}}" {{ (old('nacionalidad') == "extranjero") ? 'disabled="true"' : '' }}  >
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Carnet de extranjeria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="carnet_extranjeria" name="carnet_extranjeria" placeholder="Carnet de Extranjeria" maxlength="12" style="max-width: 250px" value="{{old('carnet_extranjeria')}}" {{ (old('nacionalidad') == "peruano") ? 'disabled="true"' : '' }}  {{ (old('nacionalidad') == "") ? 'disabled="true"' : '' }} >
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Correo contacto:</label>

											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="correo"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')" name="correo" placeholder="correo" style="max-width:250pc" value="{{old('correo')}}" >
											</div>
										</div>
									</div>
									
									<div class="form-group required" >
										<div class="btn-group col-sm-5" ></div>
										
										<div class="btn-group">
											<input class="btn btn-primary "  type="submit" value="Confirmar">
										</div>
										<div class="btn-group">
											<a href="/tercero/index" class="btn btn-info">Cancelar</a>
										</div>
									</div>
								<br>

							</div>

						</div>
					</div>
					
				</div>
			</form>
			
<!-- 			  	<div class="btn-inline">
					<div class="btn-group col-sm-5"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary "  type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/trabajador/search" class="btn btn-info">Cancelar</a>
					</div>
				</div> -->
		</div>
			

@stop

<!-- 	<script src="../js/jquery-1.12.4.min.js"></script> -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<!-- BXSlider -->

	<!-- Mis Scripts -->

	{!!Html::script('js/bootstrap-datepicker.js')!!}

	
	
	<script>
		$(document).ready(function(){
			$(function(){
				$('.datepicker').datepicker({
					format: "dd/mm/yyyy",
			        language: "es",
			        autoclose: true,
    				
			        //beforeShowDay:function (date){return false}
				});

			});

		});
		$('.datepicker').on('changeDate', function(ev){
			    $(this).datepicker('hide');
		});
			
	</script>	
	<script>

		var nowDate = new Date();
		var maxDate = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

		$(function(){
			$('#fecha_nacimiento').datepicker({
				format: "dd/mm/yyyy",
		        language: 'es',
			    autoclose: true,
			    endDate:maxDate
		        	//autoclose: true
		        //beforeShowDay:function (date){return false}
			});
			//$('.datepicker').on('changeDate', function(ev){
			//    $(this).datepicker('hide');
			//});
		});


		
	</script>

</body>
</html>
