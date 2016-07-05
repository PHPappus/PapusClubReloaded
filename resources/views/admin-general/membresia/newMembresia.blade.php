<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR MEMBRESÍA</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	
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
					<strong>REGISTRAR MEMBRESÍA</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/membresia/new/save" class="form-horizontal form-border">
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
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" value="{{old('nombre')}}" >
			    	</div>
			  	</div>  	

			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Número Máximo de Invitados</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="numMaxInput" name="numMax" placeholder="Número máximo de Invitados" value="{{old('numMax')}}" >
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="capacidadSocioInput" class="col-sm-4 control-label">Tarifa (S/.)</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'DoubleFormat')" class="form-control" id="tarifaInput" name="tarifa" placeholder="Tarifa" value="{{old('tarifa')}}" >
			    	</div>
			  	</div>
			  	<br>
			  	<div class="form-group">
			    	<label for="capacidadSocioInput" class="col-sm-7 control-label">DESCUENTOS ESPECIALES POR FAMILIAR</label>
			  	</div>	
			  	<br>		  	

					<style>  				
	  				#myTable {
	    					    margin: 0 auto;  
	    			}			
				</style>
				<div class="container" style="width: 600px; margin-left: auto; margin-right: auto"  >
				<table class="table table-bordered" >
						<thead class="active" >	
							<tr>							
								<th class="col-sm-3" ><DIV ALIGN=center>Tipo Persona</th>
								<th class="col-sm-3" ><DIV ALIGN=center>%</th>
								<th class="col-sm-3"><DIV ALIGN=center>Descuento</th>
							</tr>
						</thead>
						<tbody>
								@foreach ($tipofamilias as $tipofamilia)		
							    	<tr>
										<td align="center">  {{ $tipofamilia->nombre }}</td>
										<td align="center">%</td>
										<td align="center"> 
										<div align="center">
								      		<input style="text-align:center;" type="text"  onkeypress="return inputLimiter(event,'DoubleFormat')" class="form-control" name="descuentos[{{$tipofamilia->id}}]" value="{{old('descuentos.'.$tipofamilia->id)}}">
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
						<a href="/membresia/" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				</br>
				</br>

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


</body>
</html>