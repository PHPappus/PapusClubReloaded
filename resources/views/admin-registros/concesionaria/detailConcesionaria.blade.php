<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE CONCESIONARIA</title>
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
					<strong>DETALLE DE CONCESIONARIA</strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>

				<div class="form-group">
			    	<label for="sede_nombre" class="col-sm-4 control-label">Sede</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="sede_nombre" name="sede_nombre" placeholder="Nombre de la Sede" value="{{$concesionaria->sede->nombre}}" readonly>
			    	</div>
			  	</div>									  

				<div class="form-group">
		    		<label for="nombre_concesionariaInput" class="col-sm-4 control-label">Nombre</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="nombre" name="nombre" value="{{$concesionaria->nombre}}" readonly>
		    		</div>
		  		</div>
			  	<div class="form-group">
			    	<label for="rucInput" class="col-sm-4 control-label">RUC</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="rucInput" name="ruc" value="{{$concesionaria->ruc}}" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" value="{{$concesionaria->descripcion}}" readonly>
			    	</div>
			  	</div>	  	
			  	<div class="form-group">
			    	<label for="telefonoInput" class="col-sm-4 control-label">Teléfono</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="telefonoInput" name="telefono" value="{{$concesionaria->telefono}}" readonly>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="correoInput" class="col-sm-4 control-label">Correo</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="correoInput" name="correo" value="{{$concesionaria->correo}}" readonly>
			    	</div>
			  	</div>
			  	
			  	<div class="form-group">
			    	<label for="nombre_responsableInput" class="col-sm-4 control-label">Nombre del Responsable</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombre_responsableInput" name="nombre_responsable" value="{{$concesionaria->nombre_responsable}}" readonly>
			    	</div>
			  	</div>			  
			  	<div class="form-group">
			    	<label for="estadoInput" class="col-sm-4 control-label ">Estado</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="estado" name="estado" value="{{$concesionaria->estado}}" readonly>
			    	</div>
			  	</div>
			  	
			  	<div class="form-group required">
			    	<label for="tipoConcesionariaInput" class="col-sm-4 control-label">Tipo de Concesionaria</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="tipo_concesionaria" name="tipo_concesionaria" value="{{$concesionaria->tipo_concesionaria}}" readonly>
			    	</div>	    	
			  	</div>		

			  	<div class="form-group required">
					<label  class="control-label col-sm-4">Inicio de Concesión [dd/mm/aaaa]:</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="fecha_inicio_concesion" readonly name="fecha_inicio_concesion" value="{{ $concesionaria->fecha_inicio_concesion }}"  >						
					</div>					
				</div>
				
				<div class="form-group required">
					<label  class="control-label col-sm-4">Fin de Concesión [dd/mm/aaaa]:</label>
					<div class="col-sm-5">
						<input  type="text" class="form-control" id="fecha_fin_concesion" readonly name="fecha_fin_concesion"  value="{{ $concesionaria->fecha_fin_concesion }}" >						
					</div>
				</div>
									
				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-8"> </div>
					<a href="/concesionaria/index" class="btn btn-info">Regresar</a>				
				</div>

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