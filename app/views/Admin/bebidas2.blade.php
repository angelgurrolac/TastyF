@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bebidas</title>
</head>
<body>
	<div class="row" style="background-color:white;">
		<div class="col-lg-2"></div>
		<div class="col-lg-10">
			<div class="container marg">
				<div class="panel panel-default">
					<div class="panel-heading admin"><h4><i class="fa fa-fw fa-glass"></i> Bebidas</h4></div>     
					<div class="container col-height ">
						<ul class="nav nav-tabs">
							
							
							<li><a href="{{URL::to('/admin/vistos2') }}">Más vistos</a></li>
							<li><a href="{{URL::to('/admin/maspedidos2') }}">Más pedidos</a></li>
							<li><a href="{{URL::to('/admin/precios2') }}">Por precio</a></li>
							<li><a href="{{URL::to('/admin/porcategoria2') }}">Por categoría</a></li>
							
						</ul>
						<br>
						
						
						@if(count($bebidas)>0)
						@foreach($categorias as $key => $cat)
						<br>
						<br>
						<hr>
						<h5>{{$cat->nombre}}</h5>
						<br>
						<br>
						<div class="row">
							@foreach($bebidas as $key => $value)
							@if($value->id_categoria==$cat->id)
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
									<input type="checkbox">
								</div>
								
								
								
							</div>
							@endif
							@endforeach
						</div>
						@endforeach
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