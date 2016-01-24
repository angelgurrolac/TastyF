@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Finanzas</title>
</head>
<body>
     <div class="row" style="background-color:white;">

          <div class="col-lg-2"></div>
          <div class="col-lg-10">

             <div class="container ">
                  <h1>Finanzas</h1>



                  <br>


                  <div class="panel panel-default">
                    <div class="panel-heading admin"><h4>Tarjeta</h4></div>

                    <div class="table-responsive">
                         <table class="table table-bordered table-hover table-striped users">

                           <thead>
                              <th>Nombre</th>
                              <th>Costo Promedio</th>
                              <th>No. ordenes</th>               
                              
                              <th>Comisión</th>          
                              <th>Total a depositar</th> 
                              <th>Numero de cuenta</th>
                              <th>Fecha a pagar</th>
                              <th>Acciones</th>
                              
                         </thead>
                         <tbody>
                              @foreach($restaurantes as $key => $val)
                              <tr>
                                   <td>{{$val->Nombre}}</td>
                                   <td>{{$val->promedio}}</td>
                                   <td>{{$val->pedidos}}</td>

                                   <td>{{$val->comision}}</td>
                                   <td>{{$val->totalF}}</td>
                                   <td>{{$val->cuenta}}</td>

                                   <?php
                                   date_default_timezone_set('America/Mexico_City');
//                                    echo date("d")." "; 
// echo date("m")." "; 
// echo date("Y")." "; 
// echo date("h:i:s A"); 

// ECHO ' <br/>'; 

jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 1 ); 
                                   $dia = $val->dia;
                                   if ($dia == 'Monday') {
                                        $fecha = date('d-m-Y', strtotime('next thursday'));
                                        $diaA = 'Jueves';
                                   }
                                   if ($dia == 'Tuesday') {
                                        $fecha = date('d-m-Y', strtotime('next friday'));
                                        $diaA = 'Viernes';
                                   }
                                   if ($dia == 'Wednesday') {
                                        $fecha = date('d-m-Y', strtotime('next monday'));
                                        $diaA = 'Lunes';
                                   }
                                   if ($dia == 'Thursday') {
                                        $fecha = date('d-m-Y', strtotime('next tuesday'));
                                        $diaA = 'Martes';
                                   }
                                   if ($dia == 'Friday') {
                                        $fecha = date('d-m-Y', strtotime('next wednesday'));
                                        $diaA = 'Miercoles';
                                   }
                                   if ($dia == 'Saturday') {
                                        $fecha = date('d-m-Y', strtotime('next thursday'));
                                        $diaA = 'Jueves';
                                   }
                                   if ($dia == 'Sunday') {
                                        $fecha = date('d-m-Y', strtotime('next thursday'));
                                        $diaA = 'Jueves';
                                   }
                                  
                                  echo "<td>".$diaA." ".$fecha."</td>";  ?>
                              
                                  <td>{{Form::open(array('url'=>'/admin/finanzas', 'id' => $val->idp))}}
                {{ Form::submit('Pagado', array('name'=> 'Pagado','class' => 'btn btn-success direccionar')) }} 
                <input type="hidden" name="id" value="{{$val->idp}}">
                <input type="hidden" name="costo_promedio" value="{{$val->promedio}}">
                <input type="hidden" name="tipo" value="{{$val->tipo}}">
                {{Form::close()}}
           </td>
                                  </tr>
                              @endforeach
                         </tbody>


                    </table>     
                    <div class="panel-footer clearfix admin">

                    </div>     
               </div>
          </div>

          <br>

          <div class="panel panel-default">
               <div class="panel-heading admin"><h4>Efectivo</h4></div>

               <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped users">
                        <thead>
                         <th>Nombre</th>
                         <th>Costo Promedio</th>
                         <th>No. ordenes</th>  

                         <th>Comisión</th>          
                         <th>Total a depositar</th> 
                         <th>Numero de cuenta</th>
                         <th>Fecha a cobrar</th>
                         <th>Acciones</th>
                         
                    </thead>
                    <tbody>


                         @foreach($restaurantes2 as $key => $val)
                         <tr>
                              <td>{{$val->Nombre}}</td>
                              <td>{{$val->promedio}}</td>
                              <td>{{$val->pedidos}}</td>

                              <td>{{$val->comision}}</td>
                              <td>{{$val->totalF}}</td>
                              <td>{{$val->cuenta}}</td>
                             <?php
                                   date_default_timezone_set('America/Mexico_City');
