@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Informe</title>
</head>
<body>
  <div class="row" style="background-color:white;">
    <div class="col-lg-2"></div>
    <div class="col-lg-10">
      <div class="container ">
        <h1>Informes</h1>
        <br>
        <div class="panel panel-default">
         <div class="panel-heading admin"><h4>Informe de hoy: <?php date_default_timezone_set('America/Mexico_City'); $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
          $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

          echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
          ?></h4></div>

          <div class="table-responsive">
           <table class="table table-bordered table-hover table-striped users">

            <tr><td>Ventas totales</td><td>$0</td></tr>


            <tr><td>No. de ordenes</td><td>0</td>  </tr>
            <tr><td>Costo Máximo de ordenes</td><td>0</td>  </tr>
            <tr><td>Costo Mínino de ordenes</td><td>0</td>  </tr>
            <tr><td>Costo Promedio de ordenes</td><td>0</td>  </tr>


          </table>     
          <div class="panel-footer clearfix admin">

          </div>     
        </div>
      </div>

      <div class="panel panel-default">
       <div class="panel-heading admin"><h4>Informe de la ultima semana</h4></div>

       <div class="table-responsive">
         <table class="table table-bordered table-hover table-striped users">


          <tr><td>Ventas totales</td><td>$0</td></tr>

          
          <tr><td>No. de ordenes</td><td>0</td>     </tr>
          <tr><td>Costo Máximo de ordenes</td><td>0</td>   </tr>
          <tr><td>Costo Mínimo de ordenes</td><td>0</td>   </tr>
          <tr><td>Costo Promedio de ordenes</td><td>0</td> </tr>


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
       <table class="table table-bordered table-hover table-striped users">

        <tr><td>Ventas totales</td><td>$0</td></tr>
        <tr><td>No. de ordenes</td><td>0</td>     </tr>
        <tr><td>Costo Máximo de ordenes</td><td>0</td>   </tr>
        <tr><td>Costo Mínino de ordenes</td><td>0</td>   </tr>
        <tr><td>Costo Promedio de ordenes</td><td>0</td> </tr>
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