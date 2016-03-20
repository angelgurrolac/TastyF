@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar</title>
	<script src="{{ URL::asset('assets/js/sumas.js') }}"></script>
	<script src="{{ URL::asset('assets/js/notificaciones.js') }}"></script>

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
			<br>
			<br>

			<div class="container-fluid">

				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading admin">
								<h3 class="panel-title"><i class="fa fa-fw fa-cutlery"></i> Editar</h3>
							</div>    
							<div class="panel-body">
								{{Form::open(array('url'=>'/restaurante/saveChanges','files'=>'true'))}}
								<div class="col-md-6">
									<br>
									<img id="blah" style="width:100%;" src="{{asset($producto->imagen)}}" alt="your image" />
									<input type="file" name="imgFile" id="imgFile" value="">

								</div>
								<br>
								<div class="col-md-3">
									<label>Nombre</label>
									<br>
									<input class="form-control" type="text" name="nombre" value="{{$producto->nombre}}">
									<br>
									<label>Descripcion</label>
									<textarea class="form-control" name="descripcion" id="" rows="10">{{$producto->descripcion}}</textarea>
									<br>
									<label>Categoria  </label>
									{{ Form::select('categoria1' ,(['0' => $cat->nombre] + $categorias),$cat->nombre,['class' => 'form-control']) }} 
									<label>Categoria  </label>
									{{ Form::select('categoria2' ,(['0' => $cat2->nombre] + $categorias),$cat2->nombre,['class' => 'form-control']) }}
									<br>         	
									<?php $precioF = ($producto->precio * .15) + (2.5 + $producto->precio);
									$valor = ($producto->precio * .15);
									?>

									<label>Tiempo de preparación</label>
									<input class="form-control" type="number" name="preparacion" value="{{$producto->tiempo}}"></input>
								</div>
								<div class="col-md-3 precios">
									<label >Precio</label>
									<br>
									<input class="form-control inicial" name="precio"  value="{{$producto->precio}}" type="text">
									<br>
									<label >Costo por transacción</label>
									<br>
									<input class="form-control" name="transaccion" value="2.5" readonly  type="text">
									<br>
									<label for="">Comisión</label>
									<br>
									<input type="hidden" name="comision" class="comision" value="{{$producto->comision}}"  >
									<label name="comision2" class="comision2" >{{$valor}}</label>
									<br>
									<label for="">Precio final</label>
									<br>
									<input class="form-control costo_unitario" type="hidden" name="costo_unitario" value="{{$producto->costo_unitario}}"  >
									<label name="costo_unitario2" class="costo_unitario2" >{{$precioF}}</label>

									<br>				
									{{ Form::label('hora_inicio', 'hora a la que se comienza a preparar') }}
									<br>
									{{ Form::input('time','hora_inicio', $producto->hora_inicio, array('placeholder'=>'09:00', 'class' => 'form-control')) }}
									<br/>

									{{ Form::label('hora_fin', 'hora a la que se deja de preparar') }}
									<br>
									{{ Form::input('time','hora_fin', $producto->hora_fin, array('placeholder'=>'17:00', 'class' => 'form-control')) }}
									<br>
									<br>
									<input type="hidden" name="id" value="{{$producto->id}}">
									{{Form::submit('Guardar cambios',array('class'=>'btn btn-lg btn-primary'))}}
								</div>

								{{Form::close()}}
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
<script>
$('#imgFile').change(function(){
	$('#blah')[0].src = window.URL.createObjectURL(this.files[0])
});
</script>