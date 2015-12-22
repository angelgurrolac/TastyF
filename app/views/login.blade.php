<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="{{ URL::asset('assets/pnotify.css') }}">
  <script src="{{ asset('assets/pnotify.js') }}"></script>
</head>
<body class="login">
    <div class="login_container">
        {{ Form::open(['url' => '/login','id' => 'formulario']) }}
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
        @if(Session::has('error_message'))
        <script>
        $(function(){
          new PNotify({
            text: ' {{ Session::get("error_message") }}',
            type: 'error'
         });
        });

        </script>

        @endif

        <h2>Iniciar sesión</h2>



        {{ Form::text('username','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Ingrese su usuario')) }}

        <br/>

        {{ Form::password('password',array('class'=>'form-control span6', 'placeholder' => 'Ingrese su contraseña')) }}

        <br/>

        {{ Form::submit('Iniciar sesión', ['class' => 'btn btn-primary btn-block']) }}
        
        <br/>

        <a href="/prospectos" class="btn btn-primary btn-block">Registra tu restaurante</a>
        {{ Form::close() }}
    </div>
</body>
</html>