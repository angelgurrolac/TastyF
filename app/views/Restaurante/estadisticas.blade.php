@include('Restaurante.recursos')
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

       <div class="container">
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
               <th>Consultas</th>
               <th>Comisión</th>          
               <th>Total a depositar</th> 
               <th>Numero de cuenta</th>
               <th>Fecha a cobrar</th>
               
          </thead>
          <tbody>
        @foreach($restaurantes as $key => $val)
                              <tr>
                                   <td>{{$val->Nombre}}</td>

                                   <td>{{$val->promedio}}</td>
                                   <td>{{$val->ordenes}}</td>
                                   <td>{{$val->consultas}}</td>
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
                                   if ($dia == 'friday') {
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
                                    ?>
                                   <td>{{$diaA}} {{$fecha}}</td>
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
                         <th>Consultas</th>
                         <th>Comisión</th>          
                         <th>Total a depositar</th> 
                         <th>Numero de cuenta</th>
                         <th>Fecha a pagar</th>
                         
                    </thead>
                    <tbody>


                         @foreach($restaurantes2 as $key => $val)
                         <tr>
                              <td>{{$val->Nombre}}</td>

                              <td>{{$val->promedio}}</td>
                              <td>{{$val->ordenes}}</td>
                              <td>{{$val->consultas}}</td>
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
                                   if ($dia == 'friday') {
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
                                    ?>
                                   <td>{{$diaA}} {{$fecha}}</td>
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