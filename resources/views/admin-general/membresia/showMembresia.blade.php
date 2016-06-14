<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE MEMBRESIA</title>
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
					<strong>DETALLE DE MEMBRESÍA</strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>
			
	    		
			    <br>
				<div class="form-group ">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" value="{{$membresia->descripcion}}" readonly >
			    	</div>
			  	</div>  	

			  	<div class="form-group ">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Número Máximo de Invitados</label>
			    	<div class="col-sm-5">
			      		<input type="number" min ="0" class="form-control" id="numMaxInput" name="numMax" placeholder="Número máximo de Invitados" value="{{$membresia->numMaxInvitados}}" readonly >
			    	</div>
			  	</div>

			  	<div class="form-group ">
			    	<label for="capacidadSocioInput" class="col-sm-4 control-label">Tarifa (S/.)</label>
			    	<div class="col-sm-5">
			      		<input type="number" min="0" step="any" class="form-control" id="tarifaInput" name="tarifa" placeholder="Tarifa" value="{{$membresia->tarifa->monto}}" readonly >
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
								@foreach ($membresia->tarifas_familias as $tipofamilia)		
							    	<tr>
										<td align="center">  {{ $tipofamilia->nombre }}</td>
										<td align="center">%</td>
										<td align="center"> 
										<div align="center">
								      		<input style="text-align:center;" type="text"  class="form-control" name="descuentos[{{$tipofamilia->id}}]" value="{{$tipofamilia->pivot->descuento}}" readonly>
								    	</div>
									</td>							        
									</tr>
								@endforeach
						</tbody>													
				</table>
				</div>
			  	</br>
			  	</br>
				<div class="form-group">
					<div class="col-sm-6"> </div>
						<a class="btn btn-info" href="/membresia/" title="Editar" >Regresar <i class="glyphicon glyphicon-arrow-left"></i></a>			
				</div>
				</br>
				</br>

			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	{!!Html::script('/js/jquery-1.11.3.min.js')!!}
	{!!Html::script('/js/bootstrap.js')!!}
	{!!Html::script('/js/jquery.bxslider.min.js')!!}
	{!!Html::script('/js/MisScripts.js')!!}
</body>
</html>