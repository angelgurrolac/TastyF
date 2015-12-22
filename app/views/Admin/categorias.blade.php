@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Categorias</title>
	
</head>
<body>

  <div class="container marg">
    <div class="panel panel-default">
     <div class="panel-heading admin"><h4>Categorias</h4></div>
     		<div class="panel-body ">
 	{{ Form::open(array('url' => '/admin/activar','files'=>'true')) }}
     			  @foreach($categorias as $key => $value)  
		     	<div class="form-group col-lg-4">
		         
		         {{ Form::text('nombre', $value->nombre) }}
		             
					@if($value->activa==0)
		           <input style="display:inline-block;" tabindex="1" type="checkbox" name="categoria[{{$value->id}}]" id="{{$value->id}}" value="{{$value->activa}}" >   
		           @else
		           <input tabindex="1" type="checkbox" name="categoria[{{$value->id}}]" id="{{$value->id}}" value="{{$value->activa}}" checked="true">   
		           @endif
					
				
				     </div>
				     @endforeach
				     	{{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
					{{ Form::close() }}
		         
     	<div class="panel-footer clearfix admin">

	</div>     
	</div>
	</div>
	
</body>
</html>
<script>
	$('#imgFile').change(function(){
		$('#blah')[0].src = window.URL.createObjectURL(this.files[0])
	});

	$('.btn-danger').click(function(){
			(new PNotify({
				    title: 'Confirmar',
				    text: '¿Esta seguro que desea eliminar este candidato?',
				    icon: 'glyphicon glyphicon-question-sign',
				    hide: false,
				     confirm: {
		                confirm: true
		            },
		            buttons: {
		                closer: false,
		                sticker: false
		            },
		            history: {
		                history: false
		            }
		          })).get().on('pnotify.confirm', function() {
		              $("#delete").submit();
		          }).on('pnotify.cancel', function() {
		              return false;
				});
	
	});
</script>