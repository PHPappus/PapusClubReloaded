<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR PROMOCION</title>
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
@extends('layouts.headerandfooter-al-admin-registros')
@section('content')
<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>EDITAR PROMOCION</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/promociones/{{ $promocion->id }}/edit" class="form-horizontal form-border">
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
		    		<label for="descripcionInput" class="col-sm-4 control-label">Descripcion</label>
		    		<div class="col-sm-5">
		      			<input type="text"  onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="descripcionInput" name="descripcion" value="{{$promocion->descripcion}}" >
		    		</div>
		  		</div>

		  		<div class="form-group required">
			    	<label for="tipoPromoInput" class="col-sm-4 control-label">Tipo Promoción</label>	
			    	<div class="col-sm-5">
				    	<select class="form-control" id="tipoPromoSelect"name="tipoPromo" style="max-width: 150px " >
							    @foreach ($tipos as $tipo)      
							        <option value="{{$tipo->valor}}" @if ($tipo->valor == $promocion->tipo) selected @endif>{{$tipo->valor}}</option>
							    @endforeach
						</select>
					</div>
			  	</div>
  	
			  	<div class="form-group required">
			    	<label for="porcentajeInput" class="col-sm-4 control-label"> Porcentaje descuento(%)</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" step = "any" class="form-control" id="porcentajeInput" name="porcentajeDescuento" placeholder="Porcentaje descuento" value="{{$promocion->porcentajeDescuento}}" required>
			    	</div>
			  	</div> 

			  	<div class="form-group">
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-3">
			      		<input type="checkbox" class="checkbox" id="estadoInput" name="estado" @if(['estado'] == TRUE) checked @endif>
			    	</div>
			  	</div>
				
			
				</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmation" onclick="ventana()" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/promociones/index" class="btn btn-info">Cancelar</a>
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
										<h4 class="modal-title">EDITAR PROMOCION</h4>
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