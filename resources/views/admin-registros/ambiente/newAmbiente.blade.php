<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR AMBIENTE</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}

	
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
					<strong>REGISTRAR AMBIENTE</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/ambiente/new/ambiente" class="form-horizontal form-border">
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
				

					<!-- INICIO INICIO INICIO INICIO -->
				<div class="form-group required">
			    	<label for="sedeInput" class="col-sm-4 control-label">Sede</label>	
			    	<div class="col-sm-5">
				    	<select class="form-control" name="sedeSelec" style="max-width: 150px "  >
							                <option value="" default>Seleccione</option>							         
							                 @foreach ($sedes as $sede)      
							                	<option value="{{$sede->id}}">{{$sede->nombre}}</option>
							                @endforeach
						</select>
					</div>
			  	</div>

				<div class="form-group required">
			    	<label for="nombreInput" class="col-sm-4 control-label">Nombre</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')"   class="form-control" id="nombreInput" name="nombre" placeholder="Nombre" value="{{old('nombre')}}" maxlength="30">
			    	</div>
			  	</div>
			  	<div class="form-group required">
			    	<label for="tipoAmbienteInput" class="col-sm-4 control-label">Tipo Ambiente</label>	
			    	<div class="col-sm-5">
				    	<select class="form-control" id="tipoAmbienteInput" name="tipo_ambiente" style="max-width: 150px "   >
							                <option value="" default>Seleccione</option>
							                @foreach ($values as $value)      
							                	<option value="{{$value->id}}">{{$value->valor}}</option>
							                @endforeach
							                
						</select>
					</div>
					<a class="btn btn-info" name="agregarTipoAmbiente" href="#"  title="Agregar Tipo de Ambiente" data-toggle="modal" data-target="#modalAgregar"><i name="agregarTipoAmbiente" class="glyphicon glyphicon-plus"></i></a>
			  	</div>

			  	<div class="form-group required">
			    	<label for="capacidadInput" class="col-sm-4 control-label">Capacidad Máxima</label>
			    	<div class="col-sm-5">
			      		<input type="text" onkeypress="return inputLimiter(event,'Numbers')"   class="form-control" id="capacidadInput" name="capacidad_actual" placeholder="Capacidad Máxima" value="{{old('capacidad_actual')}}" >
			    	</div>
			  	</div>	  	
			  	
			  	<div class="form-group required">
			    	<label for="ubicacionInput" class="col-sm-4 control-label">Descripción</label>
			    	<div class="col-sm-5">
			      		<textarea type="text" onkeypress="return inputLimiter(event,'NameCharactersAndNumbers')"   class="form-control" id="descripcionInput" name="descripcion" placeholder="Descripción" value="{{old('descripcion')}}" style="resize: none" maxlength="100"></textarea>
			    	</div>
			  	</div>
			  
			  	<!-- INICIO  PRECIO POR TIPO DE PERSONA -->
			  	<br/>
			  	<br/>
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
							<th class="col-sm-3" ><DIV ALIGN=center>Moneda</th>
							<th class="col-sm-3"><DIV ALIGN=center>Monto</th>
						</tr>
					</thead>
					<tbody>
							@foreach ($tipoPersonas as $tipoPersona)		
						    	<tr>
						    		@if($tipoPersona->descripcion == 'Postulante' || $tipoPersona->descripcion == 'postulante')
										<td align="center">Socio</td>
									@else
										<td align="center">{{$tipoPersona->descripcion}}</td>
									@endif
									<td align="center">  S/.</td>
									@if($tipoPersona->descripcion == 'Vip' || $tipoPersona->descripcion == 'vip')
									<td align="center"> 
										<div align="center">											
								      			<input type="text" style="text-align:center;" onkeypress="return inputLimiter(event,'DoubleFormat')"   class="form-control" id="{{$tipoPersona->descripcion}}Input" name="{{$tipoPersona->descripcion}}" placeholder="Monto" maxlength="6" value="0" readonly >								      		
								    	</div>
									</td>	
									@else	
									<td align="center"> 
										<div align="center">											
								      			<input type="text" style="text-align:center;" onkeypress="return inputLimiter(event,'DoubleFormat')"   class="form-control" id="{{$tipoPersona->descripcion}}Input" name="{{$tipoPersona->descripcion}}" placeholder="Monto" maxlength="6" >									      	
								    	</div>
									</td>					        

									@endif
								</tr>
							@endforeach
					</tbody>													
			</table>
			</div>	  	

			  	<!-- FIN     PRECIO POR TIPO DE PERSONA -->
			  				  	

			  	<!-- FIN FIN FIN -->
					
				</br></br>
			  	<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a href="/ambiente/index" class="btn btn-info">Cancelar</a>
					</div>
				</div>

			  	</br>
			  	</br>
			</form>
		</div>
	</div>	
		</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>	
@stop
<!-- JQuery -->
	<script src="../js/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<!-- BXSlider -->
	<script src="../js/jquery.bxslider.min.js"></script>
	<!-- Mis Scripts -->
	<script src="../js/MisScripts.js"></script>

	<!-- Modal -->
	<div id="modalAgregar" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->	    
	    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Confirmar</h4>
		</div>
		<div class="container">
			<form method="POST" action="/ambiente/new/tipoambiente" class="form-horizontal form-border">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<br>
				<div class="form-group required">
			    	<label for="valorInput" class="col-sm-1 control-label">Nombre</label>
			    	<div class="col-sm-5">			      		
			      		<input type="text" onkeypress="return inputLimiter(event,'Letters')" class="form-control" id="valor" name="valor" placeholder="Nombre del Tipo de Ambiente" value="{{old('valor')}}">
			    	</div>					    	
				</div>									 

				</br>
				</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-4"></div>
					
					<div class="btn-group ">
						<input class="btn btn-primary" type="submit" value="Confirmar">
					</div>
					<div class="btn-group">
						<a  data-dismiss="modal" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				</br>
				</br>
			</form>
		</div>

	    <div class="modal-body">	      
	    </div>
		<div class="modal-footer">	                    
		</div>
	    </div>

	  </div>
	</div>


  	

</body>
</html>