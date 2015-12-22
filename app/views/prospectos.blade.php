<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevos</title>
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
  	<link rel="stylesheet" href="{{ URL::asset('assets/pnotify.css') }}">
  	<script src="{{ asset('assets/pnotify.js') }}"></script>
</head>
<body>

	 <div class="container marg">
    	<div class="panel panel-default">
      		<div class="panel-heading">&nbsp;</div>
     		<div class="panel-body ">
     	{{ Form::open(array('url' => '/prospectos','id'=>'nueva','files'=>'true')) }}
		     	<div class="form-group col-lg-4">
		         {{ Form::label('nombre', 'Nombre') }}
		         {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control','form'=>'nueva')) }}
		       </div>		    
		       <div class="form-group col-lg-4">
		         {{ Form::label('telefono', 'Telefono') }}
		         {{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control','form'=>'nueva')) }}
		       </div>
		       <div class="form-group col-lg-4">
		         {{ Form::label('direccion', 'direccion') }}
		         {{ Form::text('direccion', Input::old('direccion'), array('class' => 'form-control','form'=>'nueva')) }}
		       </div>
		       <div class="form-group col-lg-4">
		         {{ Form::label('hora_inicio', 'hora de apertura') }}
		         {{ Form::text('hora_inicio', Input::old('hora_inicio'), array('class' => 'form-control','form'=>'nueva','placeholder'=>'09:00')) }}
		       </div>
		        <div class="form-group col-lg-4">
		         {{ Form::label('hora_fin', 'hora de cierre') }}
		         {{ Form::text('hora_fin', Input::old('hora_fin'), array('class' => 'form-control','form'=>'nueva','placeholder'=>'17:00')) }}
		       </div>
		        <div class="form-group col-lg-4">
		       		{{ Form::label('entrega', '¿Entrega a domicilio?') }}
		         {{ Form::checkbox('domicilio', true, ['class' => 'field']) }}
		       </div>
		         
		       <div class="form-group col-lg-4">
		         <img id="blah" style="width:100%;" src="" />
				<input type="file" name="imgFile" id="imgFile" value="">
		       </div>
		      
		      
		     </div>

		     <div class="panel-footer">
		       
		       {{ Form::submit('Enviar datos', array('class' => 'btn btn-primary')) }}
		       {{ Form::close() }}
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