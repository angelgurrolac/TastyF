<?php

class UsuariosHD extends Eloquent
{
	protected $table = "usershd";


	public function scopereg($usershd,$var)
	{
		$usershd =DB::table('usershd as h')

		->select('h.reg_id')

                ->where('h.id_restaurante','=',DB::raw('"'.$var.'"'))
		->orWhere('h.id_restaurante2','=',DB::raw('"'.$var.'"'));

		return $usershd;
	}

	public function scopereg2($usershd,$var)
	{
		$usershd =DB::table('usershd as h')

		->select('h.reg_id')

		->where('h.id_restaurante','=','0')
		->orWhere('h.id_restaurante2','=','0')
		->orWhere('h.id_restaurante','=',DB::raw('"'.$var.'"'))
		->orWhere('h.id_restaurante2','=',DB::raw('"'.$var.'"'));


		return $usershd;
	}
}