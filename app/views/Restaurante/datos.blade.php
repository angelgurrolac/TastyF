@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Datos</title>
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