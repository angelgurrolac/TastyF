@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Pedido</title>
</head>
<body>
	  <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Pedidos</h4></div>   
     <table class="table table-bordered">
     <thead>
     	<th>Orden</th>
     	<th>Restaurante</th>
     	<th>Estado</th>
     	<th>Importe</th>
     </thead>
     <tbody>
     @foreach($pedidos as $key => $value)  
     <tr>
     	<td>{{$value->id}}</td>
     	<td>{{$value->nombre}}</td>
     	<td>{{$value->estatus}}</td>
     	<td>{{$value->total}}</td>
     	
     </tr>
     @endforeach
     </tbody>
     </table>
     <div class="panel-footer clearfix admin">
	
	</div>     
	</div>
	</div>
</body>
</html>