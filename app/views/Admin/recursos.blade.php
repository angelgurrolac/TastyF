<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <link rel="stylesheet"  href="{{ URL::asset('assets/css/simple-sidebar.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/css/jquery-ui.min.css') }}">
  <script src="{{ asset('assets/js/jquery.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
  <script src="{{ asset('assets/js/classie.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/modernizr.custom.js') }}"></script>
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
  <nav class="admin cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
<div class="estilo-menu">
<li><img style="margin-left:34%; padding:1%; " src="/assets/img/umami_logo.png" width="70"></li>
  <li data-type="home-menu"><a  href="{{URL::to('/admin/pedidos') }}"><p>Hogar</p></a></li>
  <li> <a href="{{URL::to('/admin/alimentos') }}">Alimentos</a></li>
  <li><a href="{{URL::to('/admin/bebidas') }}">Bebidas</a></li>
  <li><a href="{{URL::to('/admin/restaurantes') }}">Restaurantes</a></li>
  <li><a href="{{URL::to('/admin/usuarios') }}">Usuarios</a></li>
  <li><a href="{{URL::to('/admin/informes') }}">Informe</a></li>
  <li><a href="{{URL::to('/admin/estadisticas') }}">Estadisticas</a></li>
  <li><a href="{{URL::to('/admin/candidatos') }}">Candidatos</a></li>
  <li><a href="{{URL::to('/admin/categorias') }}">Categorías</a></li>
  <li><a href="{{URL::to('/admin/publicidad') }}">Publicidad</a></li>
  <li><a href="{{URL::to('/logout') }}">Salir</a></li>
</div>
  </nav>
  <nav class="navbar navbar-admin">

  <label class="navbar-nav navbar-left"><img id="icono_menu" src="/assets/img/menu.png"><label class="paginaactual"></label></label>
  <ul class="navbar-nav navbar-right">
   <li class="dropdown">
     <label class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
       <p style="color:white;" class="overflow">
         {{ Session::get('nombre')}}
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


