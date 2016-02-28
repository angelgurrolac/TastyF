@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" http-equiv="refresh" content="20">
	<title>Reservaciones atendidas</title>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-paper-plane-o"></i> Reservaciones pagadas</h3>
            </div>
            <div class="panel-body"> 
              <hr>


              <table id="pedidos" class="table table-bordered table-striped">

               <thead class="at">
                <th style="width:102px; heigth:200px;">Reservación</th>
                <th style="width:252px; heigth:200px;">Nombre</th>
                <th style="width:252px; heigth:200px;">Domicilio</th>
                <th style="width:188px; heigth:200px;">Correo</th>
                <th style="width:90px; heigth:200px;">Total</th> 
                <th style="width:100px; heigth:200px;">Fecha</th>     
                <th style="width:100px; heigth:200px;">Hora</th>     
                                                               
              </thead>
              <tbody class="at acomodo-tabla">


                <tr>

                  @foreach($reservaciones as $key => $value)
                 <td style="width:108px; heigth:200px;" >{{$value->id}}</td>
                 <td style="width:252px; heigth:200px;" >{{$value->nombre}} {{$value->apellidos}}</td>
                 <td style="width:252px; heigth:200px;" >{{$value->direccion}}</td>
                 <td style="width:188px; heigth:200px;" >{{$value->correo}}</td>
                 <td style="width:90px; heigth:200px;" >{{$value->total}}</td>
                 <td style="width:100px; heigth:200px;" >{{$value->fecha}}</td>                
                 <td style="width:100px; heigth:200px;" >{{$value->hora}}</td>                
                
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