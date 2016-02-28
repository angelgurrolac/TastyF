<?php

class Reservaciones extends Eloquent
{
	protected $table = "reservaciones";

		public function scopeConsulta($query){

			$query =DB::table('reservaciones')
					
				

					->leftjoin('detalles_reservacion as detalles',	function($join){
							$join->on('detalles.id_reservacion','=','reservaciones.id');
					})

					->leftjoin('productos',	function($join){
							$join->on('productos.id','=','detalles.id_producto');
					})		

					->orderBy('detalles.id_reservacion')	

					->select('reservaciones.id','detalles.id_reservacion','reservaciones.mesa','detalles.cantidad', 'productos.nombre');

					return $query;
		

	}
		public function scopeConfirmadas($confirmadas,$id){
		$confirmadas = DB::table('reservaciones')
			->where('estatus','=','confirmada')							
			->where('id_restaurante','=', $id);
		return $confirmadas;
	}
		public function scopeReservadas(){
		$productos =DB::table('reservaciones')
		
		->select(DB::raw('id_restaurante, Count(id_restaurante) as cantidad '))
		
		->groupBy('id_restaurante')
		->orderBy('cantidad','DSC');
	
		return $productos;
	}
	public function scopeRes($confirmadas,$id)
	{
		$confirmadas = DB::table('reservaciones')
			->where('estatus','=','pendiente')							
			->where('id_restaurante','=', $id)
			->orderBy('id','desc')
			->get();
		return $confirmadas;
	}

	public function scopereservacionesA($reservaciones)
	{
		$reservaciones = DB::table('reservaciones as r')

		->leftjoin('users as u',	function($join){
							$join->on('u.id','=','r.id_usuario');
					})	

		->where('r.estatus','=','pagada')

		->select('r.id as id','u.nombre as nombre','u.apellidos as apellidos','u.direccion as direccion','u.correo as correo',
		'r.total as total' ,'r.hora as hora','r.fecha as fecha');



		return $reservaciones;

	}
}
