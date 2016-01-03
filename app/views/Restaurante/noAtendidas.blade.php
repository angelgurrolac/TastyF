@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" http-equiv="refresh" content="20">
  <title>No atendidas</title>
</head>
<body>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-hourglass-half"></i> Ordenes no atendidas</h3>
            </div>
            <div class="panel-body"> 
            <hr>

     
              <table id="pedidos" class="table table-bordered table-striped">
        @if(count($pedidos)>0)
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

                    <td></td>
                    

           </tbody>
                     {{Form::close()}}
           @endforeach
     
               </table>
               
     @endif
        
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