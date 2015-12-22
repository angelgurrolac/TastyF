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
}