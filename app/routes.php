<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','SessionController@index');
Route::get('/login','SessionController@index');
Route::post('/login','SessionController@getSession');
Route::get('/logout','SessionController@logout');
Route::post('/registro','RegistroController@registrar');
Route::post('/registroM','RegistroController@registrarM');
Route::get('/prospectos','RegistroController@index');
Route::post('/prospectos','RegistroController@create');

Route::post('users/login', function()
{
	$remember = Input::get('remember');
		
	$credentials = array(
		'username' => Input::get('username'), 
		'password' => Input::get('password')
		
	);

	if (Auth::attempt( $credentials ))
	{



		$usuario = User::where('username','=',Input::get('username'))->first();
		$usuario->estatus = 1;
		$usuario->reg_id = Input::get('reg_id');
		$usuario->save();
		return Response::json('Logged in');
	 	
	}else{
		return Response::json('Error logging in');
		
    }
});
Route::post('users/loginM', function()
{
	$remember = Input::get('remember');
		
	$credentials = array(
		'username' => Input::get('username'), 
		'password' => Input::get('password')
		
	);

	if (Auth::attempt( $credentials ))
	{



		$usuario = User::where('username','=',Input::get('username'))->first();
		$usuario->estatus = 1;
		$usuario->save();
		return Response::json('Logged in');
	 	
	}else{
		return Response::json('Error logging in');
		
    }
});


Route::post('/users/uu', 'UserController@UserMas');
Route::post('/users/pedidos', 'UserController@pedidos');
Route::post('/users/productos', 'UserController@productos');
Route::post('/users/reservaciones', 'UserController@reservaciones');
Route::post('/users/tarjeta', 'UserController@tarjeta');
Route::post('/users/alimentos','UserController@alimentos');
Route::post('/users/bebidas','UserController@bebidas');
Route::post('/users/platilloEsp','UserController@platilloEsp');
Route::post('/users/addAlim','UserController@addPlatillo');
Route::post('/users/restaurantes','UserController@restaurantes');
Route::post('/users/allCat','UserController@allCat');
Route::post('/users/factura','UserController@factura');
Route::post('/users/categorias','UserController@categorias');
Route::post('/users/tarjetas','UserController@tarjetas');
Route::post('/users/modTarjetas','UserController@modTarjetas');
Route::post('/users/modFacturas','UserController@modFacturas');
Route::post('/users/valoracion','UserController@valoracion');
Route::post('/users/tarjetasP','UserController@tarjetasP');
Route::post('/users/facturasP','UserController@facturasP');
Route::post('/users/chaPass','UserController@chaPass');
Route::post('/users/delTarjeta','UserController@delTarjeta');
Route::post('/users/delFactura','UserController@delFactura');
Route::post('/users/ultPedido','UserController@ultPedido');
Route::post('/users/buscar','UserController@buscar');
Route::post('/users/buscarA','UserController@buscarA');
Route::post('/users/buscarR','UserController@buscarR');
Route::post('/users/facturarR','UserController@facturarR');
Route::post('/users/estatus','UserController@estatus');
Route::post('/users/borrarP','UserController@borrarP');
Route::post('/users/estatusR','UserController@estatusR');
Route::post('/users/borrarR','UserController@borrarR');
Route::post('/users/con_direccion','UserController@aumentarD');
Route::post('/users/con_telefono','UserController@aumentarT');
Route::post('/users/con_publicidad','UserController@aumentarP');
Route::post('/users/cerrar','UserController@cerrar');
Route::post('/users/efectivo','UserController@efectivo');
Route::resource('/users/payment', 'UserController@payment');
Route::resource('/users/paymentR', 'UserController@paymentR');
Route::resource('/users/publicidad', 'UserController@getPubli');
Route::post('/users/Enviada','RepartidorController@Enviada');
// Route::post('/users/getEnvio','RepartidorController@getEnvio');
Route::post('/users/enviarA','RepartidorController@enviarA');
Route::post('/users/marcarE','RepartidorController@marcarE');
Route::post('/users/miPedido','UserController@miPedido');
Route::post('/users/entregado','UserController@entregado');
Route::post('/users/estatusPedido','UserController@estatuspedido');
Route::post('/users/ultphd','UserController@ultphd');
Route::post('/users/envres','UserController@envres');
Route::post('/users/allen','UserController@allen');
Route::post('/users/ultEnv','UserController@ultEnv');
Route::post('/users/Pednoaten','UserController@Pednoaten');
Route::post('/users/PedPen','UserController@PedPen');



