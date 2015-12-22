<?php

class SessionController extends \BaseController {

	public function getSession(){
		$username = Input::get('username');
		$password = Input::get('password');		
		if (Auth::attempt(['username' => $username, 'password' => $password]))
		{
            // Aquí también pueden devolver una llamada a otro controlador o
            // devolver una vista
			$nivel=Auth::user()->id_nivel;
			
			
			
			
			if ($nivel=='1') {
				return Redirect::action('AdminController@pedidos');
			}else{
				if ($nivel=='2') {
					Session::put('nombre',Restaurantes::find(Auth::user()->id_restaurante)->nombre);
					Session::put('id',Auth::user()->id);
					return Redirect::action('RestauranteController@index');
				}
			}
		}
		return Redirect::back()->with('error_message', 'Datos incorrectos, vuelve a intentarlo.');
	}
	public function logout(){
		Auth::logout();
	
		Session::forget('nombre');
		Session::forget('id');		
		return Redirect::to('/');

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//vista para nueva empresa
	public function index()
	{
		
		if (Auth::check()) {
			$nivel=Auth::user()->id_nivel;
	
			if ($nivel=='1') {
				return Redirect::action('AdminController@pedidos');
			}else{
				if ($nivel=='2') {
					return Redirect::action('RestauranteController@index');
				}
			}
		}else{
			return View::make('login');
		}
	}


}
