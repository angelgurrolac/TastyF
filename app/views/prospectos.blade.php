<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
	
	<title>Nuevos</title>
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/simple-sidebar.css') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="{{ URL::asset('assets/pnotify.css') }}">
	<script src="{{ asset('assets/pnotify.js') }}"></script>
</head>
<body class="login">

	<div class="container marg">
		<div class="panel panel-default">
			<div class="panel-heading estilo-titulo">Registra tu restaurante</div>
			<div class="panel-body ">
				{{ Form::open(array('url' => '/prospectos','id'=>'nueva','files'=>'true')) }}
				<div class="form-group col-lg-6">
					{{ Form::label('nombre', 'Nombre') }}
					{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control','form'=>'nueva', 'required')) }}
				</div>		    
				<div class="form-group col-lg-6">
					{{ Form::label('telefono', 'Teléfono') }}
					{{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control','form'=>'nueva', 'required', 'pattern'=>'"^[9|8|7|6|5]\d{9}$"', 'maxlength'=>'10','placeholder'=>'(000) 000 00 00')) }}
				</div>
				<div class="form-group col-lg-6">
					{{ Form::label('direccion', 'Dirección') }}
					{{ Form::text('direccion', Input::old('direccion'), array('class' => 'form-control','form'=>'nueva', 'required')) }}
				</div>
				<div class="form-group col-lg-6">
					{{ Form::label('hora_inicio', 'Hora de apertura') }}
					{{ Form::input('time', 'hora_inicio', Input::old('hora_inicio'), array('class' => 'form-control','form'=>'nueva','placeholder'=>'09:00', 'required')) }}
				</div>
				<div class="form-group col-lg-6">
					{{ Form::label('hora_fin', 'Hora de cierre') }}
					{{ Form::input( 'time',' hora_fin', Input::old('hora_fin'), array('class' => 'form-control','form'=>'nueva','placeholder'=>'17:00', 'required')) }}
				</div>
				<div class="form-group col-lg-6">
					<br>
					{{ Form::label('entrega', '¿Entrega a domicilio?') }}
					{{ Form::checkbox('domicilio', true, ['class' => 'field']) }}
				</div>

				<div class="form-group col-lg-12">
					<img id="blah" class="img-responsive" width="204" height="136" src="" />
					<br>
					<input type="file" name="imgFile" id="imgFile" value="" required>
				</div>


			</div>

			<div class="panel-footer">

				{{ Form::submit('Enviar datos', array('class' => 'btn btn-primary')) }}
				{{ Form::close() }}
				<a href="{{URL::to('/login') }}"class="btn btn-danger" role="button">Cancelar</a>
			</div>
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
<script >
$(document).ready(function()
{
	$('.mascara-tel').mask('000-000-00-00');
});
</script>