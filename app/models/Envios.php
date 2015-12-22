<?php

class Envios extends Eloquent
{
	protected $table = "envios";


	public function scopeUltEnvio($resultado,$id_usuario){
		 $envios =DB::table('envios')

		->where('envios.id_usuario','=',$id)

		->where('envios.id','=', $envio)

		->leftjoin('pedidos as pedidos',	function($join){
							$join->on('pedidos.id','=','envios.id_pedido');
					})
		->leftjoin('users as users',	function($join){
							$join->on('users.id','=','pedidos.id_usuario');
					})
		->leftjoin('users as users',	function($join){
							$join->on('users.id','=','pedidos.id_usuario');
					})

	
		->select('envios.id','detalles.id as id_detalle','detalles.id_producto','productos.nombre');

		

		return $ultimo;
	}

}