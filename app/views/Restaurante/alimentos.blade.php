@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>

  <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/notificaciones.js') }}"></script>
	<meta charset="UTF-8">
	<title>Alimentos</title>
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



$nuevamas = strtotime ( '+5 minute' , strtotime ( $notificacion ) ) ;
$nuevamas = date ( 'Y-m-d H:i:s' , $nuevamas );




$nuevamenos = strtotime ( '-5 minute' , strtotime ( $notificacion ) ) ;
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
              <h3 class="panel-title"><i class="fa fa-fw fa-cutlery"></i> Alimentos</h3>
            </div>
	<div class="panel-body">
	<hr>
	<a style="margin-left:1em;" href="/restaurante/agregarA" style="display:inline-block;" class="btn btn-lg btn-primary buttonagregar" data-target="#myModal">Agregar alimento</a>
	<br>
	<hr>
	@if(count($alimentos)>0)
	<div class="row">
	 	@foreach($alimentos as $key => $value)
			 <div class="col-sm-6">
                <div class="panel panel-yellow" style="margin-left:1em;">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{$value->nombre}}</h3>
                  </div>
                  <div class="panel-body">
                   <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-10">

                      <img style="height:300px; width:300px;" class="center-block thumbnail img-rounded" src="{{asset($value->imagen)}}" alt="{{asset($value->imagen)}}">
                      <div class="caption" style="margin-left:1em;">
                        <h3>Precio: ${{$value->costo_unitario}}</h3>
                        <b>Descripción:</b>
                        <p>{{$value->descripcion}}</p>
                         	{{Form::open(array('url'=>'/restaurante/editar', 'id' => $value->id))}}
							  {{ Form::submit('Editar', array('name'=> 'Editar','class' => 'btn btn-success direccionar')) }} 
                {{ Form::submit('Eliminar', array('name'=> 'Eliminar','class' => 'btn btn-danger')) }}</td> 
								<input type="hidden" name="producto_id" value="{{$value->id}}">
								{{Form::close()}}
                      </div>
                    </div> 
                    <div class="col-md-1"></div>
                  </div>
                </div>
              </div>
            </div>
		@endforeach
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
<script type="text/javascript">
$(document).ready(function(){
	$('.direccionar').click(function(){
		var formulario = $(this).next('input').val();
		$('#'+formulario).submit();
	});
});
</script>