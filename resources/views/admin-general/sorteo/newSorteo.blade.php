
<!DOCTYPE html>
<html>
<head>
	<title>AGREGAR SORTEO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/jquery.bxslider.css">
	<link rel="stylesheet" href="../ss/font-awesome.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="../css/MisEstilos.css">	
	
	
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
						<input type="text" class="form-control" id="nombre_sorteo" name="nombre_sorteo" required style="max-width: 250px" >
					</div>
				</div>				

				<div class="form-group required">
					<label for="" class="control-label col-sm-5">DESCRIPCION:</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" id="descripcion" name="descripcion" required style="max-width: 250px" >
					</div>
				</div>
				
				<div class="form-group ">
					<label for="" class="control-label col-sm-5">FECHA ABIERTO:</label>
					<div class="col-sm-7">
						<input class="datepicker" type="text" id="fecha_abierto" readonly="true" name="fecha_abierto"   >						
					</div>					
				</div>
				
				<div class="form-group ">
					<label for="" class="control-label col-sm-5">FECHA CERRADO:</label>
					<div class="col-sm-7">
						<input class="datepicker" type="text" id="fecha_cerrado" readonly="true" name="fecha_cerrado"  >						
					</div>
				</div>
				
				<br/>
				<br/>
				<br/>
				<div class="form-group">
					<div class="col-sm-6 text-center">
						<input class="btn btn-success"" type="submit" value="Confirmar">	
					</div>
					<div class="col-sm-6 text-center">
						<a href="/sorteo/index" class="btn btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	<script src="../js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<!-- BXSlider -->
	<script src="../js/jquery.bxslider.min.js"></script>
	<!-- Mis Scripts -->
	<script src="../js/MisScripts.js"></script>
	<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>

	<!-- <script>
		var dateToday = new Date();
		var dates = $("#fecha_abierto, #fecha_cerrado").datepicker({
	    defaultDate: "+1w",
	    changeMonth: true,
	    numberOfMonths: 3,
	    minDate: dateToday,
	    onSelect: function(selectedDate) {
	        var option = this.id == "fecha_abierto" ? "minDate" : "maxDate",
	            instance = $(this).data("datepicker"),
	            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
	        dates.not(this).datepicker("option", option, date);
	    }
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
		var checkin = $('#dpd1').datepicker({
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
  			$('#dpd2')[0].focus();
		}).data('datepicker');

		var checkout = $('#dpd2').datepicker({
  			onRender: function(date) {
    			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  			}
		}).on('changeDate', function(ev) {
  			checkout.hide();
		}).data('datepicker');	
	</script> -->
	<!-- beforeShowDay: function(date){
					//INEFICIENTE
					//fecha de hoy
					var today = new Date();
					var dd = today.getDate();
					var mm = today.getMonth();
					var yyyy = today.getFullYear();
					//fecha a poner
					var currDate = date.getDate();
					return false;
				}-->
	<script type="text/javascript">
		var disabled_dates = ["23.03.2016","21.03.2016"];
		$(function(){
			$('.datepicker').datepicker({
				format: 'dd/mm/yyyy',				
				autoclose:true,
				startDate: '-3d',
				beforeShowDay:function($date){
					return false;
				}
			});
		});
		
	</script>
</body>
</html>