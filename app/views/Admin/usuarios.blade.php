@include('Admin.recursos')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     
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

       <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Pedidos</h4></div>   
          <ul class="nav nav-tabs">
     
     <li><a style="cursor:pointer;" id="usuarios">Usuarios</a></li>
     <li><a style="cursor:pointer;" id="numeroU">Numero total de usuarios</a></li>
     <li><a style="cursor:pointer;" id="gastoU">Total Gastado</a></li>
     
     </ul>
     <br>
     <table class="users table table-bordered">
     <thead>

          <th>Nombre</th>
          <th>Edad</th>
          <th>Sexo</th>
          <th>Dirección</th>
          <th>Codigo Postal</th>
          <th>Correo</th>  

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
      
      <table class="table table-bordered" >
        <h2 id="usuariostotal">El número total de usuarios es: {{$numero}}</h2>
      </table>
       <table id="pedidos" class="table table-bordered">
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


     <div class="panel-footer clearfix admin">
     
     </div>     
     </div>
     </div>
</body>
</html>