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


				 


			  		table table-bordered table-hover text-center display

			<table class="table table-condensed table-striped" id="example"  >
					<thead class="active"	>
						<tr>							
							<th  class="col-sm-1"><DIV ALIGN=center>TIPO PERSONA</th>
							<th  class="col-sm-1"><DIV ALIGN=center>MONEDA</th>
							<th  class="col-sm-1"><DIV ALIGN=center>MONTO</th>
						</tr>
					</thead>
					<tbody>
							@foreach($tiposPersonas as $tipoPersona)			
						    	<tr>
									<td>{{ $tipoPersona->descripcion }}</td>
									<td> <p> S/. </p> </td>
									<td> 
					<div class="col-sm-5">
			      		<input type="text" class="form-control" id="precioInput" name="precio" placeholder="" >
			    	</div>
									</td>
							        
								</tr>
							@endforeach
					</tbody>													
			</table>






<table class="table">
  <thead>
    <tr>
      <th class="col-md-3">Invoice</th>
      <th class="col-md-3">Date</th>
      <th class="col-md-3">Amount</th>
      <th class="col-md-3">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>12345</td>
      <td>Feb 1, 2014</td>
      <td>$45.00</td>
      <td>Owing</td>
    </tr>
    <tr>
      <td>67890</td>
      <td>Jan 30, 2014</td>
      <td>$19.99</td>
      <td>Overdue</td>
    </tr>
  </tbody>
</table>




















						




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