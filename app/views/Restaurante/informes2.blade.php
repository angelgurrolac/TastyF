@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Informes</title>
</head>
<body>
	  <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading rest"><h4>{{ Session::get("nombre") }} Seccion:Pedidos</h4></div>
     <table class="table">
     	    <tr><td colspan="2">Diario</td></tr>
          <tr><td>Ventas totales</td><td></td></tr>
       
          <tr><td>Importe</td><td></td></tr>
          <tr><td>IVA por pagar</td><td></td></tr>
          <tr><td>No. de ordenes</td><td></td>     </tr>
          <tr><td>Costo Maximo de ordenes</td><td></td>   </tr>
          <tr><td>Costo Minino de ordenes</td><td></td>   </tr>
          <tr><td>Costo Promedio de ordenes</td><td></td> </tr>
          
          <tr><td colspan="2">Semanal</td>   </tr>
              <tr><td>Ventas totales</td><td></td></tr>
          <tr><td>Importe</td><td></td></tr>
          <tr><td>IVA por pagar</td><td></td></tr>
          <tr><td>No. de ordenes</td><td></td>     </tr>
          <tr><td>Costo Maximo de ordenes</td><td></td>   </tr>
          <tr><td>Costo Minino de ordenes</td><td></td>   </tr>
          <tr><td>Costo Promedio de ordenes</td><td></td> </tr>

          <tr><td colspan="2">Mensual</td>   </tr>
              <tr><td>Ventas totales</td><td></td></tr>
          <tr><td>Importe</td><td></td></tr>
          <tr><td>IVA por pagar</td><td></td></tr>
          <tr><td>No. de ordenes</td><td></td>     </tr>
          <tr><td>Costo Maximo de ordenes</td><td></td>   </tr>
          <tr><td>Costo Minino de ordenes</td><td></td>   </tr>
          <tr><td>Costo Promedio de ordenes</td><td></td> </tr>
     </table>     
     <div class="panel-footer clearfix rest">

	</div>     
	</div>
	</div>
</body>
</html>