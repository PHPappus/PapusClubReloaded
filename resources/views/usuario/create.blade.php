<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR NUEVO USUARIO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('/css/DataTable.css')!!}
	
</head>
<body>
@extends('layouts.headerandfooter-al-admin-persona')
@section('content')
<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<div class="container">
	  		@include('alerts.errors')
  			@if ($errors->any())
  				<ul class="alert alert-danger fade in">
  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  					@foreach ($errors->all() as $error)
  						<li>{{$error}}</li>
  					@endforeach
  				</ul>
  			@endif
	  		
		</div>
		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-left">
					<p class="lead"><strong>ASIGNAR NUEVO USUARIO</strong></p>
				</div>
			</div>	
		</div>
		<div class="container">
			{!!Form::open(['route'=>'usuario.store', 'method'=>'POST', 'class' =>'form-horizontal form-border'])!!}
				<br/>
				<div class="form-group">
			  		<div class="text-center">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  			
			  		</div>
			  	</div>
				<br/><br/>
				@include('usuario.forms.user')
				<br/><br/>
				<div class="form-group">
					<div class="col-sm-6 text-right">
						<button type="submit" class="btn btn-primary">Registrar</button>
					</div>
					<div class="col-sm-6 text-left">
						<a href="{!!URL::to('/admin-persona')!!}" class="btn btn-danger">Cancelar</a>
					</div>	
				</div>
			{!!Form::close()!!}
		</div>
	</div>		
@stop
<!-- JQuery -->

	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}
	<!-- BXSlider -->
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	<!-- Data Table -->
	{!!Html::script('js/jquery.dataTables.js')!!}
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}
	
	<script>		
		$(document).ready(function() {
		   $('#example').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       },		       
		       "dom": '<"pull-left"f><"pull-right"l>tip',
		       "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
		  	});
  		});		
  		
		function getPersona(){								
			document.getElementById('persona_id').value =  $('#example input:radio:checked').val();
			document.getElementById('name').value =  $('#example input:radio:checked').attr("alt");
		}
	</script>
	<!-- Modal -->
	<div id="modalBuscar" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->	    
	    <div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">BUSCAR PERSONA</h4>
			</div>

			<div class="modal-body">	      	  
				<div class="container">					
					<div class="table-responsive">
						<div class="container" id="TableContainer">
							<div class="text-left">
					  			<font color="black"> 
					  				Ingresar alguno de los siguientes campos:
					  				<ul>
					  				<li>DNI</li>
					  				<li>Apellido Paterno</li>
					  				<li>Apellido Materno</li>
					  				<li>Nombre</li>
					  				<li>Tipo de persona</li>
					  				</ul>
					  			</font>					  			
					  		</div>
					  		<br>
							<table class="table table-bordered table-hover text-center display" id="example" width="100%">
								<thead class="active" data-sortable="true">									
									<th><div align=center>DNI</div> </th>
									<th><div align=center>NOMBRES</div></th>
									<th><div align=center>APELLIDO PATERNO</div></th>
									<th><div align=center>APELLIDO MATERNO</div></th>
									<th><div align=center>TIPO DE PERSONA</div></th>
									<th><div align=center>SELECCIONAR</div></th>
								</thead>
								<tbody>
									
									@foreach($personas as $persona)						
										<tr>											
											<td>{{$persona->doc_identidad}}</td>
											<td>{{$persona->nombre}}</td>		
											<td>{{$persona->ap_paterno}}</td>
											<td>{{$persona->ap_materno}}</td>
											<td>{{$persona->tipopersona->descripcion}}</td>
											<td>
												<div class="radio">
  													<label><input type="radio" name="optradio" alt="{{$persona->nombre}} {{$persona->ap_paterno}}" value="{{$persona->id}}"></label>
												</div>
											</td>
							            </tr>				            		
									@endforeach
									
								</tbody>
							</table>																		
						</div>								
					</div>		
				</div>
			</div>								
			<div class="modal-footer">	                    
				<div class="btn-inline">
					<div class="btn-group col-sm-4"></div>														
					<div class="btn-group ">
						<input class="btn btn-primary" onclick="getPersona()" data-dismiss="modal" value="Confirmar">					
					</div>
					<div class="btn-group">
						<a  data-dismiss="modal" class="btn btn-info">Cancelar</a>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
	<style type="text/css">
    @media screen and (min-width: 992px) {
        #modalBuscar .modal-lg {
          width: 90%; /* New width for large modal */         
        }                       

		#TableContainer.container {
	        width: 80%;
	    }        
    }
	</style>

</body>
</html>