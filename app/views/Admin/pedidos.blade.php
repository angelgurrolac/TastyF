@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Pedidos</title>
   <script src="{{ URL::asset('assets/js/diseno-tabla.js') }}"></script>
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
            <div class="panel-body"  >
              
             <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped" >
               <thead class="at">
                <tr>
                 <th width="130" heigth="130">Orden</th>
                 <th width="600" heigth="600">Restaurante</th>
                 <th width="200" heigth="200">Estado</th>
                 <th width="100" heigth="100">Importe</th>
               </tr>
             </thead>
             <tbody class="at acomodo-tabla" >
               @foreach($pedidos as $key => $value)
               <tr>
                <td width="130" heigth="130">{{$value->id}}</td>
                <td width="600" heigth="600">{{$value->nombre}}</td>
                <td width="200" heigth="200">{{$value->estatus}}</td>
                <td width="100" heigth="100">{{$value->total}}</td>
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