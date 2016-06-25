<!DOCTYPE html>
<html>
<head>
	<title>INVITADO</title>
	<meta charset="UTF-8">

	<meta name="csrf-token" content="{{ csrf_token() }}">
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
	</style>
</head>
<body>

@extends('layouts.headerandfooter-al-admin')
@section('content')

	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<p class="lead"><strong>DETALLE DE FAMILIAR</strong></p>
			</div>
		</div>	
	</div>
	<br>

	<div class="container">
		<form  action="#" class="form-horizontal form-border">



			<div class="row">
				<div class="col-sm-12 text-center">
					<div role="tabpanel">
						<ul class="nav nav-pills nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Datos Básicos</a></li>
						</ul>
					</div>

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="seccion1">
							<form action="" class="form-horizontal form-border">
	
								<br><br><br>
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Relacion:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" style="max-width: 250px" value="{{$relacion}}" readonly="true">
										</div>	
									</div>
								</div>
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Nombre:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" style="max-width: 250px" value="{{$familiar->nombre}}" readonly="true">
										</div>	
									</div>
								</div>

								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Paterno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="ap_paterno" name="ap_paterno" placeholder="Apellido Paterno" style="max-width: 250px" value="{{$familiar->ap_paterno}}" readonly="true">
										</div>	
									</div>
								</div>

								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Materno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="ap_materno" name="ap_materno" placeholder="Apellido Materno" style="max-width: 250px" value="{{$familiar->ap_materno}}" readonly="true">
										</div>	
									</div>
								</div>

								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Sexo:</label>
										</div>
										<div class="col-sm-6 text-left" style="float: right">	

											@if($familiar->sexo=='masculino')
												<div>
													<input type="radio" name="genero" value="Masculino" disabled checked> Masculino
												</div>
												<div>
													<input type="radio" name="genero" value="Femenino" disabled> Femenino
												</div>
											
											@else
												<div>
													<input type="radio" name="genero" value="Masculino" disabled> Masculino
												</div>
												<div>
													<input type="radio" name="genero" value="Femenino" disabled checked> Femenino
												</div>											
											@endif
										</div>	
									</div>
								</div>
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Fecha de Nacimiento(dd/mm/aaaa):</label>
										</div>
										<div class="col-sm-6">
											<input style="width: 250px" class="datepicker" type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha Nacimiento" readonly="true" value="{{$familiar->fecha_nacimiento}}" disabled="true">
										</div>	
									</div>
								</div>								
								@if($familiar->nacionalidad=='peruano')
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nacionalidad:</label>
											</div>
											<div class="col-sm-6 text-left" >
													<input  type="radio" name="nacionalidad" value="peruano"  @{{$nac=per}} checked disabled> peruano  
													<input  type="radio" name="nacionalidad" value="Extranjero" style="margin-left: 50px;"@{{$nac=otro}} disabled> Extranjero	
											</div>	
										</div>
									</div>
									<!--Debe ir un if si es extranjero-->																
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">DNI:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control inputmodify" id="docidentity" placeholder="#######" style="max-width: 250px" value="{{$familiar->doc_identidad}}"disabled>
											</div>	
										</div>
									</div>
								@else
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nacionalidad:</label>
											</div>
											<div class="col-sm-6 text-left" >
													<input  type="radio" name="nacionalidad" value="peruano"  @{{$nac=per}}  disabled> peruano  
													<input  type="radio" name="nacionalidad" value="Extranjero" style="margin-left: 50px;"@{{$nac=otro}} checked disabled> Extranjero	
											</div>	
										</div>
									</div>
									<!--Debe ir un if si es extranjero-->																
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Carnet de Extranjería:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control inputmodify" id="docidentity" placeholder="#######" style="max-width: 250px" value="{{$familiar->carnet_extranjeria}}"disabled>
											</div>	
										</div>
									</div>
								@endif
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Correo:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')" class="form-control" id="correo" name="correo" placeholder="Correo Electrónico" style="max-width: 250px" value="{{$familiar->correo}}" readonly="true" >
										</div>	
									</div>
								</div>
								<br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-5" ></div>
										
										<div class="btn-group">
											<a href="{{url('/postulante/'.$postulante->id.'/show')}}" class="btn btn-info">Regresar</a>
										</div>
								</div>																
							</form>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>


@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}

	{!!Html::script('js/bootstrap-datepicker.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>



	<script>
		function es_peruano(){
			document.getElementById('doc_identidad').disabled = false; 
			document.getElementById('carnet_extranjeria').disabled = true;
			document.getElementById('carnet_extranjeria').value = '';

			//document.getElementById('nacimiento_peruano').style.display="block";
			//ocument.getElementById('nacimiento_extranjero').style.display="none";
		}

		function es_extranjero(){
			document.getElementById('carnet_extranjeria').disabled = false; 
			document.getElementById('doc_identidad').disabled = true; 
			document.getElementById('doc_identidad').value = '';

			//document.getElementById('nacimiento_peruano').style.display="none";
			//document.getElementById('nacimiento_extranjero').style.display="block"; 
		}
	</script>




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



	</body>
</html>
