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

<!-- <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuOs_TsnqNatCMf__4y1fSoQi0-L-soHM&libraries=places"></script> 


@extends('layouts.headerandfooter-al-admin')
@section('content')

		<br>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
					<p class="lead"><strong>REGISTRAR POSTULANTE</strong></p>
				</div>
			</div>	
		</div>

		<div class="container">
			<form method="POST" action="/postulante/new/postulante" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
				<div class="row">
					<div class="col-sm-12 text-center">
						<div role="tabpanel">
							<ul class="nav nav-pills nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Paso 1: Datos Básicos</a></li>
								<li role="presentation"><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Paso 2: Nacimiento</a></li>
								<li role="presentation"><a href="#seccion3" aria-controls="seccion3" data-toggle="tab" role="tab">Paso 3: Educacion</a></li>
								<li role="presentation"><a href="#seccion4" aria-controls="seccion4" data-toggle="tab" role="tab">Paso 4: Empleo</a></li>
								<li role="presentation"><a href="#seccion5" aria-controls="seccion5" data-toggle="tab" role="tab">Paso 5: Familiares</a></li>
								<li role="presentation"><a href="#seccion6" aria-controls="seccion6" data-toggle="tab" role="tab">Paso 6: Vivienda</a></li>
								<li role="presentation"><a href="#seccion6" aria-controls="seccion7" data-toggle="tab" role="tab">Paso 7: Contactos</a></li>
							</ul>
						</div>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="seccion1">
								<form action="" class="form-horizontal form-border">
									<br><br>
									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nombre:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" style="max-width: 250px" required>
											</div>	
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Paterno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="ap_paterno" name="ap_paterno" placeholder="Apellido Paterno" style="max-width: 250px" required>
											</div>	
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Materno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="ap_materno" name="ap_materno" placeholder="Apellido Materno" style="max-width: 250px" required>
											</div>	
										</div>
									</div>

									

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nacionalidad:</label>
											</div>
											<div class="col-sm-6 text-left" >
													<input onclick="document.getElementById('doc_identidad').disabled = false; document.getElementById('carnet_extranjeria').disabled = true; document.getElementById('carnet_extranjeria').value = '';" type="radio" name="nacionalidad" value="Peruano" checked> Peruano
													<input onclick="document.getElementById('carnet_extranjeria').disabled = false; document.getElementById('doc_identidad').disabled = true; document.getElementById('doc_identidad').value = '';" type="radio" name="nacionalidad" value="Extranjero" style="margin-left: 50px;"> Extranjero	
											</div>	
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">DNI:</label>
											</div>
											<div class="col-sm-6">
											<!--Se hace validacion para que acepte solo numeros pero que sea un texto-->
												<input  type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" id="doc_identidad" name="doc_identidad" placeholder="DNI" maxlength="8" style="max-width: 250px" required>
											</div>	
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Carnet de extranjeria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" disabled="true" class="form-control" id="carnet_extranjeria" name="carnet_extranjeria" placeholder="Carnet de Extranjeria" maxlength="12" style="max-width: 250px" required>
											</div>	
										</div>
									</div>

								</form>

							</div>

							<div role="tabpanel" class="tab-pane" id="seccion2">
								<br>
								<br>
								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Direccion de Nacimiento:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="direccion_nacimiento" name="direccion_nacimiento" placeholder="direccion Nacimiento" style="max-width: 250px">
											</div>		
										</div>
								</div>


								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Fecha de Nacimiento</label>
											</div>
											<div class="col-sm-6">
												<input class="datepicker" type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha Nacimiento" style="max-width: 250px">

											</div>	
										</div>
								</div>

								<form method="POST" action="api/repairdropdown">
									<div class="form-group">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Fecha de Nacimiento:</label>
												</div>
													<div class="col-sm-6">
														
														<select form="form_id" class="form-control" id="departamento" name="departamento" style="max-width: 150px " data-link="{{ url('/provincias') }}">
															<option value="-1" default>--Seleccione--</option>
																@foreach ($departamentos as $depa)      
												                	<option value="{{$depa->id}}">{{$depa->nombre}}</option>
												                @endforeach
														</select>
														
														<br>
														<select form="form_id" class="form-control" id="provincia" name="provincia" style="max-width: 150px " data-link="{{ url('/distritos') }}" disabled="true">
															<option  value="-1" default disab>--Seleccione--</option>
														</select>
														<br>
														<select form="form_id" class="form-control" id="distrito" name="distrito" style="max-width: 150px " disabled="true">
															<option  value="-1" default>--Seleccione--</option>
														</select>

														<br><br>
														<a href="#" id="try" data-link="{{ url('/test') }}">Try</a>
													</div>	
											</div>
									</div>
								</form>

							</div>

							<div role="tabpanel" class="tab-pane" id="seccion3">
							<br>
							<br>
								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Educacion Primaria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="educacion_primaria" name="educacion_primaria" placeholder="Educacion Primaria" style="max-width: 250px">
											</div>		
										</div>
								</div>
								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Educacion secundaria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="educacion_secundaria" name="educacion_secundaria" placeholder="Educacion Secundaria" style="max-width: 250px">
											</div>		
										</div>
								</div>
								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Universidad:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="universidad" name="universidad" placeholder="Universidad" style="max-width: 250px">
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Profesion:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="profesion" name="profesion" placeholder="Profesion" style="max-width: 250px">
											</div>		
										</div>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="seccion4">
								<br>
								<br>
								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Empleo:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="empleo" name="empleo" placeholder="Empleo" style="max-width: 250px">
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Centro de Trabajo:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="centro_trabajo" name="centro_trabajo" placeholder="Centro de Trabajo" style="max-width: 250px">
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Cargo de Trabajo:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="cargo_trabajo" name="cargo_trabajo" placeholder="Cargo de Trabajo" style="max-width: 250px">
											</div>		
										</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Direccion Laboral</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="direccion_laboral" name="direccion_laboral" placeholder="Direccion Laboral" style="max-width: 250px">
											</div>		
										</div>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane" id="seccion5">
								section 5
							</div>

							<div role="tabpanel" class="tab-pane" id="seccion6">
								<div class="container">
									{{Form::open(array('url'=>'/vendor/add', 'files' => true))}}
										<div class="form-group">
											<label for="">Title</label>
											<input type="text" name="form-control input-sm" name="title">
										</div>

										<div class="form-group">
											<label for="">Map</label>
											<input type="text" id="searchmap">
											<div id="map-canvas"></div>
										</div>

										<div class="form-group">
											<label for="">Lat</label>
											<input type="text" class="form-control input-sm" name="lat" id="lat">
										</div>

										<div class="form-group">
											<label for="">Lng</label>
											<input type="text" class="form-control input-sm" name="lng" id="lng">
										</div>

										<button class="btn btn-sm btn-danger">Save</button>
									{{Form::close()}}
								</div>      
							</div>


						</div>
					</div>
					
				</div>
			</form>
		</div>


