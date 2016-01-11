@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Categorías</title>
	
</head>
<body>
			<div class="row" style="background-color:white;">
		<div class="col-lg-2"></div>
		<div class="col-lg-10">
 <br>
    <br>

    <div class="container merge">

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading admin">
              <h3 class="panel-title"><i class="fa fa-fw fa-check-square-o"></i> Categorías</h3>
            </div>
            <div class="panel-body" style="margin-left:2em;">
                    	<div class="row">
						{{ Form::open(array('url' => '/admin/activar','files'=>'true')) }}
						@foreach($categorias as $key => $value)  
						<div class="form-group col-lg-4">

							 <div class="checkbox">
                                    
                                       
                                        @if($value->activa==0)
										<input  style="display:inline-block;" tabindex="1" type="checkbox" name="categoria[{{$value->id}}]" id="{{$value->id}}" value="{{$value->activa}}" >   
										@else
										<input tabindex="1" type="checkbox" name="categoria[{{$value->id}}]" id="{{$value->id}}" value="{{$value->activa}}" checked="true">   
										@endif
										<h4>
										 {{ Form::label('nombre', $value->nombre, array('class' => 'text-borde')) }}
                                  		</h4>
                                </div>

							


						</div>
						@endforeach
						</div>

						<div class="row">
						<div class=" col-lg-4"></div>
						<div class=" col-lg-4">
							<br>
							{{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
							{{ Form::close() }}
							<br>
							   </div>
						<div class=" col-lg-4"></div></div>
				
					</div>
				</div>
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