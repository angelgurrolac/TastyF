@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Datos</title>
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
	$notificacion =  date('Y-m-d H:i:s');



	$nuevamas = strtotime ( '+2 minute' , strtotime ( $notificacion ) ) ;
	$nuevamas = date ( 'Y-m-d H:i:s' , $nuevamas );




	$nuevamenos = strtotime ( '-62 minute' , strtotime ( $notificacion ) ) ;
	$nuevamenos = date ( 'Y-m-d H:i:s' , $nuevamenos );

	?>
</head>
<body>
	@foreach($reservaciones as $key3 => $value3)
	@if($nuevamas > $value3->created_at && $nuevamenos < $value3->created_at)	
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
	
	@if($nuevamas > $value2->created_at && $nuevamenos < $value2->created_at)	

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
								<h3 class="panel-title"><i class="fa fa-fw fa-credit-card"></i> Número de cuenta</h3>
							</div>
							<div class="panel-body" style="margin-left:1em;">
								<hr>
								{{ Form::open(array('url' => '/restaurante/datos','id'=>'nueva','files'=>'true')) }}
								<div class="row">
									@if($restaurante->cuenta=='')
									<div class="form-group col-md-8">
										{{ Form::label('cuenta', 'Aquí puede registrar el número de cuenta al que le hara los depositos el administrador', array ('class' => 'estilo-form')) }}

										<br>
										{{ Form::text('cuenta', Input::old('cuenta'), array('class' => 'form-control col-md-4','form'=>'nueva','required','maxlength'=>'16')) }}
										<br>
										<br>
										<br>
										{{ Form::submit('Guardar tarjeta', array('class' => 'btn btn-primary')) }}
										<hr>
									</div>
									<div class="col-md-4"></div>

									@else
									<div class="form-group col-md-8">
										{{ Form::label('cuenta', 'Aquí puede cambiar el número de cuenta al que le hara los depositos el administrador') }}
										<br>
										{{ Form::text('cuenta', $restaurante->cuenta, array('class' => 'form-control col-md-4','form'=>'nueva','required','maxlength'=>'16')) }}
										<br>
										<br>
										<br>
										{{ Form::submit('Guardar Cambios', array('class' => 'btn btn-primary')) }}
										<hr>
									</div>	
									<div class="col-md-4"></div>


									@endif
								</div>

								{{ Form::close() }}

								{{ Form::open(array('url' => '/restaurante/imgPerfil', 'files'=>'true')) }}
								@if($restaurante->imagenR=='')
								<div class="row">
									<div class=" col-md-8">
										{{ Form::label('cuenta', 'Sube una imagen para representar tu restaurante') }}
										<img id="blah" style="width:100%; height:50%;;" src="" />
										<br>
										<br>
										<input type="file" name="imgFile" id="imgFile" value="">
										<br>
										{{ Form::submit('Guardar imagen', array('class' => 'btn btn-primary')) }}
									</div>


									<div class=" col-md-4"></div>
								</div>	

								@else
								<div class="row">
									<div class=" col-md-8">

										{{ Form::label('cuenta', 'Edita la imagen que representa a tu restaurante') }}
										<br>
										<img id="blah" style="width:100%; height:50%;;" src="{{asset($restaurante->imagenR)}}" />
										<br>
										<br>
										<input type="file" name="imgFile" id="imgFile" value="">
										<br>
										{{ Form::submit('Guardar imagen', array('class' => 'btn btn-primary')) }}
									</div>
									<div class=" col-md-4"></div>
									@endif

									{{ Form::close() }}


								</div>
							</div>
						</div>
						<!-- /.row -->

					</div>
					<!-- /.container-fluid -->

				</div>
			</div>
			</html>
			<script>
			$('#imgFile').change(function(){
				$('#blah')[0].src = window.URL.createObjectURL(this.files[0])
			});
			</script>