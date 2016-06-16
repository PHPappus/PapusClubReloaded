<!DOCTYPE html>
<html>
<head>
	<title>ACTIVIDAD</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	
	
</head>
<body>
@extends('layouts.headerandfooter-al-admin-registros')
@section('content')

<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>ACTIVIDAD</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/sedes/new/sede" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>

			<!-- INICIO INICIO INICIO INICIO -->

			<!-- <div class="form-group required">
		    	<label for="buscarInput" class="col-sm-4 control-label">BUSCAR AMBIENTE</label>
		    	<div class="col-sm-5">
		      		<a class="btn btn-info" name="buscarAmbiente" href="{!!URL::to('/ambiente/search')!!}"  title="Buscar" ><i name="buscarAmbiente" class="glyphicon glyphicon-search"></i></a>
		    	</div>
		  	</div> -->
		  	<div class="form-group required">
		    	<label for="ambienteInput" class="col-sm-4 control-label">Ambiente</label>
		    	<div class="col-sm-5">
		    		<input type="text" class="form-control" id="ambienteInput" name="ambiente" value="{{$actividad->ambiente->nombre}}"   readonly>
		      	</div>
		      	
		  	</div>
		  	<div class="form-group required">
		    	<label for="tipoambienteInput" class="col-sm-4 control-label">Tipo de Ambiente</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="tipoambienteInput" name="tipoambiente" value="{{$actividad->ambiente->tipo_ambiente}}"   readonly>
		    	</div>
		  	</div>
		  	<div class="form-group required">
		    	<label for="sedeInput" class="col-sm-4 control-label">Sede</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="sedeInput" name="sede" value="{{$actividad->ambiente->sede->nombre}}"   readonly>
		    	</div>
		  	</div>

			<div class="form-group required">
		    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$actividad->nombre}}" readonly>
		    	</div>
		  	</div>
		  	<div class="form-group required">
		    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" value ="{{$actividad->descripcion}}" readonly>
		    	</div> 
		  	</div>
		  	<div class="form-group required">

			    	<label for="fechaInicioInput" class="col-sm-4 control-label">Fecha Inicio</label>
			    	<div class="col-sm-5">
			      		<input type="date" id="fechaInicioInput" value="{{$actividad->reserva->fecha_inicio_reserva}}"  readonly>
			    	</div>
			  	
			 </div>

			<div class="form-group required">
			    	<label for="horaInicioInput" class="col-sm-4 control-label">Hora Inicio</label>
			    	<div class="col-sm-5">
			      		<input type="time" id="horaInicioInput" value="{{$actividad->reserva->hora_inicio_reserva}}" readonly>
			    	</div>
			  	
			 </div>

		  	<div class="form-group required">
		    	<label for="tipoActividadInput" class="col-sm-4 control-label">Tipo de Actividad</label>	
		    	<div class="col-sm-5">
			    	<input type="text" class="form-control" id="tipoActividadInput" name="tipo_actividad" value="{{$actividad->tipo_actividad}}" readonly >
				</div>
		  	</div>

		  	<div class="form-group required">
		    	<label for="capacidadInput" class="col-sm-4 control-label">Capacidad Maxima</label>
		    	<div class="col-sm-5">
		      		<input type="number" class="form-control" id="capacidadInput" name="capacidad_maxima" value="{{$actividad->capacidad_maxima}}" readonly>
		    	</div>
		  	</div>	  	
		  	
				<!-- INICIO  PRECIO POR TIPO DE PERSONA -->
			  	<br/>
			  	<br/>
			  	<style>  				
  				#myTable {
    					    margin: 0 auto; 
    			}			
				</style>
				<div class="container" style="width: 600px; margin-left: auto; margin-right: auto"  >
				<table class="table table-bordered" >
					<thead class="active" >	
						<tr>							
							<th class="col-sm-3" ><DIV ALIGN=center>Tipo Persona</th>
							<th class="col-sm-3" ><DIV ALIGN=center>Moneda</th>
							<th class="col-sm-3"><DIV ALIGN=center>Monto</th>
						</tr>
					</thead>
					<tbody>
							@foreach ($tarifas as $tarifa)		
						    	<tr>
									<td align="center">{{$tarifa->tipo_persona->descripcion}}</td>
									<td align="center">  S/.</td>
									<td align="center"> 
										<div align="center">
								      		<input type="text" style="text-align:center;" onkeypress="return inputLimiter(event,'Numbers')"   class="form-control" id="{{$tarifa->tipo_persona->descripcion}}Input" name="{{$tarifa->tipo_persona->descripcion}}" value="{{$tarifa->precio}}" placeholder="Monto" readonly>
								    	</div>
								</td>							        
								</tr>
							@endforeach
					</tbody>												
			</table>
			</div>	  	

			  	<!-- FIN     PRECIO POR TIPO DE PERSONA -->
			</br></br>
			  	<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					<div class="btn-group">
						<a href="/actividad/index" class="btn btn-info">Regresar</a>
					</div>
				</div>
			
			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	<script src="../js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<!-- BXSlider -->
	<script src="../js/jquery.bxslider.min.js"></script>
	<!-- Mis Scripts -->
	<script src="../js/MisScripts.js"></script>


</body>
</html>