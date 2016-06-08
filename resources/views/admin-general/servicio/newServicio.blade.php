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

				@if ($errors->any())
		  				<ul class="alert alert-danger fade in">
		  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  					@foreach ($errors->all() as $error)
		  						<li>{{$error}}</li>
		  					@endforeach
		  				</ul>
		  		@endif

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
			      		<input type="text" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" >
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>			    	
			    	<div class="col-sm-5">
			      		<!--input type="text" class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripción" required-->

			      		<textarea id ="descripcionInput"  class="form-control" name="descripcion"  placeholder="Descripción"  rows="3" cols="50"></textarea>	
			    	</div>			    	
			  	</div>



			  	<div class="form-group required">
			    	<label for="tipo_servicioInput" class="col-sm-4 control-label">Tipo</label>
			    	<div class="col-sm-5">
			      			<select class="form-control" name="tipo_servicio" > 
			      			 <option  value=""  disabled selected hidden >Elige una opción</option>
			      					@foreach($values as $value)
				 					<option value="{{$value->id}}"> {{$value->valor}} </option>  
									@endforeach							
    						
    						</select>					
			    	</div>			  
			  	</div>	  

				<!--div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Postulante</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombreInput" name="postulante" placeholder="postulante" >
			    	</div>
			  	</div-->

	
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
			      			placeholder="Elija Tipo Servicio" > 
			      			 <option value="" disabled selected hidden>Elige una opción</option>
	      						@foreach($sedes_todas as $sedeXD)
				 				<option value="{{$sedeXD->id}}"> {{$sedeXD->nombre}} </option>  
				 				 @endforeach							
    						</select>					
			    	</div>			  
			  	</div>	  


				 
		 	
	  	    </br>
			<style>  				
  				#myTable {
    					    margin: 0 auto;  				
			</style>
			<div class="container" style="width: 600px; margin-left: auto; margin-right: auto"  >
			<table class="table table-bordered" >
					<thead class="active" >	
						<tr>							
							<th class="col-sm-4" ><DIV ALIGN=center>Tipo Persona</th>
							<th class="col-sm-2" ><DIV ALIGN=center>Moneda</th>
							<th class="col-sm-7"><DIV ALIGN=center>Monto</th>
						</tr>
					</thead>
					<tbody>
							@foreach($tiposPersonas as $tipoPersona)			
						    	<tr>
									<td align="center">  {{ $tipoPersona->descripcion }}</td>
									<td align="center">  S/.</td>
									<td align="center"> 
					<div align="center">
			      		<input style="text-align:right;" type="text" class="form-control" id="{{$tipoPersona->descripcion}}imput" name="{{$tipoPersona->descripcion}}" placeholder="">
			    	</div>
								</td>							        
								</tr>
							@endforeach
					</tbody>													
			</table>
			</div>
			

				<!--p>	Este es eñ cpdgop que casi funca xdddddddddddddd </p-->
				<!--div class="form-group required" align="right">
						<div class="col-sm-4" align="center">
						<table class="table table-bordered table-hover text-center display" id="example">
									<thead class="active">
										<tr>
											<th><DIV ALIGN=center>SEDE</th>
											<th><DIV ALIGN=center>NOMBRE</th>
										</tr>
									</thead>
									<tbody>
											@foreach($tiposPersonas as $tipoPersona)			
								    			<tr>
								    				<td></td>
													<td></td>									    
												</tr>
											@endforeach
									</tbody>					
														
							
						</table>		
						</div>
				</div-->
			
			
			






































						




			  	</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/servicios/index" class="btn btn-info">Cancelar</a>
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