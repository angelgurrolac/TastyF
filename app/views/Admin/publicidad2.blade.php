@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Publicidad</title>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-bookmark"></i> Publicidad</h3>
            </div>
            <div class="panel-body">
           
						<br>
						
						<div class="row">

					
							 <div class="col-sm-6">
                <div class="panel panel-primary">
                  
                  <div class="panel-body">
                   <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-10">
                      <div class="caption">
                      	{{Form::open(array('url'=>'/admin/saveChanges','files'=>'true'))}}
                      	<input type="text" name="descripcion" value="{{$publicidad->descripcion}}">
                      	<br>

                      	<b>Día:</b>
                        <p>{{$publicidad->dia}}</p>
                     	<b>Hora de inicio:</b>
                        <p>{{$publicidad->hora_inicio}}</p>
                        <b>Hora de fin:</b>
                        <p>{{$publicidad->hora_fin}}</p>
                        <br>

                        <input type="hidden" name="id" value="{{$publicidad->id}}">
			{{Form::submit('Guardar cambios',array('class'=>'btn btn-primary'))}}

                        {{Form::close()}}

                        

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            





					
				<!-- </div> -->
				
     		</div>   
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<script>
$(function() {
$('.buttonagregar').click(function(){
	$('#myModal').modal('show');
});
</script>