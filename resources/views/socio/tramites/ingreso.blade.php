<!DOCTYPE html>
<html>
<head>
	<title>INGRESO CON INVITADOS</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
</head>
<body>
@extends('layouts.headerandfooter-al-socio')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>INGRESO CON INVITADOS</strong></p>
				<br/>
			</div>
			
		</div>
	</div>
		@if (session('stored'))
			<script>$("#modalSuccess").modal("show");</script>
			
			<div class="alert alert-success fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>¡Éxito!</strong> {{session('stored')}}
			</div>
		@endif




	<div class="container">
		<form method="POST" action="{{url('solicitud-ingreso-invitados/guardar-invitacion')}}" class="form-horizontal">
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
			<br>
			<br>
			<div class="col-sm-4"></div>
			<div class="">
		  		<font color="red"> 
		  			(*) Dato Obligatorio
		  		</font>		  			
			</div>			
		  	<br>
			<br>
			<br>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-left">
						<p class="lead"><strong>LUGAR</strong></p>
					</div>
				</div>	
			</div>
		  	<div class ="container form-border">
		  		<br><br>
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Seleccione Sede:</label>
			    	<div class="col-sm-5">
			      		<select class="form-control" id="sede_id" name="sede" >
			      		<option value=-1>Seleccione Sede</option>
			    		@foreach ($sedes as $sede)
			    			<option value={{$sede->id}}>{{$sede->nombre}}</option>
			    		@endforeach												
						</select>
			    	</div>
			  	</div>  	

			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Fecha de Ingreso a la sede:</label>
			    	<div class="col-sm-5">
						<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="fecha_invitacion" name="fecha_invitacion" placeholder="Fecha Invitación" style="width: 457px" value="{{old('fecha_invitacion')}}">
					</div>
			  	</div>
			  	<br><br>		  	
		  	</div>
		  	<br><br><br>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-left">
						<p class="lead"><strong>INVITADOS</strong></p>
					</div>

				</div>	
			</div>
		  	<div class="container form-border">
		  	<br><br>
		  		<p style="color:red; margin-left:200px">(*)Seleccione de su lista de invitados con quien(es) ingresará.</p>
		  		<p style="color:red; margin-left:200px">(*)El número de invitados que le quedan en el mes que no pagan es: {{$socio->membresia->numMaxInvitados - $socio->numInvitadosMes}}</p>
		  		<p style="color:red; margin-left:200px">(*)El precio por cada invitado adicional es: {{$precio}}</p>
		  		<p style="color:red; margin-left:200px">(*)El pago será realizado al momento del ingreso al club.</p>
				<br>
				<br>

				<div class="table-responsive">
					<div class="container">
						<table class="table table-bordered table-hover text-center display" id="example">
								<thead class="active">
									<th><div algin=center>DOCUMENTO</div></th>
									<th><div align=center>NOMBRE</div> </th>
									<th><div align=center>APELLIDO PATERNO</div></th>
									<th><div align=center>APELLIDO MATERNO</div></th>
									<th><div align="center">CORREO</div></th>
									<th><div align=center>SELECCIONAR</div></th>														

								</thead>
								<tbody>
									@foreach($invitados as $invitado)					
											<tr>
											@if(strcmp($invitado->nacionalidad,'peruano')==0)
												<td>{{$invitado->doc_identidad}}</td>
											@else
												<td>{{$invitado->carnet_extranjeria}}</td>
											@endif
												<td>{{$invitado->nombre}}</td>
												<td>{{$invitado->ap_paterno}}</td>
												<td>{{$invitado->ap_materno}}</td>
												<td>{{$invitado->correo}}</td>
												<td>
													<div class="checkbox">																
													  <label><input type="checkbox" name="inv[]" value="{{$invitado->pivot->id}}"></label>
													</div>
								            	</td>																	
								            </tr>				            		
									@endforeach
								</tbody>

						</table>
						<br><br>								
					</div>		
				</div>
				<br><br>
		  	</div>
		  	<br><br>
		  	<div class="btn-group col-sm-5" ></div>
			<div class="btn-group">
				<input class="btn btn-primary "  type="submit" value="Confirmar">
			</div>
			<div class="btn-group">
				<a href="{{url('/socio')}}" class="btn btn-info">Cancelar</a>
			</div>		  	
		</form>
	</div>
	</br></br></br></br></br>
		


@stop
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}

	{!!Html::script('js/bootstrap-datepicker.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<!-- {!!Html::script('js/jquery.dataTables.min.js')!!} -->

	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
		   $('#example').DataTable( {
		       "language": {
		           "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		       }
		  	});
  		});
	</script>
	<script>
		$(document).ready(function(){
			var nowDate = new Date();
			var minDate = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
			var maxDate = new Date(nowDate.getFullYear(), nowDate.getMonth()+1, nowDate.getDate(), 0, 0, 0, 0);


			$(function(){
				$('.datepicker').datepicker({
					format: "dd/mm/yyyy",
			        language: "es",
			        autoclose: true,
			        startDate:minDate,
			        endDate:maxDate
			        //beforeShowDay:function (date){return false}
				});

			});

		});
		$('.datepicker').on('changeDate', function(ev){
			    $(this).datepicker('hide');
		});
			
	</script>


	<!-- Modal -->
	



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
</body>
</html>