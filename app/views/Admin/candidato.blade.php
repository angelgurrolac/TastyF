@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nuevos</title>
	
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
              <h3 class="panel-title"><i class="fa fa-fw fa-users"></i> Candidato</h3>
            </div>
            <div class="panel-body">
            	<div class="row">
     	        {{ Form::open(array('url' => '/admin/validar','id'=>'nueva','files'=>'true')) }}
     			{{Form::hidden('id',$candidato->id)}}
		     	<div class="form-group col-lg-6">
		         {{ Form::label('nombre', 'Nombre') }}
		         {{ Form::text('nombre', $candidato->nombre, array('class' => 'form-control','form'=>'nueva')) }}
		       </div>		    
		       <div class="form-group col-lg-6">
		         {{ Form::label('telefono', 'Teléfono') }}
		         {{ Form::text('telefono', $candidato->telefono, array('class' => 'form-control','form'=>'nueva')) }}
		       </div>
		       </div>
		       <div class="row">
		       <div class="form-group col-lg-6">
		         {{ Form::label('direccion', 'Dirección') }}
		         {{ Form::text('direccion', $candidato->direccion, array('class' => 'form-control','form'=>'nueva')) }}
		       </div>
		       <div class="form-group col-lg-6">
		         {{ Form::label('hora_inicio', 'Hora de apertura') }}
		         {{ Form::text('hora_inicio', $candidato->hora_inicio, array('class' => 'form-control','form'=>'nueva','placeholder'=>'09:00')) }}
		       </div>
		       </div>
		       <div class="row">
		        <div class="form-group col-lg-6">
		         {{ Form::label('hora_fin', 'Hora de cierre') }}
		         {{ Form::text('hora_fin', $candidato->hora_fin, array('class' => 'form-control','form'=>'nueva','placeholder'=>'17:00')) }}
		       </div>
		        <div class="form-group col-lg-6">
		        	<br>
		       		{{ Form::label('entrega', '¿Entrega a domicilio?') }}
		       		@if(($candidato->domicilio)=='1')
		        		 {{ Form::checkbox('domicilio', true , ['class' => 'field']) }}
		         	@else
		         		{{ Form::checkbox('domicilio', false , ['class' => 'field']) }}
		         	@endif
		       </div>
		       </div>
		       <div class="row"><div class="form-group col-lg-6">
		         <img id="blah" style="height:200px; width:200px;"  src="{{asset($candidato->img_ref)}}" />			
		       </div>
		      </div>
		         
		       <br>
		       <div class="row">
		        <div class="form-group col-lg-6">
		         {{ Form::label('user', 'Ingresa tu usuario administrador') }}
		         {{ Form::text('user', Input::old('user'), array('class' => 'form-control','form'=>'nueva','placeholder' => 'Ingrese su usuario')) }}
		       </div>
		        <div class="form-group col-lg-6">
		         {{ Form::label('password', 'Contraseña') }}
		         {{ Form::text('password', Input::old('password'), array('class' => 'form-control','form'=>'nueva','placeholder' => 'Ingrese su contraseña')) }}
		       </div>
	        	</div>
		        
		     </div>

			    <div class="panel-footer">
			    {{ Form::submit('Validar', array('class' => 'btn btn-primary','style'=>'display:inline-block;')) }}
		       {{ Form::close() }}

			  {{form::open(array('url' => 'admin/borrar_candidato','id'=>'delete','style'=>'display:inline-block;')) }}
					{{Form::hidden('id',$candidato->id)}}
		       <a style="display:inline-block;" class="btn btn-danger " name="Eliminar" >Eliminar</a>
		         {{ Form::close() }}
				</div>


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