@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Pedidos</title>
</head>
<body>

     <div class="row" style="background-color:white;">
     <div class="col-lg-2"></div>
     <div class="col-lg-10">
           <h2 >Pedidos</h2>
           <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
             <thead>
              <tr>
                   <th>Orden</th>
                   <th>Restaurante</th>
                   <th>Estado</th>
                   <th>Importe</th>
              </tr>
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
</div>
</div>

</div>

</body>
</html>