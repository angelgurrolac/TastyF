@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Datos</title>
</head>
<body>
	  <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading rest"><h4>{{ Session::get("nombre") }} Seccion:Numero de Cuentas</h4></div>
     	<div class="panel-body ">
     		{{ Form::open(array('url' => '/restaurante/datos','id'=>'nueva','files'=>'true')) }}
     			@if($restaurante->cuenta=='')
		     	<div class="form-group col-md-4">
		         {{ Form::label('cuenta', 'Aqui puede registrar el numero de cuenta al que le hara los depositos el administrador') }}
		         {{ Form::text('cuenta', Input::old('cuenta'), array('class' => 'form-control col-md-4','form'=>'nueva')) }}
		         <br>
		         {{ Form::submit('Guardar tarjeta', array('class' => 'btn btn-primary')) }}
		       </div>	
		       @else
		        {{ Form::label('cuenta', 'Aqui puede cambiar el numero de cuenta al que le hara los depositos el administrador') }}
					<br/>
		         {{ Form::text('cuenta', $restaurante->cuenta, array('class' => 'form-control col-md-4','form'=>'nueva')) }}
		         	<br/>
					<br/>
		         {{ Form::submit('Guardar Cambios', array('class' => 'btn btn-primary')) }}
		       @endif
		     
		     {{ Form::close() }}
		     {{ Form::open(array('url' => '/restaurante/imgPerfil', 'files'=>'true')) }}
     			@if($restaurante->imagenR=='')
		     	<div class="form-group col-md-12">
		         {{ Form::label('cuenta', 'Sube una imagen para representar tu restaurante') }}
		            
			       <div class=" col-md-6">
			         <img id="blah" style="width:100%; height:50%;;" src="" />
			           </div>

			       <div class=" col-md-6">
					<input type="file" name="imgFile" id="imgFile" value="">
					</div>
			     
		           		<br/>
				       <br/>
				       			       <div class=" col-md-12">
		         {{ Form::submit('Guardar imagen', array('class' => 'btn btn-primary col-md-5')) }}
		         </div>
		       </div>	
		       @else
		       <div class=" col-md-6">
			         <img id="blah" style="width:100%; height:50%;;" src="{{asset($restaurante->imagenR)}}" />
			           </div>

			       <div class=" col-md-6">
					<input type="file" name="imgFile" id="imgFile" value="">
					</div>
			     
		           		<br/>
				       <br/>
				       			       <div class=" col-md-12">
		         {{ Form::submit('Guardar imagen', array('class' => 'btn btn-primary col-md-5')) }}
		         </div>
		       @endif
		     
		     {{ Form::close() }}
		     </div>
      <div class="panel-footer clearfix rest">
	
	</div>     
	</div>
	</div>
</body>
</html>
<script>
	$('#imgFile').change(function(){
		$('#blah')[0].src = window.URL.createObjectURL(this.files[0])
	});
	</script>