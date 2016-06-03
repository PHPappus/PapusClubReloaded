
<!DOCTYPE html>
<html>
<head>
	<title>AGREGAR SORTEO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	
	
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
					<strong>AGREGAR SORTEO</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/sorteo/new/sorteo" class="form-horizontal form-border">
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
				<br/><br/>
				<div class="col-sm-4"></div>
				<div class="">
			  		<font color="red"> 
			  			(*) Dato Obligatorio
			  		</font>		  			
				</div>			
			  	</br>
			  	</br>
				<div class="form-group required">
					<label for="" class="control-label col-sm-5">NOMBRE DEL SORTEO:</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="nombre_sorteo" name="nombre_sorteo" value="{{ old('nombre_sorteo') }}" required style="max-width: 250px" >
					</div>
				</div>				

				<div class="form-group required">
					<label for="" class="control-label col-sm-5">DESCRIPCION:</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" required style="max-width: 250px" >
					</div>
				</div>
				
				<div class="form-group required">
					<label for="" class="control-label col-sm-5">FECHA INICIO [dd/mm/aaaa]:</label>
					<div class="col-sm-7">
						<input class="datepicker" type="text" id="fecha_abierto" readonly="true" name="fecha_abierto" value="{{ old('fecha_abierto') }}"  >						
					</div>					
				</div>
				
				<div class="form-group required">
					<label for="" class="control-label col-sm-5">FECHA FIN [dd/mm/aaaa]:</label>
					<div class="col-sm-7">
						<input class="datepicker" type="text" id="fecha_cerrado" readonly="true" name="fecha_cerrado"  value="{{ old('fecha_cerrado') }}" >						
					</div>
				</div>
				<div class="table-responsive"  style="display:none">
					<div class="container">
						<table class="table table-bordered table-hover text-center display" id="example">
							<thead class="active" data-sortable="true">
								<th><div align=center>NOMBRE BUNGALOW</div> </th>
								<th><div align=center>CAPACIDAD</div></th>
								<th><div align=center>SEDE</div></th>
								<th><div align=center>UBICACION</div></th>								
							</thead>	
							<tbody>													
								@foreach($ambientes as $ambiente)									
									<tr>									
										<td>{{$ambiente->nombre}}</td>
										<td>{{$ambiente->capacidad_actual}}</td>
										<td>{{$ambiente->sede_id}}</td>	
										<td>{{$ambiente->ubicacion}}</td>												            	
									</tr>
								</form>
								 @endforeach
							</tbody>			
						</table>						
					</div>	
				</div>


				<br/>
				<br/>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/sorteo/index" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				<br><br><br>

			</form>
		</div>
	</div>		
@stop
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>

	<script>
		$(document).ready(function(){
		    $(function() {

		            // run on change for the selectbox
		            $( "#fecha_abierto" ).change(function() {  
		                updateDurationDivs();
		            });

		            // handle the updating of the duration divs
		            function updateDurationDivs() {
		                // hide all form-duration-divs
		                //$('.form-duration-div').hide();

		                //var divKey = $( "#frm_duration option:selected" ).val();                
		                $('#fecha_abierto').show();
		            }        

		            // run at load, for the currently selected div to show up
		            updateDurationDivs();

		    });
		});
        
    </script>
	<script>
			$(function(){
				$('.datepicker').datepicker({
					format: 'dd/mm/yyyy',
					autoclose:true
				});
			});
		
	</script>
</body>
</html>