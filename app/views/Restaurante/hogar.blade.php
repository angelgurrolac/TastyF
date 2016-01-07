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
    	
     		<table id="pedidos" class="table  table-hover table-bordered table-striped">
     		@if(count($pedidos)>0)
     		<caption align="top"> <h3>Pedidos</h3>  </caption>
     		<thead class="at">
     			<th width="200" heigth="200">Acciones</th>
     			<th width="200" heigth="200">Acciones</th>
     			<th width="200" heigth="200">Orden</th>
     			<th width="200" heigth="200">Domicilio</th>
     			<th width="200" heigth="200">Características</th>
     			<th width="200" heigth="200">Cantidad</th>
     			<th width="200" heigth="200">Producto</th>
     			<th width="200" heigth="200">Importe</th>
     			<th width="200" heigth="200">IVA</th>
     			<th width="200" heigth="200">Costo Unitario</th>
     			<th width="200" heigth="200">Total</th>     	
     		  	

     		</thead>
     
		 @foreach($pedidos as $key => $value)
		 {{Form::open(array('url' => '/condec'))}}
			<?php $a = 1; ?>
			@foreach($detalles as $key => $info)					
				@if($info->id_pedido == $value->id)	
				<?php $a++; ?>
				@endif     
		     @endforeach
		     		<tbody class="at acomodo-tabla">
				<tr>
					{{ Form::hidden('idpedido',$value->id)}}
					<td width="200" heigth="200" rowspan="{{$a}}">{{ Form::submit('Confirmar', array('name'=> 'Confirmar','class' => 'btn btn-primary')) }}</td>
					<td  width="200" heigth="200" rowspan="{{$a}}">{{ Form::submit('Declinar', array('name'=> 'Declinar','class' => 'btn btn-danger')) }}</td>													
					<td width="200" heigth="200"rowspan="{{$a}}">{{$value->id}}</td>

			
					@if($notificacion < $value->created_at && $nuevafecha > $value->created_at)	
				<td width="200" heigth="200"rowspan="{{$a}}">{{$value->created_at}}</td>
				@endif   
					<td width="200" heigth="200" rowspan="{{$a}}">{{$value->domicilioP}}</td>
					<td width="200" heigth="200" rowspan="{{$a}}">{{$value->caracteristica}}</td>

						</tr>


					@foreach($detalles as $key => $info)
					
					@if($info->id_pedido == $value->id)	
					
					
				
					
						<tr>							
			     			<td width="200" heigth="200" >{{$info->cantidad}}</td>
			     		
			     			<td width="200" heigth="200" >{{$info->nombre}}</td>
			     				
			     			<td width="200" heigth="200">{{$info->precio}}</td>
			     				
			     			<td width="200" heigth="200">{{$info->iva}}</td>
			     				
			     			<td width="200" heigth="200">{{$info->costo_unitario}}</td>		
							<?php $total = $info->cantidad *  $info->costo_unitario; ?>

			     			<td width="200" heigth="200" >{{$total}}</td>	     		
			     			
			     		</tr>

		     			@endif     
		     		 		
					 @endforeach
					
					
					
				

		 </tbody>
				 {{Form::close()}}
		 @endforeach
	
			</table>
			
     @endif
     	
			<table id="reservaciones" class="table table-bordered table-condensed">
     		<caption align="top"> <h3>Reservaciones</h3>  </caption>
     		<thead class="at">
     			
     			<th width="200" heigth="200">Acciones</th> 	
     			<th width="200" heigth="200">Acciones</th> 
     			<th width="200" heigth="200">Reservación</th>
     			<th width="200" heigth="200">Personas</th>
     			<th width="200" heigth="200">Hora de llegada</th>     			
     			<th width="200" heigth="200">Cantidad</th>
     			<th width="200" heigth="200">Producto</th> 	
     				
     		</thead>   
     		  @if(count($reservaciones)>0)     
		 @foreach($reservaciones as $r)
		 {{Form::open(array('url' => '/rescon'))}}
			<?php $b = 1; ?>
			@foreach($detallesR as $key => $info)					
				@if($info->id_reservacion == $r->id)	
				<?php $b++; $nada=null ?>
				@endif     
		     @endforeach
		     <tbody class="at acomodo-tabla">
				<tr>
					{{ Form::hidden('idreservacion',$r->id)}}
					<td width="200" heigth="200"rowspan="{{$b}}">{{ Form::submit('Confirmar', array('name'=> 'Confirmar','class' => 'btn btn-primary')) }}</td>
					<td width="200" heigth="200"rowspan="{{$b}}">{{ Form::submit('Declinar', array('name'=> 'Declinar','class' => 'btn btn-danger')) }}</td>													
					<td width="200" heigth="200"rowspan="{{$b}}">{{$r->id}}</td>
					<td width="200" heigth="200"rowspan="{{$b}}">{{$r->mesa}}</td>
					<td width="200" heigth="200"rowspan="{{$b}}">{{$r->hora}}</td>
					@foreach($detallesR as $key => $info)					
			
					@if($info->id_reservacion == $r->id)																				
													
			     		<tr>
			     	        @if(is_null($info->cantidad))
			     	        <td width="200" heigth="200">Sin pedido</td>			     				
			     	        <td width="200" heigth="200" >Sin pedido</td>			     				
			     			
			     	        @endif
			     			<td width="200" heigth="200">{{$info->cantidad}}</td>			     				
			     			<td width="200" heigth="200">{{$info->nombre}}</td>			     							     	  				     			
			     		     							     	  				     			
			     		</tr>	

		     			@endif     
		     	
					 @endforeach
					
				
					
				
				</tr>
				
           <td></td>
		 	</tbody>
			{{Form::close()}}
		 @endforeach
	    @endif
			</table>


	<div id="visitas"><h3>Visitas</h3>
	<h5>Personas que han visto mi teléfono en la aplicación {{$restaurante->con_telefono}}</h5>
	<br>
	<h5>Personas que han visto mi dirección en la aplicación {{$restaurante->con_direccion}}</h5>
	<br>
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

</div>
</body>
</html>
		