@stop
<!-- JQuery -->
 	 <script src="../js/jquery-3.0.0.js"></script> 
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
	<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

	<!-- {!!Html::script('js/jquery-1.11.3.min.js')!!} -->
 	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<script>$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} })</script>
	<!--{!!Html::script('js/bootstrap-datepicker.js')!!} -->

	<script type="text/javascript" src="../js/bootstrap-datepicker-sirve.js"></script>




	<script>

	function initialize(){
		
		
		var map= new google.maps.Map(document.getElementById('map-canvas'), {
			center:{ 
				lat:-12.089279446409028,
				lng:-77.02249328165635
			},
			zoom:15,
			mapTypeId: google.maps.MapTypeId.TERRAIN
		});

		var marker= new google.maps.Marker({
			position:{
				lat:-12.089279446409028,
				lng:-77.02249328165635
			},
			map: map,
			draggable:true
		});

		var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

		google.maps.event.addListener(searchBox,'places_changed', function(){

			var places = searchBox.getPlaces();
			var bounds = new google.maps.LatLngBounds();

			for(i=0;place=places[i];i++){
				bounds.extend(place.geometry.location);
				marker.setPosition(place.geometry.location); //set marker position new
			}

			map.fitBounds(bounds);
			map.setZoom(30);
		});

		google.maps.event.addListener(marker,'position_changed',function(){

			var lat=marker.getPosition().lat();
			var lng=marker.getPosition()-lng();

			$('#lat').val(lat);
			$('#lat').val(lng);


		});

	}
	google.maps.event.addDomListener(window,"load",initialize);	
	</script>




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
	</script> -->

    <script type="text/javascript">

	    
		$(document).ready(function(){

			$("#departamento").change(function(event){
				document.getElementById("provincia").disabled = false;
				document.getElementById("distrito").disabled = true;
			    $("#distrito").empty();
			    $("#distrito").append("<option  value='-1' default>--Seleccione--</option>");
				var url = $(this).attr("data-link");
				$departamento_id=event.target.value;
							alert($departamento_id);
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
			        	$("#provincia").append("<option  value='-1' default>--Seleccione--</option>");
			        	$.each(data,function(index,elememt){
			        		//alert(element.nombre);
			        		$("#provincia").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			        	});
			            //alert(data);
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});


			$("#provincia").change(function(event){
				document.getElementById("distrito").disabled = false;
				var url = $(this).attr("data-link");
				$provincia_id=event.target.value;
							alert($provincia_id);
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
			        	$("#distrito").append("<option  value='-1' default>--Seleccione--</option>");
			        	$.each(data,function(index,elememt){

							alert(elememt.id);
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

	</body>
</html>