<!DOCTYPE html>
<html>
<head>
	<title>REGISTRAR VENTA</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('../css/jquery.bxslider.css')!!}
	{!!Html::style('../css/font-awesome.css')!!}
	{!!Html::style('../css/bootstrap.css')!!}
	{!!Html::style('../css/MisEstilos.css')!!}
	<style>

		.modal-backdrop.in{
			z-index: 1;
		}
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
					<strong>REGISTRAR VENTA</strong>
			</div>		
		</div>
		<div class="container">
			<!--@include('errors.503')-->		
			<form method="POST" action="/venta-producto/new/venta-producto/{{ $factura->id }}" class="form-horizontal form-border">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				<!-- Mensajes de error de validación del Request -->
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
			  	</br>

				<!-- INICIO INCIIO -->				                       
				<div class="form-group">
					@if (strcmp($factura->tipo_comprobante, 'Factura')==0)
		    		<label for="idInput" class="col-sm-4 control-label">N° de Factura</label>
		    		@else
		    		<label for="idInput" class="col-sm-4 control-label">N° de Boleta</label>
		    		@endif
		    		<div class="col-sm-5">
		      			<input type="text" class="form-control" id="idInput" name="id" value="{{$factura->numero_comprobante}}" readonly>
		    		</div>
		  		</div>
			  
			  	<div class="form-group">
			    	<label for="personaInput" class="col-sm-4 control-label">Persona</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="personaInput" name="persona" value="{{$factura->persona->nombre}} {{$factura->persona->ap_paterno}} {{$factura->persona->ap_materno}}" readonly>
			    	</div>
			  	</div>	  				  				 
			  	
			  	<div class="form-group">
			    	<label for="tipoPagoInput" class="col-sm-4 control-label" >Tipo de Pago</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="tipoPagoInput" name="tipoPago" value="{{$factura->tipo_pago}}" readonly>
			    	</div>			      					      		
			  	</div>	
						
			  	<div class="form-group">
			    	<label for="estadoInput" class="col-sm-4 control-label">Estado</label>
			    	<div class="col-sm-5">
			      		<input type="text" class="form-control" id="estadoInput" name="estado" value="{{$factura->estado}}" readonly>
			    	</div>
			  	</div>		
				<br/><br/>
				

				<div class="table-responsive">				
					<table class="table table-bordered table-hover text-center display" id="example">
						<thead class="active" data-sortable="true">
							<th><div align=center>PRODUCTO</div></th>
							<th><div align=center>PRECIO</div></th>
							<th><div align=center>CANTIDAD</div></th>
							<th><div align=center>SUBTOTAL</div></th>
							<th><div align=center>EDITAR</div></th>
							<th><div align=center>ELIMINAR</div></th>
						</thead>											
						<tbody>
						@foreach($factura->productoxfacturacion as $producto)
							<tr>
								<td>{{ $producto->producto->nombre}}</td>
								<td>{{ $producto->producto->precioproducto->first()['precio']}}</td>
								<td>{{ $producto->cantidad}}</td>			
								<td>{{ $producto->subtotal }}</td>
								<td><a class="btn btn-info" href="{{url('/venta-producto/new/'.$producto->id.'')}}" title="Editar" ><i class="glyphicon glyphicon-pencil"></i></a></td>
								<td>
					              <a class="btn btn-info"  title="Eliminar" data-href="{{url('/venta-producto/'.$producto->id.'/deleteProducto')}}" data-toggle="modal" data-target="#modalEliminar"><i class="glyphicon glyphicon-remove"></i></a>    
					            </td>
				            </tr>
						@endforeach
						<tr>
								<td></td>
								<td></td>
								<td><b>TOTAL</b></td>
								<td>{{ $factura->total}}</td>								
				            </tr>
						</tbody>													
					</table>						
				</div>

				<div class="container">
					<div class="form-group">
						<div class="col-sm-10 text-right">
							<a class="btn btn-info" href="{{url('/venta-producto/new/venta-producto/'.$factura->id.'')}}" title="Agregar" >Agregar<i class="glyphicon" ></i> </a>	
						</div>
					</div>
					<br/>
				</div>
					<!-- FIN FIN FIN  -->				
			
				</br>
			  	</br>
				<div class="btn-inline">
					<div class="btn-group col-sm-7"></div>
					@if (count($factura->productoxfacturacion)>0)						
						<div class="btn-group ">
							<a class="btn btn-primary" href="/venta-producto/index">Confirmar</a>
						</div>						
					@else
						<div class="btn-group ">
							<a class="btn btn-primary" disabled >Confirmar</a>
						</div>
					@endif
					<div class="btn-group">
						<a href="{{url('/venta-producto/'.$factura->id.'/cancel')}}" class="btn btn-info">Cancelar</a>
					</div>
				</div>
				</br>
				</br>
				
				
			</form>
		</div>
	</div>		
@stop
	<!-- JQuery -->
	{!!Html::script('../js/jquery-1.11.3.min.js')!!}
	{!!Html::script('../js/bootstrap.js')!!}
	{!!Html::script('../js/jquery.bxslider.min.js')!!}
	{!!Html::script('../js/MisScripts.js')!!}

</body>
	<!-- Modal -->
	<div id="modalEliminar" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Confirmar</h4>
	      </div>
	      <div class="modal-body">
	        <p>¿Está seguro que desea eliminar el producto?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Confirmar</a>
	      </div>
	    </div>

	  </div>
	</div>

	<!-- Modal Event-->
	<script>
		$('#modalEliminar').on('show.bs.modal', function(e) {
   			$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
		});
	</script>

</html>