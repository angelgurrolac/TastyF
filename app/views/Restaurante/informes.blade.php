@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Informes</title>
 <script src="{{ URL::asset('assets/js/notificaciones.js') }}"></script>

 <style type="text/css">
  .notificaciones-info{
    background: #075db2;
    color: #fff;
    padding: 10px;
    margin-right: 200px;
    font-weight: bold;
    font-family: sans-serif;
  }

  .notificaciones-info:hover{
    background: #7cbecc;
    color: #eee;
  }

  .notificaciones-error{
    background: #bd0000;
    color: #fff;
    padding: 20px;
    border: 3px solid #fff;
  }
  .notificaciones-error:hover{
    background: #e43633;  
  }

  .notificaciones-success{
    background: #90cd48;
    color: #fff;
    padding: 10px;
    margin-right: 50px;
    font-weight: bold;
    font-family: sans-serif;
  }
  .notificaciones-success:hover{
    background: #8bc53f;
  }

  #notificaciones{
    display: block;
    position: fixed;
    top: 10px;
    right: 10px;
    z-index: 9999;
  }
  .notificacion{
    float: right;
    clear: both;
    border: 3px solid transparent;
    cursor: pointer;
  }
  </style>
   <?php
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('America/Mexico_City');


// Imprime algo como: Monday 8th of August 2005 03:12:46 PM
$notificacion =  date('H:i:s');



$nuevamas = strtotime ( '+5 minute' , strtotime ( $notificacion ) ) ;
$nuevamas = date ( 'H:i:s' , $nuevamas );




$nuevamenos = strtotime ( '-5 minute' , strtotime ( $notificacion ) ) ;
$nuevamenos = date ( 'H:i:s' , $nuevamenos );

