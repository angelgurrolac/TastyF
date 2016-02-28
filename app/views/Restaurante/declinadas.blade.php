@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Declinadas</title>
  <script src="{{ URL::asset('assets/js/diseno-tabla.js') }}"></script>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-file-excel-o"></i> Ordenes declinadas</h3>
            </div>
            <div class="panel-body"> 
            <hr>

     
              <table id="pedidos" class="table table-bordered table-striped">
       
               <thead class="at">
                    <th style="width:170px; heigth:200px;">Número de orden</th>
                    <!-- <th style="width:252px; heigth:200px;">Domicilio</th> -->
                    <th style="width:388px; heigth:200px;">Características</th>
                    <th style="width:100px; heigth:200px;">Total</th>      
                    <!-- <th>Estatus</th>  -->
                    <!-- <th style="width:144px; heigth:200px;">Nombre</th>       -->
                    <th style="width:100px; heigth:200px;">Cantidad</th>
                    <th style="width:344px; heigth:200px;">Producto</th>                                                
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
                         <td style="width:170px; heigth:200px;" rowspan="{{$a}}">{{$value->id}}</td>
                         <!-- <td style="width:252px; heigth:200px;" rowspan="{{$a}}">{{$value->domicilioP}}</td> -->
                         <td style="width:388px; heigth:200px;" rowspan="{{$a}}">{{$value->caracteristica}}</td>
                         <td style="width:100px; heigth:200px;" rowspan="{{$a}}">{{$value->total}}</td>
                         <!-- <td rowspan="{{$a}}">{{$value->estatus}}</td> -->
                          <!-- <td style="width:144px; heigth:200px;" rowspan="{{$a}}">{{$value->nombreUsuario}}</td> -->
                         @foreach($detalles as $key => $info)
                         
                         @if($info->id_pedido == $value->id)     
                         
                         
                    
                         
                              <tr>                               
                                   <td style="width:100px; heigth:200px;" >{{$info->cantidad}}</td>
                              
                                   <td style="width:344px; heigth:200px;" >{{$info->nombre}}</td>
                              
                           
                                   
                              </tr>


                              @endif     
                                   
                          @endforeach
            
                         {{ Form::hidden('idpedido',$value->id)}}
                     
                    </tr>
                    <td></td>
                    

          
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