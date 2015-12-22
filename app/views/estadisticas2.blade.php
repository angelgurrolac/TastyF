@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Estadisticas</title>
</head>
<body>

	  <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading rest"><h4>{{ Session::get("nombre") }} Seccion:Pedidos</h4></div>   
   
     <br>
     <table class="table table-bordered">
     <thead>
     	<th>Nombre</th>
     	<th>Platillos Vendidos</th>
     	<th>Costo Promedio</th>
     	<th>No. ordenes</th>
          <th>Reservaciones</th>
          <th>Consultas</th>
          <th>Comisión</th>          
          <th>Total a depositar</th> 
          <th>Numero de cuenta</th>
         
     </thead>

     </table>
     <div class="panel-footer clearfix rest">
	
	</div>     
	</div>
	</div>
</body>
</html>