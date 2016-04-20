<?php

class Restaurantes extends Eloquent
{
	protected $table = "restaurantes";

	public function scopeBuscarR($coincidencias, $texto, $hora){
		$coincidencias =DB::table('restaurantes as Restaurantes')

		->where('Restaurantes.nombre','LIKE','%'.$texto.'%')


		->where('Restaurantes.validado','=',' 1')

		->where('Restaurantes.hora_inicio','<', $hora)

		->where('Restaurantes.hora_fin','>', $hora)

		->leftjoin('users as users',	function($join){
				$join->on('Restaurantes.id','=','users.id_restaurante');
		})

		->where('users.estatus','=',1)

		
		->select('Restaurantes.id','Restaurantes.nombre','Restaurantes.imagenR','Restaurantes.hora_inicio','Restaurantes.hora_fin');
			
		return $coincidencias;
	}


	public function scoperestaurantesA($res,$hora)
	{

		$res =DB::table('restaurantes as r')

		->leftjoin('users as users',	function($join){
				$join->on('r.id','=','users.id_restaurante');
		})

		->where('r.hora_inicio','<', $hora)

		->where('r.hora_fin','>', $hora)

		->where('users.estatus','=',1)

		->where('r.validado','=',' 1')



		->select('r.id','r.nombre','r.imagenR','r.hora_inicio','r.hora_fin','r.coordenadas','r.direccion');



		return $res;


	}


}