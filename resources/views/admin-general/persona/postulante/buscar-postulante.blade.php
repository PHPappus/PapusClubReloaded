@extends('admin-general.persona.postulante.index')

@section('content-opcion')

							<form action="" class="form-horizontal form-border">
								<br/><br/>
								<div class="container">
									<div class="row">
										<div class="col-sm-12 text-left">
											<p ><strong>BUSQUEDA DE POSTULANTE</strong></p>
										</div>
									</div>	
								</div>
								<br/><br/>
								<div class="form-group">
									
										<div class="col-sm-2 text-center">
											<label for="" class="control-label">Tipo de Documento:</label>
										</div>
										<div class="col-sm-4 text-right">
											<select class="form-control" name="doctype" style="max-width: 250px " >
												<option value="" default>TIPO DE DOCUMENTO </option>
								                <option value="dni">LIBRETA ELECTORAL O DNI</option>
												<option value="Casado">CARNET DE EXTRANJERIA</option>
					    					</select>
										</div>	
								
									
										<div class="col-sm-1 text-left">
											<label for="" class="control-label">Nro:</label>
										</div>
										<div class="col-sm-5 text-left">
											<input type="text" class="form-control" id="nro" placeholder="#####" style="max-width: 250px">
										</div>		
							
								</div>
								<div class="form-group text-center">
									<div class="col-sm-12 text-center">
										<button class="btn btn-primary" onclick="buscar_postulante()">Buscar <span class="glyphicon glyphicon-search"></span></button>	
									</div>	
								</div>
							</form>
						
@stop