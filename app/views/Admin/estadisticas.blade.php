@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Estadisticas</title>
</head>
<body>

	  <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Pedidos</h4></div>   
   
     <br>
 @foreach($credito as $key => $val)
             <h4>tarjeta</h4>
                <br>
          <table class="table table-bordered">
          <thead>
               <th>Nombre</th>
               <th>Platillos Vendidos</th>
               <th>Costo Promedio</th>
               <th>No. ordenes</th>               
               <th>Consultas</th>
               <th>Comisión</th>          
               <th>Total a depositar</th> 
               <th>Numero de cuenta</th>
               <th>Fecha a pagar</th>
               <th></th>
          </thead>
          <tbody>
      
          <tr>
               <td>restaurante mike</td>
                   <td>{{$val->platillos_vendidos}}</td>
               <td>{{$val->costo_promedio}}</td>
               <td>{{$val->no_ordenes}}</td>
               
               <td>{{$val->consultas}}</td>
               <td>{{$val->comision}}</td>
               <td>{{$val->total}}</td>
               <td>4242424242424242</td>
               <td>{{$val->fecha}}</td>
          </tr>

          </tbody>
          </table>
          
     @endforeach
        @foreach($efectivo as $key => $value)
          <h4>efectivo</h4>
                <br>
          <table class="table table-bordered">
          <thead>
               <th>Nombre</th>
               <th>Platillos Vendidos</th>
               <th>Costo Promedio</th>
               <th>No. ordenes</th>               
               <th>Consultas</th>
               <th>Comisión</th>          
               <th>Total a depositar</th> 
               <th>Numero de cuenta</th>
               <th>Fecha a cobrar</th>
               <th></th>
          </thead>
          <tbody>
      
          <tr>
               <td>restaurante mike</td>
           
                    <td>{{$value->platillos_vendidos}}</td>
              
               <td>{{$value->costo_promedio}}</td>
               <td>{{$value->no_ordenes}}</td>
               
               <td>{{$value->consultas}}</td>
               <td>{{$value->comision}}</td>
               <td>{{$value->total}}</td>
               <td>4242424242424242</td>
               <td>{{$value->nuevafecha}}</td>
          </tr>

          </tbody>
          </table>
          
     @endforeach

     <div class="panel-footer clearfix admin">
	
	</div>     
	</div>
	</div>
</body>
</html>