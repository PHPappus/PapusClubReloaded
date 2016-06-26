<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR ACTIVIDAD</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/bootstrap-datepicker3.css')!!}

	
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
					<strong>REGISTRAR ACTIVIDAD</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/actividad/new/actividad" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="reservaSelec" value="{{ $reserva->id }}">

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

				<!-- VALIDACION CON FE FIN  -->
				<br/><br/>
				<div class="form-group">
			  		<div class="text-center">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  			
			  		</div>
			  	</div>
				<br/>
				
				<div class="form-group required">
			    	<label for="sedeInput" class="col-sm-4 control-label">Sede</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="sedeInput" name="sede" value="{{$reserva->ambiente->sede->nombre}}"   readonly>
			    	</div>
			  	</div>
				<div class="form-group required">
			    	<label for="reservaInput" class="col-sm-4 control-label">Id Reserva</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="reservaInput" name="reserva" value="{{$reserva->id}}"   readonly>
			    	</div>
			    	<a class="btn btn-info" name="buscarReserva" href="{!!URL::to('/actividad/new')!!}"  title="Buscar" ><i name="buscarReserva" class="glyphicon glyphicon-search"></i></a>
			  	</div>
			  	<div class="form-group required">
			    	<label for="AmbienteInput" class="col-sm-4 control-label">Ambiente</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="ambienteInput" name="ambiente" value="{{$reserva->ambiente->nombre}}"   readonly>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="tipoActividadInput" class="col-sm-4 control-label">Tipo de Actividad</label>	
			    	<div class="col-sm-5">
				    	<select class="form-control" id="tipoActividadInput" name="tipo_actividad" style="max-width: 150px "  >
				    						<option value="" default>Seleccione</option>
							               	@foreach ($values as $value)      
							                	<option value="{{$value->id}}">{{$value->valor}}</option>
							               	@endforeach
						</select>
					</div>
					<a class="btn btn-info" name="agregarTipoActividad" href="#"  title="Agregar Tipo de Actividad" data-toggle="modal" data-target="#modalAgregar"><i name="agregarTipoActividad" class="glyphicon glyphicon-plus"></i></a>
			  	</div>
			  	<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre de la actividad" value="{{old('nombre')}}" >
			    	</div>
			  	</div>

<!-- 			  	<div class="form-group required">
			    	<label for="fechaInicioInput" class="col-sm-4 control-label">Fecha Inicio(dd/mm/aaaa)</label>
			    	<div class="col-sm-5">
			      		<input class="datepicker"  type="text" onkeypress="return inputLimiter(event,'Nulo')" id="fechaInicioInput" name="a_realizarse_en" placeholder="{{$reserva->fecha_inicio_reserva}}" style="max-width: 250px">
			    	</div>
			  	</div>
 -->			 

 				<div class="form-group">
			 	<label for="fechaInput" class="col-sm-4 control-label">Fecha (dd/mm/aaaa) </label>
			    <div class="col-sm-5">
				  	<div class="input-group">
			   		<input class="datepicker form-control"  type="text"  id="fecha_inicio" name="a_realizarse_en" placeholder="Fecha Inicio" value="{{old('fecha_inicio')}}" style="max-width: 250px" >
			   		
			   	 	</div>
		    	</div>	
				</div>

			  	<div class="form-group required">
			    	<label for="horaInicioInput" class="col-sm-4 control-label">Hora Inicio(HH:mm:ss)</label>
			    	<div class="col-sm-5">
			      		<input type="time" class="form-control" id="horaInicioInput" value="{{$reserva->hora_inicio_reserva}}" name="hora">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<textarea type="text"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')" class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripción" style="resize: none"></textarea> 
			    	</div>
			  	</div>
			  	
			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Capacidad máxima</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="capacidadInput" name="capacidad_maxima" placeholder="Capacidad Maxima" value="{{old('capacidad_maxima')}}" >
			    	</div>
			  	</div>	  	
			  	
			  	
			  	<!-- EL ESTADO SIEMPRE VA EN TRUE PARA EL REGISTRAR -->
			  	

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
									@if($tipoPersona->descripcion == 'Postulante' || $tipoPersona->descripcion == 'postulante')
										<td align="center">Socio</td>
									@else
										<td align="center">{{$tipoPersona->descripcion}}</td>
									@endif
									<td align="center">  S/.</td>
									<td align="center"> 
										<div align="center">
								      		<input type="text" style="text-align:center;" onkeypress="return inputLimiter(event,'DoubleFormat')"   class="form-control" id="{{$tipoPersona->descripcion}}Input" name="{{$tipoPersona->descripcion}}" placeholder="Monto" >
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
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/actividad/index" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				</br>
				</br>
	
			
			</form>
		</div>
	</div>
		</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>		
@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.12.4.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/bootstrap-datepicker-sirve.js')!!}
	{!!Html::script('locales/bootstrap-datepicker.es.min.js')!!}
		{!!Html::script('js/bootstrap-datepicker.js')!!}
	 <!-- Languaje -->
    {!!Html::script('js/bootstrap-datepicker.es.min.js')!!}

	<!-- Modal -->
	<!--  -->
	<!-- Modal -->
	<div id="modalAgregar" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->	    
	    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Confirmar</h4>
		</div>
		<div class="container">
			<form method="POST" action="/actividad/new/{{ $reserva->ambiente->id }}/tipoactividad" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<br>
				<div class="form-group required">
			    	<label for="valorInput" class="col-sm-1 control-label">Nombre</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="valor" name="valor" placeholder="Nombre del Tipo de Actividad" value="{{old('valor')}}">
			    	</div>					    	
				</div>									 

				<div class="btn-inline">
					<div class="btn-group col-sm-4"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a  data-dismiss="modal" class="btn btn-info">Cancelar</a>
					</div>
				</div>
			</form>
		</div>

	    <div class="modal-body">	      
	    </div>
		<div class="modal-footer">	                    
		</div>
	    </div>

	  </div>
	</div>

	<!-- Para Fechas INICIO -->
	<script>
		var nowDate = new Date();
		var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
	</script>
	<script>
		$(function(){
			$('.datepicker').datepicker({
				format: "dd/mm/yyyy",
		        language: "es",
		        autoclose: true,
		        startDate: today,
			});
		});
	</script>
	<!-- Para Fecha FIN -->



	<script>
		function ventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 1;
		}
		function cerrarventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 3;
		}
  	</script>
  	{!!Html::script('js/MisScripts.js')!!}
</body>
</html>
