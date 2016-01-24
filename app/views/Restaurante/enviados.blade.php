@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Pedidos enviados</title>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-paper-plane-o"></i> Pedidos enviados</h3>
            </div>
            <div class="panel-body"> 
              <hr>


              <table id="pedidos" class="table table-bordered table-striped">

               <thead class="at">
                <th style="width:70px; heigth:200px;">Orden</th>
                <th style="width:252px; heigth:200px;">Usuario Tasty</th>
                <th style="width:252px; heigth:200px;">Domicilio</th>
                <th style="width:188px; heigth:200px;">Características</th>
                <th style="width:90px; heigth:200px;">Total</th> 
                <th style="width:100px; heigth:200px;">Repartidor</th>     
                                                               
              </thead>
              <tbody class="at acomodo-tabla">


                <tr>
                @foreach($penvios as $key => $value)
                 <td style="width:70px; heigth:200px;" >{{$value->pedidosid}}</td>
                 <td style="width:252px; heigth:200px;" >{{$value->usuariotasty}} {{$value->apellidostasty}}</td>
                 <td style="width:252px; heigth:200px;" >{{$value->domicilio}}</td>
                 <td style="width:188px; heigth:200px;" >{{$value->caracteristicas}}</td>
                 <td style="width:90px; heigth:200px;" >{{$value->totalpedido}}</td>
                 <td style="width:100px; heigth:200px;" >{{$value->usuariohd}} {{$value->apellidoshd}}</td>                
                
                 @endforeach


               </tr>
             

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