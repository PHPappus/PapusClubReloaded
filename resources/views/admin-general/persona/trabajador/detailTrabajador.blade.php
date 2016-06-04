<!DOCTYPE html>
<html>
<head>
	<title>POSTULANTE</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
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


	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuOs_TsnqNatCMf__4y1fSoQi0-L-soHM&libraries=places"></script>

</head>
<body>

@extends('layouts.headerandfooter-al-admin')
@section('content')
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
				<br>
				<br>
					<p class="lead"><strong>DETALLE CUENTA</strong></p>
			  	</div>
				</div>
			</div>	
		</div>


		<div class="container">
			<form method="POST" action="/trabajador/{{$persona->id}}/edit" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				

				<div class="row">
					<div class="col-sm-12 text-center">
						<div role="tabpanel">
							<ul class="nav nav-pills nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Datos Básicos</a></li>
								<li role="presentation"><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Contrato</a></li>
							</ul>
						</div>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="seccion1">	
							<br>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nombre:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="nombre" name="nombre" value="{{$persona->nombre}}" readonly  style="max-width: 250px"   >
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Paterno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="{{$persona->ap_paterno}}" readonly style="max-width: 250px" >
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Materno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="ap_materno" name="ap_materno" value="{{$persona->ap_materno}}" readonly style="max-width: 250px" >
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
														
															{{ Form::radio('sexo', 'masculino', (($persona['sexo']=="masculino" )? true : false), ['disabled']) }}Masculino
															</div>
															<div>
															{{ Form::radio('sexo', 'femenino', (($persona['sexo']=="femenino" )? true : false),['disabled']) }}Femenino
													</div>
											</div>	
										</div>
									</div>

									
									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Fecha de Nacimiento:</label>
											</div>
											<div class="col-sm-6">
												<input  type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$persona->fecha_nacimiento}}" readonly style="max-width: 250px">

											</div>	
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nacionalidad:</label>
											</div>
											<div class="col-sm-6 text-left" >
													<input  type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="{{$persona->nacionalidad}}" readonly style="max-width: 250px">	
											</div>	
										</div>
									</div>

									@if($persona['nacionalidad']=="Peruano")
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">DNI:</label>
											</div>
											<div class="col-sm-6">
											<!--Se hace validacion para que acepte solo numeros pero que sea un texto-->
												<input  type="text" class="form-control" id="doc_identidad" name="doc_identidad" value="{{$persona->doc_identidad}}" readonly style="max-width: 250px">
											</div>	
										</div>
									</div>
									@else
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Carnet de extranjeria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="carnet_extranjeria" name="carnet_extranjeria" value="{{$persona->carnet_identidad}}" readonly style="max-width: 250px">
											</div>	
										</div>
									</div>
									@endif
							</div>

							<div role="tabpanel" class="tab-pane" id="seccion2">
									<br>								
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Puesto:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="puesto" name="puesto" value="{{$puesto->valor}}" readonly style="max-width: 250px">
											</div>
										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Fecha inicio de Contrato:</label>

											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="fecha_ini_contrato" name="fecha_ini_contrato" value="@if (empty($trabajador->fecha_ini_contrato)) $trabajador->fecha_ini_contrato @endif" readonly style="max-width: 250px">
											</div>	
										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Fecha fin de Contrato:</label>

											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="fecha_fin_contrato" name="fecha_fin_contrato" value="@if(empty($trabajador->fecha_ini_contrato)) $trabajador->fecha_fin_contrato @endif" readonly style="max-width: 250px">
											</div>
										</div>
									</div>
								

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Correo contacto:</label>

											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="correo"  name="correo" value="{{$persona->correo}}" style="max-width: 250pc; margin-top:0px;" readonly>
											</div>
										</div>
									</div>
							</div>

						</div>
					</div>
					
				</div>
				<br>
				<div class="btn-inline">
					<div class="btn-group col-sm-5"></div>

					<div class="btn-group">
						<a href="/trabajador/index" class="btn btn-info">Regresar</a>
					</div>
				</div>
				<br>
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>







	<script>
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 	
		var checkin = $('#dpd1').datepicker({
  			onRender: function(date) {
    			return date.valueOf() < now.valueOf() ? 'disabled' : '';
  			}
		}).on('changeDate', function(ev) {
  			if (ev.date.valueOf() > checkout.date.valueOf()) {
    			var newDate = new Date(ev.date)
    			newDate.setDate(newDate.getDate() + 1);
    			checkout.setValue(newDate);
  			}
 			checkin.hide();
  			$('#dpd2')[0].focus();
		}).data('datepicker');
		var checkout = $('#dpd2').datepicker({
  			onRender: function(date) {
    			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  			}
		}).on('changeDate', function(ev) {
  			checkout.hide();
		}).data('datepicker');		
		var date = $('#dp1').datepicker({ dateFormat: 'dd-mm-yy' }).val();
	
	</script>
	<script>
		$(function(){
			$('.datepicker').datepicker({
				format: 'dd/mm/yyyy'
			});
		});
	</script>

	<script>
		function ventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 1;
		}
		function cerrarventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 3;
		}
  	</script>

  	<!--<script>
		function inputLimiter(e,allow) {
		    var AllowableCharacters = '';

		    if (allow == 'Letters'){AllowableCharacters=' ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz';}
		    if (allow == 'Numbers'){AllowableCharacters='1234567890';}
		    if (allow == 'NameCharacters'){AllowableCharacters=' ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz-.\'_@';}
		    if (allow == 'NameCharactersAndNumbers'){AllowableCharacters='1234567890 ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz-\'_@';}
		    if (allow == 'Nulo'){AllowableCharacters='';} //sirve para colocarle a las fechas deben ser obligatoriamente ingresadas por el picker

		    var k = document.all?parseInt(e.keyCode): parseInt(e.which);
		    if (k!=13 && k!=8 && k!=0){
		        if ((e.ctrlKey==false) && (e.altKey==false)) {
		        return (AllowableCharacters.indexOf(String.fromCharCode(k))!=-1);
		        } else {
		        return true;
		        }
		    } else {
		        return true;
		    }
		} 
  	</script>-->