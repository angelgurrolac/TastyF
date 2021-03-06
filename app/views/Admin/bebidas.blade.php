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
 <br>
    <br>

    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading admin">
              <h3 class="panel-title"><i class="fa fa-fw fa-glass"></i> Bebidas</h3>
            </div>
            <div class="panel-body">
             <ul class="nav nav-tabs">
							
							<li><a href="{{URL::to('/admin/vistos2') }}">Más vistos</a></li>
							<li><a href="{{URL::to('/admin/maspedidos2') }}">Más pedidos</a></li>
							<li><a href="{{URL::to('/admin/precios2') }}">Por precio</a></li>
							<li><a href="{{URL::to('/admin/porcategoria2') }}">Por categoría</a></li>
							
						</ul>
						<br>
						<div class="row">
						
						@if(count($bebidas)>0)
						
							@foreach($bebidas as $key => $value)	 		
							

							 <div class="col-sm-6">
                <div class="panel panel-primary " style="margin-left:1em;">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{$value->nombre}} </h3>
                  </div>
                  <div class="panel-body" style="margin-left:1em;">
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
                       <b>¿Aparece en la aplicación de TastyFoods?</b>
                        <?php
                          $estado = $value->estado;
                          if ($estado == 1) {
                              $valor = 'Si';
                          }
                          else
                          {
                             $valor = 'No';
                          }
                         ?>
                         <p>{{$valor}}</p>

                      </div>

                      @if($mensaje==1)
                      <h4>Visto: {{$value->cantidad}} veces</h4>		
                      @elseif($mensaje==2)
                      <h4>Pedido: {{$value->cantidad}} veces</h4>	
                      @endif
                      <br>

                        {{Form::open(array('url'=>'/admin/editarB', 'id' => $value->id))}}
                {{ Form::submit('Editar', array('name'=> 'Editar','class' => 'btn btn-success direccionar')) }} 
                {{ Form::submit('Eliminar', array('name'=> 'Eliminar','class' => 'btn btn-danger')) }}</td> 
                <input type="hidden" name="id_producto" value="{{$value->id}}">
                {{Form::close()}}
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