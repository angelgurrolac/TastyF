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
                              <th>Total a depositar</th> 
                              <th>Comisión</th>          
                              <th>Fecha a cobrar</th>
                              <th>Acciones</th>
          </thead>
          <tbody>
        @foreach($restaurantes as $key => $val)
                              <tr>
                                    <td>{{ Session::get('nombre') }}</td>
                                   <td>{{$val->promedio}}</td>
                                   <td>{{$val->pedidos}}</td>
                                   <td>{{$val->totalF}}</td>
                                   <td>{{$val->comision}}</td>
                                  
                                

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
                                    ?>
                                   <td>{{$diaA}} {{$fecha}}</td>
                                      <td>{{Form::open(array('url'=>'/restaurante/finanzas', 'id' => $val->id))}}
                {{ Form::submit('Pagado', array('name'=> 'Pagado','class' => 'btn btn-success direccionar')) }} 
                <input type="hidden" name="id" value="{{$val->id}}">
                <input type="hidden" name="costo_promedio" value="{{$val->promedio}}">
                <input type="hidden" name="tipo" value="{{$val->tipo}}">
                {{Form::close()}}
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
                              <th>Total a depositar</th> 
                              <th>Comisión</th>          
                              <th>Fecha a pagar</th>
                              <th>Acciones</th>
                         
                    </thead>
                    <tbody>


                         @foreach($restaurantes2 as $key => $val)
                         <tr>
                                  <td>{{ Session::get('nombre') }}</td>
                                   <td>{{$val->promedio}}</td>
                                   <td>{{$val->pedidos}}</td>
                                   <td>{{$val->totalF}}</td>
                                   <td>{{$val->comision}}</td>
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
                                        $fecha = date('d-m-Y', strtotime('next monday'));
                                        $diaA = 'Lunes';
                                   }
                                   if ($dia == 'Tuesday') {
                                        $fecha = date('d-m-Y', strtotime('next monday'));
                                        $diaA = 'Lunes';
                                   }
                                   if ($dia == 'Wednesday') {
                                        $fecha = date('d-m-Y', strtotime('next monday'));
                                        $diaA = 'Lunes';
                                   }
                                   if ($dia == 'Thursday') {
                                        $fecha = date('d-m-Y', strtotime('next monday'));
                                        $diaA = 'Lunes';
                                   }
                                   if ($dia == 'Friday') {
                                        $fecha = date('d-m-Y', strtotime('next monday'));
                                        $diaA = 'Lunes';
                                   }
                                   if ($dia == 'Saturday') {
                                        $fecha = date('d-m-Y', strtotime('next monday'));
                                        $diaA = 'Lunes';
                                   }
                                   if ($dia == 'Sunday') {
                                        $fecha = date('d-m-Y', strtotime('next monday'));
                                        $diaA = 'Lunes';
                                   }
                                    ?>
                                   <td>{{$diaA}} {{$fecha}}</td>
                                    <td>{{Form::open(array('url'=>'/restaurante/finanzas', 'id' => $val->id))}}
                {{ Form::submit('Pagado', array('name'=> 'Pagado','class' => 'btn btn-success direccionar')) }} 
                <input type="hidden" name="id" value="{{$val->id}}">
                <input type="hidden" name="costo_promedio" value="{{$val->promedio}}">
                <input type="hidden" name="tipo" value="{{$val->tipo}}">
                {{Form::close()}}
                         </tr>
                         @endforeach


                    </tbody>


               </table>   
               <div class="panel-footer clearfix admin">

               </div>       
          </div>
     </div>




      <div class="panel panel-default">
                    <div class="panel-heading admin"><h4>Publicidad</h4></div>

                    <div class="table-responsive">
                         <table class="table table-bordered table-hover table-striped users">

                           <thead>
                              <th>Nombre</th>
                              <th>Vistas teléfono</th>
                              <th>Vistas dirección</th>               
                              <th>Vistas publicidad</th>   
                              <th>Cobro</th>       
                              <th>Total a cobrar</th> 
                            
                             
                              
                         </thead>
                         <tbody>
                            
                              <tr>
                                  <td>{{ Session::get('nombre') }}</td>
                                  <td>{{$restaurante->con_telefono}}</td>
                                   <td>{{$restaurante->con_direccion}}</td>
                                   @foreach($publicidad as $key => $val)
                                   <td>{{$val->vistasp}}</td>
                                    @endforeach
                                    <td>$0.20</td>
                                    <?php 
                                    $total = (($restaurante->con_telefono + $restaurante->con_direccion + $val->vistasp) * .2) 
                                    ?>
                                    <td>{{$total}}</td>

                                  

               
                            </tr>
                       
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