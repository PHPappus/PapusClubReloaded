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

		<style>

		.modal-backdrop.in{
			z-index: 1;
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
					<p class="lead"><strong>REGISTRAR CUENTA</strong></p>
			  	</div>
				</div>
			</div>	
		</div>


		<div class="container">
			<form method="POST" action="/trabajador/{{ $trabajador->id }}/edit" class="form-horizontal form-border">
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
								<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Datos Básicos</a></li>
								<li role="presentation"><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Contrato</a></li>
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
												<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="nombre" name="nombre" placeholder="Nombre" style="max-width: 250px" value="{{$persona->nombre}}" value="{{old('nombre')}}"  >
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Paterno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="ap_paterno" name="ap_paterno" placeholder="Apellido Paterno" style="max-width: 250px" value="{{$persona->ap_paterno}}" value="{{old('ap_paterno')}}">
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Materno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="ap_materno" name="ap_materno" placeholder="Apellido Materno" style="max-width: 250px" value="{{$persona->ap_materno}}" value="{{old('ap_materno')}}">
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
														
															{{ Form::radio('sexo', 'masculino', (($persona['sexo']=="masculino" )? true : false)) }}Masculino
															</div>
															<div>
															{{ Form::radio('sexo', 'femenino', (($persona['sexo']=="femenino" )? true : false)) }}Femenino
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
												<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecha_nacimiento" placeholder="Fecha Nacimiento" style="max-width: 250px" value="{{$persona->fecha_nacimiento}}" value="{{old('fecha_nacimiento')}}">

											</div>	
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nacionalidad:</label>
											</div>
											<div class="col-sm-6 text-left" >
													<input checked onchange="document.getElementById('doc_identidad').disabled = false; document.getElementById('carnet_extranjeria').disabled = true;" onclick=" document.getElementById('carnet_extranjeria').value = '';" type="radio" name="nacionalidad" value="peruano" {{ (old('nacionalidad') == "Peruano") ? 'checked="true"' : '' }}/>Peruano&nbsp&nbsp&nbsp
													<input onchange="document.getElementById('carnet_extranjeria').disabled = false; document.getElementById('doc_identidad').disabled = true;" onclick=" document.getElementById('doc_identidad').value = ''; " type="radio" name="nacionalidad" value="extranjero" {{ (old('nacionalidad') == "Extranjero") ? 'checked="true"' : '' }}/>Extranjero

<!-- 													<input onchange ="document.getElementById('doc_identidad').disabled = false; document.getElementById('carnet_extranjeria').disabled = true; document.getElementById('carnet_extranjeria').value = ''; document.getElementById('doc_identidad').required = true; document.getElementById('carnet_extranjeria').required = false;" type="radio" name="nacionalidad" value="Peruano" @{{$nacionalidad=peruano}} @if(old('nacionalidad')=="Peruano") checked @endif> Peruano  
													<input onchange="document.getElementById('carnet_extranjeria').disabled = false; document.getElementById('doc_identidad').disabled = true; document.getElementById('doc_identidad').value = '';  document.getElementById('doc_identidad').required = false; document.getElementById('carnet_extranjeria').required = true;" type="radio" name="nacionalidad" value="Extranjero" style="margin-left: 50px;"@{{$nacionalidad=extranjero}} @if(old('nacionalidad')=="Extranjero") checked @endif> Extranjero	 -->
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
												<input  type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="doc_identidad" name="doc_identidad" placeholder="DNI" maxlength="8" style="max-width: 250px" value="{{$persona->doc_identidad}}" value="{{old('doc_identidad')}}"  >
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Carnet de extranjeria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="carnet_extranjeria" name="carnet_extranjeria" placeholder="Carnet de Extranjeria" maxlength="12" style="max-width: 250px" value="{{$persona->carnet_extranjeria}}" value="{{old('carnet_extranjeria')}}"  >
											</div>	
										</div>
									</div>

							</div>

							<div role="tabpanel" class="tab-pane" id="seccion2">
									<br>
									<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
									<br>									
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Puesto:</label>
											</div>
											<div class="col-sm-6">
												<select class="form-control" id="puestoSelect" name="puestoSelect" style="max-width: 150px "   >
													<option value="-1" default>Seleccione</option>
														@foreach ($puestoslaborales as $variablePuesto)      
										                	<option value="{{$variablePuesto->id}} @if($puesto->id==$variablePuesto->id) selected @endif >{{$variablePuesto->valor}}</option>
										                @endforeach
												</select>
											</div>
										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Fecha inicio de Contrato:</label>

											</div>
											<div class="col-sm-6">
												<input class="datepicker" onkeypress="return inputLimiter(event,'Nulo')" type="text" id="dpd1" name="fecha_ini_contrato" placeholder="Fecha de inicio" style="max-width: 250px" value="{{$persona->fecha_ini_contrato}}" value="{{old('fecha_ini_contrato')}}">
											</div>	
										</div>
									</div>


									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Fecha fin de Contrato:</label>

											</div>
											<div class="col-sm-6">
												<input class="datepicker" onkeypress="return inputLimiter(event,'Nulo')" type="text" id="dpd1" name="fecha_fin_contrato" placeholder="Fecha de fin" style="max-width: 250px" value="{{$persona->fecha_fin_contrato}}" value="{{old('fecha_fin_contrato')}}">
											</div>
										</div>
									</div>
								

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Correo contacto:</label>

											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="correo"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')" name="correo" placeholder="correo" style="max-width: 250pc; margin-top:0px;" value="{{$persona->correo}}" value="{{old('correo')}}">
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

					<div class="btn-group ">
						<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmation" onclick="ventana()" value="Aceptar">
					</div>
					<div class="btn-group">
						<a href="/trabajador/index" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				<br>

				
				<!-- Ventana modal de Confirmación -->			  	
				<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" data-backdrop="static">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<!-- Header de la ventana -->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="cerrarventana()">&times;</span></button>
								<h4 class="modal-title">EDITAR TRABAJADOR</h4>
							</div>
							<!-- Contenido de la ventana -->
							<div class="modal-body">
								<p>¿Desea guardar los cambios realizados?</p>
							</div>
							<div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cancelar</button>
						        <button type="submit" class="btn btn-primary">Confirmar</button>
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


	<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>


	<script type="text/javascript">
		//var disabled_dates = ["23.03.2016","21.03.2016"];
		$(function(){
			$('.datepicker').datepicker({
				format: 'dd/mm/yyyy',				
				autoclose:true,
				startDate: '-3d',
				beforeShowDay:function($date){
					return false;
				}
			});
		});
		
	</script>



</body>
</html>


<!-- 	<script>
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
 -->
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