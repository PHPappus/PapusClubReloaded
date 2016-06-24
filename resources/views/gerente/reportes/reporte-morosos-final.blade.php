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

	<br/>
	<br/>
	<br/>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<p class="lead"><strong>R E P O R T E : &nbsp;&nbsp; I N V I T A D O S &nbsp;&nbsp; P O R &nbsp;&nbsp; S E D E</strong></p>
			</div>
		</div>
		<br/>
		<br/>
		<form class="form-horizontal" id="formulario">
			<div class="form-group">
				 	<label for="" class="col-sm-3 control-label">Responsable</label>
				    <div class="col-sm-5">
					   	<div class="input-group">
					   		<label for="" class="col-sm-4 control-label">Marco Polo</label>			       		
				   	   	</div>
			    	</div>	
			</div>

			<div class="form-group ">
			 	<label for="" class="col-sm-3 control-label ">Fecha Consultada</label>
			    <div class="col-sm-5">				  	
			   	 	<div class="input-group">
			   		<label for="fechaInput" class="col-sm-4 control-label"> dd/mm/aaaa </label>
			   		<label for="fechaInput" class="col-sm-4 control-label"> -  </label>
			   		<label for="fechaInput" class="col-sm-4 control-label"> dd/mm/aaaa </label>
					</div>			   		
		    	</div>	
			</div>
			<div class="form-group">
				 	<label for="" class="col-sm-3 control-label">Fecha actual</label>
				    <div class="col-sm-5">
					   	<div class="input-group">
					   		<label for="" class="col-sm-4 control-label">dd/mm/aaaa</label>			       		
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
					@foreach($sedes as $sede)						
			    	<tr>
		    		<td>{{ $sede->nombre }}</td>
					<td>{{ $sede->nombre }}</td>
					<td> 500 </td>
					</tr>
					@endforeach
					<tr>
						<td><b></b></td>
						<td><b>TOTAL</b></td>
						<td> 5000</td>								
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


</html>