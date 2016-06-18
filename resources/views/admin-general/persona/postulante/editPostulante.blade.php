<!DOCTYPE html>
<html>
<head>
	<title>EDITAR POSTULANTE</title>
	<meta charset="UTF-8">

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}


	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 
<!-- 	<style>
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
		.glyphicon.glyphicon-chevron-left, .glyphicon.glyphicon-chevron-right {
    		font-size: 25px;
		}
}

	</style> -->

</head>
<body>
@extends('layouts.headerandfooter-al-admin-persona')
@section('content')


	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-left">
				<br/><br/>
				<p class="lead"><strong>EDITAR POSTULANTE</strong></p>
				<br/>
			</div>
			
		</div>
	</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-16 text-center">
					<div role="tabpanel">
						<ul class="nav nav-pills nav-justified" id="pills-edit" role="tablist">

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
							<form method="POST" action="/postulante/{{$postulante->persona->id}}/editBasico" class="form-horizontal form-border">
								{{method_field('PATCH')}}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

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
								@if(session('cambios-bas'))
									<div class="alert alert-success fade in">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
											<strong>¡Éxito!</strong> {{session('cambios-bas')}}
									</div>								
								@endif
																
								<br><br/><br/>

								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4">
											<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
										</div>

										<div class="btn-group col-sm-4" ></div>
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" disabled><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont"><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
								</div>										
								<br>								
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Nombre:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" onkeypress="return inputLimiter(event,'Letters')" id="nombre" name="nombre" placeholder="Nombre" value="{{$postulante->persona->nombre}}" >
										</div>	
									</div>
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Paterno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="apellidoPat" name="apellidoPat" placeholder="Apellido Paterno" value="{{$postulante->persona->ap_paterno}}" >
										</div>	
									</div>
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Apellido Materno:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="apellidoMat" name="apellidoMat" placeholder="Apellido Materno" value="{{$postulante->persona->ap_materno}}" >
										</div>	
									</div>
								</div>
																

									<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Sexo:</label>
											</div>
											<div class="col-sm-6 text-left" style="float: right">											
													<div>
														
															{{ Form::radio('sexo', 'masculino', (($postulante->persona['sexo']=="masculino" )? true : false)) }}Masculino
															</div>
															<div>
															{{ Form::radio('sexo', 'femenino', (($postulante->persona['sexo']=="femenino" )? true : false)) }}Femenino
													</div>
											</div>	
										</div>
									</div>
								
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Fecha de Nacimiento(dd/mm/aaaa):</label>
										</div>
										<div class="col-sm-6">
											<input class="datepicker" type="text" onkeypress="return inputLimiter(event,'Nulo')" id="dpd1" name="fecha_nacimiento" placeholder="Fecha Nacimiento" value="{{$postulante->persona->fecha_nacimiento}}" style="width: 250px"  >

										</div>	
									</div>
								</div>

								<div class="form-group">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Nacionalidad:</label>
											</div>
											<div class="col-sm-6 text-left" >
												
												<input onchange="es_peruano()" type="radio" name="nacionalidad" value="peruano" {{ (old('nacionalidad') == "peruano") ? 'checked="true"' : ''}} {{($postulante->persona->nacionalidad == "peruano") ? 'checked="true"':''}}/>Peruano&nbsp&nbsp&nbsp
												
												<input onchange="es_extranjero()" type="radio" name="nacionalidad" value="extranjero" {{ (old('nacionalidad') == "extranjero") ? 'checked="true"' : ''  }} {{($postulante->persona->nacionalidad == "extranjero") ? 'checked="true"':''}}/>Extranjero

											</div>	
										</div>
								</div>

								<div class="form-group required">
										<div class="col-sm-6">
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">DNI:</label>
											</div>
											<div class="col-sm-6">
											<!--Se hace validacion para que acepte solo numeros pero que sea un texto-->
													<input  type="text" onkeypress="return inputLimiter(event,'Numbers')"  @if ($postulante->persona->nacionalidad!="peruano") disabled  @endif  class="form-control" id="doc_identidad" name="doc_identidad" placeholder="DNI" maxlength="8" style="max-width: 250px" value="{{$postulante->persona->doc_identidad}}" value="{{old('doc_identidad')}}"  >
											</div>	
										</div>
								</div>

								<div class="form-group required">
										<div class="col-sm-6">	
											<div class="col-sm-6 text-left">
												<label for="" class="control-label">Carnet de extranjeria:</label>
											</div>
											<div class="col-sm-6">
												<input type="text" onkeypress="return inputLimiter(event,'Numbers')" @if ($postulante->persona->nacionalidad!="extranjero") disabled  @endif class="form-control" id="carnet_extranjeria" name="carnet_extranjeria" placeholder="Carnet de Extranjeria" maxlength="12" style="max-width: 250px" value="{{$postulante->persona->carnet_extranjeria}}" value="{{old('carnet_extranjeria')}}" >
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
								               EDITAR POSTULANTE
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
								<br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-5" ></div>
										
										<div class="btn-group">
											<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmation" onclick="ventana()" value="Confirmar">
										</div>
										<div class="btn-group">
											<a href="/postulante/index" class="btn btn-info">Retornar</a>
										</div>
								</div>														<!---->																
							</form>
						</div>


										<!--DATOS NACIMIENTO-->
						<div role="tabpanel" class="tab-pane" id="seccion2">
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4">
											<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
										</div>

										<div class="btn-group col-sm-4" ></div>
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont"><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
								</div>																				
						</div>


										<!--DATOS FAMILIARES-->
						<div role="tabpanel" class="tab-pane" id="seccion3">
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4">
											<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
										</div>

										<div class="btn-group col-sm-4" ></div>
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont"><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>

										<div class="form-group required">
											<div class="col-sm-6">
												<div class="col-sm-6 text-left">
													<label for="" class="control-label">Estado Civil:</label>
												</div>
												<div class="col-sm-6">
													<select class="form-control" id="estado_civil" name="estado_civil" style="max-width: 150px "   >
															<option value="-1">Seleccione</option>
																@foreach ($estadocivil as $estcivil)      

												                	<option value="{{$estcivil->id}}" @if($estado['id']==$estcivil->id) selected @endif >{{$estcivil->valor}}</option>

												                @endforeach
														</select>
												</div>	
											</div>
										</div>

								</div>
						</div>
										<!--DATOS VIVIENDA-->
						<div role="tabpanel" class="tab-pane" id="seccion4">
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4">
											<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
										</div>

										<div class="btn-group col-sm-4" ></div>
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont"><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
								</div>
						</div>
										<!--DATOS ESTUDIO-->
					@if(Session::get('update')=='estudio' || $errors->estudio->any())
						<div role="tabpanel" class="tab-pane active" id="seccion5">
					@else
						<div role="tabpanel" class="tab-pane" id="seccion5">
					@endif

							<form method="POST" action="/postulante/{{$postulante->id}}/editPostulante" class="form-horizontal form-border">
								{{method_field('PATCH')}}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

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
									@if(session('cambios-est'))
										<div class="alert alert-success fade in">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												<strong>¡Éxito!</strong> {{session('cambios-est')}}
										</div>								
									@endif						  			
								</div>								
								<br><br/><br/>
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4">
											<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
										</div>

										<div class="btn-group col-sm-4" ></div>
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont"><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
								</div>
								<br>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Colegio Primaria:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="colegio_primaria" name="colegio_primaria" placeholder="Colegio de Primaria" value="{{$postulante->colegio_primario}}" >
										</div>	
									</div>
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Colegio Secundaria:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="colegio_secundaria" name="colegio_secundaria" placeholder="Colegio de Secundaria" value="{{$postulante->colegio_secundario}}" >
										</div>	
									</div>								
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Universidad:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="universidad" name="universidad" placeholder="Universidad" value="{{$postulante->universidad}}" >
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Carrera:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="carrera" name="carrera" placeholder="Carrera" value="{{$postulante->profesion}}" >
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
								               EDITAR POSTULANTE
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
								<br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-5" ></div>
										
										<div class="btn-group">
											<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmationEstudio" onclick="ventana()" value="Confirmar">
										</div>
										<div class="btn-group">
											<a href="/postulante" class="btn btn-info">Retornar</a>
										</div>
								</div>																																							
							</form>
						</div>


										<!--DATOS TRABAJO -->
					@if(Session::get('update')=='trabajo' || $errors->trabajo->any())
						<div role="tabpanel" class="tab-pane active" id="seccion6">
					@else
						<div role="tabpanel" class="tab-pane" id="seccion6">
					@endif						

							<form method="POST" action="/postulante/{{$postulante->id}}/ediPostulante" class="form-horizontal form-border">
								{{method_field('PATCH')}}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

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
									@if(session('cambios-trab'))
										<div class="alert alert-success fade in">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												<strong>¡Éxito!</strong> {{session('cambios-trab')}}
										</div>								
									@endif							  			
								</div>								
								<br><br/><br/>
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4">
											<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
										</div>

										<div class="btn-group col-sm-4" ></div>
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont"><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Centro de Trabajo:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="centrotrabajo" name="centrotrabajo" placeholder="Centro de Trabajo" value="{{$postulante->centro_trabajo}}" >
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Cargo en Trabajo:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="cargocentrotrabajo" name="cargocentrotrabajo" placeholder="Cargo en Trabajo" value="{{$postulante->cargo_trabajo}}" >
										</div>	
									</div>									
								</div>
								<div class="form-group">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Direccion Laboral:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="direccionlaboral" name="direccionlaboral" placeholder="Direccion" value="{{$postulante->direccion_laboral}}" >
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
								               EDITAR POSTULANTE
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
								<br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-5" ></div>
										
										<div class="btn-group">
											<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmationTrabajo" onclick="ventana()" value="Confirmar">
										</div>
										<div class="btn-group">
											<a href="/postulante" class="btn btn-info">Retornar</a>
										</div>
								</div>																																								
							</form>
						</div>

										<!--DATOS DE CONTACTO -->
					@if(Session::get('update')=='contacto' || $errors->contacto->any())
						<div role="tabpanel" class="tab-pane active" id="seccion7">
					@else
						<div role="tabpanel" class="tab-pane" id="seccion7">
					@endif											

							<form method="POST" action="/postulante/{{$postulante->id}}/editPostulante" class="form-horizontal form-border">
								{{method_field('PATCH')}}
								<input type="hidden" name="_token" value="{{ csrf_token() }}">

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
									@if(session('cambios-cont'))
										<div class="alert alert-success fade in">
												<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
												<strong>¡Éxito!</strong> {{session('cambios-cont')}}
										</div>								
									@endif							  			
								</div>								
								<br><br/><br/>
								<div class="form-group required" >
										<div class="btn-group col-sm-4" ></div>
										<div class="btn-group col-sm-4">
											<p align="center"><font color="red">(*) Dato Obligatorio</font> </p>
										</div>

										<div class="btn-group col-sm-4" ></div>
										
										<div class="btn-group">
											<a href="#"  class="btn btn-info back" ><span class="glyphicon glyphicon-chevron-left"></span></a>
										</div>
										<div class="btn-group">
											<a href="#" class="btn btn-info cont"><span class="glyphicon glyphicon-chevron-right"></span></a>
										</div>
								</div>
								<br>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Telefono:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="telefono" name="telefono_domicilio" placeholder="Telefono de Contacto" value="{{$postulante->telefono_domicilio}}" >
										</div>	
									</div>
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Telefono Celular:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" onkeypress="return inputLimiter(event,'Numbers')" class="form-control" id="celular" name="telefono_celular" placeholder="Celular" value="{{$postulante->telefono_celular}}" >
										</div>	
									</div>									
								</div>
								<div class="form-group required">
									<div class="col-sm-6">
										<div class="col-sm-6 text-left">
											<label for="" class="control-label">Correo:</label>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" value="{{$postulante->persona->correo}}" >
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
								               EDITAR POSTULANTE
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
								<br><br>
								<div class="form-group required" >
										<div class="btn-group col-sm-5" ></div>
										
										<div class="btn-group">
											<input type="button" class="btn btn-primary " data-toggle="modal" data-target="#confirmationContacto" onclick="ventana()" value="Confirmar">
										</div>
										<div class="btn-group">
											<a href="/postulante" class="btn btn-info">Retornar</a>
										</div>
								</div>																																							
							</form>						
						</div>

						
					</div>
				</div>
			</div> 	
			<br/><br/>
		</div>

	


	</div>		
@stop
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}

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


        $('.cont').click(function(){

  		var nextId = $(this).parents('.tab-pane').next().attr("id");
  		$('[href=#'+nextId+']').tab('show');

		})

		$('.back').click(function(){

  		var backId = $(this).parents('.tab-pane').prev().attr("id");
  		$('[href=#'+backId+']').tab('show');

		})

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

	<script>
		function es_peruano(){
			document.getElementById('doc_identidad').disabled = false; 
			document.getElementById('carnet_extranjeria').disabled = true;
			document.getElementById('carnet_extranjeria').value = '';

			document.getElementById('nacimiento_peruano').style.display="block";
			document.getElementById('nacimiento_extranjero').style.display="none";
		}

		function es_extranjero(){
			document.getElementById('carnet_extranjeria').disabled = false; 
			document.getElementById('doc_identidad').disabled = true; 
			document.getElementById('doc_identidad').value = '';

			document.getElementById('nacimiento_peruano').style.display="none";
			document.getElementById('nacimiento_extranjero').style.display="block"; 
		}
	</script>


</body>
</html>