//                                    echo date("d")." "; 
// echo date("m")." "; 
// echo date("Y")." "; 
// echo date("h:i:s A"); 

// ECHO ' <br/>'; 

jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 1 ); 
                                   $dia = $val->hoy;
                                   if ($dia == 'Monday') {
                                        $fecha = date('d-m-Y', strtotime('next tuesday'));
                                        $diaA = 'Martes';
                                   }
                                   if ($dia == 'Tuesday') {
                                        $fecha = date('d-m-Y', strtotime('next wednesday'));
                                        $diaA = 'Miercoles';
                                   }
                                   if ($dia == 'Wednesday') {
                                        $fecha = date('d-m-Y', strtotime('next thursday'));
                                        $diaA = 'Jueves';
                                   }
                                   if ($dia == 'Thursday') {
                                        $fecha = date('d-m-Y', strtotime('next tuesday'));
                                        $diaA = 'Martes';
                                   }
                                   if ($dia == 'Friday') {
                                        $fecha = date('d-m-Y', strtotime('next saturday'));
                                        $diaA = 'Sábado';
                                   }
                                   if ($dia == 'Saturday') {
                                        $fecha = date('d-m-Y', strtotime('next sunday'));
                                        $diaA = 'Domingo';
                                   }
                                   if ($dia == 'Sunday') {
                                        $fecha = date('d-m-Y', strtotime('next monday'));
                                        $diaA = 'Lunes';
                                   }
                                    
                                   echo "<td>".$diaA." ".$fecha."</td>";  ?>
                                  <td>{{Form::open(array('url'=>'/admin/finanzas', 'id' => $val->id))}}
                {{ Form::submit('Pagado', array('name'=> 'Pagado','class' => 'btn btn-success direccionar')) }} 
                <input type="hidden" name="id" value="{{$val->id}}">
                <input type="hidden" name="costo_promedio" value="{{$val->promedio}}">
                <input type="hidden" name="tipo" value="{{$val->tipo}}">
                {{Form::close()}}
           </td>
                         </tr>
                         @endforeach


                    </tbody>


               </table>   
               <div class="panel-footer clearfix admin">

               </div>       
          </div>
     </div>

     <br>


      <div class="panel panel-default">
                    <div class="panel-heading admin"><h4>Publicidad</h4></div>

                    <div class="table-responsive">
                         <table class="table table-bordered table-hover table-striped users">

                           <thead>
                              <th>Nombre</th>
                              <th>Vistas teléfono</th>
                              <th>Vistas dirección</th>               
                              <th>Vistas publicidad</th>          
                              <th>Total a cobrar</th> 
                              <th>Acciones</th> 
                             
                              
                         </thead>
                         <tbody>
                              @foreach($publicidad as $key => $val)
                              <tr>
                                   <td>{{$val->nombreR}}</td>
                                   <td>{{$val->telefono}}</td>
                                   <td>{{$val->direccion}}</td>
                                   <td>{{$val->vistasp}}</td>
                                   <td>{{$val->total}}</td>
                     

               
                              
                                  <td>{{Form::open(array('url'=>'/admin/finanzasPu', 'id' => $val->id))}}
                {{ Form::submit('Pagado', array('name'=> 'Pagado','class' => 'btn btn-success direccionar')) }} 
                <input type="hidden" name="id" value="{{$val->id}}">
                {{Form::close()}}
           </td>
                                  </tr>
                              @endforeach
                         </tbody>


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

<script type="text/javascript">
$(document).ready(function(){
  $('.direccionar').click(function(){
    var formulario = $(this).next('input').val();
    $('#'+formulario).submit();
  });
});
</script>