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
		{{Form::open(array('url'=>'/admin/guardarA','files'=>'true'))}}
			<div class="col-md-6">
				<br>
			     <img id="blah" style="width:100%;" src="{{asset($producto->imagen)}}" alt="your image" disabled/>
				<!-- <input type="file" name="imgFile" id="imgFile" value=""> -->
					
			</div>
			<br>
			<div class="col-md-3">
			<label>Nombre</label>
			<br>
			<input class="form-control" type="text" name="nombre" value="{{$producto->nombre}}">
			<br>
			<label>Descripcion</label>
			<textarea class="form-control" name="descripcion" id="" rows="10">{{$producto->descripcion}}</textarea>
			
			</div>
			<div class="col-md-3 precios">
				<label >Precio</label>
				<br>
				<input class="form-control inicial" name="precio"  value="{{$producto->precio}}" type="text" disabled>
				<br>				
		         {{ Form::label('hora_inicio', 'hora a la que se comienza a preparar') }}
		         <br>
		         {{ Form::input('time','hora_inicio', $producto->hora_inicio, array('placeholder'=>'09:00', 'class' => 'form-control', 'disabled')) }}
		    	<br/>
		    
		         {{ Form::label('hora_fin', 'hora a la que se deja de preparar') }}
		         <br>
		         {{ Form::input('time','hora_fin', $producto->hora_fin, array('placeholder'=>'17:00', 'class' => 'form-control', 'disabled')) }}
				<br>
				{{ Form::label('entrega', '¿Aparecer en la aplicación?') }}
					{{ Form::checkbox('estado', '1', $producto->estado, ['class' => 'field']) }}

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