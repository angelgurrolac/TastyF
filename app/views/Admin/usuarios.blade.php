@include('Admin.recursos')
<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">

  <title>Usuarios</title>
  <script type="text/javascript">
   $(document).ready(function(){

    $('.users').fadeIn();
    $('#usuariostotal').fadeOut();
    $('#pedidos').fadeOut();

    $('#usuarios').click(function(){
      $('.users').fadeIn();
      $('#usuariostotal').fadeOut();
      $('#pedidos').fadeOut(); 

    }); 
    $('#numeroU').click(function(){
      $('.users').fadeOut();
      $('#usuariostotal').fadeIn();
      $('#pedidos').fadeOut();

    });    
    $('#gastoU').click(function(){
      $('.users').fadeOut();
      $('#usuariostotal').fadeOut();
      $('#pedidos').fadeIn();

    }); 

  });
 </script>
</head>
<body>
  <div class="row" style="background-color:white;">
    <div class="col-lg-2"></div>
    <div class="col-lg-10">
      <h2><i class="fa fa-fw fa-users"></i> Usuarios</h2>


      <ul class="nav nav-tabs">

       <li><a style="cursor:pointer;" id="usuarios">Usuarios</a></li>
       <li><a style="cursor:pointer;" id="numeroU">Número total de usuarios</a></li>
       <li><a style="cursor:pointer;" id="gastoU">Total Gastado</a></li>

     </ul>

     <div class="table-responsive">
     <table class="table table-bordered table-hover table-striped users">
       <thead>
        <tr>
          <th>Nombre</th>
          <th>Edad</th>
          <th>Sexo</th>
          <th>Dirección</th>
          <th>Codigo Postal</th>
          <th>Correo</th>  
        </tr>
      </thead>
      <tbody>
       @foreach($usuarios as $key => $value)  
       <tr>
        <td>{{$value->nombre}} {{$value->apellidos}}</td>
        <td>{{$value->edad}}</td>
        <td>{{$value->sexo}}</td>
        <td>{{$value->direccion}}</td>
        <td>{{$value->codigo_postal}}</td>
        <td>{{$value->correo}}</td>


      </tr>
      @endforeach
    </tbody>
    
  </table>

  <table class="table table-bordered table-hover table-striped">
    <h2 id="usuariostotal">El número total de usuarios es: {{$numero}}</h2>
  </table>
  <table id="pedidos" class="table table-bordered table-hover table-striped">
   <thead>

    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Total en Pedidos</th>


  </thead>
  <tbody>
   @foreach($pedidos as $key => $value)  
   <tr>

    <td>{{$value->nombre}} </td>
    <td>{{$value->apellidos}} </td>
    <td>{{$value->total1}} </td>

  </tr>
  @endforeach
</tbody>

</table>



</div>

</div>     
</div>

</body>
</html>