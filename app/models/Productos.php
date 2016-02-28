<?php

class Productos extends Eloquent
{
	protected $table = "productos";

	public function scopeAlimentosUser($alimentos, $hora){
		$alimentos =DB::table('productos as Productos')

		->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','Productos.id_restaurante');
		})
		->leftjoin('users as users',	function($join){
				$join->on('Restaurantes.id','=','users.id_restaurante');
		})

		->where('users.estatus','=',1)
		->where('Restaurantes.validado','=',' 1')

		->where('Productos.hora_inicio','<', $hora)

		->where('Productos.hora_fin','>', $hora)

		->where('Productos.tipo','=', 'alimento')

		->select('*','Productos.nombre as nombreP','Productos.id as idP')

		->orderBy('idP','desc')
		
		
		->get();
		return $alimentos;
	}
	public function scopeCat($id)
	{
		$productos =DB::table('productos as Productos')
		->where('Productos.id','=',$id)
		->leftjoin('categorias as categoria',	function($join){
				$join->on('Productos.id_categoria','=','categoria.id');
		})
		->select('categoria.nombre');
		return $productos;
	}
	public function scopeMisP($alimentos, $id){
		$alimentos =DB::table('productos as Productos')


		->where('Productos.id_restaurante','=', $id)

		->where('Productos.tipo','=', 'alimento');
					
		
		return $alimentos;
	}
	public function scopeMisB($alimentos, $id){
		$alimentos =DB::table('productos as Productos')


		->where('Productos.id_restaurante','=', $id)

		->where('Productos.tipo','=', 'bebida');
					
		
		return $alimentos;
	}
	public function scopePlatilloEsp($alimentos, $hora, $id){
		$alimentos =DB::table('productos as Productos')

		->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','Productos.id_restaurante');
		})
		->where('Restaurantes.validado','=',' 1')

		->where('Productos.id','=', $id)
		
		->where('Productos.hora_inicio','<', $hora)

		->where('Productos.hora_fin','>', $hora)

		->select('*','Productos.nombre as nombreP','Productos.id as idP')

		->get();
		return $alimentos;
	}
		public function scopeMoreAli($alimentos, $hora, $id){
		$alimentos =DB::table('productos as Productos')

		->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','Productos.id_restaurante');
		})		

		->where('Productos.id_restaurante','=', $id)
		
		->where('Productos.hora_inicio','<', $hora)

		->where('Productos.hora_fin','>', $hora)
		
		->select('*','Productos.nombre as nombreP','Productos.id as idProducto')								

		->get();
		return $alimentos;
	}


	public function scopeBebidasUser($alimentos, $hora){
		$alimentos =DB::table('productos as Productos')

		->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','Productos.id_restaurante');

		})

		->leftjoin('users as users',	function($join){
				$join->on('Restaurantes.id','=','users.id_restaurante');
		})

		->where('users.estatus','=',1)

		->where('Restaurantes.validado','=',' 1')

		->where('Productos.hora_inicio','<', $hora)

		->where('Productos.hora_fin','>', $hora)

		->where('Productos.tipo','=', 'bebida')


		
		->get();
		return $alimentos;
	}

	public function scopePorCategoria($productos,$categoria){

		date_default_timezone_set('America/Mexico_City');
		
		$productos = DB::table('productos as Productos')

		->where('Productos.hora_inicio','<', date('H:i:s'))

		->where('Productos.hora_fin','>', date('H:i:s'))

		->where('Productos.id_categoria','=',$categoria)

		->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','Productos.id_restaurante');
		})
		->leftjoin('users as users',	function($join){
				$join->on('Restaurantes.id','=','users.id_restaurante');
		})

		->where('users.estatus','=',1)

		->where('Restaurantes.validado','=','1')
		
		->orderBy('Productos.id_categoria');

	
		
		return $productos;
	}
	public function scopeProductos($productos, $hora){
		$productos =DB::table('productos as Productos')

		->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','Productos.id_restaurante');
		})
		->where('Restaurantes.validado','=',' 1')

		->where('Productos.hora_inicio','<', $hora)

		->where('Productos.hora_fin','>', $hora)

		->select('*','Productos.nombre as nombreP','Productos.id as idP')
		
		
		->get();
		return $productos;
	}

	public function scopealimentos($productos)
	{
		$productos =DB::table('productos as Productos')

		->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','Productos.id_restaurante');
		})

		->where('tipo','=','alimento')
		->select('*','Restaurantes.nombre as nombreR','Productos.nombre as nombre',
			'Productos.id_categoria as categoria1','Productos.id_categoria2 as categoria2',
			'Productos.id as id','Productos.estado as estado');

		return $productos;


	}

		public function scopealimentos2($productos)
	{
		$productos =DB::table('productos as Productos')

		->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','Productos.id_restaurante');
		})

		->where('tipo','=','alimento')
		->select('*','Restaurantes.nombre as nombreR','Productos.nombre as nombre')

		->orderBy('Productos.costo_unitario','DESC');

		return $productos;


	}

	public function scopebebidas($productos)
	{
		$productos =DB::table('productos as Productos')

		->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','Productos.id_restaurante');
		})

		->where('tipo','=','bebida')
		->select('*','Restaurantes.nombre as nombreR','Productos.nombre as nombre',
			'Productos.id_categoria as categoria1','Productos.id_categoria2 as categoria2',
			'Productos.id as id','Productos.estado as estado');

		return $productos;


	}


		public function scopebebidas2($productos)
	{
		$productos =DB::table('productos as Productos')

		->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','Productos.id_restaurante');
		})

		->where('tipo','=','bebida')
		->select('*','Restaurantes.nombre as nombreR','Productos.nombre as nombre')

		->orderBy('Productos.costo_unitario','DESC');

		return $productos;


	}

		public function scopeBuscar($coincidencias, $texto, $hora){
		$coincidencias =DB::table('productos as Productos')

		->where('Productos.nombre','LIKE','%'.$texto.'%')

		->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','Productos.id_restaurante');
		})

		->where('Restaurantes.validado','=',' 1')

		->where('Productos.hora_inicio','<', $hora)

		->where('Productos.hora_fin','>', $hora)


				

		->select('*','Productos.nombre as nombreP','Productos.id as idP');
			
		return $coincidencias;
	}
	public function scopeBuscarA($coincidencias, $texto, $hora){
		$coincidencias =DB::table('productos as Productos')

		->where('Productos.nombre','LIKE','%'.$texto.'%')

		->leftjoin('restaurantes as Restaurantes',	function($join){
				$join->on('Restaurantes.id','=','Productos.id_restaurante');
		})

		->where('Restaurantes.validado','=',' 1')

		->where('Productos.hora_inicio','<', $hora)

		->where('Productos.hora_fin','>', $hora)
		
		->where('Productos.tipo','=', 'alimento')
				

		->select('*','Productos.nombre as nombreP','Productos.id as idP');
			
		return $coincidencias;
	}
	public function scopeRest(){
		$productos =DB::table('productos')
		
		->select(DB::raw('id_restaurante, SUM(id_restaurante) as cantidad '))
		
		->groupBy('id_restaurante')
		->orderBy('cantidad','DSC');
	
		return $productos;
	}

}