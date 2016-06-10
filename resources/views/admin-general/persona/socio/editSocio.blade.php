<!DOCTYPE html>
<html>
<head>
	<title>EDITAR SOCIO</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
	<style>
		.modal-backdrop.in{
			z-index: 1;
		}

		#cuota_select {
        /*for firefox*/
        -moz-appearance: none;
        /*for chrome*/
        -webkit-appearance:none;
      }

		/*for IE10*/
		#cuota_select::-ms-expand {
    	display: none;
		}
}

	</style>

</head>
<body>
@extends('layouts.headerandfooter-al-admin')
@section('content')


	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>EDITAR SOCIO</strong></p>
				<br/>
			</div>
			
		</div>
	</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-16 text-center">
					<div role="tabpanel">
						<ul class="nav nav-pills nav-tabs" role="tablist">

						<!--DATOS BASICOS-->
						@if(!Session::has('update') && !$errors->basico->any() && !$errors->estudio->any() && !$errors->trabajo->any() && !$errors->contacto->any())									
							<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Básico</a></li>
						@elseif(Session::get('update')=='basico' || $errors->basico->any())
							<li role="presentation" class="active"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Básico</a></li>
						@else
							<li role="presentation"><a href="#seccion1" aria-controls="seccion1" data-toggle="tab" role="tab">Básico</a></li>
						@endif

						<!--DATOS DE NACIMIENTO-->

							<li role="presentation"><a href="#seccion2" aria-controls="seccion2" data-toggle="tab" role="tab">Nacimiento</a></li>

						<!--DATOS DE FAMILIA-->

							<li role="presentation"><a href="#seccion3" aria-controls="seccion3" data-toggle="tab" role="tab">Familia</a></li>

						<!--DATOS DE VIVIENDA-->

							<li role="presentation"><a href="#seccion4" aria-controls="seccion4" data-toggle="tab" role="tab">Vivienda</a></li>

						<!--DATOS DE ESTUDIO-->							
						@if(Session::get('update')=='estudio' || $errors->estudio->any())
							<li role="presentation" class="active"><a href="#seccion5" aria-controls="seccion5" data-toggle="tab" role="tab">Estudio</a></li>
						@else
							<li role="presentation"><a href="#seccion5" aria-controls="seccion5" data-toggle="tab" role="tab">Estudio</a></li>
						@endif

						<!--DATOS TRABAJO-->							
						@if(Session::get('update')=='trabajo' || $errors->trabajo->any())
							<li role="presentation" class="active"><a href="#seccion6" aria-controls="seccion6" data-toggle="tab" role="tab">Trabajo</a></li>
						@else
							<li role="presentation"><a href="#seccion6" aria-controls="seccion6" data-toggle="tab" role="tab">Trabajo</a></li>
						@endif

						<!--DATOS CONTACTO-->
						@if(Session::get('update')=='contacto' || $errors->contacto->any())
							<li role="presentation" class="active"><a href="#seccion7" aria-controls="seccion7" data-toggle="tab" role="tab">Contacto</a></li>
						@else
							<li role="presentation"><a href="#seccion7" aria-controls="seccion7" data-toggle="tab" role="tab">Contacto</a></li>
						@endif

						<!--DATOS INVITADOS-->
							<li role="presentation"><a href="#seccion8" aria-controls="seccion8" data-toggle="tab" role="tab">Invitados</a></li>							
							<li role="presentation"><a href="#seccion9" aria-controls="seccion9" data-toggle="tab" role="tab">Membresía</a></li>
						</ul>
					</div>
					<div class="tab-content">

										<!--DATOS BÁSICOS-->
						


					@if(!Session::has('update') && !$errors->basico->any() && !$errors->estudio->any() && !$errors->trabajo->any() && !$errors->contacto->any())									
						<div role="tabpanel" class="tab-pane active" id="seccion1">
					@elseif(Session::get('update')=='basico' || $errors->basico->any())
						<div role="tabpanel" class="tab-pane active" id="seccion1">
					@else
						<div role="tabpanel" class="tab-pane" id="seccion1">
					@endif
							<form method="POST" action="/Socio/{{$socio->id}}/editBasico" class="form-horizontal form-border">
								{{method_field('PATCH')}}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<br/><br/>
								<div class="col-sm-4"></div>
								<div class=""> 
									@if ($errors->basico->any())
						  				<ul class="alert alert-danger fade in">
						  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  					@foreach ($errors->basico->all() as $error)
						  						<li>{{$error}}</li>
						  					@endforeach
						  				</ul>
						  			@endif
								</div>								
								<br>
									<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
								<br>								
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Nombre:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" onkeypress="return inputLimiter(event,'Letters')" id="nombre" name="nombre" placeholder="Nombre" value="{{$socio->postulante->persona->nombre}}" >
										</div>	
									</div>
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Paterno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="apellidoPat" name="apellidoPat" placeholder="Apellido Paterno" value="{{$socio->postulante->persona->ap_paterno}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Materno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="apellidoMat" name="apellidoMat" placeholder="Apellido Materno" value="{{$socio->postulante->persona->ap_materno}}" disabled>
										</div>	
									</div>
								</div>
																
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Sexo:</label>
										</div>
										<div class="col-sm-6 text-left" >
										@if(strcmp($socio->postulante->persona->sexo,'masculino')==0)
												<input type="radio" name="genero" value="Masculino"  checked disabled> Masculino
												<input type="radio" name="genero" value="Femenino" style="margin-left: 35px;" disabled> Femenino
										@else
												<input type="radio" name="genero" value="Masculino"  disabled> Masculino
												<input type="radio" name="genero" value="Femenino" style="margin-left: 35px;"  checked disabled> Femenino
										@endif										
										</div>	
									</div>
									<!---BOTON GUARDAR-->
									<div class="btn-inline">
										<div class="btn-group col-sm-7"></div>								
										<div class="btn-group ">
											<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmation" onclick="ventana()" value="Guardar Cambios">
										</div>
									</div>
									<!--FIN-->									
								</div>
								
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Fecha de Nacimiento(dd/mm/aaaa):</label>
										</div>
										<div class="col-sm-6">
											<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecha_nacimiento" placeholder="Fecha Nacimiento" value="{{$socio->postulante->persona->fecha_nacimiento}}"style="width: 250px"  >

										</div>	
									</div>
								</div>
								@if(strcmp($socio->postulante->persona->nacionalidad,'peruano')==0)
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Nacionalidad:</label>
										</div>
										<div class="col-sm-6 text-left" >
												<input  type="radio" name="nacionalidad" value="Peruano"  @{{$nac=per}} checked disabled> Peruano  
												<input  type="radio" name="nacionalidad" value="Extranjero" style="margin-left: 50px;"@{{$nac=otro}} disabled> Extranjero	
										</div>	
									</div>
								</div>
								<!--Debe ir un if si es extranjero-->																
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">DNI:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control inputmodify" id="docidentity" placeholder="#######" style="max-width: 250px" value="{{$socio->postulante->persona->doc_identidad}}"disabled>
										</div>	
									</div>
								</div>
								@else
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Nacionalidad:</label>
										</div>
										<div class="col-sm-6 text-left" >
												<input  type="radio" name="nacionalidad" value="Peruano"  @{{$nac=per}}  disabled> Peruano  
												<input  type="radio" name="nacionalidad" value="Extranjero" style="margin-left: 50px;"@{{$nac=otro}} checked disabled> Extranjero	
										</div>	
									</div>
								</div>
								<!--Debe ir un if si es extranjero-->																
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Carnet de Extranjería:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control inputmodify" id="docidentity" placeholder="#######" style="max-width: 250px" value="{{$socio->postulante->persona->carnet_extranjeria}}"disabled>
										</div>	
									</div>
								</div>
								@endif
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Estado Civil:</label>
										</div>
										<div class="col-sm-6">
											<select class="form-control inputmodify" name="sede" style="max-width: 250px "disabled>
								                <option value="Soltero" default>Soltero (a)</option>
												<option value="Casado">Casado (a)</option>
												<option value="Divorciado">Divorciado (a)</option>
												<option value="Separado">Separado (a)</option>
												<option value="Unión Libre">Unión Libre</option>
												<option value="Viudo">Viudo (a)</option>
					    					</select>
										</div>	
									</div>
								</div>
						<!--MODAL CONFIRMACION-->
							<!-- Modal -->
								<div class = "modal fade" id = "confirmation" tabindex = "-1" role = "dialog" 
								   aria-labelledby = "myModalLabel" aria-hidden = "true">
								   
								   <div class = "modal-dialog">
								      <div class = "modal-content">
								         
								         <div class = "modal-header">
								            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
												<span aria-hidden="true" onclick="cerrarventana()">&times;</span>
								            </button>
								            
								            <h4 class = "modal-title" id = "myModalLabel">
								               EDITAR SOCIO
								            </h4>
								         </div>
								         
								         <div class = "modal-body">
								            <p>¿Desea guardar los cambios realizados?</p>
								         </div>
								         
								         <div class = "modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
								            
								            <button type = "submit" class = "btn btn-primary">
								               Confirmar
								            </button>
								         </div>
								         
								      </div><!-- /.modal-content -->
								   </div><!-- /.modal-dialog -->
								  
								</div><!-- /.modal -->							
						<!---->																
							</form>
						</div>


										<!--DATOS NACIMIENTO-->
						<div role="tabpanel" class="tab-pane" id="seccion2">														
						</div>
										<!--DATOS FAMILIARES-->
						<div role="tabpanel" class="tab-pane" id="seccion3">

						</div>
										<!--DATOS VIVIENDA-->
						<div role="tabpanel" class="tab-pane" id="seccion4">

						</div>
										<!--DATOS ESTUDIO-->
					@if(Session::get('update')=='estudio' || $errors->estudio->any())
						<div role="tabpanel" class="tab-pane active" id="seccion5">
					@else
						<div role="tabpanel" class="tab-pane" id="seccion5">
					@endif

							<form method="POST" action="/Socio/{{$socio->id}}/editEstudio" class="form-horizontal form-border">
								{{method_field('PATCH')}}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<br/><br/>
								<div class="col-sm-4"></div>
								<div class=""> 
									@if ($errors->estudio->any())
						  				<ul class="alert alert-danger fade in">
						  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  					@foreach ($errors->estudio->all() as $error)
						  						<li>{{$error}}</li>
						  					@endforeach
						  				</ul>
						  			@endif
								</div>								
								<br>
									<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
								<br>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Colegio Primaria:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="colegio_primaria" name="colegio_primaria" placeholder="Colegio de Primaria" value="{{$socio->postulante->colegio_primario}}" >
										</div>	
									</div>
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Colegio Secundaria:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="colegio_secundaria" name="colegio_secundaria" placeholder="Colegio de Secundaria" value="{{$socio->postulante->colegio_secundario}}" >
										</div>	
									</div>
									<!---BOTON GUARDAR-->
									<div class="btn-inline">
										<div class="btn-group col-sm-7"></div>								
										<div class="btn-group ">
											<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmationEstudio" onclick="ventana()" value="Guardar Cambios">
										</div>
									</div>
									<!--FIN-->									
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Universidad:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="universidad" name="universidad" placeholder="Universidad" value="{{$socio->postulante->universidad}}" >
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Carrera:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="carrera" name="carrera" placeholder="Carrera" value="{{$socio->postulante->profesion}}" >
										</div>	
									</div>
								</div>
						<!--MODAL CONFIRMACION-->
							<!-- Modal -->
								<div class = "modal fade" id = "confirmationEstudio" tabindex = "-1" role = "dialog" 
								   aria-labelledby = "myModalLabel" aria-hidden = "true">
								   
								   <div class = "modal-dialog">
								      <div class = "modal-content">
								         
								         <div class = "modal-header">
								            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
												<span aria-hidden="true" onclick="cerrarventana()">&times;</span>
								            </button>
								            
								            <h4 class = "modal-title" id = "myModalLabel">
								               EDITAR SOCIO
								            </h4>
								         </div>
								         
								         <div class = "modal-body">
								            <p>¿Desea guardar los cambios realizados?</p>
								         </div>
								         
								         <div class = "modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
								            
								            <button type = "submit" class = "btn btn-primary">
								               Confirmar
								            </button>
								         </div>
								         
								      </div><!-- /.modal-content -->
								   </div><!-- /.modal-dialog -->
								  
								</div><!-- /.modal -->																																		
							</form>
						</div>


										<!--DATOS TRABAJO -->
					@if(Session::get('update')=='trabajo' || $errors->trabajo->any())
						<div role="tabpanel" class="tab-pane active" id="seccion6">
					@else
						<div role="tabpanel" class="tab-pane" id="seccion6">
					@endif						

							<form method="POST" action="/Socio/{{$socio->id}}/editTrabajo" class="form-horizontal form-border">
								{{method_field('PATCH')}}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<br/><br/>
								<div class="col-sm-4"></div>
								<div class=""> 
									@if ($errors->trabajo->any())
						  				<ul class="alert alert-danger fade in">
						  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  					@foreach ($errors->trabajo->all() as $error)
						  						<li>{{$error}}</li>
						  					@endforeach
						  				</ul>
						  			@endif
								</div>								
								<br>
									<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
								<br>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Centro de Trabajo:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="centrotrabajo" name="centrotrabajo" placeholder="Centro de Trabajo" value="{{$socio->postulante->centro_trabajo}}" >
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Cargo en Trabajo:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="cargocentrotrabajo" name="cargocentrotrabajo" placeholder="Cargo en Trabajo" value="{{$socio->postulante->cargo_centro_trabajo}}" >
										</div>	
									</div>
									<!---BOTON GUARDAR-->
									<div class="btn-inline">
										<div class="btn-group col-sm-7"></div>								
										<div class="btn-group ">
											<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmationTrabajo" onclick="ventana()" value="Guardar Cambios">
										</div>
									</div>
									<!--FIN-->										
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Direccion Laboral:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="direccionlaboral" name="direccionlaboral" placeholder="Direccion" value="{{$socio->postulante->direccionLaboral}}" >
										</div>	
									</div>
								</div>
						<!--MODAL CONFIRMACION-->
							<!-- Modal -->
								<div class = "modal fade" id = "confirmationTrabajo" tabindex = "-1" role = "dialog" 
								   aria-labelledby = "myModalLabel" aria-hidden = "true">
								   
								   <div class = "modal-dialog">
								      <div class = "modal-content">
								         
								         <div class = "modal-header">
								            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
												<span aria-hidden="true" onclick="cerrarventana()">&times;</span>
								            </button>
								            
								            <h4 class = "modal-title" id = "myModalLabel">
								               EDITAR SOCIO
								            </h4>
								         </div>
								         
								         <div class = "modal-body">
								            <p>¿Desea guardar los cambios realizados?</p>
								         </div>
								         
								         <div class = "modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
								            
								            <button type = "submit" class = "btn btn-primary">
								               Confirmar
								            </button>
								         </div>
								         
								      </div><!-- /.modal-content -->
								   </div><!-- /.modal-dialog -->
								  
								</div><!-- /.modal -->																																				
							</form>
						</div>

										<!--DATOS DE CONTACTO -->
					@if(Session::get('update')=='contacto' || $errors->contacto->any())
						<div role="tabpanel" class="tab-pane active" id="seccion7">
					@else
						<div role="tabpanel" class="tab-pane" id="seccion7">
					@endif											

							<form method="POST" action="/Socio/{{$socio->id}}/editContacto" class="form-horizontal form-border">
								{{method_field('PATCH')}}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<br/><br/>
								<div class="col-sm-4"></div>
								<div class=""> 
									@if ($errors->contacto->any())
						  				<ul class="alert alert-danger fade in">
						  				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  					@foreach ($errors->contacto->all() as $error)
						  						<li>{{$error}}</li>
						  					@endforeach
						  				</ul>
						  			@endif
								</div>								
								<br>
									<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
								<br>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Telefono:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="telefono" name="telefono_domicilio" placeholder="Telefono de Contacto" value="{{$socio->postulante->telefono_domicilio}}" >
										</div>	
									</div>
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Telefono Celular:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="celular" name="telefono_celular" placeholder="Celular" value="{{$socio->postulante->telefono_celular}}" >
										</div>	
									</div>
									<!---BOTON GUARDAR-->
									<div class="btn-inline">
										<div class="btn-group col-sm-7"></div>								
										<div class="btn-group ">
											<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmationContacto" onclick="ventana()" value="Guardar Cambios">
										</div>
									</div>
									<!--FIN-->										
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Correo:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" value="{{$socio->postulante->persona->correo}}" >
										</div>	
									</div>
								</div>
						<!--MODAL CONFIRMACION-->
							<!-- Modal -->
								<div class = "modal fade" id = "confirmationContacto" tabindex = "-1" role = "dialog" 
								   aria-labelledby = "myModalLabel" aria-hidden = "true">
								   
								   <div class = "modal-dialog">
								      <div class = "modal-content">
								         
								         <div class = "modal-header">
								            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
												<span aria-hidden="true" onclick="cerrarventana()">&times;</span>
								            </button>
								            
								            <h4 class = "modal-title" id = "myModalLabel">
								               EDITAR SOCIO
								            </h4>
								         </div>
								         
								         <div class = "modal-body">
								            <p>¿Desea guardar los cambios realizados?</p>
								         </div>
								         
								         <div class = "modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
								            
								            <button type = "submit" class = "btn btn-primary">
								               Confirmar
								            </button>
								         </div>
								         
								      </div><!-- /.modal-content -->
								   </div><!-- /.modal-dialog -->
								  
								</div><!-- /.modal -->																																				
							</form>						
						</div>
										<!--DATOS DE INVITADOS-->
						<div role="tabpanel" class="tab-pane" id="seccion8">
							<form action="" class="form-horizontal form-border">
								<br/><br/>
									<div class="table-responsive">
										<div class="container">
											<table class="table table-bordered table-hover text-center display" id="example">
													<thead class="active">
														<th><div algin=center>DOCUMENTO</div></th>
														<th><div align=center>NOMBRE</div> </th>
														<th><div align=center>APELLIDO PATERNO</div></th>
														<th><div align=center>APELLIDO MATERNO</div></th>
														<th><div align="center">CORREO</div></th>
														<th><div align=center>DETALLE</div></th>
														<th><div align=center>EDITAR</div></th>
														<th><div align=center>ELIMINAR</div></th>													
													</thead>
													<tbody>
														@foreach($socio->postulante->persona->invitados as $invitado)					
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
													              	<a class="btn btn-info" href="#"  title="Detalle" ><i class="glyphicon glyphicon-list-alt"></i></a>
													            	</td>
													            	<td>
															        <a class="btn btn-info" href="#" title="Editar" ><i class="glyphicon glyphicon-pencil"></i></a>
															        </td>
													            	<td>
															        <a class="btn btn-info"  title="Eliminar" data-href="#" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a>
													            	</td>																	
													            </tr>				            		
														@endforeach
													</tbody>
											</table>
											<br><br><br>
											<div class="btn-inline">
												<div class="btn-group col-sm-10"></div>										
												<div class="btn-group ">
													<a href="#" class="btn btn-info" type="submit">Registrar Invitado</a>
												</div>
											</div>
											<br><br><br>								
										</div>		
									</div>														
							</form>						
						</div>

						@if(Session::has('test') )
						<h1>{{Session::get('test')}}</h1>
						@endif
										<!--DATOS DE MEMBRESIA -->
						<div role="tabpanel" class="tab-pane" id="seccion9">
							<form method="POST" action="/Socio/{{$socio->id}}/editMembresia" class="form-horizontal form-border">
								{{method_field('PATCH')}}
								<br><br>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Número de Carnet:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="numerocarnet" name="numerocarnet" placeholder="Numero de Carnet" value="{{$socio->carnet_actual()->nro_carnet}}" disabled>
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Tipo Membresía:</label>
										</div>
										<div class="col-sm-6">
								      		<select class="form-control" id="estado_select" name="estado" onchange="mostrar_precio()">
								    		@foreach ($membresias as $membresia)
								    			<option value={{$membresia->id}}
								    			@if($socio->membresia->id==$membresia->id) selected @endif>{{$membresia->descripcion}}</option>
								    		@endforeach												
											</select>											
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Cuota:</label>
										</div>
										<div class="col-sm-6">
								      		<select class="form-control" id="cuota_select" name="cuota" disabled>
								    		@foreach ($membresias as $membresia)
								    			<option value={{$membresia->id}}
								    			@if($socio->membresia->id==$membresia->id) selected @endif>{{$membresia->tarifa->monto}}</option>
								    		@endforeach												
											</select>											
										</div>										
									</div>
									<!---BOTON GUARDAR-->
									<div class="btn-inline">
										<div class="btn-group col-sm-7"></div>								
										<div class="btn-group ">
											<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmationMembresia" onclick="ventana()" value="Guardar Cambios">
										</div>
									</div>
									<!--FIN-->									
								</div>
								@if($socio->estado()==$socio->vigente())
								<div class="form-group">								
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Estado:</label>
										</div>
										<div class="col-sm-6">									
											<div class="input-group">
						                        <input type="text" class="form-control" name="estadoVig" value="{{$socio->estado()}}" readonly id="estado_socio">
						                        <div class="input-group-btn">
						                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Estado <span class="caret"></span></button>
						                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
						                                <li><a href="#" onclick="vigente()">{{$socio->vigente()}}</a></li>
						                                <li><a href="#" onclick="inhabilitado()">{{$socio->inhabilitado()}}</a></li>
						                                <li><a href="#" onclick="carnet_inhabilitado()">{{$socio->carnet_inhabilitado()}}</a></li>
						                            </ul>
						                        </div><!-- /btn-group -->
						                    </div><!-- /input-group -->
									    </div>
								    </div>
								</div>								
								@elseif($socio->estado()==$socio->inhabilitado() || $socio->estado()==$socio->carnet_inhabilitado())
								<div class="form-group">								
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Estado:</label>
										</div>
										<div class="col-sm-6">									
										    <div class="input-group" style="width: 254px">
										      <input type="text"  class="form-control" placeholder="Estado" name="estadoInv" id="estado_socio_2" value="{{$socio->estado()}}" readonly>
										      <span class="input-group-btn">
										        <button class="btn btn-secondary" onclick="reactivar()" type="button">Reactivar</button>
										      </span>
										    </div>
									    </div>
								    </div>
								</div>									    								
								@else
								<div class="form-group">								
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Estado:</label>
										</div>
										<div class="col-sm-6">									
										    <div class="input-group" style="width: 254px">
										      <input type="text"  class="form-control" placeholder="Estado" name="estado-r" id="estado_socio_3" value="{{$socio->estado()}}" readonly>
										      <span class="input-group-btn">
										        <button class="btn btn-secondary" onclick="reactivar2()" type="button">Renovar</button>
										      </span>
										    </div>
									    </div>
								    </div>
								</div>								
								@endif	

								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Emisión Carnet(dd/mm/aaaa):</label>
										</div>
										<div class="col-sm-6">
											<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecha_emision" placeholder="Fecha Emisión" value="{{$socio->carnet_actual()->fecha_emision}}"style="width: 250px"  disabled>

										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Vencimiento Carnet(dd/mm/aaaa):</label>
										</div>
										<div class="col-sm-6">
											<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecha_vencimiento" placeholder="Fecha Vencimiento" value="{{$socio->carnet_actual()->fecha_vencimiento}}"style="width: 250px"  disabled>

										</div>	
									</div>
								</div>
						<!--MODAL CONFIRMACION-->
							<!-- Modal -->
								<div class = "modal fade" id = "confirmationMembresia" tabindex = "-1" role = "dialog" 
								   aria-labelledby = "myModalLabel" aria-hidden = "true">
								   
								   <div class = "modal-dialog">
								      <div class = "modal-content">
								         
								         <div class = "modal-header">
								            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
												<span aria-hidden="true" onclick="cerrarventana()">&times;</span>
								            </button>
								            
								            <h4 class = "modal-title" id = "myModalLabel">
								               EDITAR SOCIO
								            </h4>
								         </div>
								         
								         <div class = "modal-body">
								            <p>¿Desea guardar los cambios realizados?</p>
								         </div>
								         
								         <div class = "modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarventana()">Cerrar</button>
								            
								            <button type = "submit" class = "btn btn-primary">
								               Confirmar
								            </button>
								         </div>
								         
								      </div><!-- /.modal-content -->
								   </div><!-- /.modal-dialog -->
								  
								</div><!-- /.modal -->																																		
							</form>
						</div>
						
					</div>
				</div>
			</div> 	
			<br/><br/>

				<div class="form-group">
					<div class="col-sm-5"> </div>
						<a class="btn btn-info" href="/Socio/" title="Editar" >Regresar <i class="glyphicon glyphicon-arrow-left"></i></a>			
				</div>
		</div>

	


	</div>		
@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}

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
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
	</script>	

	<script>
	function vigente() {
    	document.getElementById("estado_socio").value = "{{$socio->vigente()}}";
	}

	function inhabilitado() {
    	document.getElementById("estado_socio").value = "{{$socio->inhabilitado()}}";
	}

	function carnet_inhabilitado() {
    	document.getElementById("estado_socio").value = "{{$socio->carnet_inhabilitado()}}";
	}

	function reactivar() {
    	document.getElementById("estado_socio_2").value = "{{$socio->vigente()}}";
	}

	function reactivar2() {
    	document.getElementById("estado_socio_3").value = "Renovar al Guardar";
	}

	function mostrar_precio(){
		var x = document.getElementById("estado_select").value;
		document.getElementById("cuota_select").value = x;
	}
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