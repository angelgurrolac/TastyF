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
 <br>
    <br>

    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading admin">
              <h3 class="panel-title"><i class="fa fa-fw fa-cutlery"></i> Restaurantes</h3>
            </div>
            <div class="panel-body">
             <ul class="nav nav-tabs">
							
							<li><a href="{{URL::to('/admin/vistos3') }}">Más vistos</a></li>
							<li><a href="{{URL::to('/admin/ordenes') }}">Más ordenes</a></li>
							<li><a href="{{URL::to('/admin/reservaciones') }}">Más reservaciones</a></li>
							<li><a href="{{URL::to('/admin/ventas') }}">Más ventas</a></li>
							<li><a href="{{URL::to('/admin/productos') }}">Más productos</a></li>
							<li><a href="{{URL::to('/admin/op') }}">Orden promedio</a></li>
							
						</ul>
						<br>
						<div class="row">
						@if(count($restaurantes)>0)
						
							@foreach($variable as $key => $cat)


							@foreach($restaurantes as $key => $value)
							@if($value->id==$cat->id_restaurante)
							<div class="col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{$value->nombre}} </h3>
                  </div>
                  <div class="panel-body">
                   <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-10">

                      <img style="height:300px; width:300px;" class="center-block thumbnail img-rounded" src="{{asset($value->imagen)}}" alt="{{asset($value->imagen)}}">
                      
                    </div>
                  </div>
                  <div class="col-md-1"></div>

                </div>
              </div>
            </div>
							@endif
							@endforeach
							@endforeach
						</div>

						@endif

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