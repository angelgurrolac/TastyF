@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facturas</title>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-bookmark"></i> Facturas</h3>
            </div>
     		<div class="panel-body ">
     	{{ Form::open(array('url' => '/restaurante/facturacion','id'=>'nueva')) }}
     			
		     	<div class="form-group col-lg-4">
		         {{ Form::label('nombre', 'Nombre') }}
		         {{ Form::text('nombre', Input::old('nombre') , array('class' => 'form-control','form'=>'nueva')) }}
		       </div>		    
		    
		       <div class="form-group col-lg-4">
		         {{ Form::label('domicilio', 'domicilio') }}
		         {{ Form::text('domicilio',  Input::old('domicilio'),array('class' => 'form-control','form'=>'nueva')) }}
		       </div>
		          <div class="form-group col-lg-4">
		         {{ Form::label('RFC', 'RFC') }}
		         {{ Form::text('RFC', Input::old('RFC') , array('class' => 'form-control','form'=>'nueva')) }}
		       </div>
		       <div class="form-group col-lg-4">
		         {{ Form::label('Correo', 'Correo') }}
		         {{ Form::text('Correo', Input::old('Correo') , array('class' => 'form-control','form'=>'nueva')) }}
		       </div>
	
		    
		         
		   		        
		     </div>

		     <div class="panel-footer">
		     	{{ Form::submit('Agregar Datos', array('class' => 'btn btn-primary')) }}
		       {{ Form::close() }}
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