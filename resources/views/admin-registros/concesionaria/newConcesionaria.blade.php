<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR CONCESIONARIA</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/bootstrap-datepicker3.css')!!}
	{!!Html::style('/css/DataTable.css')!!}	
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
					<strong>REGISTRAR CONCESIONARIA</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/concesionaria/new/concesionaria" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<!-- Mensajes de error de validación del Request -->
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
				<div class="form-group">
			  		<div class="text-center">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  			
			  		</div>
			  	</div>
			  	</br>
			  	</br>
				
			  	<div class="form-group required">
			    	<label for="sede_id" class="col-sm-4 control-label">ID Sede</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="sede_id" name="sede_id" placeholder="ID de la Sede" value="{{old('sede_id')}}">
			    	</div>
			    	<a class="btn btn-info" name="buscarsede" href="#"  title="Buscar Sede" data-toggle="modal" data-target="#modalBuscar"><i name="buscarSede" class="glyphicon glyphicon-search"></i></a>
			  	</div>		

				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la Concesionaria" value="{{old('nombre')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="telefonoInput" class="col-sm-4 control-label">RUC</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="ruc" name="ruc" placeholder="RUC" pattern="[0-9]{11}" title="Número de 11 dígitos" value="{{old('ruc')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" value="{{old('descripcion')}}">
			    	</div>
			  	</div>	  	

			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Teléfono</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" pattern="[0-9]{7,13}" value="{{old('telefono')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="capacidadSocioInput" class="col-sm-4 control-label">Correo</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" value="{{old('correo')}}">
			    	</div>
			  	</div>
			  	
			  	<div class="form-group required">
			    	<label for="departamentoInput" class="col-sm-4 control-label">Nombre del Responsable</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="nombre-responsable" name="nombre_responsable" placeholder="Nombre del Responsable" value="{{old('nombre_responsable')}}">
			    	</div>
			  	</div>			  	

			  	<div class="form-group required">
			    	<label for="tipoConcesionariaInput" class="col-sm-4 control-label">Tipo de Concesionaria</label>
			    	<div class="col-sm-5">
			    	
			      		<select class="form-control" id="tipo_concesionaria" name="tipo_concesionaria">

						<option value="" selected >Seleccionar tipo...</option>
						@foreach($tipo_concesionarias as $tipo_concesionaria)
							<option value="{{$tipo_concesionaria->valor}}" >{{$tipo_concesionaria->valor}}</option>
						@endforeach						
						</select>						
						
			    	</div>
			    	<a class="btn btn-info" name="agregarTipoConcesionaria" href="#"  title="Agregar Tipo de Concesionaria" data-toggle="modal" data-target="#modalAgregar"><i name="agregarTipoConcesionaria" class="glyphicon glyphicon-plus"></i></a>
			  	</div>		

				<div class="form-group required">
					<label  class="control-label col-sm-4">Inicio de Concesión [dd/mm/aaaa]:</label>
					<div class="col-sm-5">
						<input class="datepicker" type="text" id="fecha_inicio_concesion" readonly name="fecha_inicio_concesion" value="{{ old('fecha_inicio_concesion') }}"  >						
					</div>					
				</div>
				
				<div class="form-group required">
					<label  class="control-label col-sm-4">Fin de Concesión [dd/mm/aaaa]:</label>
					<div class="col-sm-5">
						<input class="datepicker" type="text" id="fecha_fin_concesion" readonly name="fecha_fin_concesion"  value="{{ old('fecha_fin_concesion') }}" >						
					</div>
				</div>

			  	</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/concesionaria/index" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				</br>
				</br>

			</form>
		</div>
	</div>		
@stop
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('/js/jquery.bxslider.min.js')!!}	
	{!!Html::script('js/MisScripts.js')!!}
	{!!Html::script('js/jquery-1.12.4.min.js')!!}	
	{!!Html::script('js/bootstrap-datepicker-sirve.js')!!}		  
	{!!Html::script('js/jquery.dataTables.js')!!}

	<script>
		$(document).ready(function(){						 		
			var nowTemp = new Date();		
			var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

			var checkin = $('#fecha_inicio_concesion').datepicker({					
	  			onRender: function(date) {

	    			return date.valueOf() < now.valueOf() ? 'disabled' : '';
	  			}
			}).on('changeDate', function(ev) {
	  			if (ev.date.valueOf() > checkout.date.valueOf()) {
	    			var newDate = new Date(ev.date)
	    			newDate.setDate(newDate.getDate() + 1);
	    			checkout.setValue(newDate);
	  			}
	 			checkin.hide();
	  			$('#fecha_fin_concesion')[0].focus();
			}).data('datepicker');

			var checkout = $('#fecha_fin_concesion').datepicker({
				language: "es",
	  			onRender: function(date) {
	    			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
	  			}
			}).on('changeDate', function(ev) {
	  			checkout.hide();
			}).data('datepicker');	
			$(function(){

			$('#fecha_inicio_concesion').datepicker('update', now);
			});

			$(function(){
				$('.datepicker').datepicker({
					format: "dd/mm/yyyy",				        
			        autoclose: true,
			        startDate: today,						
			        setDate: now
				});
			});

			$('#example').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       },		       
		       "dom": '<"pull-left"f><"pull-right"l>tip',
		       "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]]
		  	});
		});		
  		
		function getsede(){								
			document.getElementById('sede_id').value =  $('#example input:radio:checked').val();
		}
	</script>	

