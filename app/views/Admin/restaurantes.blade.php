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
						
							@foreach($restaurantes as $key => $value)
<div class="col-sm-6">
                <div class="panel panel-primary" style="margin-left:1em;">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{$value->nombre}}</h3>
                  </div>
                  <div class="panel-body">
                   <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-10">

                      <img style="height:300px; width:300px;" class="center-block thumbnail img-rounded" src="{{asset($value->imagenR)}}" alt="{{asset($value->imagenR)}}">
                      <div class="caption">

                      	<b>Dirección:</b>
                      	<p>{{$value->direccion}}</p>
                      	<b>Telefono:</b>
                      	<p>{{$value->telefono}}</p>
                      	<b>Horario:</b>
                      	<p>De: {{$value->hora_inicio}} a: {{$value->hora_fin}}</p>
                      	<b>¿Entrega a domicilio?</b>
                      	 <?php
                          $estado = $value->domicilio;
                          if ($estado == 1) {
                              $valor = 'Si';
                          }
                          else
                          {
                             $valor = 'No';
                          }
                         ?>
                         <p>{{$valor}}</p>


                          @if($mensaje==1)
                      <h4>Visto: {{$value->cantidad}} veces</h4>		
                      @endif

                      {{Form::open(array('url'=>'/admin/editarR', 'id' => $value->id))}}
                {{ Form::submit('Editar', array('name'=> 'Editar','class' => 'btn btn-success direccionar')) }} 
                {{ Form::submit('Eliminar', array('name'=> 'Eliminar','class' => 'btn btn-danger')) }}</td> 
                <input type="hidden" name="id_restaurante" value="{{$value->id}}">
                {{Form::close()}}
                      </div>
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