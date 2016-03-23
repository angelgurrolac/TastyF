@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facturar</title>
	
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
              <h3 class="panel-title"><i class="fa fa-fw fa-files-o"></i> Facturas</h3>
            </div>
	<div class="panel-body">
	<hr>
	<a style="margin-left:1em;" href="/admin/nuevafac" style="display:inline-block;" class="btn btn-lg btn-primary buttonagregar" data-target="#myModal">Agregar nueva factura</a>
	<br>
	<hr>        
					@foreach($Facturas as $value)
					{{Form::open(array('url'=>'/admin/facturaM'))}}
					<input type="hidden" name='id' value="{{$value->idf}}">
					<tr>
						Nombre: {{ $value->nombreUsuario}}
						
					</tr>
					<br>
					<tr >
						Domicilio: {{$value->Domicilio}} 
						
					</tr>
					<br>
					<tr >
						RFC: {{$value->rfc}} 
						
					</tr>
					<br>
					<tr >
						Correo: {{$value->correo}} 
						
					</tr>
					<br>
					<tr >
						Estatus: {{$value->estatus}} 
						
					</tr>
					<br>
					<tr >
						Costo: {{$value->costo}} 
						
					</tr>
					
					<br>
					
					{{Form::submit('Marcar como facturada',array('class'=>'btn btn-primary'))}}

					
					{{Form::close()}}
					@endforeach
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