<!-- Modal -->
	<div id="modalBuscar" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->	    
	    <div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">BUSCAR SEDE</h4>
			</div>

			<div class="modal-body">	      	  
				<div class="container">					
					<div class="table-responsive">
						<div class="container" id="TableContainer">
							<div class="text-left">
					  			<font color="black"> 
					  				Ingresar alguno de los siguientes campos:
					  				<ul>
					  				<li>Nombre de Sede</li>
					  				<li>Dirección</li>
					  				<li>Distrito</li>
					  				<li>Provincia</li>
					  				<li>Departamento</li>
					  				</ul>
					  			</font>					  			
					  		</div>
					  		<br>
							<table class="table table-bordered table-hover text-center display" id="example" width="100%">
								<thead class="active" data-sortable="true">									
									<th><div align=center>NOMBRE</div> </th>
									<th><div align=center>DIRECCIÓN</div></th>
									<th><div align=center>DISTRITO</div></th>
									<th><div align=center>PROVINCIA</div></th>
									<th><div align=center>DEPARTAMENTO</div></th>
									<th><div align=center>SELECCIONAR</div></th>
								</thead>
								<tbody>
									
									@foreach($sedes as $sede)						
										<tr>																						
											<td>{{$sede->nombre}}</td>													
											<td>{{$sede->direccion}}</td>
											<td>{{$sede->distrito}}</td>
											<td>{{$sede->provincia}}</td>
											<td>{{$sede->departamento}}</td>											
											<td>
												<div class="radio">
  													<label><input type="radio" name="optradio" value="{{$sede->id}}"></label>
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
						<input class="btn btn-primary" onclick="getsede()" data-dismiss="modal" value="Confirmar">					
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
	<!-- Modal -->
	<div id="modalAgregar" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->	    
	    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Confirmar</h4>
		</div>
		<div class="container">
			<form method="POST" action="/concesionaria/new/tipoconcesionaria" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<br>
				<div class="form-group required">
			    	<label for="valorInput" class="col-sm-1 control-label">Nombre</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="valor" name="valor" placeholder="Nombre del Tipo de Concesionaria" value="{{old('valor')}}">
			    	</div>					    	
				</div>									 

				<div class="btn-inline">
					<div class="btn-group col-sm-4"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a  data-dismiss="modal" class="btn btn-info">Cancelar</a>
					</div>
				</div>
			</form>
		</div>

	    <div class="modal-body">	      
	    </div>
		<div class="modal-footer">	                    
		</div>
	    </div>

	  </div>
	</div>
</body>	
</html>