<?php

class Usuarios extends Eloquent
{
	protected $table = "users";

	public function scopeUsuarios($usuarios){
		$usuarios =DB::table('users')
		->leftjoin('pedidos as pedidos',	function($join){
							$join->on('pedidos.id_usuario','=','users.id');
					}) 
		
		
		->select('*', DB::raw('count(pedidos.id) as total'))
		->groupBy('users.id')
		->get();
		return $usuarios;
	}

	
}