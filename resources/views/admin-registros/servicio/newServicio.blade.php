
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
@extends('layouts.headerandfooter-al-admin-registros')
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
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" >
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>			    				    	<div class="col-sm-5">
			      	
			      		<textarea id ="descripcionInput" onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')" class="form-control" name="descripcion"  placeholder="Descripción"  rows="3" cols="50" style="resize: none" ></textarea>	
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

			  	<div class="form-group">
			    	<label for="servicio_dia" class="col-sm-4 control-label">Durante el</label>
			    	<div class="col-sm-5">
			      			<select class="form-control" name="servicio_dia" > 
			      			 <option  value="dia"   > Día</option>
			      			 <option  value="noche" > Noche</option>	
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
							<th class="col-sm-3" ><DIV ALIGN=center>Tipo Persona</th>
							<th class="col-sm-3" ><DIV ALIGN=center>Moneda</th>
							<th class="col-sm-3"><DIV ALIGN=center>Monto</th>
						</tr>
					</thead>
					<tbody>
							@foreach($tiposPersonas as $tipoPersona)			
						    	<tr>
									<td align="center"> 
									@if($tipoPersona->descripcion == 'postulante')
										socio
									@else
									 	{{ $tipoPersona->descripcion }}
									@endif
									 </td>
									<td align="center">  S/.</td>
									<td align="center"> 
									<div align="center">
							      		<input style="text-align:right;" onkeypress="return inputLimiter(event,'DoubleFormat')" type="text" class="form-control" id="{{$tipoPersona->descripcion}}imput" name="{{$tipoPersona->descripcion}}" placeholder="0.00">
							    	</div>
								</td>							        
								</tr>
							@endforeach
					</tbody>													
			</table>
			</div>
			
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