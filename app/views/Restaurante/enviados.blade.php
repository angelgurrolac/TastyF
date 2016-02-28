@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Pedidos enviados</title>
  <script src="{{ URL::asset('assets/js/diseno-tabla.js') }}"></script>
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
$notificacion =  date('Y-m-d H:i:s');



$nuevamas = strtotime ( '+2 minute' , strtotime ( $notificacion ) ) ;
$nuevamas = date ( 'Y-m-d H:i:s' , $nuevamas );




$nuevamenos = strtotime ( '-62 minute' , strtotime ( $notificacion ) ) ;
$nuevamenos = date ( 'Y-m-d H:i:s' , $nuevamenos );

?>
</head>
<body>
  @foreach($reservaciones as $key3 => $value3)
  @if($nuevamas > $value3->created_at && $nuevamenos < $value3->created_at) 
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
  
  @if($nuevamas > $value2->created_at && $nuevamenos < $value2->created_at) 

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
    <br>
    <br>

    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading admin">
              <h3 class="panel-title"><i class="fa fa-fw fa-paper-plane-o"></i> Pedidos enviados</h3>
            </div>
            <div class="panel-body"> 
              <hr>


              <table id="pedidos" class="table table-bordered table-striped">

               <thead class="at">
                <th style="width:270px; heigth:200px;">Número de orden</th>
                <th style="width:288px; heigth:200px;">Características</th>
                <th style="width:90px; heigth:200px;">Total</th> 
                <th style="width:400px; heigth:200px;">Nombre del repartidor</th>     

              </thead>
              <tbody class="at acomodo-tabla">


                @foreach($penvios as $key => $value)

                <tr>
                 <td style="width:270px; heigth:200px;" >{{$value->pedidosid}}</td>
                 <td style="width:288px; heigth:200px;" >{{$value->caracteristicas}}</td>
                 <td style="width:90px; heigth:200px;" >{{$value->totalpedido}}</td>
                 <td style="width:400px; heigth:200px;" >{{$value->usuariohd}} {{$value->apellidoshd}}</td>                

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