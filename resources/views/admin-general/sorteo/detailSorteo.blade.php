<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE SORTEO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	
</head>

<body>
@extends('layouts.headerandfooter-al-admin-reserva')
@section('content')
<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>DETALLE DE SORTEO</strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>

				<div class="form-group">
		    		<label for="nombreInput" class="col-sm-4 control-label">NOMBRE:</label>
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="nombreInput" name="nombre" value="{{$sorteo->nombre_sorteo}}" readonly>
		    		</div>
		  		</div>

			  	<div class="form-group">
			    	<label for="telefonoInput" class="col-sm-4 control-label">DESCRIPCIÓN:</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="telefonoInput" name="telefono" value="{{$sorteo->descripcion}}" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="contactoInput" class="col-sm-4 control-label">FECHA CIERRE DE SORTEO:</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="contactoInput" name="nombre_contacto" value="{{$sorteo->fecha_fin_sorteo}}" readonly>
			    	</div>
			  	</div>	

			  	<div class="form-group">
			    	<label for="contactoInput" class="col-sm-4 control-label">FECHA INICIO DE RESERVA:</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="contactoInput" name="nombre_contacto" value="{{$sorteo->fecha_abierto}}" readonly>
			    	</div>
			  	</div>	  	

			  	<div class="form-group">
			    	<label for="capacidadInput" class="col-sm-4 control-label">FECHA FIN DE RESERVA:</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="capacidadInput" name="capacidad_maxima" value="{{$sorteo->fecha_cerrado}}" readonly>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="capacidadInput" class="col-sm-4 control-label">SEDE:</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="capacidadInput" name="capacidad_maxima" value="{{$sede->nombre}}" readonly>
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label for="capacidadInput" class="col-sm-4 control-label">COSTO DE INSCRIPCION:</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="costo_inscripcion" name="costo_inscripcion" value="{{$sorteo->costo_inscripcion}}" readonly>
			    	</div>
			  	</div>


				<br/><br/>
				
				<div class="form-group">
					<div class="col-sm-8"> </div>
					<a href="#" onclick="history.back();" class="btn btn-info">Regresar</a>				
				</div>

			</form>
		</div>
		@if(!empty($ambientes))
			@if($sorteo->estado=='Ejecutado')
				<div class="table-responsive">
					<div class="container">
						<table class="table table-bordered table-hover text-center display" id="example">
							<thead class="active" data-sortable="true">								
								<th><div align=center>NOMBRE</div></th>	
								<th><div align=center>CAPACIDAD</div></th>	
								<th><div align=center>UBICACION</div></th>	
								<th><div align=center>GANADOR</div></th>	
							</thead>	
							<tbody>											
								@foreach($ambientes as $ambientess)
									@foreach($ambientess as $ambiente)
										@if($ambiente)
										<tr>																			
											<td>{{$ambiente->nombre}}</td>
											<td>{{$ambiente->capacidad_actual}}</td>
											<td>{{$ambiente->descripcion}}</td>
											@foreach($ganadores as $ganadoress)
												@foreach($ganadoress as $ganador)
													@if($ganador)
														@if($ganador->ambiente_id == $ambiente->id)
															@foreach($personas as $personass)
																@foreach($personass as $persona)
																	@if($persona)
																		@if($persona->id==$ganador->id_persona)
																			<td>{{$persona->nombre}} {{$persona->ap_paterno}}</td>
																		@endif
																	@endif
																@endforeach
															@endforeach															
														@endif
													@endif
												@endforeach
											@endforeach
										</tr>
										@endif
									@endforeach
								@endforeach
							</tbody>			
						</table>						
					</div>	
				</div>
			@else
				<div class="table-responsive">
					<div class="container">
						<table class="table table-bordered table-hover text-center display" id="example">
							<thead class="active" data-sortable="true">								
								<th><div align=center>NOMBRE</div></th>	
								<th><div align=center>CAPACIDAD</div></th>	
								<th><div align=center>UBICACION</div></th>	

							</thead>	
							<tbody>											
								@foreach($ambientes as $ambientess)
									@foreach($ambientess as $ambiente)
										@if($ambiente)
										<tr>																			
											<td>{{$ambiente->nombre}}</td>
											<td>{{$ambiente->capacidad_actual}}</td>
											<td>{{$ambiente->descripcion}}</td>
										</tr>
										@endif
									@endforeach
								@endforeach
							</tbody>			
						</table>						
					</div>	
				</div>
			@endif
		@endif
	</div>		
@stop
<!-- JQuery -->
	{!!Html::script('/js/jquery-1.11.3.min.js')!!}
	{!!Html::script('/js/bootstrap.js')!!}
	{!!Html::script('/js/jquery.bxslider.min.js')!!}
	{!!Html::script('/js/MisScripts.js')!!}


</body>
</html>