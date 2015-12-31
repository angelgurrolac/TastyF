@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alimentos</title>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-cutlery"></i> Alimentos</h3>
            </div>
            <div class="panel-body">
             <ul class="nav nav-tabs">

							<li><a href="{{URL::to('/admin/vistos') }}">Más vistos</a></li>
							<li><a href="{{URL::to('/admin/maspedidos') }}">Más pedidos</a></li>
							<li><a href="{{URL::to('/admin/precios') }}">Por precio</a></li>
							<li><a href="{{URL::to('/admin/porcategoria') }}">Por categoría</a></li>

						</ul>

						@if(count($alimentos)>0)

						@foreach($categorias as $key => $cat)
				
						<hr>
						<h4><strong>{{$cat->nombre}}</strong></h4>
						<br>
						<br>
						<div class="row">
							@foreach($alimentos as $key => $value)
							@if($value->id_categoria==$cat->id)
							
               <div class="col-sm-6">
                <div class="panel panel-yellow">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{$value->nombre}}</h3>
                  </div>
                  <div class="panel-body">
                   <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-10">

                      <img style="height:300px; width:300px;" class="center-block thumbnail img-rounded" src="{{asset($value->imagen)}}" alt="{{asset($value->imagen)}}">
                      <div class="caption">
                        <h3>Precio: ${{$value->costo_unitario}}</h3>
                        <b>Descripción:</b>
                        <p>{{$value->descripcion}}</p>
                          <b>Restaurante:</b>
                        <p>{{$value->nombreR}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1"></div>

                </div>
              </div>
            </div>
							@endif


							@if($value->id_categoria2==$cat->id)
							
               <div class="col-sm-6">
                <div class="panel panel-yellow">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{$value->nombre}} </h3>
                  </div>
                  <div class="panel-body">
                   <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-10">

                      <img style="height:300px; width:300px;" class="center-block thumbnail img-rounded" src="{{asset($value->imagen)}}" alt="{{asset($value->imagen)}}">
                      <div class="caption">
                        <h3>Precio: ${{$value->costo_unitario}}</h3>
                        <b>Descripción:</b>
                        <p>{{$value->descripcion}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1"></div>

                </div>
              </div>
            </div>
							@endif
							@endforeach
						</div>
						@endforeach

						@endif
					</div>    
				</div>
			</div>
		</div>     
	</div>
</div>
</body>
</html>