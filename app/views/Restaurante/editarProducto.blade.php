@include('Restaurante.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar</title>
</head>
<body>
	  <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading rest"><h4>{{ Session::get("nombre") }} Seccion:Editar</h4></div>     
		<div class="panel-body">
		{{Form::open(array('url'=>'/restaurante/saveChanges','files'=>'true'))}}
			<div class="col-md-6">
				<br>
			     <img id="blah" style="width:100%;" src="{{asset($producto->imagen)}}" alt="your image" />
				<input type="file" name="imgFile" id="imgFile" value="">
					
			</div>
			<br>
			<div class="col-md-3">
			<input type="text" name="nombre" value="{{$producto->nombre}}">
			<textarea name="descripcion" id=""  rows="10">{{$producto->descripcion}}</textarea>
			  <label>Categoria  </label>
	          {{ Form::select('categoria' ,(['0' => $cat->nombre] + $categorias),$cat->nombre,['class' => 'form-control']) }}
         	 <br>         	
	      <?php $valor = ($producto->precio * .15);
	      		$precioF = ($producto->precio * .15)+2.5+$producto->precio;?>
			</div>
			<div class="col-md-3 precios">
				<label >Precio</label>
				<br>
				<input name="precio" class="inicial" value="{{$producto->precio}}" type="text">
				<br>
				<label >Costo por transacción</label>
				<br>
				<input name="transaccion" value="2.5" readonly  type="text">
				<br>
				<label for="">Comisión</label>
				<br>
				<input type="hidden" name="comision" class="comision" value="{{$valor}}"  >
				<label name="comision2" class="comision2" >{{$valor}}</label>
				<br>
				<label for="">Precio final</label>
				<br>
				<input type="hidden" name="costo_unitario" class="costo_unitario" value="{{$precioF}}"  >
				<label name="costo_unitario2" class="costo_unitario2" >{{$precioF}}</label>
				
				<br>				
		         {{ Form::label('hora_inicio', 'hora a la que se comienza a preparar') }}
		         <br>
		         {{ Form::text('hora_inicio', $producto->hora_inicio, array('placeholder'=>'09:00')) }}
		    	<br/>
		    
		         {{ Form::label('hora_fin', 'hora a la que se deja de preparar') }}
		         <br>
		         {{ Form::text('hora_fin', $producto->hora_fin, array('placeholder'=>'17:00')) }}
				<br>
				<br>
				<input type="hidden" name="id" value="{{$producto->id}}">
			{{Form::submit('Guardar cambios',array('class'=>'btn btn-primary'))}}
			</div>

		{{Form::close()}}
		</div>
     <div class="panel-footer clearfix rest">
	
	</div>     
	</div>
	</div>
</body>
</html>
<script>
	$('#imgFile').change(function(){
		$('#blah')[0].src = window.URL.createObjectURL(this.files[0])
	});
</script>