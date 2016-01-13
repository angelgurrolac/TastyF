@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Publicidad</title>
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
								<h3 class="panel-title"><i class="fa fa-fw fa-bookmark"></i> Publicidad</h3>
							</div>
							<div class="panel-body">

								<hr>
								<a style="display:inline-block; margin-left:1%" class="btn btn-lg btn-primary buttonagregar" data-target="#myModal">Agregar publicidad</a>
								<br>
								<hr>

								<div class="row">

									<h2 style="margin-left:3%;">Publicidades actuales</h2>




									@foreach($publicidad as $key => $value)	 		

									{{Form::open(array('url' => '/admin/editar'))}}
									<div class="col-sm-6">
										<div class="panel panel-primary">

											<div class="panel-body">
												<div class="row">
													<div class="col-md-1"></div>

													<div class="col-md-10">
														<img style="height:300px; width:300px;" class="center-block thumbnail img-rounded" src="{{asset($value->imagen)}}" alt="{{asset($value->imagen)}}">
														<div class="caption">
														<div style="margin-left:2%;">

																<h3>Publicidad: {{$value->descripcion}} </h3>
																<br>

																<b>Día:</b>
																<p>{{$value->dia}}</p>
																<b>Hora de inicio:</b>
																<p>{{$value->hora_inicio}}</p>
																<b>Hora de fin:</b>
																<p>{{$value->hora_fin}}</p> 
																<b>Contador de vistas:</b>
																<p>{{$value->contador}}</p>
																<br>
															

															<!-- {{Form::open(array('url'=>'/admin/editar', 'id' => $value->id,'style' => 'display:inline-block;'))}} -->

															<!-- <a name="editar" style="display:inline-block;" class="btn btn-success direccionar">Editar</a> -->
															<!-- <input type="hidden" name="publicidad_id" value="{{$value->id}}"> -->
															<!-- {{Form::close()}} -->

															<!-- {{Form::open(array('url'=>'/admin/eliminarP', 'id' => $value->id,'style' => 'display:inline-block;'))}} -->

															<!-- <a name="eliminar" style="display:inline-block;" class="btn btn-danger direccionar2">Eliminar</a>	 -->
															<!-- <input type="hidden" name="producto_id" value="{{$value->id}}"> -->



															{{ Form::hidden('publicidad_id',$value->id)}}
															{{ Form::submit('Editar', array('name'=> 'Editar','class' => 'btn btn-success')) }}</td>
															{{ Form::submit('Eliminar', array('name'=> 'Eliminar','class' => 'btn btn-danger')) }}</td>													

															{{Form::close()}}
</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									@endforeach






									<br>
									<!-- Modal -->
									<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" >
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													{{Form::open(array('url' => '/admin/publicidad','files' => 'true'))}}

													<h4 class="modal-title" id="myModalLabel">{{ Form::label('Agregar publicidad') }}</h4>
												</div>
												<div class="modal-body">
													<table>
														<tr>

															<th>
																<div class="form-group">
																	{{ Form::label( 'descripcion', 'Ingresar una pequeña descripción', array ('class' => 'estilo-form')) }}																		
																	{{ Form::text('descripcion', Input::old('descripcion'), array('class' => 'form-control', 'id' => 'nombre','required')) }}
																	{{ Form::text('nombre2', Input::old('nombre2'), array('class' => 'form-control hidden', 'id' => 'nombre2')) }}

																</div>
															</th>
														</tr>
														<tr>
															<th>
																<div class="form-group">
																	<div id="datepick" class="input-append date" >
																		<span class="add-on">
																			{{Form::input('date','date1',Input::old('date'),array('tipo_de_serviciocomplete'=>'off','data-format'=>'dd/MM/yyyy','required') )}}
																			<span class="glyphicon glyphicon-calendar"></span>
																		</span>
																	</div>
																	<h6><span class="glyphicon glyphicon-info-sign"></span> Fecha en que se mostrara la imagen</h6>
																</div>

															</th>
														</tr>
														<tr>
															<th>

																{{ Form::label( 'hora-inicial', 'Hora a la que comenzara a aparecer la imagen', array ('class' => 'estilo-form')) }}	
																<br>
																{{ Form::input('time', 'hora_inicio', Input::old('hora_inicio'), array('placeholder'=>'09:00','required')) }}
																<br/>


																{{ Form::label( 'hora-final', 'Hora a la que dejara de aparecer la imagen', array ('class' => 'estilo-form')) }}	
																<br>
																{{ Form::input('time', 'hora_fin', Input::old('hora_fin'), array('placeholder'=>'17:00','required')) }}		    
																<br>
															</th>
														</tr>

														<tr>
															<td>{{ Form::label('Imagen') }}</td>
															<td>
																<div class="form-group">   

																	{{ Form::file('imagen', array('required'))  }}
																</div>
															</td>
														</tr>

													</table>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
													{{ Form::submit('Agregar servicio', array('class' => 'btn btn-primary')) }}
												</div>
												{{Form::close()}}
											</div>
										</div>
									</div>


									<!-- </div> -->

								</div>   
							</div>
						</div>
					</div>
				</div>
			</div>
		</body>
		</html>
		<script>
			$(function() {
				$('.buttonagregar').click(function(){
					$('#myModal').modal('show');
				});
			});
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('.direccionar').click(function(){
					var formulario = $(this).next('input').val();
					$('#'+formulario).submit();
				});
				$('.direccionar2').click(function(){
					var formulario = $(this).next('input').val();
					$('#'+formulario).submit();
				});
			});
		</script>