@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>

	<script src="{{ URL::asset('assets/js/diseno-tabla.js') }}"></script>
	<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/notificaciones.js') }}"></script>
	
	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Pedidos y reservaciones</title>
	
	<style type="text/css">
.notificaciones-info{
   background: #075db2;
   color: #fff;
   padding: 10px;
   margin-right: 200px;
   font-weight: bold;
   font-family: sans-serif;
}

.notificaciones-info:hover{
   background: #7cbecc;
   color: #eee;
}

.notificaciones-error{
   background: #bd0000;
   color: #fff;
   padding: 20px;
   border: 3px solid #fff;
}
.notificaciones-error:hover{
   background: #e43633;  
}

.notificaciones-success{
   background: #90cd48;
   color: #fff;
   padding: 10px;
   margin-right: 50px;
   font-weight: bold;
   font-family: sans-serif;
}
.notificaciones-success:hover{
    background: #8bc53f;
}

#notificaciones{
    display: block;
    position: fixed;
    top: 10px;
    right: 10px;
    z-index: 9999;
}
.notificacion{
  float: right;
  clear: both;
  border: 3px solid transparent;
  cursor: pointer;
}

label.check {
  display: block;
  cursor: pointer;
  line-height: 36px;
  padding-left: 26px;
  font-size: 20px;
  color: #82BD4E;
  text-shadow: #2c3e50 1px 1px 1px;
  transition: .3s;
  background: url('https://dl.dropboxusercontent.com/u/3522/check_off.png') left center no-repeat;
}
label.check input {
  position: absolute;
  left: -9999px;
}
label.check.c_on {
  background: url('https://dl.dropboxusercontent.com/u/3522/check_on.png')  left center no-repeat;
  color: black;
  text-shadow: #34495e 1px 1px 1px;
}

	</style>
	                			  <?php
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('America/Mexico_City');


// Imprime algo como: Monday 8th of August 2005 03:12:46 PM
$notificacion =  date('H:i:s');



$nuevamas = strtotime ( '+5 minute' , strtotime ( $notificacion ) ) ;
$nuevamas = date ( 'H:i:s' , $nuevamas );




$nuevamenos = strtotime ( '-5 minute' , strtotime ( $notificacion ) ) ;
$nuevamenos = date ( 'H:i:s' , $nuevamenos );

?>

	<script type="text/javascript">
	 $(document).ready(function() { 

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
			
			 $('.direccionar').click(function(){
    var formulario = $(this).next('input').val();
    $('#'+formulario).submit();
  });

			 	var input = document.querySelectorAll("label.check input");

if(input !== null) {
  [].forEach.call(input, function(el) {
  
    if(el.checked) {
      el.parentNode.classList.add('c_on');
    }
  
    el.addEventListener("click", function(event) {
      event.preventDefault();
      el.parentNode.classList.toggle('c_on');
    }, false);
  });
}





	 });
		
	</script>

</head>
<body>

	@foreach($reservaciones as $key3 => $value3)
	@if($nuevamas > $value3->hora_reservacion && $nuevamenos < $value3->hora_reservacion)	
	<script type="text/javascript">
	 $(document).ready(function() { 

	 //si no existe la ventana notificaciones la creamos,
		 //esta será la que contendrá a todas las notificaciones
		  if ($("#notificaciones").length == 0) {
		  	//creamos el div con id notificaciones
		    var contenedor_notificaciones = $(window.document.createElement('div')).attr("id", "notificaciones");
		    //a continuación la añadimos al body
		    $('body').append(contenedor_notificaciones);
		  }
			
			$.notificaciones({		
				mensaje : '¡Tienes una nueva reservación, revisa tus pedidos y reservaciones!',
				width: 700,
				cssClass : 'success',
				timeout : 3000,//milisegundos
				fadeout : 5000,//tiempo en desaparecer
				radius : 10
			});
		});

	</script>										
    @endif

	@endforeach

	@foreach($pedidos as $key2 => $value2)
	
	@if($nuevamas > $value2->hora_pedido && $nuevamenos < $value2->hora_pedido)	

	<script type="text/javascript">
	 $(document).ready(function() { 

	 //si no existe la ventana notificaciones la creamos,
		 //esta será la que contendrá a todas las notificaciones
		  if ($("#notificaciones").length == 0) {
		  	//creamos el div con id notificaciones
		    var contenedor_notificaciones = $(window.document.createElement('div')).attr("id", "notificaciones");
		    //a continuación la añadimos al body
		    $('body').append(contenedor_notificaciones);
		  }
			
			$.notificaciones({		
				mensaje : '¡Tienes un nuevo pedido, revisa tus pedidos y reservaciones!',
				width: 700,
				cssClass : 'success',
				timeout : 3000,//milisegundos
				fadeout : 5000,//tiempo en desaparecer
				radius : 10
			});
		});

	</script>										
    @endif
     @endforeach
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
							
								
								{{Form::open(array('url' => '/restaurante/enviarhdc'))}}
								@if($variable == 1)
								{{ Form::hidden('hd',0)}}
								{{ Form::submit('', array('name'=> 'Confirmar','class' => 'btn btn-primary botondis')) }}
								@else
								{{ Form::hidden('hd',1)}}
								{{ Form::submit('', array('name'=> 'Confirmar','class' => 'btn btn-primary botondis1')) }}
								@endif

						      {{Form::close()}}
							

								

								




							<div class="col-md-12"></div>

							<!-- Pedidos -->
							<div id="pedidos" class="panel panel-green" style="border-color:black;">
							<!-- 	<br>
								 <td>{{Form::open(array('url'=>'/restaurante/enviarhd','id' => 0))}}
                {{ Form::submit('Enviar con Happy Delivery', array('name'=> 'Enviar','class' => 'btn btn-success direccionar')) }} 
                <input type="hidden" name="id" value="0">
                {{Form::close()}}
                <br>
 -->

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
