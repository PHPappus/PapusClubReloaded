<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE SOLICITUD</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	
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
					<strong>DETALLE DE SOLICITUD</strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>

				<div class="form-group">
		    		<label for="idInput" class="col-sm-4 control-label">N° de Solicitud</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="idInput" name="id" value="{{str_pad($ingresoproducto->id, 10, "0", STR_PAD_LEFT)}}" readonly>
		    		</div>
		  		</div>
			  
			  	<div class="form-group">
			    	<label for="personaInput" class="col-sm-4 control-label">Persona</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="personaInput" name="persona" value="{{$ingresoproducto->persona->nombre}} {{$ingresoproducto->persona->ap_paterno}} {{$ingresoproducto->persona->ap_materno}}" readonly>
			    	</div>
			  	</div>	  				  				 
			  	
			  	<div class="form-group">
			    	<label for="tipoPagoInput" class="col-sm-4 control-label" >Descripcion</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="tipoPagoInput" name="tipoPago" 
			    		value="{{$ingresoproducto->descripcion}}"
			      		readonly>
			    	</div>			      					      		
			  	</div>	
						
			  	<div class="form-group">
			    	<label for="estadoInput" class="col-sm-4 control-label" >Estado</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="estadoInput" name="estado" 
			    		value="{{$ingresoproducto->estado}}"
			      		readonly>
			    	</div>			      					      		
			  	</div>				  

				<br/><br/>
				

				<div class="table-responsive">				
					<table class="table table-bordered table-hover text-center display" id="example">
						<thead class="active" data-sortable="true">
							<th><div align=center>PRODUCTO</div></th>
							<th><div align=center>DESCRIPCIÓN</div></th>
							<th><div align=center>CANTIDAD</div></th>							
						</thead>

						<tbody>
						@foreach($ingresoproducto->productoxingresoproducto as $producto)
							<tr>
								<td>{{ $producto->producto->nombre}}</td>
								<td>{{ $producto->producto->descripcion}}</td>
								<td>{{ $producto->cantidad}}</td>									
				            </tr>
						@endforeach						
						</tbody>													
					</table>						
				</div>


				<div class="form-group">
					<div class="col-sm-8"> </div>
					<a href="/ingreso-producto/index" class="btn btn-info">Regresar</a>				
				</div>

			</form>
		</div>
	</div>		
@stop
	<!-- JQuery -->
	{!!Html::script('../js/jquery-1.11.3.min.js')!!}
	{!!Html::script('../js/bootstrap.js')!!}
	{!!Html::script('../js/jquery.bxslider.min.js')!!}
	{!!Html::script('../js/MisScripts.js')!!}
</body>
</html>