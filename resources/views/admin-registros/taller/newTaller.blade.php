<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR TALLER</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<style type="text/css" media="screen">
		#dpd1{
			width:456.6px;
			height: 34px;
			padding-left: 12px;
		}
		#map { height: 20%; }
	</style>


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
					<strong>REGISTRAR TALLER</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/taller/new/save" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="reserva" value="{{$reserva->id}}">
			
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
			  	</br>
				

			  	<div class="form-group required">
			    	<label for="sedeInput" class="col-sm-4 control-label">Sede</label>	
			    	<div class="col-sm-5">
				    	<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="sedeInput" name="sede" value="{{$reserva->ambiente->sede->nombre}}" readonly>
					</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="ambienteInput" class="col-sm-4 control-label">Tipo de Ambiente</label>	
			    	<div class="col-sm-5">
				    	<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="ambienteInput" name="ambiente" value="{{$reserva->ambiente->tipo_ambiente}}" readonly>
			  		</div>
			  	</div>

				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="dInput" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
			    	</div>
			  	</div>

			  	<div class="form-group ">
			    	<label for="descripcionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			    		<textarea class="form-control" id="descripcionInput" name="descripcion" maxlength="100" style="resize:none" placeholder="Descripción" rows="3" cols="50" value="{{old('descripcion')}}"></textarea>
			    	</div>
			  	</div>

			  	<div class="form-group">
			    	<label for="profeInput" class="col-sm-4 control-label">Profesor</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="profeInput" name="profe" placeholder="Profesor" value="{{old('profe')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="vacantesInput" class="col-sm-4 control-label">Vacantes</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" min ="0" step="any" class="form-control" id="vacantesInput" name="vacantes" placeholder="Vacantes" value="{{old('vacantes')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
					<label for="fecIniInssInput" class="col-sm-4 control-label">Fecha Inicio de Inscripciones</label>
					<div class="col-sm-5">
						<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecIniIns" placeholder="Fecha Inicio Inscripciones" value="{{old('fecFinIns')}}">
					</div>	
				</div>

			  	<div class="form-group required">
					<label for="fecIniInssInput" class="col-sm-4 control-label">Fecha Fin de Inscripciones</label>
					<div class="col-sm-5">
						<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecFinIns" placeholder="Fecha Fin Inscripciones" value="{{old('fecIniIns')}}">
					</div>	
				</div>

				<div class="form-group required">
					<label for="fecIniInssInput" class="col-sm-4 control-label">Fecha Inicio de Taller</label>
					<div class="col-sm-5">
						<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecIni" placeholder="Fecha Inicio Taller" value="{{$reserva->fecha_inicio_reserva}}" readonly>
					</div>	
				</div>

			  	<div class="form-group required">
					<label for="fecIniInssInput" class="col-sm-4 control-label">Fecha Fin de Taller</label>
					<div class="col-sm-5">
						<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecFin" placeholder="Fecha Fin Taller"  value="{{$reserva->fecha_fin_reserva}}" readonly>
					</div>	
				</div>

				<div class="form-group required">
			    	<label for="cantSesInput" class="col-sm-4 control-label">Cantidad de Sesiones</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')" min ="0" step="any" class="form-control" id="cantSesInput" name="cantSes" placeholder="Cantidad de Sesiones">
			    	</div>
			  	</div>

			  	 </br>

			  	 <div class="form-group">
			    	<label for="capacidadSocioInput" class="col-sm-7 control-label">TARIFAS ESPECIALES POR FAMILIAR</label>
			  	</div>

				<style>  				
  				#myTable {
    					    margin: 0 auto;  }			
			</style>
			<div class="container" style="width: 600px; margin-left: auto; margin-right: auto"  >
			<table class="table table-bordered" >
					<thead class="active" >	
						<tr>							
							<th class="col-sm-3" ><DIV ALIGN=center>Tipo Persona</th>
							<th class="col-sm-3" ><DIV ALIGN=center>Moneda</th>
							<th class="col-sm-3"><DIV ALIGN=center>Monto</th>
						</tr>
					</thead>
					<tbody>
							@foreach ($personas as $persona)		
						    	<tr>
						    		@if($persona->descripcion == 'Postulante' || $persona->descripcion == 'postulante')
										<td align="center">Socio</td>
									@else
										<td align="center">{{$persona->descripcion}}</td>
									@endif
									<td align="center">  S/.</td>
									<td align="center"> 
									<div align="center">																																																		
							      		<input style="text-align:center;" type="text" onkeypress="return inputLimiter(event,'DoubleFormat')" min ="0" step="any" class="form-control" id="{{$persona->descripcion}}Input" name="tarifas[{{$persona->id}}]" placeholder="">
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
						<a href="/taller/index" class="btn btn-info">Cancelar</a>
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
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/bootstrap-datepicker.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
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
				var nowTemp = new Date();		
				var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
		 
				var checkin = $('#fecha_abierto').datepicker({
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
		  			$('#fecha_cerrado')[0].focus();
				}).data('datepicker');

				var checkout = $('#fecha_cerrado').datepicker({
		  			onRender: function(date) {
		    			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
		  			}
				});
		});
			
	</script>	
	<script>
		$(function(){
			$('.datepicker').datepicker({
				format: "dd/mm/yyyy",
		        language: 'es',
		        autoclose: true
		        //beforeShowDay:function (date){return false}
			});
			$('.datepicker').on('changeDate', function(ev){
			    $(this).datepicker('hide');
			});
		});
	</script>

	<script>
		function ventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 1;
		}
		function cerrarventana(){
			document.getElementsByTagName('header')[0].style.zIndex = 3;
		}
  	</script>
	

	
	



</body>
</html>