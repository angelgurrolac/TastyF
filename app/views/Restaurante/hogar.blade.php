@include('Restaurante.recursos')

	<!-- 		<?php
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('America/Mexico_City');


// Imprime algo como: Monday 8th of August 2005 03:12:46 PM
$notificacion =  date('Y-m-d h:i:s');
echo $notificacion;


$nuevafecha = strtotime ( '+1 minute' , strtotime ( $notificacion ) ) ;
$nuevafecha = date ( 'Y-m-d h:i:s' , $nuevafecha );
echo $nuevafecha;


?>
-->
<!DOCTYPE html>
<html lang="en">
<head>

	<script src="{{ URL::asset('assets/js/diseno-tabla.js') }}"></script>
	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Pedidos y reservaciones</title>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#visitas').fadeOut();
			$('#pedidos').fadeIn();
			$('#reservaciones').fadeOut();

			$('#hogarV').click(function(){
				$('#visitas').fadeIn();
				$('#pedidos').fadeOut();
				$('#reservaciones').fadeOut(); 

			}); 
			$('#hogarP').click(function(){
				$('#visitas').fadeOut();
				$('#pedidos').fadeIn();
				$('#reservaciones').fadeOut();

			});    
			$('#hogarR').click(function(){
				$('#visitas').fadeOut();
				$('#pedidos').fadeOut();
				$('#reservaciones').fadeIn();

			}); 

		});
	</script>
