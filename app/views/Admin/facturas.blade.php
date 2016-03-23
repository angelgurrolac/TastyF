@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facturas</title>
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
								<h3 class="panel-title"><i class="fa fa-files-o"></i> Facturas</h3>
							</div>
							<div class="panel-body ">
								{{ Form::open(array('url' => '/admin/facturacion','id'=>'nueva')) }}

								<div class="form-group col-lg-4">
									{{ Form::label('nombre', 'Nombre') }}
									{{ Form::text('nombre', Input::old('nombre') , array('class' => 'form-control','form'=>'nueva','required')) }}
								</div>		    

								<div class="form-group col-lg-4">
									{{ Form::label('domicilio', 'Domicilio') }}
									{{ Form::text('domicilio',  Input::old('domicilio'),array('class' => 'form-control','form'=>'nueva','required')) }}
								</div>
								<div class="form-group col-lg-4">
									{{ Form::label('RFC', 'RFC') }}
									{{ Form::input('text','RFC', Input::old('RFC') , array('class' => 'form-control','form'=>'nueva','required', 'style'=>'text-transform:uppercase;', 'maxlength'=>'13')) }}
								</div>
								<div class="form-group col-lg-4">
									{{ Form::label('Correo', 'Correo electrónico') }}
									{{ Form::input('email', 'Correo', Input::old('Correo') , array('class' => 'form-control','form'=>'nueva','required')) }}
								</div>
								<div class="form-group col-lg-4">
									{{ Form::label('Costos', 'Costo') }}
									{{ Form::input('costo', 'Costo', Input::old('Correo') , array('class' => 'form-control','form'=>'nueva','required')) }}
								</div>




							</div>

							<div class="panel-footer">
								{{ Form::submit('Agregar Datos', array('class' => 'btn btn-primary')) }}
								{{ Form::close() }}
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
