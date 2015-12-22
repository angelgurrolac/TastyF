@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facturas</title>
</head>
<body>

	 <div class="container marg">
    	<div class="panel panel-default">
      		<div class="panel-heading">&nbsp;</div>
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
</body>
</html>