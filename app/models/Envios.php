<?php

class Envios extends Eloquent
{
	protected $table = "envios";

		public function scopeEnviosUser($pedidos,$id)
	{
		 $pedidos =DB::table('envios')

		->leftjoin('pedidos as pedidos',function($join){
							$join->on('envios.id_pedido','=','pedidos.id');
					}) 
		
		->leftjoin('usersHD as usersHD',function($join){
							$join->on('usersHD.id','=','envios.id_usuario');
					}) 

		->leftjoin('users as users',function($join){
							$join->on('users.id','=',$id);
					}) 

 		// ->where('users.id','=',$id)
                 
                 ->select(DB::raw('usersHD.username, users.username, envios.estatus, envios.coordenadas_actuales'));


					return $pedidos;

	}

}