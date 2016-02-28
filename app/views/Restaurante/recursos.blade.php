<!doctype html>
<html  lang="en" class="no-js"> 
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' > -->
  <script src="{{ URL::asset('assets/js/sumas.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/sb-admin.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/plugins/morris.css') }}">
  <link href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" >
  <link rel="stylesheet" href="{{ URL::asset('assets/pnotify.css') }}">
  <script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ URL::asset('assets/pnotify.js') }}"></script>
  <style type="text/css">
  .padding
  {
    padding-top: 12px !important;
    padding-bottom: 12px !important;
  }
  </style>


 
<!-- jQuery -->
  <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>



  <script src="{{ asset('assets/js/ modernizr.custom') }}"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
</head>

@if (Session::has('message'))
<script>
  $(function(){
    new PNotify({
      title: '{{ Session::get("message") }}',
      type: 'success'
    });
  });
</script>
@endif
<?php  $var = $errors->all()?> 
@if(!empty($var))

@foreach ($errors->all() as $error)
<script>
  $(function(){
    new PNotify({
      text: '{{$error}}',
      type: 'error'
    });
  });

</script>
@endforeach
@endif


<body style="overflow-x:hidden;">
   
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button style="border-color:white;" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand" href="{{URL::to('/admin/pedidos') }}"><img style="display:inline-block;" width="30" src="{{ URL::asset('assets/img/umami_logo.png') }}" alt="Logguito"><p style="display:inline-block; padding:2px; color:#F6A507;">TastyFoods</p></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Session::get('nombre') }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{URL::to('/logout') }}"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
             <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
     <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav" style="overflow-y:hidden;">
          <br>
          <li>
            <a class="padding" href="{{URL::to('/restaurante/hogar') }}"><i class="fa fa-fw fa-flag"></i> Pedidos y reservaciones</a>
          </li>
          <li>
            <a class="padding" href="{{URL::to('/restaurante/alimentos') }}"><i class="fa fa-fw fa-cutlery"></i> Alimentos</a>
          </li>
          <li>
            <a class="padding" href="{{URL::to('/restaurante/bebidas') }}"><i class="fa fa-fw fa-glass"></i> Bebidas</a>
          </li>
           <li>
            <a class="padding" href="{{URL::to('/restaurante/reservacionesA') }}"><i class="fa fa-fw fa-flag"></i> Reservaciones</a>
          </li>
          <li>
            <a class="padding" href="{{URL::to('/restaurante/pedenviados') }}"><i class="fa fafw fa-paper-plane-o"></i> Pedidos enviados</a>
          </li>
          <li>
            <a class="padding" href="{{URL::to('/restaurante/pedidos') }}"><i class="fa fa-fw fa-flag"></i> Pedidos atendidos</a>
          </li>
          <li>
            <a class="padding" href="{{URL::to('/restaurante/declinadas') }}"><i class="fa fa-fw fa-file-excel-o"></i> Ordenes declinadas</a>
          </li>
          <li>
            <a class="padding" href="{{URL::to('/restaurante/noAtendidas') }}"><i class="fa fa-fw fa-minus-square-o"></i> Ordenes no atendidas</a>
          </li>
          
          <li>
            <a class="padding" href="{{URL::to('/restaurante/informes') }}"><i class="fa fa-fw fa-file-text-o"></i> Informes</a>
          </li>
          <li>
            <a class="padding" href="{{URL::to('/restaurante/datos') }}"><i class="fa fa-fw fa-credit-card"></i> No. de cuenta</a>
          </li>
          <li>
            <a class="padding" href="{{URL::to('/restaurante/estadisticas') }}"><i class="fa fa-money"></i> Finanzas</a>
          </li>
          <li>
            <a class="padding" href="{{URL::to('/restaurante/facturas') }}"><i class="fa fa-files-o"></i> Facturas</a>
          </li>
          <li>
            <a class="padding" href="{{URL::to('/logout') }}"><i class="fa fa-fw fa-power-off"></i> Salir</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
        </nav>
    </div>
    <!-- /#wrapper -->
 
</body>

</html>


