@include('Admin.recursos')
<!DOCTYPE html>
<html>
<head>

 <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
 <script src="{{ URL::asset('assets/js/diseno-tabla.js') }}"></script>

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
  <br>
  <br>

  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading admin">
           <h3 class="panel-title"><i class="fa fa-fw fa-users"></i> Usuarios</h3>
         </div>

         <div class="panel-body">
          <ul class="nav nav-tabs">

           <li><a style="cursor:pointer;" id="usuarios">Usuarios</a></li>
           <li><a style="cursor:pointer;" id="numeroU">Número total de usuarios</a></li>
           <li><a style="cursor:pointer;" id="gastoU">Total Gastado</a></li>

         </ul>

         <br>


         <div class="table-responsive">
           <table class="table table-bordered table-hover table-striped users">
             <thead class="at">
              <tr>
                <th width="220" >Nombre</th>
                <th width="100"  >Edad</th>
                <th width="100"   >Sexo</th>
                <th width="300" >Dirección</th>
                <th width="100"  >Código Postal</th>
                <th width="206"  >Correo electrónico</th>  
              </tr>
            </thead>
            <tbody class="at acomodo-tabla">
             @foreach($usuarios as $key => $value)  
             <tr>
              <td width="220"  >{{$value->nombre}} {{$value->apellidos}}</td>
              <td width="100"  >{{$value->edad}}</td>
              <td width="100"  >{{$value->sexo}}</td>
              <td width="300" >{{$value->direccion}}</td>
              <td width="100" >{{$value->codigo_postal}}</td>
              <td width="200" >{{$value->correo}}</td>


            </tr>
            @endforeach
          </tbody>

        </table>

        <table class="table table-bordered table-hover table-striped">
          <h2 id="usuariostotal">El número total de usuarios es: {{$numero}}</h2>
        </table>
        <table id="pedidos" class="table table-bordered table-hover table-striped">
         <thead class="at">

          <th width="350">Nombre</th>
          <th width="350">Apellidos</th>
          <th width="350">Total en Pedidos</th>


        </thead>
        <tbody class="at acomodo-tabla">
         @foreach($pedidos as $key => $value)  
         <tr>

          <td width="350">{{$value->nombre}} </td>
          <td width="350">{{$value->apellidos}} </td>
          <td width="350">{{$value->total1}} </td>

        </tr>
        @endforeach
      </tbody>

    </table>

  </div>

</div>     
</div>

</div>

</div>     
</div>
</div>
</div>

</body>
</html>