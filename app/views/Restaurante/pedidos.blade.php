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