@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar</title>
	
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
              <h3 class="panel-title"><i class="fa fa-fw fa-cutlery"></i> Editar</h3>
            </div>    
		<div class="panel-body">
		{{Form::open(array('url'=>'/admin/guardarR','files'=>'true'))}}
			<div class="col-md-6">
				<br>
			     <img id="blah" style="width:100%;" src="{{asset($restaurantes->imagenR)}}" alt="your image" />
				<input type="file" name="imgFile" id="imgFile" value="">
					
			</div>
			<br>
			<div class="col-md-3">
			<label>Nombre</label>
			<br>
			<input class="form-control" type="text" name="nombre" value="{{$restaurantes->nombre}}">
			<br>
			<label>Dirección</label>
			<textarea class="form-control" name="direccion" id="" rows="10">{{$restaurantes->direccion}}</textarea>
			
			</div>
			<div class="col-md-3 precios">
				<label>Coordenadas</label>
			<br>
			<input class="form-control" type="text" name="coordenadas" value="{{$restaurantes->coordenadas}}">
			<br>
			<label>Teléfono</label>
			<br>
			<input class="form-control" type="text" name="telefono" value="{{$restaurantes->telefono}}">
			<br>
				<label>Horario:</label>
								
		         {{ Form::label('hora_inicio', 'Hora a la que abre el restaurante') }}
		         <br>
		         {{ Form::input('time','hora_inicio', $restaurantes->hora_inicio, array('placeholder'=>'09:00', 'class' => 'form-control')) }}
		    	<br/>
		    
		         {{ Form::label('hora_fin', 'Hora a la que cierra el restaurante') }}
		         <br>
		         {{ Form::input('time','hora_fin', $restaurantes->hora_fin, array('placeholder'=>'17:00', 'class' => 'form-control')) }}
		
				<br>
				<input type="hidden" name="id" value="{{$restaurantes->id}}">
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