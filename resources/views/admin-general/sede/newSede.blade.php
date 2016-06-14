<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR SEDE</title>
	<meta charset="UTF-8">

	<meta name="csrf-token" content="{{ csrf_token() }}">
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
					<strong>REGISTRAR SEDE</strong>
			</div>		
		</div>
		<div class="container">
			<form method="POST" action="/sedes/new/sede" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<!-- VALIDACION CON FE INICIO -->
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

				<!-- VALIDACION CON FE FIN  -->
				<br/>
				<br/>
				<div class="form-group">
			  		<div class="text-center">
			  			<font color="red"> 
			  				(*) Dato Obligatorio
			  			</font>
			  			
			  		</div>
			  	</div>
				<br/>
				
				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" value="{{old('nombre')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="telefonoInput" class="col-sm-4 control-label">Teléfono</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="telefonoInput" name="telefono" placeholder="Teléfono" value="{{old('telefono')}}">
			    	</div>

			  	</div>

			  	<div class="form-group required">
			    	<label for="contactoInput" class="col-sm-4 control-label">Contacto</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Letters')"  class="form-control" id="contactoInput" name="nombre_contacto" placeholder="Contacto" value="{{old('nombre_contacto')}}">
			    	</div>
			    	<a class="btn btn-info" name="buscarContacto" href="#"  title="Buscar" ><i name="buscarContacto" class="glyphicon glyphicon-search"></i></a>
			    	<!-- deberia ir a una pantalla que liste todos los contactos posibles del Club  -->
			  	</div>	  	

			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Capacidad maxima</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="capacidad_maxima" name="capacidad_maxima" placeholder="Capacidad" value="{{old('capacidad_maxima')}}">
			    	</div>
			  	</div>

			  	<div class="form-group required">
			    	<label for="capacidadSocioInput" class="col-sm-4 control-label">Capacidad por socio</label>
			    	<div class="col-sm-5">
			      		<input type="text"  onkeypress="return inputLimiter(event,'Numbers')"  class="form-control" id="capacidadSocioInput" name="capacidad_socio" placeholder="Capacidad por Socio" value="{{old('capacidad_socio')}}">
			    	</div>
			  	</div>
			  	
			  	

			  	
			  	<div class="form-group required">
					<div class="col-sm-10">
						<div class="col-sm-5 text-center">
							<label for="" class="control-label">Lugar de Sede:</label>
						</div>
							<div class="col-sm-5">
								<select class="form-control" id="departamento" name="departamento" style="max-width: 250px " data-link="{{ url('/provincias') }}">
									<option value="-1" default>--Departamento--</option>
										@foreach ($departamentos as $depa)      
						                	<option value="{{$depa->id}}"  @if (old('departamento') == $depa->id) selected="selected" @endif  >{{$depa->nombre}}</option>
						                @endforeach
								</select>
								
								<br>
								<select class="form-control" id="provincia" name="provincia" style="max-width: 250px " data-link="{{ url('/distritos') }}" disabled="true">
									<option  value="-1" default disab>--Provincia--</option>
								</select>
								<br>
								<select class="form-control" id="distrito" name="distrito" style="max-width: 250px " disabled="true">
									<option  value="-1" default>--Distrito--</option>
								</select>

								<br><br>

								<!--<a href="#" id="try" data-link="{{ url('/test') }}">Try</a>-->

							</div>	
					</div>
				</div>
									
				
			  	
			  	<div class="form-group required">
			    	<label for="direccionInput" class="col-sm-4 control-label">Dirección</label>
			    	<div class="col-sm-5">
			      		<textarea   type="text"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')"  class="form-control" id="direccionInput" name="direccion" placeholder="Dirección" value="{{old('direccion')}}" style="resize: none"></textarea> 
			    	</div>
			  	</div>

			  	<div class="form-group ">
			    	<label for="referenciaInput" class="col-sm-4 control-label">Referencia </label>
			    	<div class="col-sm-5">
			      		<textarea  type="text"  onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')"   class="form-control" id="referenciaInput" name="referencia" placeholder="Referencia" value="{{old('referencia')}}" style="resize: none"></textarea> 
			    	</div>
			  	</div>

			  	</br>
			  	
			  	</br></br>
			  	<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/sedes/index" class="btn btn-info">Cancelar</a>
					</div>
				</div>

				</br>
				</br>

			</form>
		</div>
	</div>		
@stop
<!-- JQuery -->
	<script src="../js/jquery-3.0.0.js"></script> 
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
	<!-- Bootstrap -->
	<!-- BXSlider -->
	<!-- Mis Scripts -->
	
	<script>$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} })</script>

	<script type="text/javascript">

	    
		$(document).ready(function(){

			$("#departamento").change(function(event){
				document.getElementById("provincia").disabled = false;
				document.getElementById("distrito").disabled = true;
			    $("#distrito").empty();
			    $("#distrito").append("<option  value='-1' default>--Distrito--</option>");
				var url = $(this).attr("data-link");
				$departamento_id=event.target.value;
							//alert($departamento_id);
				alert(url);
				$.ajax({
			        url: "provincias",
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $departamento_id},
			        success:function(data){
			        	$("#provincia").empty();
			        	$("#provincia").append("<option  value='-1' default>--Provincia--</option>");
			        	$.each(data,function(index,elememt){
			        		
			        		$("#provincia").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			           		 console.log("mensaje que quieras");

			        	});
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});


			$("#provincia").change(function(event){
				document.getElementById("distrito").disabled = false;
				var url = $(this).attr("data-link");
				$provincia_id=event.target.value;
							//alert($provincia_id);
				//alert(url);
				//alert($provincia_id);
				$.ajax({
			        url: "distritos",
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { id: $provincia_id},
			        success:function(data){
			        	$("#distrito").empty();
			        	$("#distrito").append("<option  value='-1' default>--Distrito--</option>");
			        	$.each(data,function(index,elememt){

							//alert(elememt.id);
			        		//alert(element.nombre);
			        		$("#distrito").append("<option value='"+elememt.id+"'>"+elememt.nombre+"</option>");
			        	});
			            //alert(data);
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); //end of ajax
			});


			$("#try").click(function(){
			    var url = $(this).attr("data-link");
			    
			    $.ajax({
			        url: "test",
			        type:"POST",
			        beforeSend: function (xhr) {
			            var token = $('meta[name="csrf_token"]').attr('content');

			            if (token) {
			                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
			            }
			        },
			        data: { testdata : 'testdatacontent' },
			        success:function(data){
			            alert(data);
			        },error:function(){ 
			            alert("error!!!!");
			        }
			    }); 
			});

		});


	</script>


	
	
</body>
</html>