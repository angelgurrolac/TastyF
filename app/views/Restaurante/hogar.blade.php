@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<script src="{{ URL::asset('assets/js/diseno-tabla.js') }}"></script>


	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Hogar</title>
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
			<br>
			<br>

			<div class="container-fluid">

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading admin">
								<h3 class="panel-title"><i class="fa fa-fw fa-flag"></i> Pedidos y reservaciones</h3>
							</div>
							<div class="panel-body">

								<ul class="nav nav-tabs">

									<li><a style="cursor:pointer;" id="hogarP">Pedidos</a></li>
									<li><a style="cursor:pointer;" id="hogarV">Visitas</a></li>
									<li><a style="cursor:pointer;" id="hogarR">Reservaciones</a></li>

								</ul>


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


<div class="table-responsive">


	<table id="reservaciones" class="table table-hover table-bordered table-striped">
     		<caption align="top"> <h3 style="margin-left:1em;">Reservaciones</h3>  </caption>
     		<thead class="at">
     			<th style="width:144px; heigth:200px;">Acciones</th> 	
     			<th style="width:144px; heigth:200px;">Acciones</th> 
     			<th style="width:144px; heigth:200px;">Reservación</th>
     			<th style="width:144px; heigth:200px;">Personas</th>
     			<th style="width:144px; heigth:200px;">Hora de llegada</th>     			
     			<th style="width:144px; heigth:200px;">Cantidad</th>
     			<th style="width:144px; heigth:200px;">Producto</th> 	
     				
     		</thead>  
     		 <tbody class="at acomodo-tabla"> 
     		  @if(count($reservaciones)>0)     
		 @foreach($reservaciones as $r)
		 {{Form::open(array('url' => '/rescon'))}}
			<?php $b = 1; ?>
			@foreach($detallesR as $key => $info)					
				@if($info->id_reservacion == $r->id)	
				<?php $b++; $nada=null ?>
				@endif     
		     @endforeach
				<tr>

					{{ Form::hidden('idreservacion',$r->id)}}
					<td style="width:144px; heigth:200px;" rowspan="{{$b}}">{{ Form::submit('Confirmar', array('name'=> 'Confirmar','class' => 'btn btn-primary')) }}</td>
					<td style="width:144px; heigth:200px;" rowspan="{{$b}}">{{ Form::submit('Declinar', array('name'=> 'Declinar','class' => 'btn btn-danger')) }}</td>													
					<td style="width:144px; heigth:200px;" rowspan="{{$b}}">{{$r->id}}</td>
					<td style="width:144px; heigth:200px;" rowspan="{{$b}}">{{$r->mesa}}</td>
					<td style="width:144px; heigth:200px;" rowspan="{{$b}}">{{$r->hora}}</td>
					@foreach($detallesR as $key => $info)					
			
					@if($info->id_reservacion == $r->id)																				
													
			     		<tr>
			     	        @if(is_null($info->nombre))
			     	        <td style="width:144px; heigth:200px;">Sin pedido</td>			     				
			     	        <td style="width:144px; heigth:200px;" >Sin pedido</td>			     				
			     			
			     	        @endif
			     			<td style="width:144px; heigth:200px;">{{$info->cantidad}}</td>			     				
			     			<td style="width:144px; heigth:200px;">{{$info->nombre}}</td>			     							     	  				     			
			     		     							     	  				     			
			     		</tr>	

		     			@endif     
		     	
					 @endforeach
					
				
					
				
				</tr>
				
           <td></td>
		 	
			{{Form::close()}}
		 @endforeach
	    @endif
	    </tbody>
			</table>






	<div style="margin-left:1em;" id="visitas"><h3>Visitas</h3>
	<h5>Personas que han visto mi teléfono en la aplicación {{$restaurante->con_telefono}}</h5>
	<br>
	<h5>Personas que han visto mi dirección en la aplicación {{$restaurante->con_direccion}}</h5>
	<br>
	</div>




	<table id="pedidos" class="table table-hover table-bordered table-striped">

		<caption align="top"> <h3 style="margin-left:1em;">Pedidos</h3>  </caption>
		<thead class="at">
			<th style="width:106px; heigth:200px;">Acciones</th>
			<th style="width:95px; heigth:200px;">Acciones</th>
			<th style="width:90px; heigth:200px;" >Orden</th>
			<th style="width:90px; heigth:200px;">Domicilio</th>
			<th style="width:90px; heigth:200px;">Características</th>
			<th style="width:90px; heigth:200px;">Cantidad</th>
			<th style="width:90px; heigth:200px;">Producto</th>
			<th style="width:90px; heigth:200px;">Importe</th>
			<th style="width:90px; heigth:200px;">IVA</th>
			<th style="width:90px; heigth:200px;">Costo Unitario</th>
			<th style="width:90px; heigth:200px;">Total</th>     	
			 	


		</thead>

		<tbody class="at acomodo-tabla">
			@if(count($pedidos)>0)
			@foreach($pedidos as $key => $value)
			{{Form::open(array('url' => '/condec'))}}
			<?php $a = 1; ?>
			@foreach($detalles as $key => $info)					
			@if($info->id_pedido == $value->id)	
			<?php $a++; ?>
			@endif     
			@endforeach
			<tr>
				{{ Form::hidden('idpedido',$value->id)}}
				<td style="width:70px; heigth:200px;" rowspan="{{$a}}">{{ Form::submit('Confirmar', array('name'=> 'Confirmar','class' => 'btn btn-primary')) }}</td>
				<td style="width:90px; heigth:200px;" rowspan="{{$a}}">{{ Form::submit('Declinar', array('name'=> 'Declinar','class' => 'btn btn-danger')) }}</td>													
				
				<td style="width:90px; heigth:200px;" rowspan="{{$a}}">{{$value->id}}</td>


				@if($notificacion < $value->created_at && $nuevafecha > $value->created_at)	
				<td rowspan="{{$a}}">{{$value->created_at}}</td>
				@endif   
				<td style="width:90px; heigth:200px;" rowspan="{{$a}}">{{$value->domicilioP}}</td>
				<td style="width:121px; heigth:200px;" rowspan="{{$a}}">{{$value->caracteristica}}</td>





				

				<!-- <tr>-->

				@foreach($detalles as $key => $info)

				@if($info->id_pedido == $value->id)	
				<tr>
					<td style="width:90px; heigth:200px;" >{{$info->cantidad}}	</td>
					<td style="width:90px; heigth:200px;" >{{$info->nombre}}	</td>
					<td style="width:90px; heigth:200px;" >{{$info->precio}}	</td>
					<td style="width:90px; heigth:200px;" >{{$info->iva}}	</td>
					<td style="width:90px; heigth:200px;" >{{$info->costo_unitario}}</td>
					<?php $total = $info->cantidad *  $info->costo_unitario; ?> 
					<td style="width:90px; heigth:200px;" >{{$total}}	</td>
				</tr>

					@endif     

					@endforeach

					
</tr>

				
				<td></td>


			     			<!-- <td >{{$info->nombre}}</td>
			     				
			     			<td>{{$info->precio}}</td>
			     				
			     			<td>{{$info->iva}}</td>
			     				
			     			<td>{{$info->costo_unitario}}</td>		
							<?php $total = $info->cantidad *  $info->costo_unitario; ?>

							<td >{{$total}}</td>	 -->     		

							<!-- </tr> -->


							{{Form::close()}}
							@endforeach
							@endif



						</tbody>


					</table>







				</div>  
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->
</div>


</body>
</html>
