<?php

class Publicidad extends Eloquent
{
	protected $table = "publicidad";

	public function scopeActual()
	{
		date_default_timezone_set('America/Mexico_City');
		$publicidad =DB::table('publicidad')

		->where('hora_inicio','<', date('H:i:s'))

		->where('hora_fin','>', date('H:i:s'))

		->where('dia','=',date('Y-m-d'));
		return $publicidad;
	}

	public function scopepagos($publicidad)
	{
		$publicidad =DB::table('publicidad as p')

		->leftjoin('restaurantes as r',	function($join){
					$join->on('r.id','=','p.id_restaurante');
		})

 		


		->select('r.id as id','r.nombre as nombreR','r.con_telefono as telefono', 'r.con_direccion as direccion', 
			DB::raw('SUM(p.contador) as vistasp'), 
			DB::raw('(r.con_telefono + r.con_direccion + SUM(p.contador)) * .2  as total'))

		->groupBy('r.id');


		return $publicidad;


	}

	public function scopecuentasp($publicidad,$id)
	{
		$publicidad = DB::table('publicidad as p')

		->where('p.id_restaurante','=',$id)

		->select(DB::raw('SUM(p.contador) as vistasp'));



		return $publicidad;

	}
}