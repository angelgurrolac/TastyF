<?php

class RegistroController extends BaseController {

	public function registrar()
	{
		$codigo = Input::get('codigo_postal');
		if ($codigo > 34398 || $codigo < 34000)
		{
			return Response::json('0');		
		}else{


		$reg_id = Input::get('reg_id');
		$user = New User();
		$user->username = Input::get('correo');
		$user->password = Hash::make(Input::get('password'));
		$user->id_nivel = 3;
		$user->nombre = Input::get('nombre');
		$user->apellidos = Input::get('apellidos');		
		$user->correo = Input::get('correo');
		$user->edad = Input::get('edad');
		$user->sexo = Input::get('sexo');
		$user->reg_id = $reg_id;
		$user->codigo_postal = Input::get('codigo_postal');
		$user->save();
		return Response::json('1');		
		}
	}
	public function registrarM()
	{
		$codigo = Input::get('codigo_postal');
		if ($codigo > 34398 || $codigo < 34000)
		{
			return Response::json('0');		
		}else{


		$reg_id = Input::get('reg_id');
		$user = New User();
		$user->username = Input::get('correo');
		$user->password = Hash::make(Input::get('password'));
		$user->id_nivel = 4;
		$user->nombre = Input::get('nombre');
		$user->apellidos = Input::get('apellidos');		
		$user->correo = Input::get('correo');
		$user->edad = Input::get('edad');
		$user->sexo = Input::get('sexo');
		$user->reg_id = $reg_id;
		$user->codigo_postal = Input::get('codigo_postal');
		$user->save();
		return Response::json('1',$user->username);		
		}
	}
	public function index()
	{
		return View::make('prospectos');

	}
	public function create()
	{
		$rules = array(			
			'nombre'	       => 'required|unique:restaurantes,nombre',			
			'telefono'			=> 'required',
			'direccion'				=> 'required',
			'hora_inicio'	   => 'required',
			'hora_fin'		   => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

        // process the login
		if ($validator->fails()) {

			return Redirect::to('/prospectos')->withErrors($validator)->withInput(Input::all());
		} else {
			$restaurante=new Restaurantes;			
			$image = Input::file('imgFile');
	
			
		
			if($image!=null){
			
				$name_image = $image -> getClientOriginalName();	
				$image_final = 'restaurantes/' .$name_image;
				$restaurante->img_ref = $image_final;
				$image -> move('restaurantes', $name_image );
			}
			$entrega = Input::get('domicilio');
			if($entrega==1){
				$restaurante->domicilio = 1; 
			}
			else
			{
				$restaurante->domicilio = 0;
			}
			$restaurante->nombre 	=Input::get('nombre');
			$restaurante->telefono=Input::get('telefono');
			$restaurante->direccion=Input::get('direccion');
			$restaurante->hora_inicio=Input::get('hora_inicio');
			$restaurante->hora_fin=Input::get('hora_fin');
		
			
			$restaurante->save();


			Session::flash('message', 'Tu solicitud ha sido enviada espera a que te visite el administrador');

			return Redirect::to('/login');

		}
	}
}