</head>
<body>
	<div class="row" style="background-color:white;">
		<div class="col-lg-2"></div>
		<div class="col-lg-10">
			

			<div class="container ">

				<div class="row">
					<div class="col-lg-12">
					<br>

						<ul class="nav nav-tabs">
							<li><a style="cursor:pointer;" id="hogarP">Pedidos</a></li>
							<!-- <li><a style="cursor:pointer;" id="hogarV">Vistas</a></li> -->
							<li><a style="cursor:pointer;" id="hogarR">Reservaciones</a></li>
						</ul>
						<br>


						<div class="row">

							<!-- Pedidos -->
							<div id="pedidos" class="panel panel-green" style="border-color:black;">
								<br>
								 <td>{{Form::open(array('url'=>'/restaurante/enviarhd','id' => 0))}}
                {{ Form::submit('Enviar con Happy Delivery', array('name'=> 'Enviar','class' => 'btn btn-success direccionar')) }} 
                <input type="hidden" name="id" value="0">
                {{Form::close()}}
                <br>
								<div class="panel-heading" style="background-color:black; border-color:black;">
									<h3 class="panel-title"><i class="fa fa-fw fa-flag"></i> Pedidos</h3>
								</div>
								@if(count($pedidos)>0)
								@foreach($pedidos as $key => $value)
								{{Form::open(array('url' => '/condec'))}}
								<?php $a = 1; ?>
								@foreach($detalles as $key => $info)					
								@if($info->id_pedido == $value->id)	
								<?php $a++; ?>
								@endif     
								@endforeach
								{{ Form::hidden('idpedido',$value->id)}}
								<div class="panel-body" >
									<div class="col-lg-6">
										
										<p class="titulos-pedidos">Orden:</p> <p class="res-pedidos">{{$value->id}}</p><br>
										@if($notificacion < $value->created_at && $nuevafecha > $value->created_at)	
										<p>{{$value->created_at}}</p>
										@endif 
										<p class="titulos-pedidos">Domicilio:</p> <p class="res-dire">{{$value->domicilioP}}</p>
										<p class="titulos-pedidos">Características:</p> <p class="res-pedidos">{{$value->caracteristica}}</p><br>

									</div>

									<div class="col-lg-6">
										<div class="table-responsive" style="margin:1%;">
											<table class="table table-bordered table-hover table-striped">
												<thead>
													<tr>
														<th>Cantidad</th>
														<th>Producto</th>
														<th>Importe</th>
														<th>IVA</th>
														<th>Costo unitario</th>
														<th>Total</th>
													</tr>
												</thead>

												<tbody>
													@foreach($detalles as $key => $info)
													@if($info->id_pedido == $value->id)

													<tr>
														<td>{{$info->cantidad}}</td>
														<td>{{$info->nombre}}</td>
														<td>{{$info->precio}}</td>
														<td>{{$info->iva}}</td>
														<td>{{$info->costo_unitario}}</td>
														<?php $total = $info->cantidad *  $info->costo_unitario; ?> 
														<td>{{$total}}</td>
													</tr>
													@endif     
													@endforeach

												</tbody>
											</table>
										</div>
										<div class="panel-footer" style="border-style: none;">
											{{ Form::submit('Confirmar', array('name'=> 'Confirmar','class' => 'btn btn-primary')) }}
											{{ Form::submit('Declinar', array('name'=> 'Declinar','class' => 'btn btn-danger')) }}

										</div>
									</div>
								</div>
								<hr class="color-linea">
								{{Form::close()}}
								@endforeach
								@endif
							</div>
							<!-- Fin pedidos -->

							<!-- 	Visitas -->
							<!-- <div id="visitas" class="panel panel-green" style="border-color:black;">
								<div class="panel-heading" style="background-color:black; border-color:black;">
									<h3 class="panel-title"><i class="fa fa-eye"></i> Vistas</h3>
								</div>
								
								<div class="panel-body" >

									<p class="titulos-pedidos">Personas que han visto mi número de teléfono en la aplicación:</p><p class="res-pedidos"> {{$restaurante->con_telefono}}</p>
									<br>
									<p class="titulos-pedidos">Personas que han visto mi dirección en la aplicación:</p> <p class="res-pedidos">{{$restaurante->con_direccion}}</p>
									<br>
									 @foreach($publicidad as $key => $val)
									<p class="titulos-pedidos">Personas que han visto mi publicidad en la aplicación:</p><p class="res-pedidos"> {{$val->vistasp}}</p>
									<br>
									 @endforeach
								</div>
							</div> -->
							<!-- Fin de visitas -->

							<!-- Reservaciones -->
							<div id="reservaciones" class="panel panel-green" style="border-color:black;">
								<div class="panel-heading" style="background-color:black; border-color:black;">
									<h3 class="panel-title"><i class="fa fa-fw fa-flag"></i> Reservaciones</h3>
								</div>
								@if(count($reservaciones)>0)     
								@foreach($reservaciones as $r)
								{{Form::open(array('url' => '/rescon'))}}
								<?php $b = 1; ?>
								@foreach($detallesR as $key => $info)					
								@if($info->id_reservacion == $r->id)	
								<?php $b++; $nada=null ?>
								@endif     
								@endforeach
								{{ Form::hidden('idreservacion',$r->id)}}
								<div class="panel-body" >
									<div class="col-lg-6">
										
										<p class="titulos-pedidos">Reservación:</p> <p class="res-pedidos">{{$r->id}}</p><br>
										
										<p class="titulos-pedidos">Personas:</p> <p class="res-pedidos">{{$r->mesa}}</p><br>
										<p class="titulos-pedidos">Hora de llegada:</p> <p class="res-pedidos">{{$r->hora}}</p><br>

									</div>

									<div class="col-lg-6">
										<div class="table-responsive" style="margin:1%;">
											<table class="table table-bordered table-hover table-striped">
												<thead>
													<tr>
														<th>Cantidad</th>
														<th>Producto</th>
												</thead>

												<tbody>
													@foreach($detallesR as $key => $info)
													@if($info->id_reservacion == $r->id)

													<tr>
													@if($info->nombre == "")
													<td>hola</td>
													<td>hola</td>
													@else
													<td>{{$info->cantidad}}</td>
													<td>{{$info->nombre}}</td>
													@endif

													


													</tr>

													@endif
													 
													@endforeach
					
													

												</tbody>
											</table>
										</div>
										<div class="panel-footer" style="border-style: none;">
											{{ Form::submit('Confirmar', array('name'=> 'Confirmar','class' => 'btn btn-primary')) }}
					                        {{ Form::submit('Declinar', array('name'=> 'Declinar','class' => 'btn btn-danger')) }}

										</div>
									</div>
								</div>
								<hr class="color-linea">
									{{Form::close()}}
									@endforeach
									@endif
							</div>
							<!-- Fin Reservaciones -->
						</div>
					</div>
				</div>
				<!-- /.row -->

			</div>
			<!-- /.container-fluid -->
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