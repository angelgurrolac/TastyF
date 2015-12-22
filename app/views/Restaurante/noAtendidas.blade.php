@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" http-equiv="refresh" content="20">
  <title>Pedidos</title>
</head>
<body>
    <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading rest"><h4>{{ Session::get("nombre") }} Seccion:NoAtendidas</h4></div>   
       @if(count($pedidos)>0)
     
               <table class="table table-bordered table-striped">
               <h4 align="top"> Pedidos </h4>
               <thead>
                    <th>Orden</th>
                    <th>Domicilio</th>
                    <th>Caracteristicas</th>
                    <th>Total</th>      
                    <th>Estatus</th> 
                    <th>Nombre</th>      
                    <th>Cantidad</th>
                    <th>Producto</th>                                                
               </thead>
     
           @foreach($pedidos as $key => $value)
           {{Form::open(array('url' => '/condec'))}}
               <?php $a = 1; ?>
               @foreach($detalles as $key => $info)                        
                    @if($info->id_pedido == $value->id)     
                    <?php $a++; ?>
                    @endif     
               @endforeach
                         <tbody>
                    <tr>
                         <td rowspan="{{$a}}">{{$value->id}}</td>
                         <td rowspan="{{$a}}">{{$value->domicilioP}}</td>
                         <td rowspan="{{$a}}">{{$value->caracteristica}}</td>
                         <td rowspan="{{$a}}">{{$value->total}}</td>
                         <td rowspan="{{$a}}">{{$value->estatus}}</td>
                          <td rowspan="{{$a}}">{{$value->nombreUsuario}}</td>
                         @foreach($detalles as $key => $info)
                         
                         @if($info->id_pedido == $value->id)     
                         
                         
                    
                         
                              <tr>                               
                                   <td >{{$info->cantidad}}</td>
                              
                                   <td >{{$info->nombre}}</td>
                              
                           
                                   
                              </tr>

                              @endif     
                                   
                          @endforeach
            
                         {{ Form::hidden('idpedido',$value->id)}}
                     
                    </tr>
                    

           </tbody>
                     {{Form::close()}}
           @endforeach
     
               </table>
               
     @endif
     <div class="panel-footer clearfix rest">
  
  </div>     
  </div>
  </div>
</body>
</html>