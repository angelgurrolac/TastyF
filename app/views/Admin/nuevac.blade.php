@include('admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AgregarC</title>
	<script src="{{ URL::asset('assets/js/sumas.js') }}"></script>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-check-square-o"></i> Agregar nueva categoria</h3>

            </div>
	<div class="panel-body">
		{{Form::open(array('url'=>'/admin/nuevac','files'=>'true'))}}
			<br>
			<div class="col-md-3">
			<label>Nombre</label>
			<br>
			<input class="form-control"  type="text" name="nombre" value="" required>
			<label>Descripcion</label>
			<textarea class="form-control"  name="descripcion" id="" rows="10" required></textarea>
			<br>
			{{ Form::label('entrega', '¿Aparecer en la aplicación?') }}
					{{ Form::checkbox('estado', true, ['class' => 'field']) }}
			<br>
			<br>
			{{Form::submit('Guardar',array('class'=>'btn btn-lg btn-primary'))}}
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