<!DOCTYPE html>
<html>
<head>
	<title>POSTULANTE</title>
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
		#map {
			width: 600px;
        	height: 450px;
		}
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

<!-- <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuOs_TsnqNatCMf__4y1fSoQi0-L-soHM&libraries=places"></script>  -->

</head>
<body>

@extends('layouts.headerandfooter-al-admin-persona')
@section('content')

		<br>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
					<p class="lead"><strong>REGISTRAR POSTULANTE</strong></p>
					<p style="color:red" >Para guardar al postulante debe completar todos los pasos de inscripción</p>
				</div>
			</div>	
		</div>

		<div class="container">
			<form method="POST" action="{{url('/familiares-habilitados/'.$persona->id.'/store')}}" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

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
								<li role="presentation"><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Paso 2: Nacimiento</a></li>
								<li role="presentation"><a href="#seccion4" aria-controls="seccion4" data-toggle="tab" role="tab">Paso 3: Vivienda</a></li>
								<li role="presentation"><a href="#seccion5" aria-controls="seccion5" data-toggle="tab" role="tab">Paso 4: Estudio</a></li>
								<li role="presentation"><a href="#seccion6" aria-controls="seccion6" data-toggle="tab" role="tab">Paso 5: Trabajo</a></li>
								<li role="presentation"><a href="#seccion7" aria-controls="seccion7" data-toggle="tab" role="tab">Paso 6: Contactos</a></li> 
							</ul>
						</div>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="seccion1">
								<form action="" class="form-horizontal form-border">
									<br>
										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
									<br>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nombre:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="nombre" name="nombre" onkeypress="return inputLimiter(event,'Letters')" placeholder="Nombre" style="max-width: 250px" value="{{$persona->nombre}}" readonly>
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Paterno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="ap_paterno" name="ap_paterno" onkeypress="return inputLimiter(event,'Letters')" placeholder="Apellido Paterno" style="max-width: 250px" value="{{$persona->ap_paterno}}" readonly>
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Materno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="ap_materno" name="ap_materno" onkeypress="return inputLimiter(event,'Letters')" placeholder="Apellido Materno" style="max-width: 250px" value="{{$persona->ap_materno}}" readonly>
											</div>	
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Sexo:</label>
											</div>
											<div class="col-sm-6 text-left" style="float: right">											
												@if($persona->sexo=='masculino')
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
									

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nacionalidad:</label>
											</div>
											<div class="col-sm-6 text-left" >
												
												<input onchange="es_peruano()" type="radio" name="nacionalidad" value="peruano" {{ (old('nacionalidad') == "peruano") ? 'checked="true"' : ''}} {{($persona->nacionalidad == "peruano") ? 'checked="true"':''}} disabled />peruano&nbsp&nbsp&nbsp
												
												<input onchange="es_extranjero()" type="radio" name="nacionalidad" value="extranjero" {{ (old('nacionalidad') == "extranjero") ? 'checked="true"' : ''  }} {{($persona->nacionalidad == "extranjero") ? 'checked="true"':''}} disabled />Extranjero

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
													<input  type="text" onkeypress="return inputLimiter(event,'Numbers')"fape  @if ($persona->nacionalidad!="peruano") disabled  @endif  class="form-control" id="doc_identidad" name="doc_identidad" placeholder="DNI" maxlength="8" style="max-width: 250px" value="{{$persona->doc_identidad}}" value="{{old('doc_identidad')}}"  readonly>
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">	
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Carnet de extranjeria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" onkeypress="return inputLimiter(event,'Numbers')" @if ($persona->nacionalidad!="extranjero") disabled  @endif class="form-control" id="carnet_extranjeria" name="carnet_extranjeria" placeholder="Carnet de Extranjeria" maxlength="12" style="max-width: 250px" value="{{$persona->carnet_extranjeria}}" value="{{old('carnet_extranjeria')}}" readonly>
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Estado Civil:</label>
											</div>
											<div class="col-sm-6">
												<select class="form-control" id="estado_civil" name="estado_civil" style="width: 250px " >
													<option value="-1" default>Seleccione</option>
														@foreach ($estadocivil as $estado)      
										                	<option value="{{$estado->id}}" @if (old('estado_civil') == $estado->id) selected="selected" @endif >{{$estado->valor}}</option>
										                @endforeach
												</select>
											</div>
										</div>
									</div>
								</form>

							</div>

							<div role="tabpanel" class="tab-pane" id="seccion2">
								<br>

										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
								<br>


								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">&nbspFecha de Nacimiento</label>
											</div>
											<div class="col-sm-6">
												<input style="width: 250px" class="datepicker" type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha Nacimiento" readonly="true" value="{{$persona->fecha_nacimiento}}" disabled>
											</div>	
										</div>
								</div>

									<div class="text-left" style="margin-left: 1cm; color:red">
											<label for="" class="control-label">(*) Llenar los combos solo si es peruano</label>
									</div><br>

									@if($persona->nacionalidad=='peruano')
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Lugar de Nacimiento:</label>
											</div>
											<div class="col-sm-6">
												<select class="form-control" id="departamento" name="departamento" style="max-width: 250px " data-link="{{ url('/provincias') }}">
													<option value="-1" default>--Departamento--</option>
														@foreach ($departamentos as $depa)      
										                	<option value="{{$depa->id}}"   >{{$depa->nombre}}</option>
										                @endforeach
												</select>
												
												<br>
												<select class="form-control" id="provincia" name="provincia" style="max-width: 250px " data-link="{{ url('/distritos') }}" disabled="true">
													<option  value="-1" default disab>--Provincia--</option>
												</select>
												<br>
												<select class="form-control" id="distrito" name="distrito" style="max-width: 250px " disabled="true">
													<option  value="-1" default>--Distrito--</option>
												</select>
											</div>	
										</div>
									</div>
									
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Direccion de Nacimiento:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="direccion_nacimiento" name="direccion_nacimiento" placeholder="direccion Nacimiento" style="max-width: 250px" value="{{old('direccion_nacimiento')}}">
											</div>		
										</div>
									</div>
									@else

									<div class="text-left" style="margin-left: 1cm; color:red">
											<label for="" class="control-label">(*) Llenar los combos solo si es extranjero</label>
									</div><br>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Pais de Nacimiento:</label>
											</div>
											<div class="col-sm-6">
												<input   type="text" class="form-control" id="pais_nacimiento" name="pais_nacimiento" placeholder="Pais de Nacimiento" style="max-width: 250px" value="{{old('pais_nacimiento')}}">
											</div>		
										</div>
									</div>
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Ciudad de Nacimiento:</label>
											</div>
											<div class="col-sm-6">
												<input  type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Ciudad de Nacimiento" style="max-width: 250px" value="{{old('lugar_nacimiento')}}">
											</div>		
										</div>
									</div>
									@endif

							</div>

							

							<div role="tabpanel" class="tab-pane" id="seccion4">
								<br>
										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
								<br>

								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Lugar de vivienda</label>
											</div>
											<div class="col-sm-6">
													<select class="form-control" id="departamento_vivienda" name="departamento_vivienda" style="max-width: 250px " data-link="{{ url('/provincias_vivienda') }}">
														<option value="-1" default>--Departamento--</option>
															@foreach ($departamentos as $depavivienda)      
											                	<option value="{{$depavivienda->id}}"   >{{$depavivienda->nombre}}</option>
											                @endforeach
													</select>
													
													<br>
													<select class="form-control" id="provincia_vivienda" name="provincia_vivienda" style="max-width: 250px " data-link="{{ url('/distritos_vivienda') }}" disabled="true">
														<option  value="-1" default disab>--Provincia--</option>
													</select>
													<br>
													<select class="form-control" id="distrito_vivienda" name="distrito_vivienda" style="max-width: 250px " disabled="true">
														<option  value="-1" default>--Distrito--</option>
													</select>
											</div>

										</div>
								</div>

								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Direccion Vivienda</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Direccion Laboral" style="max-width: 250px" value="{{old('domicilio')}}">
										</div>		
									</div>
								</div>

								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Referencia Vivienda</label>
										</div>
										<div class="col-sm-6">
											<textarea rows="4" cols="50" id="referencia_vivienda" name="referencia_vivienda" placeholder="Referencia" style="max-width: 820px; max-height: 300px;">{{old('referencia_vivienda')}}</textarea>
										</div>		
									</div>
								</div>						

							</div> 


							<div role="tabpanel" class="tab-pane" id="seccion5">

							<br>
										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
							<br>
								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Educacion Primaria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="colegio_primario" name="colegio_primario" placeholder="Educacion Primario" style="max-width: 250px" value="{{old('colegio_primario')}}">
											</div>		
										</div>
								</div>
								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Educacion secundaria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="colegio_secundario" name="colegio_secundario" placeholder="Educacion Secundario" style="max-width: 250px" value="{{old('colegio_secundario')}}">
											</div>		
										</div>
								</div>
								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Universidad:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="universidad" name="universidad" placeholder="Universidad" style="max-width: 250px" value="{{old('universidad')}}">
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Profesion:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="profesion" name="profesion" placeholder="Profesion" style="max-width: 250px" value="{{old('profesion')}}">
											</div>		
										</div>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="seccion6">
								<br>
										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
								<br>
								

								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Centro de Trabajo:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="centro_trabajo" name="centro_trabajo" placeholder="Centro de Trabajo" style="max-width: 250px" value="{{old('centro_trabajo')}}">
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Cargo de Trabajo:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="cargo_trabajo" name="cargo_trabajo" placeholder="Cargo de Trabajo" style="max-width: 250px" value="{{old('cargo_trabajo')}}">
											</div>		
										</div>
								</div>

								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Direccion Laboral</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="direccion_laboral" name="direccion_laboral" placeholder="Direccion Laboral" style="max-width: 250px" value="{{old('direccion_laboral')}}">
											</div>		
										</div>
								</div>
								
							
							</div>

							<div role="tabpanel" class="tab-pane" id="seccion7">
								<br>
										<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
								<br>
								

								<div class="form-group ">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Telefono Fijo:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" onkeypress="return inputLimiter(event,'Numbers')" maxlength="7" id="telefono_domicilio" name="telefono_domicilio" placeholder="Telefono fijo" style="max-width: 250px" value="{{old('telefono_domicilio')}}">
											</div>		
										</div>
								</div>

								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Telefono Celular:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" onkeypress="return inputLimiter(event,'Numbers')" maxlength="9" id="telefono_celular" name="telefono_celular" placeholder="Telefono celular" style="max-width: 250px" value="{{old('telefono_celular')}}">
											</div>		
										</div>
								</div>

								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Correo:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" style="max-width: 250px" value="{{$persona->correo}}" readonly>
											</div>		
										</div>
								</div>
								
								<hr  width="70%" size="5" noshade>
								<p style="color:red"><b>El registro de familiares se realizara luego de registrar al postulante. En la vista de edicion</b></p>
								<br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-5" ></div>
										
										<div class="btn-group">
											<input class="btn btn-primary "  type="submit" value="Confirmar">
										</div>
										<div class="btn-group">
											<a href="url('/familiares-habilitados')" class="btn btn-info">Cancelar</a>
										</div>
								</div>
							</div>

							


						</div>
					</div>
					
				</div>
			</form>
		</div>


