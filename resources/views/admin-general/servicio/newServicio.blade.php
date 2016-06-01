<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR SERVICIO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	
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
					<strong>REGISTRAR SERVICIO</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/servicios/new/servicio" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
				<br/>
				<br/>
				<div class="col-sm-4"></div>
				<div class="">
			  		<font color="red"> 
			  			(*) Dato Obligatorio
			  		</font>		  			
				</div>
			  	</br>
			  	</br>				
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" required>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripción" required>
			    	</div>
			  	</div>



			  	<div class="form-group required">
			    	<label for="tipo_servicioInput" class="col-sm-4 control-label">Tipo</label>
			    	<div class="col-sm-5">
			      			<select class="form-control" name="tipo_servicio"  required> 
			      			 <option  value=""  disabled selected hidden >Please Choose</option>
    						<option value="Deportivo">Deportivo</option>
    						<option value="Alquiler">Alquiler</option>  
    						</select>					
			    	</div>			  
			  	</div>	  

	
			  	<!--div class="form-group required">
			  	<?php 
					//echo Form::select('id', $sedes_nombres);
					//echo Form::select('nombre', $sedes_ids,null, //['class' => 'form-control']);
				 ?>
				 </div-->	  


				 <div class="form-group required">
			    	<label for="tipo_servicioInput" class="col-sm-4 control-label">Sede</label>
			    	<div class="col-sm-5">
			      			<select class="form-control" name="id_sede" 
			      			placeholder="Elija Tipo Servicio" required> 
			      			 <option value="" disabled selected hidden>Please Choose</option>
	      						@foreach($sedes_todas as $sedeXD)
				 				<option value="{{$sedeXD->id}}"> {{$sedeXD->nombre}} </option>   @endforeach							
    						</select>					
			    	</div>			  
			  	</div>	  


				 


						




			  	</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-success" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/servicios/index" class="btn btn-danger">Cancelar</a>
					</div>
				</div>
				</br>
				</br>







			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	<script src="/js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="/js/bootstrap.js"></script>
	<!-- BXSlider -->
	<script src="/js/jquery.bxslider.min.js"></script>
	<!-- Mis Scripts -->
	<script src="/js/MisScripts.js"></script>


</body>
</html>