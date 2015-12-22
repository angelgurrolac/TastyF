@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Hogar</title>
</head>
<body>
	  <div class="container marg">
    <div class="panel panel-default">
	
     <div class="panel-heading rest">{{ Session::get("nombre") }} Seccion:Hogar</div>
	<h3>Visitas</h3>
	<h5>Personas que han visto mi teléfono en la aplicación{{$restaurante->con_telefono}}</h5>
	<br>
	<h5>Personas que han visto mi dirección en la aplicación {{$restaurante->con_direccion}}</h5>
	<br>

	<br>
     @if(count($pedidos)>0)
    	
     		<table class="table table-bordered table-striped">
     		<h4 align="top"> Pedidos </h4>
     		<thead>
     			<th>Orden</th>
     			<th>Domicilio</th>
     			<th>Caracteristicas</th>
     			<th>Cantidad</th>

     			<th>Producto</th>
     			<th>Importe</th>
     			<th>Iva</th>
     			<th>Costo Unitario</th>
     			
     			<th>Total</th>     	

     		</thead>
     
		 @foreach($pedidos as $key => $value)
		 {{Form::open(array('url' => '/condec'))}}
			<?php $a = 1; ?>
			@foreach($detalles as $key => $info)					
				@if($info->id_pedido == $value->id)	
				<?php $a++; ?>
				@endif     
		     @endforeach
		     		<tbody>
				<tr>
					<td rowspan="{{$a}}">{{$value->id}}</td>
					<td rowspan="{{$a}}">{{$value->domicilioP}}</td>
					<td rowspan="{{$a}}">{{$value->caracteristica}}</td>
					@foreach($detalles as $key => $info)
					
					@if($info->id_pedido == $value->id)	
					
					
				
					
						<tr>							
			     			<td >{{$info->cantidad}}</td>
			     		
			     			<td >{{$info->nombre}}</td>
			     				
			     			<td >{{$info->precio}}</td>
			     				
			     			<td >{{$info->iva}}</td>
			     				
			     			<td >{{$info->costo_unitario}}</td>		
							<?php $total = $info->cantidad *  $info->costo_unitario; ?>

			     			<td>{{$total}}</td>	     		
			     			
			     		</tr>

		     			@endif     
		     		 		
					 @endforeach
					
					{{ Form::hidden('idpedido',$value->id)}}
					<td rowspan="{{$a}}">{{ Form::submit('Confirmar', array('name'=> 'Confirmar','class' => 'btn btn-primary')) }}</td>
					<td rowspan="{{$a}}">{{ Form::submit('Declinar', array('name'=> 'Declinar','class' => 'btn btn-danger')) }}</td>													
				
				</tr>
				

		 </tbody>
				 {{Form::close()}}
		 @endforeach
	
			</table>
			
     @endif
     <br>
     <br>
     <br>
     	
			<table class="table table-bordered table-condensed">
     		<h4 align="top"> Reservaciones </h4>
     		<thead>
     			<th>Reservación</th>
     			<th>Personas</th>
     			<th>Hora de llegada</th>     			
     			<th>Cantidad</th>
     			<th>Producto</th> 	
     		</thead>   
     		  @if(count($reservaciones)>0)     
		 @foreach($reservaciones as $r)
		 {{Form::open(array('url' => '/rescon'))}}
			<?php $b = 1; ?>
			@foreach($detallesR as $key => $info)					
				@if($info->id_reservacion == $r->id)	
				<?php $b++; ?>
				@endif     
		     @endforeach
		     <tbody>
				<tr>
					<td rowspan="{{$b}}">{{$r->id}}</td>
					<td rowspan="{{$b}}">{{$r->mesa}}</td>
					<td rowspan="{{$b}}">{{$r->hora}}</td>
					@foreach($detallesR as $key => $info)					
			
					@if($info->id_reservacion == $r->id)																				
													
			     		<tr>
			     	
			     			<td >{{$info->cantidad}}</td>			     				
			     			<td >{{$info->nombre}}</td>			     							     	  				     			
			     		</tr>	

		     			@endif     
		     	
					 @endforeach
					
					{{ Form::hidden('idreservacion',$r->id)}}
					<td rowspan="{{$b}}">{{ Form::submit('Confirmar', array('name'=> 'Confirmar','class' => 'btn btn-primary')) }}</td>
					<td rowspan="{{$b}}">{{ Form::submit('Declinar', array('name'=> 'Declinar','class' => 'btn btn-danger')) }}</td>													
				
				</tr>
				

		 	</tbody>
			{{Form::close()}}
		 @endforeach
	    @endif
			</table>
			
     	
 
     <div class="panel-footer clearfix rest">
	  
	</div>     
	</div>
	</div>
</body>
</html>
		