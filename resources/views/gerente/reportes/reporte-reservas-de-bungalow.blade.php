<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('/css/DataTable.css')!!}	
	<!-- <link rel="stylesheet" type="text/css" href="css/estilos.css"> -->
	<!-- PARA DATA TABLE -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
	
</head>
<body>
@extends('layouts.headerandfooter-al-gerente')

@section('content')


<!-- Mensaje de éxito luego de registrar -->
		@if (session('stored'))
			<script>$("#modalSuccess").modal("show");</script>
			
			<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Éxito!</strong> {{session('stored')}}
			</div>
		@endif


	
<main class="main">
<div class="content" style="max-width: 100%;">
	<br/>
	<br/>
	<br/>
	<div class="container">
		<div class="col-sm-12 text-left lead">
			<strong>REPORTE: CANTIDAD DE RESERVAS MENSUALES POR BUNGALOW </strong>
		</div>		
	</div>
	<br/>

	<div class="container">
		<form method="POST" class="form-horizontal form-border" action="/reporte/reserva-de-bungalow/reporte" target="nventana"  onsubmit="procesar(this.action);"> 
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<br/>
			<div class="form-group">
		  		<div class="text-center ">
		  			<font color="red"> 
		  				(*) Dato Obligatorio
		  			</font>
		  		</div>
			</div>
			<br/>
			<!-- <div class="form-group ">
			    	<label for="nombreInput" class="col-sm-4 control-label">Usuario</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')"   class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" value="Poner el nombre del gerente que se a logueado" readonly>
			    	</div>
			</div> -->
			<div class="form-group required">
			   	<label for="sedeInput" class="col-sm-4 control-label">Sede</label>	
				<div class="col-sm-5">
				  	<select class="form-control" id="sedeSelec" name="sedeSelec" style="max-width: 150px "  >
				        @foreach ($sedes as $sede)      
				      	<option value="{{$sede->id}}">{{$sede->nombre}}</option>
				        @endforeach
					</select>
				</div>
			</div>
			<div class="form-group required">
			   	<label for="mesSelec" class="col-sm-4 control-label">Mes</label>	
				<div class="col-sm-5">
				  	<select class="form-control" id="mesSelec" name="mesSelec" style="max-width: 150px "  >				            
				      	<option value="Enero">Enero</option>
				      	<option value="Febrero">Febrero</option>
				      	<option value="Marzo">Marzo</option>
				      	<option value="Abril">Abril</option>
				      	<option value="Mayo">Mayo</option>
				      	<option value="Junio">Junio</option>
				      	<option value="Julio">Julio</option>
				      	<option value="Agosto">Agosto</option>
				      	<option value="Septiembre">Septiembre</option>
				      	<option value="Octubre">Octubre</option>
				      	<option value="Noviembre">Noviembre</option>
				      	<option value="Diciembre">Diciembre</option>				        
					</select>
				</div>
			</div>
			<div class="form-group required">
			   	<label for="yearSelec" class="col-sm-4 control-label">Año</label>	
				<div class="col-sm-5">
				  	<select class="form-control" id="yearSelec" name="yearSelec" style="max-width: 150px "  >				            
				      	<option value="2016">2016</option>
				      	<option value="2015">2015</option>
				      	<option value="2014">2014</option>
				      	<option value="2013">2013</option>
				      	<option value="2012">2012</option>
				      	<option value="2011">2011</option>
				      	<option value="2010">2010</option>
				      	<option value="2009">2009</option>
				      	<option value="2008">2008</option>			        
					</select>
				</div>
			</div>

			
			<!-- Boton Buscar INICIO -->
			<br/>
			<div class="btn-inline">
				<div class="btn-group col-sm-10"></div>
				<div class="btn-group ">
					<input class="btn btn-primary" type="submit" value="Generar Reporte">
				</div>

			</div>
			<!-- Boton Buscar FIN -->
			</br>
			
		</form>
	</div>
	</div>
	<br/>
	<br/>


	<br/>




<br/>
<br/>
 @stop
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}
	
	<!-- BXSlider -->
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}

	{!!Html::script('js/bootstrap-datepicker.js')!!}
	
	<!-- Para MAndar Reporte a nueva ventana    INICIO -->
	<script type="text/javascript">
		function procesar(xform){
		window.open(xform, 'nventana', 'width='+(screen.availWidth)+',height ='+(screen.availHeight)+',status=yes,resizable=yes,scrollbars=yes');
		}
	</script>
	<!-- Para MAndar Reporte a nueva ventana   FIN-->

	


</body>

<!-- Modal Success -->
	<div id="modalSuccess" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">¡Éxito!</h4>
	      </div>
	      <div class="modal-body">
	        <p>{{session('stored')}}</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>           
	      </div>
	    </div>

	  </div>
	</div>
</html>
