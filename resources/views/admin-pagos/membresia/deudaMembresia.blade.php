<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR PAGO POR MEMBRESÍA</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
</head>
<body>
@extends('layouts.headerandfooter-al-admin-pagos')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>REGISTRAR PAGO POR MEMBRESÍA</strong></p>
				<br/>
			</div>
			
		</div>
	</div>

	<div class="container">
			<form method="POST" action="{{url('/registrar-pago-membresia/')}}" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div role="tabpanel">
							<ul class="nav nav-pills nav-justified" role="tablist">
							@if ($errors->any())
								<li role="presentation" ><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Socio</a></li>
								<li role="presentation" class="active"><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Registrar Pago</a></li>
							@else
								<li role="presentation" class="active" ><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Socio</a></li>
								<li role="presentation" ><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Registrar Pago</a></li>
							@endif
							</ul>
						</div>

						<div class="tab-content">
						@if ($errors->any())						
							<div role="tabpanel" class="tab-pane " id="seccion1">
						@else
							<div role="tabpanel" class="tab-pane active" id="seccion1">
						@endif						
								<br><br>
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">DNI:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="carnet_socio" name="carnet_socio" placeholder="DNI" style="max-width: 250px" value="{{$socio->carnet_actual()->nro_carnet}}" readonly >
										</div>	
									</div>
								</div>
								@if($socio->postulante->persona->nacionalidad=='peruano')
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">DNI:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="dni" name="dni" placeholder="DNI" style="max-width: 250px" value="{{$socio->postulante->persona->doc_identidad}}" readonly >
										</div>	
									</div>
								</div>
								@else
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">CARNET DE EXTRANJERÍA:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="carnet" name="carnet" placeholder="Carnet" style="max-width: 250px" value="{{$socio->postulante->persona->carnet_extranjeria}}" readonly >
										</div>	
									</div>
								</div>								
								@endif

								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Nombre:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="nombre" name="nombre" placeholder="Nombre" style="max-width: 250px" value="{{$socio->postulante->persona->nombre}}" readonly >
										</div>	
									</div>
								</div>

								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Paterno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="ap_paterno" name="ap_paterno" placeholder="Apellido Paterno" style="max-width: 250px" value="{{$socio->postulante->persona->ap_paterno}}" readonly >
										</div>	
									</div>
								</div>

								
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Materno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="ap_materno" name="ap_materno" placeholder="Apellido Materno" style="max-width: 250px" value="{{$socio->postulante->persona->ap_materno}}" readonly >
										</div>	
									</div>
								</div>
								<br><br>
									<div class="btn-inline">
										<div class="btn-group col-sm"></div>
						
										<div class="btn-group">
											<a href="{{url('/membresia/deudas')}}" class="btn btn-info">Regresar</a>
										</div>				
									</div>
									<br><br><br>													
							</div>							

							<!--REGISTRAR PAGO-->
						@if ($errors->any())						
							<div role="tabpanel" class="tab-pane active" id="seccion2">
						@else
							<div role="tabpanel" class="tab-pane" id="seccion2">
						@endif							

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
								<br>
								<div class="form-group ">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Tipo Membresía:</label>
										</div>
										<div class="col-sm-6">
											<input type="text"  class="form-control" id="tipo_membresia" name="tipo_membresia" placeholder="Tipo Membresía" style="max-width: 250px" value="{{$socio->membresia->descripcion}}" readonly >
										</div>	
									</div>
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Monto:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" onkeypress="return inputLimiter(event,'DoubleFormat')" class="form-control" id="monto" name="monto" placeholder="Monto a Pagar" value="{{$socio->membresia->tarifa->monto}}" readonly>				
											</select>											
										</div>										
									</div>									
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Tipo de Pago:</label>
										</div>
										<div class="col-sm-6">
								      		<select class="form-control" id="tipo_pago_id" name="tipo_pago_id" >
								      		<option value=-1>Seleccione Tipo de Pago</option>
								    		@foreach ($tipopagos as $tipopago)
								    			<option value={{$tipopago->id}}>{{$tipopago->valor}}</option>
								    		@endforeach												
											</select>											
										</div>										
									</div>									
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Comprobante de Pago:</label>
										</div>
										<div class="col-sm-6">
								      		<select class="form-control" id="comprobante" name="comprobante" >
								      		<option value=-1>Seleccione el Comprobante de Pago</option>
								    		@foreach ($comprobantes as $comprobante)
								    			<option value={{$comprobante->id}}>{{$comprobante->valor}}</option>
								    		@endforeach												
											</select>											
										</div>									
									</div>									
								</div>																														
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Número de Pago:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" onkeypress="return inputLimiter(event,'Numbers')" id="numero" name="numero" placeholder="Número de Pago">		
											</select>											
										</div>										
									</div>									
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Descripción:</label>
										</div>
										<div class="col-sm-6">
											<textarea id ="descripcion"  class="form-control" name="descripcion"  placeholder="Descripción del Pago"  rows="5" cols="50" style="max-width: 850px; max-height: 300px;" readonly>Pago por Membresía.</textarea>											
										</div>										
									</div>									
								</div>

								<br><br>
								<div class="btn-inline">
									<div class="btn-group col-sm"></div>
					
									<div class="btn-group ">
										<input class="btn btn-primary" type="submit" value="Registrar Pago">
									</div>
									<div class="btn-group">
										<a href="{{url('membresia/deudas')}}" class="btn btn-info">Regresar</a>
									</div>				
								</div>								
								<br>				
							</div>

						</div>
					</div>		
				</div>
			</form>
		</div>	
		
		
@stop
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}

	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
		   $('#example').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       }
		  	});

		   $('#example2').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       }
		  	});

			$(":checkbox" ).on( "click", countChecked );




  		});


			 var countChecked = function() {
			 var n = $( '.checkInvitado:checked' ).length;
			  $( '#numinv' ).val(n);
			  var max = $('#nummax').val();
			  if(max-n<0){
			  	var mult = n-max;
			  	var precio = $('#precio').val();
				var number = Number(precio.replace(/[^0-9\.]+/g,''));
			  	$('#monto').val(mult*precio);
			  }
			  else
			  {
			  	$('#monto').val('0');
			  }
			};
			countChecked();
			 


	</script>




	
</body>
</html>