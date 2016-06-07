<!DOCTYPE html>
<html>
<head>
	<title>MODIFICAR TALLER</title>
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
					<strong>MODIFICAR TALLER</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/taller/{{$taller->id}}/edit" class="form-horizontal form-border">
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
			  	</br>
				
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="dInput" name="descripcion" placeholder="Nombre" value="{{$taller->nombre}}">
			    	</div>
			  	</div> 

			  	<div class="form-group required">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripción" value="{{$taller->descrpcion}}">
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="vacantesInput" class="col-sm-4 control-label">Vacantes</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" step="any" class="form-control" id="vacantesInput" name="vacantes" placeholder="Vacantes" value="{{$taller->vacantes}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="fecIniInsInput" class="col-sm-4 control-label">Fecha Inicio Inscripciones</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="fecIniInsInput" name="fecIniIns" placeholder="Fecha Inicio Inscripciones" value="{{$taller->fecha_inicio_inscripciones}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="fecFinInsInput" class="col-sm-4 control-label">Fecha Fin Inscripciones</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="fecFinInsInput" name="fecFinIns" placeholder="Fecha Fin Inscripciones" value="{{$taller->fecha_fin_inscripciones}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="fecIniInput" class="col-sm-4 control-label">Fecha Inicio</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="fecIniInput" name="fecIni" placeholder="Fecha Inicio" value="{{$taller->fecha_inicio}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="fecFinInsInput" class="col-sm-4 control-label">Fecha Fin</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="fecFinInput" name="fecFin" placeholder="Fecha Fin" value="{{$taller->fecha_fin}}">
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="cantSesInput" class="col-sm-4 control-label">Cantidad de Sesiones</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" step="any" class="form-control" id="cantSesInput" name="cantSes" placeholder="Cantidad de Sesiones">
			    	</div>
			  	</div>


			  	</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmation" onclick="ventana()" value="Guardar">
					</div>
					<div class="btn-group">
						<a href="/multa/" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				</br>
				</br>

					<div class = "modal fade" id = "confirmation" tabindex = "-1" role = "dialog" 
				   aria-labelledby = "myModalLabel" aria-hidden = "true">
				   
				   <div class = "modal-dialog">
				      <div class = "modal-content">
				         
				         <div class = "modal-header">
				            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
				                  &times;
				            </button>
				            
				            <h4 class = "modal-title" id = "myModalLabel">
				               EDITAR MULTA
				            </h4>
				         </div>
				         
				         <div class = "modal-body">
				            <p>¿Desea guardar los cambios realizados?</p>
				         </div>
				         
				         <div class = "modal-footer">
				            <button type = "button" class = "btn btn-default" data-dismiss = "modal" >
				               Cerrar
				            </button>
				            
				            <button type = "submit" class = "btn btn-primary">
				               Confirmar
				            </button>
				         </div>
				         
				      </div><!-- /.modal-content -->
				   </div><!-- /.modal-dialog -->
				  
				</div><!-- /.modal -->


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