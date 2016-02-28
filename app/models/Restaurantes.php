<?php

class Restaurantes extends Eloquent
{
	protected $table = "restaurantes";

	public function scopeBuscarR($coincidencias, $texto){
		$coincidencias =DB::table('restaurantes as Restaurantes')

		->where('Restaurantes.nombre','LIKE','%'.$texto.'%')


		->where('Restaurantes.validado','=',' 1')

		->select('*');
			
		return $coincidencias;
	}


	public function scoperestaurantesA($res)
	{

		$res =DB::table('restaurantes as r')

		->leftjoin('users as users',	function($join){
				$join->on('r.id','=','users.id_restaurante');
		})

		->where('users.estatus','=',1)

		->where('r.validado','=',' 1')



		->select('r.nombre','r.imagenR','r.hora_inicio','r.hora_fin');



		return $res;


	}


}