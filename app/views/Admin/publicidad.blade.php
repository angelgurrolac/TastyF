@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Publicidad</title>
</head>
<body>
	  <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Publicidad</h4></div>   
     		<div class="container">
     			<div class="col-md-3">
				<br>
			<a href="#"><img class="buttonagregar" data-target="#myModal" src="{{asset('assets/img/anclas/mas.png')}}">Agregar publicidad</a>
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
															 {{ Form::label('ingresar una pequeña descripcion') }}																		
															{{ Form::text('descripcion', Input::old('descripcion'), array('class' => 'form-control', 'id' => 'nombre')) }}
															{{ Form::text('nombre2', Input::old('nombre2'), array('class' => 'form-control hidden', 'id' => 'nombre2')) }}

														</div>
													</th>
											</tr>
											<tr>
												<th>
													<div class="form-group">
         <div id="datepick" class="input-append date" >
          <span class="add-on">
           {{Form::text('date',Input::old('date'),array('tipo_de_serviciocomplete'=>'off','data-format'=>'dd/MM/yyyy') )}}
           <span class="glyphicon glyphicon-calendar"></span>
         </span>
       </div>
       <h6><span class="glyphicon glyphicon-info-sign"></span> Fecha en que se mostrara la imagen</h6>
     </div>

												</th>
											</tr>
											<tr>
													<th>
													 {{ Form::label('hora_inicio', 'hora a la que comenzara a aparecer la imagen') }}
		         <br>
		         {{ Form::text('hora_inicio', Input::old('hora_inicio'), array('placeholder'=>'09:00')) }}
		    	<br/>
		    
		         {{ Form::label('hora_fin', 'hora a la que dejara de aparecer la imagen') }}
		         <br>
		         {{ Form::text('hora_fin', Input::old('hora_fin'), array('placeholder'=>'17:00')) }}		    
				<br>
				</th>
												</tr>
									
											<tr>
												<td>{{ Form::label('Imagen') }}</td>
												<td>
													<div class="form-group">   
														{{ Form::file('imagen') }}
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
			
					
				</div>
				
     		</div>
          <div class="panel-footer clearfix admin">

	</div>     
	</div>
	</div>
</body>
</html>
<script>
$(function() {
  $('#datepick').datetimepicker({
    language: 'es'
  });
});
$('.buttonagregar').click(function(){
	$('#myModal').modal('show');
});
</script>