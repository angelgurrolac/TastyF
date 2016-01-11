@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Finanzas</title>
</head>
<body>

---

<div class="row" style="background-color:white;">

          <div class="col-lg-2"></div>
          <div class="col-lg-10">

       <div class="container">
       <h1>Finanzas</h1>
   
     
   
     <br>
 @foreach($credito as $key => $val)

        <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Tarjeta</h4></div>

     <div class="table-responsive">
     <table class="table table-bordered table-hover table-striped users">
          
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
                <td>{{$restaurante->nombre}}</td>
                   <td>{{$val->platillos_vendidos}}</td>
               <td>{{$val->costo_promedio}}</td>
               <td>{{$val->no_ordenes}}</td>
               
               <td>{{$val->consultas}}</td>
               <td>{{$val->comision}}</td>
               <td>{{$val->total}}</td>
               <td>{{$restaurante->cuenta}}</td>
               <td>{{$val->fecha}}</td>
          </tr>

          </tbody>
          
          
     </table>     
     <div class="panel-footer clearfix admin">
     
     </div>     
     </div>
     </div>
    
          
     @endforeach



        @foreach($efectivo as $key => $value)

      
        <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Efectivo</h4></div>

     <div class="table-responsive">
     <table class="table table-bordered table-hover table-striped users">
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
                <td>{{$restaurante->nombre}}</td>
           
                    <td>{{$value->platillos_vendidos}}</td>
              
               <td>{{$value->costo_promedio}}</td>
               <td>{{$value->no_ordenes}}</td>
               
               <td>{{$value->consultas}}</td>
               <td>{{$value->comision}}</td>
               <td>{{$value->total}}</td>
               <td>{{$restaurante->cuenta}}</td>
               <td>{{$value->fecha}}</td>
          </tr>

          </tbody>
          
          
     </table>     
     <div class="panel-footer clearfix admin">
     
     </div>     
     </div>
     </div>
     
          
     @endforeach

   
   
     </div>     
     </div>
     </div>     
---

</body>
</html>