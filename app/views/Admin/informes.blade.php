@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Informe</title>
</head>
<body>
<div class="row" style="background-color:white;">
          <div class="col-lg-2"></div>
          <div class="col-lg-10">
	  <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Informe Diario</h4></div>

     <div class="table-responsive">
     <table class="table table-bordered table-hover table-striped users">
     	
     	<tr><td>Ventas totales</td><td>${{$VT}}</td></tr>
     	<tr><td>Importe</td><td>${{$VT}}</td></tr>
     	
     	<tr><td>No. de ordenes</td><td>{{$NuOrdenes}}</td>	</tr>
     	<tr><td>Costo Máximo de ordenes</td><td>{{$OM}}</td>	</tr>
     	<tr><td>Costo Mínino de ordenes</td><td>{{$MO}}</td>	</tr>
     	<tr><td>Costo Promedio de ordenes</td><td>{{$OP}}</td>	</tr>
		
		
     </table>     
     <div class="panel-footer clearfix admin">
	
	</div>     
	</div>
     </div>

     <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Informe Semanal</h4></div>

     <div class="table-responsive">
     <table class="table table-bordered table-hover table-striped users">
         
         
              <tr><td>Ventas totales</td><td>${{$VT}}</td></tr>
          <tr><td>Importe</td><td>${{$VT}}</td></tr>
          
          <tr><td>No. de ordenes</td><td>{{$NuOrdenes}}</td>     </tr>
          <tr><td>Costo Máximo de ordenes</td><td>{{$OM}}</td>   </tr>
          <tr><td>Costo Mánino de ordenes</td><td>{{$MO}}</td>   </tr>
          <tr><td>Costo Promedio de ordenes</td><td>{{$OP}}</td> </tr>

         
     </table>     
     <div class="panel-footer clearfix admin">
     
     </div>     
     </div>
     </div>


     <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Informe Mensual</h4></div>

     <div class="table-responsive">
     <table class="table table-bordered table-hover table-striped users">
          
              <tr><td>Ventas totales</td><td>${{$VT}}</td></tr>
          <tr><td>Importe</td><td>${{$VT}}</td></tr>
          
          <tr><td>No. de ordenes</td><td>{{$NuOrdenes}}</td>     </tr>
          <tr><td>Costo Máximo de ordenes</td><td>{{$OM}}</td>   </tr>
          <tr><td>Costo Mínino de ordenes</td><td>{{$MO}}</td>   </tr>
          <tr><td>Costo Promedio de ordenes</td><td>{{$OP}}</td> </tr>
     </table>     
     <div class="panel-footer clearfix admin">
     
     </div>     
     </div>
     </div>

	</div>
     </div>     
     </div>
   
</body>
</html>