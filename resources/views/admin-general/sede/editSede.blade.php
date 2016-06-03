<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR SEDE</title>
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
					<strong>EDITAR SEDE</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/sedes/{{ $sede->id }}/edit" class="form-horizontal form-border">
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
				<!-- INICIO INCIIO -->
				<div class="form-group required">
		    		<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
		    		<div class="col-sm-5">
		      			<input type="text"  onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="nombreInput" name="nombre" value="{{$sede->nombre}}" >
		    		</div>
		  		</div>
			  	<div class="form-group required">
			    	<label for="telefonoInput" class="col-sm-4 control-label">Teléfono</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="telefonoInput" name="telefono" value="{{$sede->telefono}}" >
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="contactoInput" class="col-sm-4 control-label">Contacto</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="contactoInput" name="nombre_contacto" value="{{$sede->nombre_contacto}}">
			    	</div>
			  	</div>	  	
			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Capacidad maxima</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="capacidadInput" name="capacidad_maxima" value="{{$sede->capacidad_maxima}}" >
			    	</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="capacidadSocioInput" class="col-sm-4 control-label">Capacidad por socio</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="capacidadSocioInput" name="capacidad_socio" value="{{$sede->capacidad_socio}}">
			    	</div>
			  	</div>
			  	
			  	<div class="form-group required">
			    	<label for="departamentoInput" class="col-sm-4 control-label">Departamento</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="departamentoInput" name="departamento" value="{{$sede->departamento}}" readonly >
			    	</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="provinciaInput" class="col-sm-4 control-label">Provincia</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="provinciaInput" name="provincia" value="{{$sede->provincia}}" readonly >
			    	</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="distritoInput" class="col-sm-4 control-label">Distrito</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="distritoInput" name="distrito" value="{{$sede->distrito}}" readonly >
			    	</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="direccionInput" class="col-sm-4 control-label">Dirección</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')"  class="form-control" id="direccionInput" name="direccion" value="{{$sede->direccion}}" >
			    	</div>
			  	</div>
			  	<div class="form-group ">
			    	<label for="referenciaInput" class="col-sm-4 control-label">Referencia </label>
			    	<div class="col-sm-5">
			      		<input type="comment"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')"  class="form-control" id="referenciaInput" name="referencia" value="{{$sede->referencia}}">
			    	</div>
			  	</div>
			  	
			  		<!-- FIN FIN FIN  -->
				
			
				</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmation" onclick="ventana()" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/sedes/index" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				</br>
				</br>

				<!-- VENTANA EMERGENTE INiCiO -->
			  	 <div class="form-group">
					<div class="col-sm-12 text-center">
						
						<!-- style="z-index:2; padding-top:100px;"
						 --><!-- <button type="submit" class="btn btn-lg btn-primary">Registrar</button> -->
						<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="confirmationLabel" data-keyboard="false" data-backdrop="static">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<!-- Header de la ventana -->
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="cerrarventana()">&times;</span></button>
										<h4 class="modal-title">EDITAR SEDE</h4>
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
	{!!Html::script('../js/jquery-1.11.3.min.js')!!}
	{!!Html::script('../js/bootstrap.js')!!}
	{!!Html::script('../js/jquery.bxslider.min.js')!!}
	{!!Html::script('../js/MisScripts.js')!!}
	<script>
		function ventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 1;
		}
		function cerrarventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 3;
		}
  	</script>


</body>
</html>