?>
</head>
<body>
  @foreach($reservaciones as $key3 => $value3)
  @if($nuevamas > $value3->hora_reservacion && $nuevamenos < $value3->hora_reservacion) 
  <script type="text/javascript">
  $(document).ready(function() { 

   //si no existe la ventana notificaciones la creamos,
     //esta será la que contendrá a todas las notificaciones
     if ($("#notificaciones").length == 0) {
        //creamos el div con id notificaciones
        var contenedor_notificaciones = $(window.document.createElement('div')).attr("id", "notificaciones");
        //a continuación la añadimos al body
        $('body').append(contenedor_notificaciones);
    }
    
    $.notificaciones({    
      mensaje : '¡Tienes una nueva reservación, revisa tus pedidos y reservaciones!',
      width: 700,
      cssClass : 'success',
        timeout : 3000,//milisegundos
        fadeout : 5000,//tiempo en desaparecer
        radius : 10
      });
  });

  </script>                   
  @endif

  @endforeach

  @foreach($pedidos as $key2 => $value2)
  
  @if($nuevamas > $value2->hora_pedido && $nuevamenos < $value2->hora_pedido) 

  <script type="text/javascript">
  $(document).ready(function() { 

   //si no existe la ventana notificaciones la creamos,
     //esta será la que contendrá a todas las notificaciones
     if ($("#notificaciones").length == 0) {
        //creamos el div con id notificaciones
        var contenedor_notificaciones = $(window.document.createElement('div')).attr("id", "notificaciones");
        //a continuación la añadimos al body
        $('body').append(contenedor_notificaciones);
    }
    
    $.notificaciones({    
      mensaje : '¡Tienes un nuevo pedido, revisa tus pedidos y reservaciones!',
      width: 700,
      cssClass : 'success',
        timeout : 3000,//milisegundos
        fadeout : 5000,//tiempo en desaparecer
        radius : 10
      });
  });

  </script>                   
  @endif
  @endforeach
  <div class="row" style="background-color:white;">
    <div class="col-lg-2"></div>
    <div class="col-lg-10">
      <div class="container">
        <br>
        <div class="panel panel-default">
         <div class="panel-heading admin"><h4>Informe de hoy: <?php date_default_timezone_set('America/Mexico_City'); $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
         $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

         echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
         ?></h4></div>
         <div class="table-responsive">
           <table class="table table-bordered table-hover table-striped users">

            <tr><td>Ventas totales</td><td>${{$VT}}</td></tr>
            <tr><td>Importe</td><td>${{$IMPORTE}}</td></tr>
            <tr><td>No. de ordenes</td><td>{{$NuOrdenes}}</td></tr>
            <tr><td>Costo Maximo de ordenes</td><td>${{$OM}}</td></tr>
            <tr><td>Costo Minino de ordenes</td><td>${{$MO}}</td></tr>
            <tr><td>Costo Promedio de ordenes</td><td>${{number_format($OP, 2)}}</td></tr>
          </table>     
          <div class="panel-footer clearfix admin">

          </div>     
        </div>
      </div>

      <div class="panel panel-default">
       <div class="panel-heading admin"><h4>Informe de la ultima semana</h4></div>
       <div class="table-responsive">
         <table class="table table-bordered table-hover table-striped users">


          <tr><td>Ventas totales</td><td>${{$VT2}}</td></tr>
          <tr><td>Importe</td><td>${{$IMPORTE2}}</td></tr>
          <tr><td>No. de ordenes</td><td>{{$NuOrdenes2}}</td></tr>
          <tr><td>Costo Maximo de ordenes</td><td>${{$OM2}}</td></tr>
          <tr><td>Costo Minino de ordenes</td><td>${{$MO2}}</td></tr>
          <tr><td>Costo Promedio de ordenes</td><td>${{number_format($OP2, 2)}}</td></tr>

        </table>     
        <div class="panel-footer clearfix admin">

        </div>     
      </div>
    </div>

    <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Informe del mes de: <?php

     $notificacion =  date('Y-m-d h:i:s');



     $nuevafecha = strtotime ( '-1 MONTH' , strtotime ( $notificacion ) ) ;
     $nuevafecha = date ( 'M' , $nuevafecha );
     if ($nuevafecha == 'Dec') {
       $nuevafecha = 'Diciembre';
       echo $nuevafecha;
     }
     if ($nuevafecha == 'Jan') {
       $nuevafecha = 'Enero';
       echo $nuevafecha;
     }
     if ($nuevafecha == 'Feb') {
       $nuevafecha = 'Febrero';
       echo $nuevafecha;
     }
     if ($nuevafecha == 'Mar') {
       $nuevafecha = 'Marzo';
       echo $nuevafecha;
     }
     if ($nuevafecha == 'Apr') {
       $nuevafecha = 'Abril';
       echo $nuevafecha;
     }
     if ($nuevafecha == 'May') {
       $nuevafecha = 'Mayo';
       echo $nuevafecha;
     }
     if ($nuevafecha == 'Jun') {
       $nuevafecha = 'Junio';
       echo $nuevafecha;
     }
     if ($nuevafecha == 'Jul') {
       $nuevafecha = 'Julio';
       echo $nuevafecha;
     }
     if ($nuevafecha == 'Aug') {
       $nuevafecha = 'Agosto';
       echo $nuevafecha;
     }
     if ($nuevafecha == 'Dec') {
       $nuevafecha = 'Diciembre';
       echo $nuevafecha;
     }
     if ($nuevafecha == 'Dec') {
       $nuevafecha = 'Diciembre';
       echo $nuevafecha;
     }
     if ($nuevafecha == 'Dec') {
       $nuevafecha = 'Diciembre';
       echo $nuevafecha;
     }

     ?></h4></div>
     <div class="table-responsive">
       <table class="table table-bordered table-hover table-striped ">


        <tr><td>Ventas totales</td><td>${{$VT3}}</td></tr>
        <tr><td>Importe</td><td>${{$IMPORTE3}}</td></tr>
        <tr><td>No. de ordenes</td><td>{{$NuOrdenes3}}</td></tr>
        <tr><td>Costo Maximo de ordenes</td><td>${{$OM3}}</td></tr>
        <tr><td>Costo Minino de ordenes</td><td>${{$MO3}}</td></tr>
        <tr><td>Costo Promedio de ordenes</td><td>${{number_format($OP3, 2)}}</td></tr>
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