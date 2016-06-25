<!DOCTYPE html>
<html>
<head>
	<title>INGRESO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
</head>
<body>
@extends('layouts.headerandfooter-al-control-ingresos')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>MARCAR INGRESO</strong></p>
				<br/>
			</div>
			
		</div>
	</div>
@if(Session::get('resultado')=='encontrado')
	<div class="container">
			<form method="POST" action="{{url('/marcar-ingreso-socio')}}" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div role="tabpanel">
							<ul class="nav nav-pills nav-justified" role="tablist">
								<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Socio</a></li>
								<li role="presentation"><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Familiares</a></li>
								<li role="presentation"><a href="#seccion3" aria-controls="seccion3" data-toggle="tab" role="tab">Invitados</a></li>
								<li role="presentacion"><a href="#seccion4" aria-controls="seccion4" data-toggle="tab" role="tab">Marcar Ingreso</a></li>
							</ul>
						</div>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="seccion1">
								<br><br>
								<input type="hidden" name="sede_id" value="{{ $sede_id }}">									
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Carnet:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="carnet" name="carnet" placeholder="Carnet" style="max-width: 250px" value="{{$socio->carnet_actual()->nro_carnet}}" readonly >
										</div>	
									</div>
								</div>
								@if($socio->postulante->persona->nacionalidad=='peruano')
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">DNI:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="dni" name="dni" placeholder="DNI" style="max-width: 250px" value="{{$socio->postulante->persona->doc_identidad}}" readonly >
										</div>	
									</div>
								</div>
								@else
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">CARNET DE EXTRANJERÍA:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="carnet" name="carnet" placeholder="Carnet" style="max-width: 250px" value="{{$socio->postulante->persona->carnet_extranjeria}}" readonly >
										</div>	
									</div>
								</div>								
								@endif

								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Nombre:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="nombre" name="nombre" placeholder="Nombre" style="max-width: 250px" value="{{$socio->postulante->persona->nombre}}" readonly >
										</div>	
									</div>
								</div>

								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Paterno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="ap_paterno" name="ap_paterno" placeholder="Apellido Paterno" style="max-width: 250px" value="{{$socio->postulante->persona->ap_paterno}}" readonly >
										</div>	
									</div>
								</div>

								
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Materno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="ap_materno" name="ap_materno" placeholder="Apellido Materno" style="max-width: 250px" value="{{$socio->postulante->persona->ap_materno}}" readonly >
										</div>	
									</div>
								</div>

								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Estado Socio:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="estado" name="estado" placeholder="Estado Socio" style="max-width: 250px" value="{{$socio->estado()}}" readonly >
										</div>	
									</div>
								</div>
								<br><br>
									<div class="btn-inline">
										<div class="btn-group col-sm"></div>
						
										<div class="btn-group">
											<a href="{{url('/ingreso-socio')}}" class="btn btn-info">Regresar</a>
										</div>				
									</div>
									<br><br><br>																																								
							</div>

							<!--FAMILIARES-->
							<div role="tabpanel" class="tab-pane" id="seccion2">
								<br>
								<div class="table-responsive">
									<div class="container">
										<table class="table table-bordered table-hover text-center display" id="example">
												<thead class="active">
													<th><div align=center>DOCUMENTO</div> </th>
													<th><div align=center>NOMBRE</div></th>
													<th><div align=center>APELLIDO PATERNO</div></th>
													<th><div align=center>APELLIDO MATERNO</div></th>
													<th><div align=center>RELACIÓN FAMILIAR</div></th>
													<th><div align=center>SELECCIONAR</div></th>
												</thead>
												<tbody>
													@foreach($socio->postulante->familiarxpostulante as $familiar)						
														<tr>
														@if($familiar->nacionalidad=='peruano')
															<td>{{$familiar->doc_identidad}}</td>														
														@else
															<td>{{$familiar->carnet_extranjeria}}</td>														
														@endif
															<td>{{$familiar->nombre}}</td>
															<td>{{$familiar->ap_paterno}}</td>
															<td>{{$familiar->ap_materno}}</td>
															<td>{{relacion($familiar->pivot->tipo_familia_id)}}</td>
															<td>
																<div class="checkbox">																
																  <label><input type="checkbox" name="fam[]" value="{{$familiar->id}}"></label>
																</div>
											            	</td>
											            </tr>				            		
													@endforeach
												</tbody>
										</table>
										<br><br>
											<div class="btn-inline">
												<div class="btn-group col-sm"></div>
								
												<div class="btn-group">
													<a href="{{url('/ingreso-socio')}}" class="btn btn-info">Regresar</a>
												</div>				
											</div>										
										<br><br><br>							
									</div>
								</div>																		
								<br>
							</div>


							<!--INVITADOS-->
							<div role="tabpanel" class="tab-pane" id="seccion3">
								<br>
								<div class="table-responsive">
									<div class="container">
										<table class="table table-bordered table-hover text-center display" id="example2">
											<thead class="active">
												<th><div align=center>DOCUMENTO</div> </th>
												<th><div align=center>NOMBRE</div></th>
												<th><div align=center>APELLIDO PATERNO</div></th>
												<th><div align=center>APELLIDO MATERNO</div></th>
												<th><div align=center>SELECCIONAR</div></th>
											</thead>
											<tbody>
												@foreach($invitados as $invitado)						
													<tr>
													@if($invitado->nacionalidad=='peruano')
														<td>{{$invitado->doc_identidad}}</td>														
													@else
														<td>{{$invitado->carnet_extranjeria}}</td>														
													@endif
														<td>{{$invitado->nombre}}</td>
														<td>{{$invitado->ap_paterno}}</td>
														<td>{{$invitado->ap_materno}}</td>
														<td>
															<div class="checkbox">														
															  <label><input type="checkbox" name="inv[]" class="checkInvitado" value="{{$invitado->id}}"></label>
															</div>
										            	</td>
										            </tr>				            		
												@endforeach
											</tbody>
																					
										</table>
										<br><br>
											<div class="btn-inline">
												<div class="btn-group col-sm"></div>
								
												<div class="btn-group">
													<a href="{{url('/ingreso-socio')}}" class="btn btn-info">Regresar</a>
												</div>				
											</div>
										<br><br><br>									
									</div>
								</div>	
								<br>
							</div>

							<!--MARCAR INGRESO-->
							<div role="tabpanel" class="tab-pane" id="seccion4">
								<br>
								<div class="form-group required">
									<div class="col-sm-2"></div>
									<div class="col-sm-8">
										<div class="col-sm-8 text-center">
											<label for="" class="control-label">Número de Invitados Máximos:</label>
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="nummax" name="nummax" placeholder="Número máximo de invitados" value="{{$socio->membresia->numMaxInvitados - $socio->numInvitadosMes}}" readonly>				
											</select>											
										</div>										
									</div>									
								</div>
								<div class="form-group required">
									<div class="col-sm-2"></div>
									<div class="col-sm-8">
										<div class="col-sm-8 text-center">
											<label for="" class="control-label">Número de Invitados:</label>
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="numinv" name="numinv" placeholder="Número de Invitados" value="0" readonly>				
											</select>											
										</div>										
									</div>									
								</div>
								<div class="form-group required">
									<div class="col-sm-2"></div>
									<div class="col-sm-8">
										<div class="col-sm-8 text-center">
											<label for="" class="control-label">Precio entrada en Soles:</label>
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="precio" name="precio" placeholder="Precio Entrada" value="{{$precio_entrada}}" readonly>				
											</select>											
										</div>										
									</div>									
								</div>																														
								<div class="form-group required">
									<div class="col-sm-2"></div>
									<div class="col-sm-8">
										<div class="col-sm-8 text-center">
											<label for="" class="control-label">Monto a pagar en Soles:</label>
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" id="monto" name="monto" placeholder="Monto" value="0" readonly>				
											</select>											
										</div>										
									</div>									
								</div>
								<br><br>
								<div class="btn-inline">
									<div class="btn-group col-sm"></div>
					
									<div class="btn-group ">
										<input class="btn btn-primary" type="submit" value="Marcar Ingreso">
									</div>
									<div class="btn-group">
										<a href="{{url('/ingreso-socio')}}" class="btn btn-info">Regresar</a>
									</div>				
								</div>								
								<br>				
							</div>

						</div>
					</div>		
				</div>
			</form>
		</div>
	@else
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<div class ="col-sm-3"></div>
				<p class="lead col-sm-6 text-center"><strong>!NO SE HA ENCONTRADO AL SOCIO</strong></p>
				<br/>
			</div>	
		</div>
		<br><br>
		<div class="btn-inline">
			<div class="btn-group col-sm-5"></div>
			
			<div class="btn-group">
				<a href="{{url('/ingreso-socio')}}" class="btn btn-info">Regresar</a>
			</div>				
		</div>
		<br><br>
	@endif	
		
		


@stop
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}

	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
		   $('#example').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       }
		  	});

		   $('#example2').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       }
		  	});

			$(":checkbox" ).on( "click", countChecked );




  		});


			 var countChecked = function() {
			 var n = $( '.checkInvitado:checked' ).length;
			  $( '#numinv' ).val(n);
			  var max = $('#nummax').val();
			  if(max-n<0){
			  	var mult = n-max;
			  	var precio = $('#precio').val();
				var number = Number(precio.replace(/[^0-9\.]+/g,''));
			  	$('#monto').val(mult*precio);
			  }
			  else
			  {
			  	$('#monto').val('0');
			  }
			};
			countChecked();
			 


	</script>


	
</body>
</html>