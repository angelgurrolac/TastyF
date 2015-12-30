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
    <br>
    <br>

    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading admin">
              <h3 class="panel-title"><i class="fa fa-fw fa-flag"></i> Pedidos</h3>
            </div>
            <div class="panel-body">
              
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
  </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->
</div>

</div>

</body>
</html>