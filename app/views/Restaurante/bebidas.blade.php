@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bebidas</title>
</head>
<body>
	  <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading rest">{{ Session::get("nombre") }} Seccion:Bebidas</div>     
	<div class="container col-height">
	<br>

	<a href="/restaurante/agregarB"><img class="buttonagregar" data-target="#myModal" src="{{asset('assets/img/anclas/mas.png')}}">Agregar Bebidas</a>
		@if(count($bebidas)>0)
	<div class="row">
	 	@foreach($bebidas as $key => $value)
				<div class="col-md-5" style="border:1px solid;  margin:1%;" >
						
							<div class="col-md-7 ">
								<img style="width:100%;margin:5%;" height="200px" src="{{asset($value->imagen)}}">
							</div>
							<div class="col-md-3">
							<br>	
								{{$value->nombre}} 	<br>
								{{$value->descripcion}}
								
							</div>
							<br/>
							<div class="col-md-2">
								{{$value->costo_unitario}}$
								<br> 
								{{Form::open(array('url'=>'/restaurante/editar', 'id' => $value->id))}}
								<label class="glyphicon glyphicon-edit direccionar">Editar</label>
								
								<input type="hidden" name="producto_id" value="{{$value->id}}">
								{{Form::close()}}
							</div>
								
								
						
					</div>
		@endforeach
		</div>
	@endif
			
	</div>


     <div class="panel-footer clearfix rest">

	</div>     
	</div>
	</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$('.direccionar').click(function(){
		var formulario = $(this).next('input').val();
		$('#'+formulario).submit();
	});
});
</script>