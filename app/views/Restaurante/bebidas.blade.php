@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bebidas</title>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-glass"></i> Bebidas</h3>
            </div>
	<div class="panel-body">
	<hr>
	<a href="/restaurante/agregarB" style="display:inline-block;" class="btn btn-lg btn-primary buttonagregar" data-target="#myModal">Agregar bebida</a>
	<br>
	<hr>@if(count($bebidas)>0)
	<div class="row">
	 	@foreach($bebidas as $key => $value)
				 <div class="col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{$value->nombre}}</h3>
                  </div>
                  <div class="panel-body">
                   <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-10">

                      <img style="height:300px; width:300px;" class="center-block thumbnail img-rounded" src="{{asset($value->imagen)}}" alt="{{asset($value->imagen)}}">
                      <div class="caption">
                        <h3>Precio: ${{$value->costo_unitario}}</h3>
                        <b>Descripción:</b>
                        <p>{{$value->descripcion}}</p>
                         	{{Form::open(array('url'=>'/restaurante/editar', 'id' => $value->id))}}
								{{ Form::submit('Editar', array('name'=> 'Editar','class' => 'btn btn-success direccionar')) }}
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