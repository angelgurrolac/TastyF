@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facturar</title>
</head>
<body>

	  <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading rest"><h4>Factura</h4></div>     

	<div class="container">
		<table class="solicitudes_vermas">
					<tr>
						<h2>Factura</h2>
						<td colspan="5"><hr class="solicitud"/></td>
					</tr>	        
					@foreach($factura as $value)
					{{Form::open(array('url'=>'/restaurante/facturaM'))}}
						<input type="hidden" name='id' value="{{$value->idf}}">
						<tr>
							Nombre: {{ $value->nombreUsuario}}
							
						</tr>
						<br>
						<tr >
							Domicilio: {{$value->Domicilio}} 
							
						</tr>
						<br>
						<tr >
							RFC: {{$value->rfc}} 
							
						</tr>
						<br>
						<tr >
							Correo: {{$value->correo}} 
							
						</tr>
						<br>
						<tr >
							Estatus: {{$value->estatus}} 
							
						</tr>
							<br>
						<tr >
							Costo: {{$value->costo}} 
							
						</tr>
						
						<br>
					
							{{Form::submit('Marcar como facturada',array('class'=>'btn btn-primary'))}}

						
						{{Form::close()}}
					@endforeach
				</table>
	</div>
	<br>
	  <div class="panel-footer clearfix rest">

	</div>     
	</div>
	</div>
</body>
</html>