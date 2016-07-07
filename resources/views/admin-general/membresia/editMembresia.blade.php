<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR MEMBRESÍA</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
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
					<strong>MODIFICAR MEMBRESÍA</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/membresia/{{$membresia->id}}/edit" class="form-horizontal form-border">
			{{method_field('PATCH')}}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
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
				<br/>
				<br/>
				<div class="col-sm-4"></div>
				<div class="">
			  		<font color="red"> 
			  			(*) Dato Obligatorio
			  		</font>		  			
				</div>			
			  	</br>
				
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" value="{{$membresia->descripcion}}" required readonly>
			    	</div>
			  	</div>  	

			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Número Máximo de Invitados</label>
			    	<div class="col-sm-5">
			      		<input type="number" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="numMaxInput" name="numMax" value="{{$membresia->numMaxInvitados}}" placeholder="Número máximo de Invitados" >
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="capacidadSocioInput" class="col-sm-4 control-label">Tarifa (S/.)</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'DoubleFormat')" class="form-control" id="tarifaInput" name="tarifa" value="{{$membresia->tarifa->monto}}" placeholder="Tarifa" >
			    	</div>
			  	</div>
			  	<br><br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmation" onclick="ventana()" value="Aceptar">
					</div>
					<div class="btn-group">
						<a href="/membresia/" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				</br>
				</br>


			<!-- Modal -->
				<div class = "modal fade" id = "confirmation" tabindex = "-1" role = "dialog" 
				   aria-labelledby = "myModalLabel" aria-hidden = "true">
				   
				   <div class = "modal-dialog">
				      <div class = "modal-content">
				         
				         <div class = "modal-header">
				            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
							<span aria-hidden="true" onclick="cerrarventana()">&times;</span>
				            </button>
				            
				            <h4 class = "modal-title" id = "myModalLabel">
				               EDITAR MEMBRESIA
				            </h4>
				         </div>
				         
				         <div class = "modal-body">
				            <p>¿Desea guardar los cambios realizados?</p>
				         </div>
				         
				         <div class = "modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
				            
				            <button type = "submit" class = "btn btn-primary">
				               Confirmar
				            </button>
				         </div>
				         
				      </div><!-- /.modal-content -->
				   </div><!-- /.modal-dialog -->
				  
				</div><!-- /.modal -->


			  	
			  	<!-- VENTANA EMERGENTE FIN -->

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