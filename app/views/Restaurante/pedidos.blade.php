@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
<script src="{{ URL::asset('assets/js/diseno-tabla.js') }}"></script>
	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Pedidos</title>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-flag"></i> Pedidos</h3>
            </div>
            <div class="panel-body"> 
            <hr>

     
              <table id="pedidos" class="table table-bordered table-striped">
      
        <!-- <caption align="top"> <h3>Pedidos</h3>  </caption> -->
        <thead class="at">
                    <th>Orden</th>
                    <th>Domicilio</th>
                    <th>Caracteristicas</th>
                    <th>Total</th>      
                    <th>Estatus</th> 
                    <th>Nombre</th>      
                    <th>Cantidad</th>
                    <th>Producto</th> 
                    <th>Enviar con HD</th>                                               
               </thead>
            <tbody class="at acomodo-tabla">
                 @if(count($pedidos)>0)
     
           @foreach($pedidos as $key => $value)
           {{Form::open(array('url' => '/condec'))}}
               <?php $a = 1; ?>
               @foreach($detalles as $key => $info)                        
                    @if($info->id_pedido == $value->id)     
                    <?php $a++; ?>
                    @endif     
               @endforeach
                       
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
                        <td><input type="checkbox"></td>
                    </tr>
                    

      
                     {{Form::close()}}
           @endforeach
            @endif
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