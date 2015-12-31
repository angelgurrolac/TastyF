<?php

class DetallesPedidos extends Eloquent
{
	protected $table = "detalles_pedidos";


	public function scopeVistos(){
		$productos =DB::table('detalles_pedidos')

		->leftjoin('productos as productos',	function($join){
							$join->on('detalles_pedidos.id_producto','=','productos.id');
					}) 
	    ->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','productos.id_restaurante');
		})

		->select(DB::raw('*','id_producto, SUM(cantidad) as cantidad'))
		->select('*','Restaurantes.nombre as nombreR','Productos.nombre as nombre')
		->where('productos.tipo','=','alimento')
		->groupBy('id_producto')
		->orderBy('cantidad','DESC');
	
		return $productos;
	}
		public function scopeVistos2(){
		$productos =DB::table('detalles_pedidos')
		->leftjoin('productos as productos',	function($join){
							$join->on('detalles_pedidos.id_producto','=','productos.id');
					}) 
		  ->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','productos.id_restaurante');
		})
		->select(DB::raw('*','id_producto, SUM(cantidad) as cantidad '))
		->select('*','Restaurantes.nombre as nombreR','Productos.nombre as nombre')
		->where('productos.tipo','=','bebida')
		->groupBy('id_producto')
		->orderBy('cantidad','DESC');
	
		return $productos;
	}
	public function scopeVistos3(){
		$restaurantes = DB::table('pedidos')
		->leftjoin('restaurantes as restaurantes',	function($join){
							$join->on('pedidos.id_restaurante','=','restaurantes.id');
					}) 
		->select(DB::raw('SUM(pedidos.id) as cantidad '),'restaurantes.id','restaurantes.imagenR as imagenR','restaurantes.nombre')
		
		->groupBy('pedidos.id_restaurante');
		
	
		return $restaurantes;
	}


}