@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}


 	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<script>$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} })</script>
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


    <script type="text/javascript">

	    
		$(document).ready(function(){

			$("#departamento").change(function(event){
				document.getElementById("provincia").disabled = false;
				document.getElementById("distrito").disabled = true;
			    $("#distrito").empty();
			    $("#distrito").append("<option  value='-1' default>--Distrito--</option>");
				var url = $(this).attr("data-link");
				$departamento_id=event.target.value;
							//alert($departamento_id);
				//alert(url);
				$.ajax({
			        url: "provincias",
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $departamento_id},
			        success:function(data){
			        	$("#provincia").empty();
			        	$("#provincia").append("<option  value='-1' default>--Provincia--</option>");
			        	$.each(data,function(index,elememt){
			        		
			        		$("#provincia").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			           		 console.log("mensaje que quieras");

			        	});
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});


			$("#provincia").change(function(event){
				document.getElementById("distrito").disabled = false;
				var url = $(this).attr("data-link");
				$provincia_id=event.target.value;
							//alert($provincia_id);
				//alert(url);
				//alert($provincia_id);
				$.ajax({
			        url: "distritos",
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $provincia_id},
			        success:function(data){
			        	$("#distrito").empty();
			        	$("#distrito").append("<option  value='-1' default>--Distrito--</option>");
			        	$.each(data,function(index,elememt){

							//alert(elememt.id);
			        		//alert(element.nombre);
			        		$("#distrito").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			        	});
			            //alert(data);
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});


			$("#try").click(function(){
			    var url = $(this).attr("data-link");
			    //alert(url);
			    $.ajax({
			        url: "test",
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { testdata : 'testdatacontent' },
			        success:function(data){
			            alert(data);
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});

		});


	</script>

	    <script type="text/javascript">

	    /*listas para obtener la vivienda*/
		$(document).ready(function(){

			$("#departamento_vivienda").change(function(event){
				document.getElementById("provincia_vivienda").disabled = false;
				document.getElementById("distrito_vivienda").disabled = true;
			    $("#distrito_vivienda").empty();
			    $("#distrito_vivienda").append("<option  value='-1' default>--Distrito--</option>");
				var url = $(this).attr("data-link");
				$departamento_id=event.target.value;
				//alert($departamento_id);
				//alert(url);
				$.ajax({
			        url: "provincias_vivienda",
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $departamento_id},
			        success:function(data){
			        	$("#provincia_vivienda").empty();
			        	$("#provincia_vivienda").append("<option  value='-1' default>--Provincia--</option>");
			        	$.each(data,function(index,elememt){
			        		
			        		$("#provincia_vivienda").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			           		 console.log("mensaje que quieras");

			        	});
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});


			$("#provincia_vivienda").change(function(event){
				document.getElementById("distrito_vivienda").disabled = false;
				var url = $(this).attr("data-link");
				$provincia_id=event.target.value;
				//alert($provincia_id);
				//alert(url);
				//alert($provincia_id);
				$.ajax({
			        url: "distritos_vivienda",//esta es la cadena que debe ir en el route /postulante/distritos_vivienda
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $provincia_id},
			        success:function(data){
			        	$("#distrito_vivienda").empty();
			        	$("#distrito_vivienda").append("<option  value='-1' default>--Distrito--</option>");
			        	$.each(data,function(index,elememt){

							//alert(elememt.id);
			        		//alert(element.nombre);
			        		$("#distrito_vivienda").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			        	});
			            //alert(data);
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});

		});


	</script>

	<script>
		//Script en el caso en que se seleccione el combo peruano

		function seleccionaperuano() {
	    	document.getElementById('departamento').disabled = false;
	    	document.getElementById('doc_identidad').disabled = false;
	    	document.getElementById('direccion_nacimiento').disabled = false;
	    	document.getElementById('carnet_extranjeria').disabled = true;
	    	document.getElementById('pais_nacimiento').disabled = true;
	    	document.getElementById('lugar_nacimiento').disabled = true;
	    	//antes onclick
			document.getElementById('carnet_extranjeria').value = '';	
			document.getElementById('pais_nacimiento').value = '';	
			document.getElementById('lugar_nacimiento').value = '';	
		}

		function seleccionaExtranjero(){
	    	document.getElementById('departamento').disabled = true;
	    	document.getElementById('carnet_extranjeria').disabled = false;
	    	document.getElementById('direccion_nacimiento').disabled = true;
	    	document.getElementById('doc_identidad').disabled = true;
	    	document.getElementById('pais_nacimiento').disabled = false;
	    	document.getElementById('lugar_nacimiento').disabled = false;
	    	//antes onclick
	    	document.getElementById('doc_identidad').value = ''; 
	    	document.getElementById('direccion_nacimiento').value = ''; 
		}
	</script>

	</body>
</html>
