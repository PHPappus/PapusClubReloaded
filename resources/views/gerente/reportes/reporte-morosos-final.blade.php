<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
	{!!Html::style('css/datepicker.css')!!}
	{!!Html::style('/css/DataTable.css')!!}	
	<!-- <link rel="stylesheet" type="text/css" href="css/estilos.css"> -->
	<!-- PARA DATA TABLE -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> 

</head>
<body>
<<<<<<< HEAD
=======

>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
	<br/>
	<br/>
	<br/>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
<<<<<<< HEAD
				<p class="lead"><strong>R E P O R T E : &nbsp;&nbsp; NÚMERO  &nbsp;&nbsp; DE &nbsp;&nbsp; SOCIOS &nbsp;&nbsp; MOROSOS</strong></p>
			</div>

=======
				<p class="lead"><strong>R E P O R T E : &nbsp;&nbsp; I N V I T A D O S &nbsp;&nbsp; P O R &nbsp;&nbsp; S E D E</strong></p>
			</div>
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
		</div>
		<br/>
		<br/>
		<form class="form-horizontal" id="formulario">
			<div class="form-group">
				 	<label for="" class="col-sm-3 control-label">Responsable</label>
				    <div class="col-sm-5">
<<<<<<< HEAD
				    @foreach($responsable as $resp)
					   	<div class="input-group">
					   		<label for="" class="col-sm-4 control-label">{{$resp->name}}</label>			       		
				   	   	</div>
				   	@endforeach
=======
					   	<div class="input-group">
					   		<label for="" class="col-sm-4 control-label">Marco Polo</label>			       		
				   	   	</div>
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
			    	</div>	
			</div>

			<div class="form-group ">
			 	<label for="" class="col-sm-3 control-label ">Fecha Consultada</label>
			    <div class="col-sm-5">				  	
			   	 	<div class="input-group">
<<<<<<< HEAD
			   		<label for="fechaInput" class="col-sm-4 control-label"> {{ $fechaIni->toDateString() }}</label>
			   		<label for="fechaInput" class="col-sm-4 control-label"> -  </label>
			   		<label for="fechaInput" class="col-sm-4 control-label"> {{ $fechaFin->toDateString() }}</label>
=======
			   		<label for="fechaInput" class="col-sm-4 control-label"> dd/mm/aaaa </label>
			   		<label for="fechaInput" class="col-sm-4 control-label"> -  </label>
			   		<label for="fechaInput" class="col-sm-4 control-label"> dd/mm/aaaa </label>
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
					</div>			   		
		    	</div>	
			</div>
			<div class="form-group">
				 	<label for="" class="col-sm-3 control-label">Fecha actual</label>
				    <div class="col-sm-5">
					   	<div class="input-group">
<<<<<<< HEAD
					   		<label for="" class="col-sm-4 control-label">{{ $fechaAct->toDateString() }}</label>			       		
=======
					   		<label for="" class="col-sm-4 control-label">dd/mm/aaaa</label>			       		
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
				   	   	</div>
				       	
			    	</div>	
			</div>
			
			
		</form>
		
		<br/>
		<br/>
		<br/>
		<br/>
		
		<!-- tabla con re -->
		<table class="table table-bordered table-hover text-center display" id="example">
			<thead class="active">
				<tr>
				<th><DIV ALIGN=center>ID PERSONA</th>
				<th><DIV ALIGN=center>NOMBRE</th>
				<th><DIV ALIGN=center>DEUDA (S/.) </th>
				</tr>
				</thead>
				<tbody>
<<<<<<< HEAD
					@foreach($socios as $socio)						
			    	<tr>
		    		<td>{{ $socio->postulante->persona->id }}</td>
					<td>{{ $socio->postulante->persona->nombre }}</td>
				    <td>{{array_pop($valores)}}</td>
				
=======
					@foreach($sedes as $sede)						
			    	<tr>
		    		<td>{{ $sede->nombre }}</td>
					<td>{{ $sede->nombre }}</td>
					<td> 500 </td>
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
					</tr>
					@endforeach
					<tr>
						<td><b></b></td>
						<td><b>TOTAL</b></td>
<<<<<<< HEAD
						<td> {{$totalDeuda}}</td>								
=======
						<td> 5000</td>								
>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee
				    </tr>
				</tbody>
		</table>		
	</div>

<!-- </div> -->




<br/>
<br/>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- JQuery -->
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	<!-- Bootstrap -->
	{!!Html::script('js/bootstrap.js')!!}
	
	<!-- BXSlider -->
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	<!-- Mis Scripts -->
	{!!Html::script('js/MisScripts.js')!!}

	{!!Html::script('js/bootstrap-datepicker.js')!!}

</body>
<<<<<<< HEAD
	
=======

>>>>>>> 6142a4c7147fe19efa4cd28a24db990e10bd63ee

</html>
