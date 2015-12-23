@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Restaurantes</title>
</head>
<body>
	<div class="row" style="background-color:white;">
		<div class="col-lg-2"></div>
		<div class="col-lg-10">
			<div class="container marg">
				<div class="panel panel-default">
					<div class="panel-heading admin"><h4><i class="fa fa-fw fa-cutlery"></i> Restaurantes</h4></div>     
					<div class="container col-height">
						<ul class="nav nav-tabs">

						<li><a href="{{URL::to('/admin/vistos3') }}">Más vistos</a></li>
							<li><a href="{{URL::to('/admin/ordenes') }}">Más ordenes</a></li>
							<li><a href="{{URL::to('/admin/reservaciones') }}">Más reservaciones</a></li>
							<li><a href="{{URL::to('/admin/ventas') }}">Más ventas</a></li>
							<li><a href="{{URL::to('/admin/productos') }}">Más productos</a></li>
							<li><a href="{{URL::to('/admin/op') }}">Orden promedio</a></li>

						</ul>
						<br>


						@if(count($restaurantes)>0)
						<div class="row">
							@foreach($variable as $key => $cat)


							@foreach($restaurantes as $key => $value)
							@if($value->id==$cat->id_restaurante)
							<div class="col-md-5" style="border:1px solid;  margin:1%;" >

								<div class="col-md-12">
									<img alt="img-perfil" style="width:100%; height:200px; margin:2%;"src="{{asset($value->imagenR)}}">
								</div>

								
								{{$value->nombre}}	

							</div>
							@endif
							@endforeach
							@endforeach
						</div>

						@endif

					</div>


					<div class="panel-footer clearfix admin">

					</div>     
				</div>
			</div>

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