Route::group(array('before' => array('auth', 'restaurante')), function()
{
Route::get('/restaurante/hogar','RestauranteController@index');
Route::get('/restaurante/alimentos','RestauranteController@alimentos');
Route::get('/restaurante/bebidas','RestauranteController@bebidas');
Route::get('/restaurante/pedidos','RestauranteController@pedidos');
Route::get('/restaurante/declinadas','RestauranteController@declinadas');
Route::get('/restaurante/informes','RestauranteController@informes');
Route::get('/restaurante/datos','RestauranteController@datos');
Route::post('/restaurante/datos','RestauranteController@guardarTarjeta');
Route::post('/restaurante/imgPerfil','RestauranteController@imgPerfil');
Route::get('/restaurante/agregarA','RestauranteController@agregarA');
Route::get('/restaurante/agregarB','RestauranteController@agregarb');
Route::post('/restaurante/addA','RestauranteController@addA');
Route::post('/restaurante/addB','RestauranteController@addB');
Route::post('/restaurante/editar','RestauranteController@editar');
Route::post('/restaurante/editarB','RestauranteController@editarB');
Route::post('/restaurante/saveChanges','RestauranteController@saveChanges');
Route::post('/restaurante/saveChanges2','RestauranteController@saveChanges2');
Route::post('condec','RestauranteController@hogarPedidos');
Route::post('rescon','RestauranteController@rescon');
Route::get('/restaurante/estadisticas','RestauranteController@estadisticas');
Route::get('/restaurante/facturas','RestauranteController@facturas');
Route::get('/restaurante/{id}/factura','RestauranteController@factura');
Route::get('/restaurante/noAtendidas','RestauranteController@noAtendidas');
Route::post('/restaurante/facturaM','RestauranteController@facturaM');
Route::post('/restaurante/facturacion','RestauranteController@facturacion');
Route::post('/restaurante/enviarhd','RestauranteController@enviarhd');
Route::post('/restaurante/finanzas','RestauranteController@finanzas');
Route::get('/restaurante/pedenviados','RestauranteController@pedenviados');
});

Route::group(array('before' => array('auth', 'admin')), function()
{
Route::get('/admin/pedidos','AdminController@pedidos');
Route::get('/admin/alimentos','AdminController@alimentos');
Route::get('admin/bebidas','AdminController@bebidas');
Route::get('/admin/restaurantes','AdminController@restaurantes');
Route::get('/admin/usuarios','AdminController@usuarios');
Route::get('/admin/usuariostotales','AdminController@usuariosTotales');
Route::get('/admin/informes','AdminController@informes');
Route::get('/admin/estadisticas','AdminController@estadisticas');
Route::get('/admin/publicidad','AdminController@publicidad');
Route::get('/admin/candidatos','AdminController@candidatos');
Route::get('/admin/{id}/candidato','AdminController@candidato');
Route::post('/admin/validar','AdminController@validar');
Route::post('/admin/borrar_candidato','AdminController@borrar_candidato');
Route::get('/admin/categorias','AdminController@categorias');
Route::post('/admin/activar','AdminController@activar');
Route::post('/admin/publicidad','AdminController@publicar');
Route::get('/admin/vistos','AdminController@vistos');
Route::get('/admin/maspedidos','AdminController@maspedidos');
Route::get('/admin/precios','AdminController@precios');
Route::get('/admin/porcategoria','AdminController@porcategoria');
Route::get('/admin/vistos2','AdminController@vistos2');
Route::get('/admin/maspedidos2','AdminController@maspedidos2');
Route::get('/admin/precios2','AdminController@precios2');
Route::get('/admin/porcategoria2','AdminController@porcategoria2');
Route::get('/admin/vistos3','AdminController@vistos3');
Route::get('/admin/ordenes','AdminController@ordenes');
Route::get('/admin/reservaciones','AdminController@reservaciones');
Route::get('/admin/ventas','AdminController@ventas');
Route::get('/admin/productos','AdminController@productos');
Route::get('/admin/op','AdminController@op');
Route::post('/admin/editar','AdminController@editar');
Route::post('/admin/saveChanges','AdminController@saveChanges');
Route::post('/admin/editarA','AdminController@editarA');
Route::post('/admin/editarB','AdminController@editarB');
Route::post('/admin/guardarB','AdminController@guardarB');
Route::post('/admin/guardarA','AdminController@guardarA');
Route::get('/admin/agregarC','AdminController@agregarc');
Route::post('/admin/nuevac','AdminController@nuevac');
Route::post('/admin/editarC','AdminController@editarc');
Route::post('/admin/savec','AdminController@savec');
Route::post('/admin/finanzas','AdminController@finanzas');
Route::post('/admin/finanzasPu','AdminController@finanzasPu');






});
