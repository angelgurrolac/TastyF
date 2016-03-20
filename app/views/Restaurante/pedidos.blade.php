@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="{{ URL::asset('assets/js/diseno-tabla.js') }}"></script>
  <script src="{{ URL::asset('assets/js/notificaciones.js') }}"></script>
  <meta charset="UTF-8" http-equiv="refresh" content="20">
  <title>Pedidos</title>

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

  @foreach($pedido as $key2 => $value2)
  
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
    <br>
    <br>

    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-green" style="border-color:black;">
            <div class="panel-heading" style="background-color:black; border-color:black;">
              <h3 class="panel-title"><i class="fa fa-fw fa-flag"></i> Pedidos</h3>
            </div>
            <div class="panel-body" >
             @if(count($pedidos)>0)

             @foreach($pedidos as $key => $value)
             {{Form::open(array('url' => '/condec'))}}
             <?php $a = 1; ?>
             @foreach($detalles as $key => $info)                        
             @if($info->id_pedido == $value->id)     
             <?php $a++; ?>
             @endif     
             @endforeach
             <div class="row" >

              <div class="col-md-6" >
                <br>
                

                <p class="titulos-pedidos">Orden:</p> <p class="res-pedidos"> {{$value->id}}</p><br>
                <p class="titulos-pedidos">Domicilio:</p> <p class="res-dire">  {{$value->domicilioP}} </p>
                <p class="titulos-pedidos">Caracteristicas:</p> <p class="res-pedidos">  {{$value->caracteristica}}</p><br>
                <p class="titulos-pedidos">Total:</p> <p class="res-pedidos">  {{$value->total}}</p>      <br>
                <p class="titulos-pedidos">Estatus:</p> <p class="res-pedidos">  {{$value->estatus}}</p> <br>
                <p class="titulos-pedidos">Tipo de pago:</p> <p class="res-pedidos">  {{$value->tipo}}</p> <br>
                <p class="titulos-pedidos">Nombre:</p> <p class="res-pedidos">  {{$value->nombreUsuario}}</p>    

                
                
                


              </div>

              <div class="col-md-6">
                

                <div class="table-responsive" style="margin:1%;">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Cantidad</th>
                        <th>Producto</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                     
                     @foreach($detalles as $key => $info)

                     @if($info->id_pedido == $value->id)    
                     <tr>
                      <td>{{$info->cantidad}}</td>
                      <td>{{$info->nombre}}</td>
                    </tr>
                    

                    @endif     

                    @endforeach
                    

                    

                  </tbody>
                </table>
              </div>
              
              <!-- {{ Form::hidden('idpedido',$value->id)}} -->
                       <!--     <div class="panel-footer" style="border-style: none;">
                                <input type="submit" value="Enviar con HD" class="btn btn-success">
                              </div> -->
                              
                              



                              {{Form::close()}}
                              




                            </div>

                          </div>
                          <hr class="color-linea">
                          @endforeach
                          @endif
                        </div>
                      </div>










                    </div>
                  </div>
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.container-fluid -->
          </div>
        </div>
      </body>
      </html>