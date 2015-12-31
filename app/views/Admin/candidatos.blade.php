@include('Admin.recursos')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Candidatos</title>
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
              <h3 class="panel-title"><i class="fa fa-fw fa-users"></i> Candidatos</h3>
            </div>
            <div class="panel-body">

							        
							@foreach($candidatos as $value)
							
							

						 <div class="col-sm-6">
                <div class="panel panel-red">
                  <div class="panel-heading">
                    <h3 class="panel-title">Candidato: {{$value->nombre}}</h3>
                  </div>
                  <div class="panel-body">
                   <div class="row">
                    <div class="col-md-1"></div>

                    <div class="col-md-10">
                    	 <img style="height:300px; width:300px;" class="center-block thumbnail img-rounded" src="{{asset($value->imagenR)}}" alt="{{asset($value->imagenR)}}">
                      <div class="caption">
                        <h3>Dirección: {{$value->direccion}}</h3>
                        <b>Teléfono:</b>
                        <p>{{$value->telefono}}</p>
                        <a  href="{{ URL::to('admin/'.$value->id.'/candidato') }}" class="btn btn-primary" role="button">Ver más</a>
                        
                      </div>

                   
                    </div>
                  </div>
                 

                </div>
              </div>
            </div>
             @endforeach
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