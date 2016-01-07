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

             <br>


             <div class="row">

               @if(count($alimentos)>0)

               @foreach($alimentos as $key => $value)



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
                        <p style="text-align:justify;">{{$value->descripcion}}</p>
                        <b>Restaurante:</b>
                        <p>{{$value->nombreR}}</p>
                        
                      </div>

                      @if($mensaje==1)
                      <h4>Visto: {{$value->cantidad}} veces</h4>		
                      @elseif($mensaje==2)
                      <h4>Pedido: {{$value->cantidad}} veces</h4>	
                      @endif
                    </div>
                  </div>
                  <div class="col-md-1"></div>

                </div>
              </div>
            </div>
            @endforeach

            @endif
          </div>

          

        </div>
      </div>
    </div>
  </div>
  <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
</div>

</body>
</html>