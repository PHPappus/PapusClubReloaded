<!DOCTYPE html>
<html>
<head>
	<title>DETALLE POSTULANTE</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 

</head>
<body>
@extends('layouts.headerandfooter-al-admin-persona')
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
			<form method="POST" action="/trabajador/{{$postulante->persona->id}}/edit" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				

				<div class="row">
					<div class="col-sm-12 text-center">
						<div role="tabpanel">
							<ul class="nav nav-pills nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Datos Básicos</a></li>
								<li role="presentation"><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Observaciones Sobre Postulación</a></li>
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
												<input type="text" class="form-control" id="nombre" name="nombre" value="{{$postulante->persona->nombre}}" readonly  style="max-width: 250px"   >
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Paterno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="ap_paterno" name="ap_paterno" value="{{$postulante->persona->ap_paterno}}" readonly style="max-width: 250px" >
											</div>	
										</div>
									</div>

									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Apellido Materno:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" class="form-control" id="ap_materno" name="ap_materno" value="{{$postulante->persona->ap_materno}}" readonly style="max-width: 250px" >
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
														
															{{ Form::radio('sexo', 'masculino', (($postulante->persona['sexo']=="masculino" )? true : false), ['disabled']) }}Masculino
															</div>
															<div>
															{{ Form::radio('sexo', 'femenino', (($postulante->persona['sexo']=="femenino" )? true : false),['disabled']) }}Femenino
													</div>
											</div>	
										</div>
									</div>

									
									

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nacionalidad:</label>
											</div>
											<div class="col-sm-6 text-left" >
													<input  type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="{{$postulante->persona->nacionalidad}}" readonly style="max-width: 250px">	
											</div>	
										</div>
									</div>

									@if($postulante->persona['nacionalidad']=="peruano")
									<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">DNI:</label>
											</div>
											<div class="col-sm-6">
											<!--Se hace validacion para que acepte solo numeros pero que sea un texto-->
												<input  type="text" class="form-control" id="doc_identidad" name="doc_identidad" value="{{$postulante->persona->doc_identidad}}" readonly style="max-width: 250px">
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
												<input type="text" class="form-control" id="carnet_extranjeria" name="carnet_extranjeria" value="{{$postulante->persona->carnet_extranjeria}}" readonly style="max-width: 250px">
											</div>	
										</div>
									</div>
									@endif
									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Fecha de Nacimiento:</label>
											</div>
											<div class="col-sm-6">
												<input  type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$postulante->persona->fecha_nacimiento}}" readonly style="max-width: 250px">

											</div>	
										</div>
									</div>
									<br><br>
									<div class="btn-inline">
										<div class="btn-group col-sm-12"></div>

										<div class="btn-group col-sm-2">
											<a href="/postulante/index" class="btn btn-info">Regresar</a>
										</div>
									</div>
									<br><br>									

							</div>

							<div role="tabpanel" class="tab-pane" id="seccion2">
									<br>
										<p style="text-align:left; margin-left: 10px;"><strong>Observaciones registradas por otros socios:</strong></p>
									<br>								
									<div role="tabpanel" class="tab-pane active" id="seccion2">
										<div class="panel panel-primary">
											<div class="panel-body" style="width: 1140px; height: 500px; overflow: scroll;">

											@if(count($socios_observaciones)>0)
												<hr style="width: 80%; color: black; height: 1px; background-color:black;" />										
												@foreach($socios_observaciones as $socio_observacion)

													<div class="form-group">
														<div class = "col-sm-1"></div>
														<div class="col-sm-11">
															<div class="col-sm-6 text-center">
																<label for="" class="control-label">Carnet:</label>
															</div>
															<div class="col-sm-6">
																<input  type="text" class="form-control" id="carnet" name="carnet" value="{{$socio_observacion->carnet_actual()->nro_carnet}}" readonly style="max-width: 250px">
															</div>	
														</div>
													</div>

													<div class="form-group">
														<div class = "col-sm-1"></div>
														<div class="col-sm-11">
															<div class="col-sm-6 text-center">
																<label for="" class="control-label">Nombre:</label>
															</div>
															<div class="col-sm-6">
																<input  type="text" class="form-control" id="nombre_socio" name="nombre_socio" value="{{$socio_observacion->postulante->persona->nombre}}" readonly style="max-width: 250px">
															</div>	
														</div>
													</div>

													<div class="form-group">
														<div class = "col-sm-1"></div>													
														<div class="col-sm-11">
															<div class="col-sm-6 text-center">
																<label for="" class="control-label">Apellido Paterno:</label>
															</div>
															<div class="col-sm-6">
																<input  type="text" class="form-control" id="ap_pat_socio" name="ap_pat_socio" value="{{$socio_observacion->postulante->persona->ap_paterno}}" readonly style="max-width: 250px">
															</div>	
														</div>
													</div>

													<div class="form-group">
														<div class = "col-sm-1"></div>													
														<div class="col-sm-11">
															<div class="col-sm-6 text-center">
																<label for="" class="control-label">Apellido Materno:</label>
															</div>
															<div class="col-sm-6">
																<input  type="text" class="form-control" id="ap_mat_socio" name="ap_mat_socio" value="{{$socio_observacion->postulante->persona->ap_materno}}" readonly style="max-width: 250px">
															</div>	
														</div>
													</div>

													<div class="form-group">
														<div class = "col-sm-1"></div>													
														<div class="col-sm-11">
															<div class="col-sm-6 text-center">
																<label for="" class="control-label">Observación:</label>
															</div>
															<div class="col-sm-6">
								      						<textarea id ="observacion"  class="form-control" name="observacion"  placeholder="Descripción"  rows="5" cols="50" style="width:250px; max-width: 400px; max-height: 150px;">{{$socio_observacion->pivot->observacion}}</textarea>
															</div>											

														</div>
													</div>

													<hr style="width: 80%; color: black; height: 1px; background-color:black;" />	
												@endforeach												
											@else
												<div class="row">
													<div class="col-sm-4"></div>
													<div class="col-sm-4 text-center">
														<br>
														<br>
														<p><strong>No se ha registrado ninguna observación para este postulante.</strong></p>
												  	</div>
												  	<div class="col-sm-4"></div>
												</div>
											@endif
																																															
										 </div>
										</div>
									</div>
									<br><br>
									<div class="btn-inline">
										<div class="btn-group col-sm-12"></div>

										<div class="btn-group col-sm-2">
											<a href="/postulante/index" class="btn btn-info">Regresar</a>
										</div>
										<div class="btn-group">
											<a href="{{url('postulante/'.$postulante->id_postulante.'/aceptar')}}" class="btn btn-primary">Aceptar Postulación</a>
										</div>										
										<div class="btn group">
											<a href="{{url('postulante/'.$postulante->id_postulante.'/rechazar')}}" class="btn btn-primary">Rechazar Postulación</a>
										</div>

									</div>
									<br><br>
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
	{!!Html::script('js/bootstrap-datepicker.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
		   $('#example').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       }
		  	});

        $('.cont').click(function(){

  		var nextId = $(this).parents('.tab-pane').next().attr("id");
  		$('[href=#'+nextId+']').tab('show');

		})

		$('.back').click(function(){

  		var backId = $(this).parents('.tab-pane').prev().attr("id");
  		$('[href=#'+backId+']').tab('show');

		})



  		});
	</script>	


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
	</script>
	<script>
		$(function(){
			$('.datepicker').datepicker();
		});
	</script>
	


</body>
</html>