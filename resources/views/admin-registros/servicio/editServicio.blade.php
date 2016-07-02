

<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR SERVICIO</title>
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
					<strong>EDITAR SERVICIO</strong>
			</div>		
		</div>
		<div class="container">
		@if ($errors->any())
		  				<ul class="alert alert-danger fade in">
		  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  					@foreach ($errors->all() as $error)
		  						<li>{{$error}}</li>
		  					@endforeach
		  				</ul>
		  		@endif
			<!--@include('errors.503')-->		
			<form method="POST" action="/servicios/{{ $servicio->id }}/edit" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br/><br/>

				<!-- INICIO INCIIO -->
				<div class="form-group">
		    		<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$servicio->nombre}}" >
		    		</div>
		  		</div>
			  	<div class="form-group">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Decripción</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" value="{{$servicio->descripcion}}" >
			    	</div>
			  	</div>

			    

			  	<div class="form-group ">
			    	<label for="contactoInput" class="col-sm-4 control-label"> Tipo de Servicio</label>
			    	<div class="col-sm-5">

			      			<select class="form-control" name="tipo_servicio" > 
			      			 <option  value="{{$tipoServicio->id}}"   selected >{{$tipoServicio->valor}}</option>
			      					@foreach($values as $value)
				 					<option value="{{$value->id}}"> {{$value->valor}} </option>  
									@endforeach							    						
    						</select>					
			    	</div>			  
			  	</div>	
			  	
			  	<div class="form-group">
			    	<label for="activoInput" class="col-sm-4 control-label ">Activo</label>
			    	<div class="col-sm-3">
			      		<input type="checkbox"  class="checkbox" id="activoInput" name="estado" @if($servicio['estado'] == true) checked @endif>
			    	</div>	    	
			  	</div>
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
							@foreach($TarifarioServicio as $tariSer)			
						    	<tr>
									<td align="center"> 									 
									 @foreach ($tiposPersonas as $tipPer)
									 		@if ($tipPer->id == $tariSer->idtipopersona)
												{{ $tipPer->descripcion }}
									 		@endif
									 @endforeach
									 </td>
									<td align="center">  S/.</td>
									<td align="center"> 
									<div align="center">
							      		<input style="text-align:right;" onkeypress="return inputLimiter(event,'DoubleFormat')" type="text" class="form-control" value="{{$tariSer->precio}}" name="{{$tariSer->idtipopersona}}" placeholder="0.00">
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
	{!!Html::script('../js/jquery-1.11.3.min.js')!!}
	{!!Html::script('../js/bootstrap.js')!!}
	{!!Html::script('../js/jquery.bxslider.min.js')!!}
	{!!Html::script('../js/MisScripts.js')!!}



</body>
</html>