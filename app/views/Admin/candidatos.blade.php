@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Candidatos</title>
</head>
<body>

	  <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Candidatos a validar</h4></div>     

	<div class="container">
		<table class="solicitudes_vermas">
					<tr>
						<h2>Candidato</h2>
						<td colspan="5"><hr class="solicitud"/></td>
					</tr>	        
					@foreach($candidatos as $value)
					<tr>
						
						<td>
							<strong>{{ $value->nombre}}</strong><br><br>
							{{$value->direccion}}
						</td>
						<td class="calificaciones">
							Telefono: {{$value->telefono}} <br><br>
							
						</td>
						<td class="contactar_vermas_d"><a href="{{ URL::to('admin/'.$value->id.'/candidato') }}"><img src="{{asset('assets/img/vermas.png')}}"></a></td>
					</tr>

					<tr>
						<td colspan="5"><hr class="solicitud"/></td>
					</tr>
					@endforeach
				</table>
	</div>
	<br>
	  <div class="panel-footer clearfix admin">

	</div>     
	</div>
	</div>
</body>
</html>