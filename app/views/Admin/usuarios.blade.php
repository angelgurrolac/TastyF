@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
     
     <title>Usuarios</title>
     <script type="text/javascript">
     $(document).ready(function(){
     $('#usuarios').click(function(){
            $('.users').fadeIn();
            $('#usuariostotal').fadeOut();
          

        }); 
     $('#numeroU').click(function(){
            $('.users').fadeOut();
            $('#usuariostotal').fadeIn();
          

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
     <li><a style="cursor:pointer;" id="gastoU">Gasto promedio</a></li>
     <li><a style="cursor:pointer;" id="PorcentajeU">Porcentaje ha ordenado</a></li>
     
     </ul>
     <br>
     <table class="users table table-bordered">
     <thead>

          <th>Nombre</th>
          <th>Edad</th>
          <th>Sexo</th>
          <th>Direcci贸n</th>
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
      
      <table id="usuariostotal"><h2 style="display:none;" >El n煤mero total de usuarios es: {{$numero}}</h2></table>
       <table class="table table-bordered">
     <thead>

          <th>Nombre</th>
          <th>Edad</th>
          <th>Sexo</th>
          <th>Dirección</th>
          <th>Codigo Postal</th>
          <th>Correo</th>  

     </thead>
     <tbody>
     @foreach($pedidos as $key => $value)  
     <tr>

            <td>{{$value->nombre}} </td>
     
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