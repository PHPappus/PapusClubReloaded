<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta name="csrf-token" content="{{ csrf_token() }}">
	{!!Html::style('css/jquery.bxslider.css')!!}
	{!!Html::style('css/font-awesome.css')!!}
	{!!Html::style('css/bootstrap.css')!!}
	{!!Html::style('css/MisEstilos.css')!!}
</head>
<body>

<a href="#" id="try" data-link="{{ url('/test') }}">Try</a>


</body>
	{!!Html::script('js/jquery-1.11.3.min.js')!!}
	{!!Html::script('js/bootstrap.js')!!}
	{!!Html::script('js/jquery.bxslider.min.js')!!}
	{!!Html::script('js/MisScripts.js')!!}
<script>$.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} })</script>	
<script>
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
			    }); //end of ajax
			});

</script>


</html>