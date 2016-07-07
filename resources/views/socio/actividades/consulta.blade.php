<!DOCTYPE html>
<html>
<head>
	<title>Actividad Papus Club</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	
</head>

<body>
@extends('layouts.headerandfooter-al-socio')
@section('content')

	<div class="content" style="max-width: 100%;">
		<div class="container">
			<div class="row" style="max-width: 1180px">
				<div class="col-sm-4">
					<ol class="breadcrumb" style="background:none;">
						<li><a href="/socio"><span class="glyphicon glyphicon-home"></span></a></li>
						<li><a href="/inscripcion-actividad/inscripcion-actividades">Consultar Actividades</a></li>
						<li class="active">Detalle</li>
					</ol>
				</div>				
			</div>
		</div>
		
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="lead"><strong>{{$actividad->nombre}}</strong></p>
				</div>
			</div>
		</div>
		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>
				<div class="form-group">
					<label for="description" class="col-sm-5 control-label text-left">Sede:</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="fecha_inicio" placeholder='{{$actividad->ambiente->sede->nombre}}' style="max-width: 220px" readonly="true">
					</div>				
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-5 control-label text-left">Lugar:</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="fecha_inicio" placeholder='{{$actividad->ambiente->nombre}}' style="max-width: 220px" readonly="true">
					</div>				
				</div>	
				<div class="form-group">
					<label for="description" class="col-sm-5 control-label text-left">Descripción:</label>
					<div class="col-sm-7">
						<textarea class="form-control" name="descripcion" id="descriptionInput" rows="3" readonly="true" style="max-width:400px">{{$actividad->descripcion}}</textarea>
					</div>				
				</div>
		  		<div class="form-group">
			    	<label for="nombreInput" class="col-sm-5 control-label">Fecha de la actividad:</label>
		    		<div class="col-sm-7">
		      			<input type="text" class="form-control" id="fecha_inicio" placeholder='{{date("d-m-Y",strtotime($actividad->a_realizarse_en))}}' style="max-width: 220px" readonly="true">
		    		</div>			
		  		</div>
				<div class="form-group">
			    	<label for="nombreInput" class="col-sm-5 control-label">Hora de inicio:</label>
		    		<div class="col-sm-7 text-center">
		    			<input type="text" class="form-control" id="fecha_fin" placeholder='{{$actividad->hora_inicio}}' style="max-width: 220px" readonly="true">
		    		</div>		  				
				</div>
				<div class="form-group">
					<label for="sesiones" class="col-sm-5 control-label">Precio:</label>
		    		<div class="col-sm-7 text-center">
		    			<input type="text" class="form-control" id="precio" placeholder='S/. {{$actividad->precio($tipo_persona, $actividad->tarifas)}}' style="max-width: 220px" readonly="true">
		    		</div>		  				
				</div>
				<div class="form-group">
			    	<label for="vacantes" class="col-sm-5 control-label">Cupos Disponibles:</label>
		    		<div class="col-sm-7 text-center">
		    			<input type="text" class="form-control" id="vacantes" placeholder='{{$actividad->cupos_disponibles}}' style="max-width: 220px" readonly="true">
		    		</div>		  				
				</div>
									
				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-12">
						<div class="col-sm-12 text-center">
							<a href="{{URL::previous()}}" class="btn btn-primary" >Regresar</a>		
						</div>
					</div>			
				</div>		
			</form>
		</div>
	</div>
@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}
</body>
</html>