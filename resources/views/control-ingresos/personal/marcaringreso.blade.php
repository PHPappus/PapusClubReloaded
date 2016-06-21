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

	<div class="container">
		<form id="form2" method="POST" action="{{url('/marcar-ingreso-personal')}}" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<br><br>
			@if(Session::get('resultado')=='encontrado')
				<input type="hidden" name="persona_id" value="{{ $persona->id }}">
				<input type="hidden" name="sede_id" value="{{ $sede_id }}">
				@if($persona->nacionalidad=='peruano')
					<div class="form-group ">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<div class="col-sm-8 text-left">
							<label class="control-label">DNI:</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="dni_1"  name="dni" placeholder="DNI" value="{{$persona->doc_identidad}}" readonly="true">									
								</select>											
							</div>										
						</div>									
					</div>				
				@else
					<div class="form-group ">
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<div class="col-sm-8 text-left">
							<label class="control-label">CARNET EXTRANJERÍA:</label>
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="carnet_1"  name="carnet" placeholder="CARNET" value="{{$persona->carnet_extranjeria}}" readonly="true">									
								</select>											
							</div>										
						</div>									
					</div>
				 @endif

				<div class="form-group ">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<div class="col-sm-8 text-left">
						<label class="control-label">NOMBRE:</label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="nombre_1"  name="nombre" placeholder="NOMBRE" value="{{$persona->nombre}}" readonly="true">									
							</select>											
						</div>										
					</div>									
				</div>

				<div class="form-group ">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<div class="col-sm-8 text-left">
						<label class="control-label">APELLIDO PATERNO:</label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="apellido_pat_1"  name="apellido_pat_1" placeholder="APELLIDO PATERNO" value="{{$persona->ap_paterno}}" readonly="true">									
							</select>											
						</div>										
					</div>									
				</div>

				<div class="form-group ">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<div class="col-sm-8 text-left">
						<label class="control-label">APELLIDO MATERNO:</label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="apellido_mat_1"  name="apellido_mat_1" placeholder="APELLIDO MATERNO" value="{{$persona->ap_materno}}" readonly="true">									
							</select>											
						</div>										
					</div>									
				</div>


				<div class="form-group ">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<div class="col-sm-8 text-left">
						<label class="control-label">CARGO:</label>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="cargo_1"  name="cargo" placeholder="CARGO" value="{{$persona->trabajador->puesto}}" readonly="true">									
							</select>											
						</div>										
					</div>									
				</div>

			<div class="btn-inline">
				<div class="btn-group col-sm-5"></div>
				
				<div class="btn-group ">
					<input class="btn btn-primary" type="submit" value="Marcar Ingreso">
				</div>
				<div class="btn-group">
					<a href="{{url('/ingreso-personal')}}" class="btn btn-info">Regresar</a>
				</div>				
			</div>
			<br><br>												

			@else
				<div class="row">
					<div class="col-sm-12 text-left">
						<br/><br/>
						<div class ="col-sm-3"></div>
						<p class="lead col-sm-6 text-center"><strong>!NO SE HA ENCONTRADO LA PERSONA¡</strong></p>
						<br/>
					</div>	
				</div>
				<br><br>
				<div class="btn-inline">
					<div class="btn-group col-sm-5"></div>
					
					<div class="btn-group">
						<a href="{{url('/ingreso-personal')}}" class="btn btn-info">Regresar</a>
					</div>				
				</div>
				<br><br>				
			@endif

		</form>

		<br><br><br>
				
			
	</div>
		
		


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
  		});
	</script>


	
</body>
</html>