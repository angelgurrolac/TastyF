<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.min.css') }}">
  <script src="{{ asset('assets/js/jquery.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
  <script src="{{ asset('assets/js/classie.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/modernizr.custom.js') }}"></script>
    <script src="{{ URL::asset('assets/js/sumas.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('assets/pnotify.css') }}">
  <script src="{{ asset('assets/pnotify.js') }}"></script>
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
<body>
  <nav class="anclas cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <a href="{{URL::to('/restaurante/hogar') }}">Hogar</a>
     <a href="{{URL::to('/restaurante/alimentos') }}">Alimentos</a>
    <a href="{{URL::to('/restaurante/bebidas') }}">Bebidas</a>
    <a href="{{URL::to('/restaurante/pedidos') }}">Pedidos</a>
    <a href="{{URL::to('/restaurante/declinadas') }}">Declinadas</a>
    <a href="{{URL::to('/restaurante/noAtendidas') }}">No Atendidas</a>
    <a href="{{URL::to('/restaurante/informes') }}">Informes</a>
    <a href="{{URL::to('/restaurante/datos') }}">No de cuenta</a>
    <a href="{{URL::to('/restaurante/estadisticas') }}">Estadisticas</a>
    <a href="{{URL::to('/restaurante/facturas') }}">Facturas</a>
    <a href="{{URL::to('/logout') }}">Salir</a>
  </nav>
  <nav class="navbar navbar-anclas">
  <label class="navbar-nav navbar-left"><img id="icono_menu" src="/assets/img/menu.png"><label class="paginaactual"></label></label>
  <ul class="navbar-nav navbar-right">
   <li class="dropdown">
     <label class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
       <p class="overflow">
         {{ Session::get('nombre') }}
       </p> 
       
     </label>
     <ul class="dropdown-menu" role="menu">
      <li><a class="cerrarSession">Cerrar Sesión</a></li>
    </ul>
  </li>
</ul>

</nav>
<script>
  var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
showLeft = document.getElementById( 'icono_menu' ),
body = document.body;
showLeft.onclick = function() {
  if (showLeft.classList.contains('open')) {
   $("#icono_menu").attr("src", "/assets/img/menu.png");
 }else{
   $("#icono_menu").attr("src", "/assets/img/menux.png");
 };
 classie.toggle(showLeft ,'open');
 classie.toggle( menuLeft, 'cbp-spmenu-open' );
};
</script>
</body>

