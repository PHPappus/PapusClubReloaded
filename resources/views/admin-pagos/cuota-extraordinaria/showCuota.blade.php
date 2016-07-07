<!DOCTYPE html>
<html>
<head>
	<title>DETALLE DE CUOTA</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('/css/jquery.bxslider.css')!!}
	{!!Html::style('/css/font-awesome.css')!!}
	{!!Html::style('/css/bootstrap.css')!!}
	{!!Html::style('/css/MisEstilos.css')!!}
	
</head>

<body>
@extends('layouts.headerandfooter-al-admin-pagos')
@section('content')
<!---Cuerpo -->
<main class="main">
	<div class="content" style="max-width: 100%;">
		<!-- Utilizando Bootstrap -->
		<br/><br/>
		<div class="container">
			<div class="col-sm-12 text-left lead">
					<strong>DETALLE DE CUOTA</strong>
			</div>		
		</div>

		<div class="container">
			<form class="form-horizontal form-border">
				<br/><br/>
				
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" value="{{$cuota->nombre}}"  readonly>
			    	</div>
			  	</div>
	    		
			  	<div class="form-group">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Motivo</label>
			    	<div class="col-sm-5">
			    		<textarea class="form-control" id="descripcionInput" maxlength="100" style="resize: none" name="descripcion" rows="3" cols="50" value = "{{$cuota->id}}" readonly>{{$cuota->motivo}}</textarea>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="montoInput" class="col-sm-4 control-label">Monto(S/.)</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'DoubleFormat')" min ="0" step="any" class="form-control" id="montoInput" name="monto" value="{{$cuota->monto}}" placeholder="Monto" readonly>
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-3">
			      		<input type="checkbox" class="checkbox" id="estadoInput" name="estado" @if($cuota['estado'] == TRUE) checked @endif disabled>
			    	</div>
			  	</div>

			  	</br>
			  	</br>
				<div class="form-group">
					<div class="col-sm-6"> </div>
						<a class="btn btn-info" href="/cuota-extra/" title="Editar" >Regresar <i class="glyphicon glyphicon-arrow-left"></i></a>			
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