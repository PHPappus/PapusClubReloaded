<!DOCTYPE html>
<html>
<head>
	<title>EDITAR ACTIVIDAD</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	<style>

		.modal-backdrop.in{
			z-index: 1;
		}
	</style>
	
</head>
<body>
@extends('layouts.headerandfooter-al-admin')
@section('content')

<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>EDITAR ACTIVIDAD</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/actividad/{{ $actividad->id }}/edit" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>
				<div class="form-group">
			  		<div class="text-center">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  			
			  		</div>
			  	</div>
				<br/>

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
		    		<input type="text" class="form-control" id="ambienteInput" name="nombre" value="{{$actividad->ambiente->nombre}}"  required readonly>
		      	</div>
		      	<a class="btn btn-info" name="buscarAmbiente" href="{!!URL::to('/ambiente/search')!!}"  title="Buscar" ><i name="buscarAmbiente" class="glyphicon glyphicon-search"></i></a>
		  	</div>
		  	<div class="form-group required">
		    	<label for="tipoambienteInput" class="col-sm-4 control-label">Tipo de Ambiente</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="tipoambienteInput" name="tipo_ambiente" value="{{$actividad->ambiente->tipo_ambiente}}"  required readonly>
		    	</div>
		  	</div>
		  	<div class="form-group required">
		    	<label for="sedeInput" class="col-sm-4 control-label">Sede</label>
		    	<div class="col-sm-5">
		      		<input type="text" class="form-control" id="sedeInput" name="sede" value="{{$actividad->ambiente->sede->nombre}}"  required readonly>
		    	</div>
		  	</div>

			<div class="form-group required">
		    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
		    	<div class="col-sm-5">
		      		<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="nombreInput" name="nombre" value="{{$actividad->nombre}}" required>
		    	</div>
		  	</div>
		  	<div class="form-group ">
		    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
		    	<div class="col-sm-5">
		      		<input type="text" onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')"  class="form-control" id="descripcionInput" name="descripcion" value ="{{$actividad->descripcion}}" required>
		    	</div>
		  	</div>
		  	<div class="form-group required">

			    	<label for="fechaInicioInput" class="col-sm-4 control-label">Fecha Inicio</label>
			    	<div class="col-sm-5">
			      		<input type="date" id="fechaInicioInput" name="a_realizarse_en" value="{{$actividad->a_realizarse_en}}">
			    	</div>
			  	
			 </div>

			<div class="form-group required">
			    	<label for="horaInicioInput" class="col-sm-4 control-label">Hora Inicio</label>
			    	<div class="col-sm-5">
			      		<input type="time" id="horaInicioInput" name="hora" value="{{$actividad->a_realizarse_en}}">
			    	</div>
			  	
			 </div>

		  	<div class="form-group required ">
		    	<label for="descripcionInput" class="col-sm-4 control-label">Tipo de Actividad</label>
		    	<div class="col-sm-5">
		      		<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="descripcionInput" name="descripcion" value="{{$actividad->tipo_actividad}}" readonly>
		    	</div>
		  	</div>
		  	<!-- <div class="form-group required">
		    	<label for="tipoActividadInput" class="col-sm-4 control-label">TIPO DE ACTIVIDAD</label>	
		    	<div class="col-sm-5">
			    	<select class="form-control" id="tipoActividadInput" name="tipo_actividad" style="max-width: 150px " required >
						                <option value="{{$actividad->tipo_actividad}}" default>Seleccione</option>
						                <option value="fiesta">Fiesta</option>
						                <option value="deportiva">Deportiva</option>
						                <option value="reunion">Reunión</option>
					</select>
				</div>
		  	</div> -->

		  	<div class="form-group required ">
		    	<label for="capacidadInput" class="col-sm-4 control-label">Capacidad máxima</label>
		    	<div class="col-sm-5">
		      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="capacidadInput" name="capacidad_maxima" value="{{$actividad->capacidad_maxima}}" required>
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
							@foreach ($tipoPersonas as $tipoPersona)		
						    	<tr>
									<td align="center">{{$tipoPersona->descripcion}}</td>
									<td align="center">  S/.</td>
									<td align="center"> 
										<div align="center">
								      		<input type="text" style="text-align:center;" onkeypress="return inputLimiter(event,'Numbers')"   class="form-control" id="{{$tipoPersona->descripcion}}Input" name="{{$tipoPersona->descripcion}}" placeholder="Monto" >
								    	</div>
								</td>							        
								</tr>
							@endforeach
					</tbody>													
			</table>
			</div>	  	

			  	<!-- FIN     PRECIO POR TIPO DE PERSONA -->
		  	
	  	<!-- FIN FIN FIN -->
				
		
			</br></br>
			  	<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmation" onclick="ventana()" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/actividad/index" class="btn btn-info">Cancelar</a>
					</div>
				</div>
			<!-- VENTANA EMERGENTE INiCiO -->
			  	 <div class="form-group">
					<div class="col-sm-12 text-center">
						
						<!-- style="z-index:2; padding-top:100px;"
						 --><!-- <button type="submit" class="btn btn-lg btn-primary">Registrar</button> -->
						<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="confirmationLabel" data-keyboard="false" data-backdrop="static" >
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<!-- Header de la ventana -->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="cerrarventana()">&times;</span></button>
										<h4 class="modal-title">EDITAR ACTIVIDAD</h4>
									</div>
									<!-- Contenido de la ventana -->
									      	<div class="modal-body">
										<p>¿Desea guardar los cambios realizados?</p>
									</div>
									<div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
								        <button type="submit" class="btn btn-primary">Confirmar</button>
							      	</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			  	<!-- VENTANA EMERGENTE FIN -->
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

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
	<!-- Latest compiled and minified JavaScript -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 -->
	<script>
		function ventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 1;
		}
		function cerrarventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 3;
		}
  	</script>
  	<!-- <script type="text/javascript">
  		$(".buscarAmbiente").click(function(){
  			$(".ambiente").val("oliboli");
  		});
  	</script> -->

</body>
</html>