@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agregar</title>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-glass"></i> Agregar nueva bebida</h3>
            </div>
	<div class="panel-body">
		{{Form::open(array('url'=>'/restaurante/addB','files'=>'true'))}}
			<div class="col-md-6" style="height:50%;">
				<br>
			     <img id="blah" style="width:100%;"  src="" />
				<input type="file" name="imgFile" id="imgFile" value="">
					
			</div>
			<br>
			<div class="col-md-3">
			<label>Nombre</label>
			<br>
			<input class="form-control" type="text" name="nombre" value="">
			<label>Descripción</label>
			<textarea class="form-control" name="descripcion" id=""  rows="10"></textarea>
				 <br>
			  <label>Categorias</label>
	           {{ Form::select('categoria1', (['0' => 'Elija categoria primaria'] + $categorias), null,['class' => 'form-control']) }}
	           <br>
	           {{ Form::select('categoria2', (['0' => 'Elija categoria secundaria'] + $categorias), null,['class' => 'form-control']) }}
			<br>

			</div>
			<div class="col-md-3 precios">
				<label >Precio</label>
				<br>
				<input class="form-control" class="inicial" name="precio" value="" type="text">
				<br>
				<label >Costo por transacción</label>
				<br>
				<input class="form-control" name="costo" value="2.5" readonly  type="text">
				<br>
				<label for="">Comisión</label>
				<br>
				<input  type="hidden" name="comision" class="comision"   >
				<label name="comision2" class="comision2" ></label>
				<br>
				<label for="">Precio final</label>
				<br>
				<input type="hidden" name="costo_unitario" class="costo_unitario"   >
				<label name="costo_unitario2" class="costo_unitario2" ></label>
				<br>
				<br>			
		         {{ Form::label('hora_inicio', 'hora a la que se comienza a preparar') }}
		         <br>
		         {{ Form::text('hora_inicio', Input::old('hora_inicio'), array('placeholder'=>'09:00','class'=>'form-control')) }}
		    	<br/>
		    
		         {{ Form::label('hora_fin', 'hora a la que se deja de preparar') }}
		         <br>
		         {{ Form::text('hora_fin', Input::old('hora_fin'), array('placeholder'=>'17:00','class'=>'form-control')) }}
				<br>
				<br>
				<input type="hidden" name="id" value="">
			{{Form::submit('Guardar cambios',array('class'=>'btn btn-primary'))}}
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