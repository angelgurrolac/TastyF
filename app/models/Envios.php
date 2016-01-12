<?php

class Envios extends Eloquent
{
	protected $table = "envios";


	public function scopetodosenvios($envios,$id)
	{
		$envios = DB::table('envios as e')

		->leftjoin('usershd as h',	function($join){
							$join->on('e.id_usuarioHD','=','h.id');
					}) 
		->leftjoin('pedidos as p',	function($join){
							$join->on('e.id_pedido','=','p.id');
					}) 
		->leftjoin('detalles_pedidos as dp',	function($join){
							$join->on('p.id','=','dp.id_pedido');
					}) 
		->leftjoin('productos as ps',	function($join){
							$join->on('dp.id_producto','=','ps.id');
					}) 
		->leftjoin('restaurantes as r',	function($join){
							$join->on('p.id_restaurantes','=','r.id');
					}) 
		->leftjoin('users as u',	function($join){
							$join->on('p.id_usuario','=','u.id');
					}) 
		->where('h.id_restaurante', '=', $id)
		->where('e.estatus', '=', 'pendiente')

		->select('e.id', 'e.foto', 'e.estatus', 'e.id_pedido', 'ps.nombre',
		 'r.nombre', 'r.direccion', 'r.coordenadas', 'p.domicilio', 'p.caracteristica',
		 'p.coordenadas', 'u.nombre', 'u.apellidos');

		return $envios;


	}

	

}