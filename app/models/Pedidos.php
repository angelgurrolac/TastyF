<?php

class Pedidos extends Eloquent
{
	protected $table = "pedidos";

	public function scopePedidos($pedidos,$id){
		$pedidos =DB::table('pedidos')
		->leftjoin('restaurantes as restaurantes',	function($join){
							$join->on('restaurantes.id','=','pedidos.id_restaurante');
					}) 
		->leftjoin('users as users',	function($join){
							$join->on('users.id','=','pedidos.id_usuario');
					}) 
		->where('pedidos.id_restaurante','=',$id)
		->where('pedidos.estatus','=','pendiente')
		->select('*','pedidos.id as id','restaurantes.id as idR','restaurantes.nombre','users.nombre as nombreUsuario','pedidos.domicilio as domicilioP','pedidos.caracteristica')
		->get();
		return $pedidos;
	}
	public function scopePedidosDos($pedidos,$id){
		$pedidos =DB::table('pedidos')
		->leftjoin('restaurantes as restaurantes',	function($join){
							$join->on('restaurantes.id','=','pedidos.id_restaurante');
					}) 
		->leftjoin('users as users',	function($join){
							$join->on('users.id','=','pedidos.id_usuario');
					}) 
		->where('pedidos.id_restaurante','=',$id)
		
		->select('pedidos.total','pedidos.estatus','pedidos.id as id','restaurantes.id as idR','restaurantes.nombre','users.nombre as nombreUsuario','pedidos.domicilio as domicilioP','pedidos.caracteristica')
		->get();
		return $pedidos;
	}
		public function scopePedidosTres($pedidos,$id){
		$pedidos =DB::table('pedidos')

		->where('pedidos.estatus','=','declinada')
		->leftjoin('restaurantes as restaurantes',	function($join){
							$join->on('restaurantes.id','=','pedidos.id_restaurante');
					}) 
		->leftjoin('users as users',	function($join){
							$join->on('users.id','=','pedidos.id_usuario');
					}) 
		->where('pedidos.id_restaurante','=',$id)
		
		->select('pedidos.total','pedidos.estatus','pedidos.id as id','restaurantes.id as idR','restaurantes.nombre','users.nombre as nombreUsuario','pedidos.domicilio as domicilioP','pedidos.caracteristica')
		->get();
		return $pedidos;
	}
			public function scopePedidosCuatro($pedidos,$id){
		$pedidos =DB::table('pedidos')

		->where('pedidos.estatus','=','noAtendida')
		->leftjoin('restaurantes as restaurantes',	function($join){
							$join->on('restaurantes.id','=','pedidos.id_restaurante');
					}) 
		->leftjoin('users as users',	function($join){
							$join->on('users.id','=','pedidos.id_usuario');
					}) 
		->where('pedidos.id_restaurante','=',$id)
		
		->select('pedidos.total','pedidos.estatus','pedidos.id as id','restaurantes.id as idR','restaurantes.nombre','users.nombre as nombreUsuario','pedidos.domicilio as domicilioP','pedidos.caracteristica')
		->get();
		return $pedidos;
	}
		public function scopeAdmin(){
		$pedidos =DB::table('pedidos')
		->leftjoin('restaurantes as restaurantes',	function($join){
							$join->on('restaurantes.id','=','pedidos.id_restaurante');
					}) 		
		->select('*','restaurantes.nombre','pedidos.id as id')
		->get();
		return $pedidos;
	}


	public function scopePagadas($pagadas,$id){
		$pagadas = DB::table('pedidos')
			->where('estatus','=','pagada')							
			->where('id_restaurante','=', $id)
			->where(DB::raw('LEFT(created_at,10)'), '=', DB::raw('CURDATE()'));
		
		return $pagadas;
	}
	public function scopePagadasSemana($pagadas,$id){
		$pagadas = DB::table('pedidos')
			->where('estatus','=','pagada')							
			->where('id_restaurante','=', $id)
			->where('created_at' , 'BETWEEN' ,  
			DB::raw('CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY AND 
			CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY ')
			);
		
		return $pagadas;
	}
	public function scopePagadasMes($pagadas,$id){
		$pagadas = DB::table('pedidos')
			->where('estatus','=','pagada')							
			->where('id_restaurante','=', $id)
			->where('created_at' , 'BETWEEN' ,  
			DB::raw('DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, "%Y-%m-01") AND 
			LAST_DAY(CURRENT_DATE - INTERVAL 1 MONTH) ')
			);
		
		return $pagadas;
	}



		public function scopePagadasAdmin($pagadas){
		$pagadas = DB::table('pedidos')
			->where('estatus','=','pagada')										
			->where(DB::raw('LEFT(pedidos.created_at,10)'), '=', DB::raw('CURDATE()'));

		return $pagadas;
	}


		public function scopePagadasAdminMes($pagadas){
		$pagadas = DB::table('pedidos')
			->where('estatus','=','pagada')										
			// ->where(DB::raw('LEFT(pedidos.created_at,10)'), '=', DB::raw('CURDATE()'));
			->where('pedidos.created_at' , 'BETWEEN' ,  
			DB::raw('DATE_FORMAT(CURRENT_DATE - INTERVAL 1 MONTH, "%Y-%m-01") AND 
			LAST_DAY(CURRENT_DATE - INTERVAL 1 MONTH) ')
			);
		return $pagadas;
	}

	public function scopePagadasAdminSemana($pagadas){
		$pagadas = DB::table('pedidos')
			->where('estatus','=','pagada')										
			->where('pedidos.created_at' , 'BETWEEN' ,  
			DB::raw('CURDATE() - INTERVAL DAYOFWEEK(CURDATE())+6 DAY AND 
			CURDATE() - INTERVAL DAYOFWEEK(CURDATE())-1 DAY ')
			);
		return $pagadas;
	}



	public function scopeVendidos($id)
	{
		$pagadas = DB::table('pedidos')
		->where('pedidos.id_restaurante','=',$id)	
		->leftjoin('detalles_pedidos as detalles',	function($join){
							$join->on('detalles.id_pedido','=','pedidos.id');
					}) 
		->get();
		return $pagadas;
	}	

	public function scopeConsulta($query){

			$query =DB::table('pedidos')
					
					->where('pedidos.estatus','!=','declinada')

					->leftjoin('detalles_pedidos as detalles',	function($join){
							$join->on('detalles.id_pedido','=','pedidos.id');
					})

					->leftjoin('productos',	function($join){
							$join->on('productos.id','=','detalles.id_producto');
					})		

					->orderBy('detalles.id_pedido')	

					->select('detalles.id_pedido','detalles.cantidad', 'productos.nombre', 'productos.precio', 'productos.iva','productos.costo_unitario');

					return $query;
		
	}
		public function scopeConsultaDos($query2){

			$query2 =DB::table('pedidos')
					
					

					->leftjoin('detalles_pedidos as detalles',	function($join){
							$join->on('detalles.id_pedido','=','pedidos.id');
					})

					->leftjoin('productos',	function($join){
							$join->on('productos.id','=','detalles.id_producto');
					})		

					->orderBy('detalles.id_pedido')	

					->select('detalles.id_pedido','detalles.cantidad', 'productos.nombre', 'productos.precio', 'productos.iva','productos.costo_unitario');

					return $query2;
		
	}
	public function scopeUserPagado($pagado,$id){
		$pagado = DB::table('pedidos')
			->where('estatus','=','pagada')							
			->where('id_usuario','=', $id)
			->orderBy('created_at', 'desc');
		return $pagado;
	}

	public function scopeConfirmada($pagado,$id){
		$confirma = DB::table('pedidos')
			->where('estatus','=','confirmada')							
			->where('id_usuario','=', $id)
			->orderBy('created_at', 'desc');
		return $confirma;
	}


	public function scopeUltPedido($ultimo,$id,$pedido){
		$ultimo =DB::table('pedidos')
		->where('pedidos.id_usuario','=',$id)

		->where('pedidos.estatus','=','pagada')

		->where('pedidos.id','=', $pedido)

		->leftjoin('detalles_pedidos as detalles',	function($join){
							$join->on('detalles.id_pedido','=','pedidos.id');
					})
		->leftjoin('productos',	function($join){
							$join->on('detalles.id_producto','=','productos.id');
					})

	
		->select('pedidos.id','detalles.id as id_detalle','detalles.id_producto','productos.nombre');

		

		return $ultimo;
	}




	public function scopeUltPedido2($ultimo,$id,$pedido){
		$ultimo =DB::table('pedidos')
		->where('pedidos.id_usuario','=',$id)

		->where('pedidos.estatus','=','confirmada
			')

		->where('pedidos.id','=', $pedido)

		->leftjoin('detalles_pedidos as detalles',	function($join){
							$join->on('detalles.id_pedido','=','pedidos.id');
					})
		->leftjoin('productos',	function($join){
							$join->on('detalles.id_producto','=','productos.id');
					})

	
		->select('pedidos.id','detalles.id as id_detalle','detalles.id_producto','productos.nombre');

		

		return $ultimo;
	}




		public function scopePedidas(){
		$productos =DB::table('pedidos')
		
		->select(DB::raw('id_restaurante, Count(id_restaurante) as cantidad2'))
		
		->groupBy('id_restaurante')
		->orderBy('cantidad2','DESC');
	
		return $productos;
	}

		public function scopeTotal(){
		$productos =DB::table('pedidos')
		
		->select(DB::raw('id_restaurante, SUM(total) as cantidad '))
		
		->groupBy('id_restaurante')
		->orderBy('cantidad','DSC');
	
		return $productos;
	}
	public function scopeOP(){
		$productos =DB::table('pedidos')
		
		->select(DB::raw('id_restaurante, AVG(total) as cantidad '))
		
		->groupBy('id_restaurante')
		->orderBy('cantidad','DSC');
	
		return $productos;
	}
		public function scopeestadisticasT($restaurantes)
	{
		$restaurantes =DB::table('pedidos as Pedidos')
		
		->where('Pedidos.estatus','=','pagada')
		->where('Pedidos.tipo','=','tarjeta')
		->where('Pedidos.pagoR','=', 0)
		->where('Pedidos.pagoR2','=', 0)


		->leftjoin('restaurantes as Restaurantes',	function($join){
					$join->on('Restaurantes.id','=','Pedidos.id_restaurante');
		})

				
		->select('Pedidos.created_at as fecha',DB::raw('DAYNAME(Pedidos.created_at) as dia'),
			  'Pedidos.id_restaurante as id',
			  'Pedidos.id as idp',
			  'Restaurantes.nombre as Nombre',
			  'Restaurantes.cuenta as cuenta',
			  'Pedidos.tipo as tipo',
			  DB::raw('COUNT(Pedidos.id_restaurante = Restaurantes.id) as pedidos'),
 			  DB::raw('SUM(Pedidos.total) as total'),
			  DB::raw('ROUND(AVG(Pedidos.total),2) as promedio'),
			  DB::raw('(SUM(Pedidos.total) * .12) as comision'),
			  DB::raw('(SUM(Pedidos.total) - (SUM(Pedidos.total) * .15)) as totalF'))
	

		->groupBy(DB::raw('LEFT(Pedidos.created_at,10), Restaurantes.id'))


		->where(DB::raw('LEFT(Pedidos.created_at,10) = CURDATE()
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 1 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 2 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 3 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 4 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 5 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 6 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 7 DAY)
      OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 8 DAY)
      OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 9 DAY)
      OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 10 DAY)'));
		
		
		return $restaurantes;
	}




	public function scopeestadisticasRestaurante($restaurantes,$id)
	{
		$restaurantes =DB::table('pedidos as Pedidos')
		
		->where('Pedidos.estatus','=','pagada')
		->where('Pedidos.tipo','=','tarjeta')
		->where('Pedidos.id_restaurante','=',$id)
		->where('Pedidos.pagoR','=', 0)
		->where('Pedidos.pagoR2','=', 0)

		->where(DB::raw('LEFT(Pedidos.created_at,10) = CURDATE()
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 1 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 2 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 3 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 4 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 5 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 6 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 7 DAY)
      OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 8 DAY)
      OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 9 DAY)
      OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 10 DAY)'))
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 1 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 2 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 3 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 4 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 5 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 6 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 7 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 8 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 9 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 10 DAY)'))


		// ->leftjoin('restaurantes as Restaurantes',	function($join) use($id) {
		// 			$join->on('Pedidos.id_restaurante','=',DB::raw('"'.$id.'"'));
		// })

				
		->select('Pedidos.created_at as fecha',DB::raw('DAYNAME(Pedidos.created_at) as dia'),
			  'Pedidos.id_restaurante as id',
			  'Pedidos.id as idp',
			  'Pedidos.tipo as tipo',
			  DB::raw('COUNT(Pedidos.id_restaurante = '.$id.') as pedidos'),
 			  DB::raw('SUM(Pedidos.total) as total'),
			  DB::raw('ROUND(AVG(Pedidos.total),2) as promedio'),
			  DB::raw('(SUM(Pedidos.total) * .12) as comision'),
			  DB::raw('(SUM(Pedidos.total) - (SUM(Pedidos.total) * .15)) as totalF'))
	
	

		->groupBy(DB::raw('LEFT(Pedidos.created_at,10), Pedidos.id_restaurante'));


		
		
		
		return $restaurantes;
	}


	public function scopeestadisticasRestauranteE($restaurantes,$id)
	{
		$restaurantes =DB::table('pedidos as Pedidos')
		
		->where('Pedidos.estatus','=','pagada')
		->where('Pedidos.tipo','=','efectivo')
		->where('Pedidos.id_restaurante','=',$id)
		->where('Pedidos.pagoR','=', 0)
		->where('Pedidos.pagoR2','=', 0)

		->where(DB::raw('LEFT(Pedidos.created_at,10) = CURDATE()
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 1 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 2 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 3 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 4 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 5 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 6 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 7 DAY)'))
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 1 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 2 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 3 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 4 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 5 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 6 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 7 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 8 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 9 DAY)'), 'OR',
		// DB::raw('LEFT(Pedidos.created_at,10)'), '=', DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 10 DAY)'))


		// ->leftjoin('restaurantes as Restaurantes',	function($join) use($id) {
		// 			$join->on('Pedidos.id_restaurante','=',DB::raw('"'.$id.'"'));
		// })

				
		->select('Pedidos.created_at as fecha',DB::raw('DAYNAME(Pedidos.created_at) as dia'),
			  'Pedidos.id_restaurante as id',
			  'Pedidos.id as idp',
			  'Pedidos.tipo as tipo',
			  DB::raw('COUNT(Pedidos.id_restaurante = '.$id.') as pedidos'),
 			  DB::raw('SUM(Pedidos.total) as total'),
			  DB::raw('ROUND(AVG(Pedidos.total),2) as promedio'),
			  DB::raw('(SUM(Pedidos.total) * .12) as comision'),
			  DB::raw('(SUM(Pedidos.total) - (SUM(Pedidos.total) * .15)) as totalF'))
	
	

		->groupBy(DB::raw('Pedidos.id_restaurante'));


		
		
		
		return $restaurantes;
	}






	public function scopeestadisticasE($restaurantes)
	{
		$restaurantes =DB::table('pedidos as Pedidos')
		
		->where('Pedidos.estatus','LIKE','pagada')
		->where('Pedidos.tipo','LIKE','efectivo')
		->where('Pedidos.pagoR','=', 0)
		->where('Pedidos.pagoR2','=', 0)


		->leftjoin('restaurantes as Restaurantes',	function($join){
					$join->on('Restaurantes.id','=','Pedidos.id_restaurante');
		})

				
		->select(DB::raw('DAYNAME(CURDATE()) as hoy'),DB::raw('DATE_SUB(CONCAT(CURDATE()), INTERVAL 7 DAY) as final'),
			  'Pedidos.id_restaurante as id',
			  'Restaurantes.nombre as Nombre',
			  'Restaurantes.cuenta as cuenta',
			  'Pedidos.tipo as tipo',
			  DB::raw('COUNT(Pedidos.id_restaurante = Restaurantes.id) as pedidos'),
 			  DB::raw('SUM(Pedidos.total) as total'),
			  DB::raw('ROUND(AVG(Pedidos.total),2) as promedio'),
			  DB::raw('(SUM(Pedidos.total) * .12) as comision'),
			  DB::raw('(SUM(Pedidos.total) - (SUM(Pedidos.total) * .15)) as totalF'))
	

		->groupBy('Restaurantes.id')


		->where(DB::raw('LEFT(Pedidos.created_at,10) = CURDATE()
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 1 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 2 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 3 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 4 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 5 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 6 DAY)
     OR LEFT(Pedidos.created_at,10) = DATE_SUB(CONCAT(CURDATE()), INTERVAL 7 DAY)'));
		
		return $restaurantes;
	}


			public function scopeEstadisticasDos($id)
	{
		$restaurantes =DB::table('pedidos as Pedidos')
		
		->where('Pedidos.estatus','LIKE','pagada')
		->where('Pedidos.id_restaurante','=',$id)


		->leftjoin('restaurantes as Restaurantes',	function($join){
					$join->on('Restaurantes.id','=','Pedidos.id_restaurante');
		})

				
		->select(DB::raw('Pedidos.id_restaurante'),
			  DB::raw('SUM(Pedidos.total) as total'),

			 'Restaurantes.nombre',			  
			  DB::raw('AVG(Pedidos.total) as promedio'),
			  'Restaurantes.pagadas as ordenes',
			  'Restaurantes.confirmadas as reservaciones',
			  DB::raw('(Restaurantes.con_telefono + Restaurantes.con_direccion) as consultas'),
			  DB::raw('(Pedidos.total * .15) as comision'),
			  DB::raw('(SUM(Pedidos.total) - (Pedidos.total * .15) - (Restaurantes.confirmadas * 5) - (Restaurantes.con_telefono + Restaurantes.con_direccion)) as totalF,Restaurantes.cuenta'))
	

		->groupBy('Pedidos.id_restaurante');
		
		
		return $restaurantes;
	}

	public function scopeCantidad()
	{
				$restaurantes =DB::table('pedidos as Pedidos')
		
				->where('Pedidos.estatus','LIKE','pagada')


					->leftjoin('detalles_pedidos as Detalles',	function($join){
								$join->on('Detalles.id_pedido','=','Pedidos.id');
					})

				->select(DB::raw('SUM(Detalles.cantidad)as cantidad'),'Pedidos.id_restaurante')
					->groupBy('Pedidos.id_restaurante');
					return $restaurantes;

	}
	public function scopeEfectivo($id)
	{
			$pedidos =DB::table('pedidos as Pedidos')

				->where('Pedidos.estatus','LIKE','pagada');
				
	}
		public function scopeUserMas(){
		 $pedidos =DB::table('pedidos as Pedidos')


		->leftjoin('users as users',function($join){
							$join->on('users.id','=','Pedidos.id_usuario');
					}) 


                 ->select(DB::raw('SUM(Pedidos.total)as total1'),'users.nombre','users.apellidos')



		 			->groupBy('Pedidos.id_usuario')
					->orderBy('total1', 'desc');

					return $pedidos;
		

	}




		public function scopeEnviosUser($pedidos,$usuario)
	{    

		  $pedidos =DB::table('pedidos as p')
		  ->where('p.estatus', '=', 'pagada')
		  ->where('e.estatus', '=', 'confirmado')

		  // ->where('p.id_usuario', '=', $id)
		  
		 ->leftjoin('users as u',function($join) use($usuario){
							$join->on('p.id_usuario','=',  DB::raw('"'.$usuario.'"'));
					}) 
		
		->leftjoin('envios as e',function($join){
							$join->on('e.id_pedido','=','p.id');
					}) 
		
		->leftjoin('usershd as h',function($join){
							$join->on('e.id_usuarioHD','=','h.id');
					})
		

        ->select('p.id as id_pedido','h.nombre','h.apellidos','e.coordenadas_actuales')

        ->orderBy('p.id','DESC');

		
					
		return $pedidos;

	}


	public function scopeultphd($pedidos,$usuario)
	{
		 $pedidos =DB::table('pedidos as p')

		 ->leftjoin('envios as e',function($join){
							$join->on('e.id_pedido','=','p.id');
					})

		 ->leftjoin('users as u',function($join){
							$join->on('p.id_usuario','=','u.id');
					})

		 ->where('e.estatus', '=' , 'entregado')

		 ->where('u.username', '=', $usuario)

		 ->orderBy('p.id','desc')
		 
		 ->select('p.id','e.id','p.id_usuario','u.username','e.id_usuarioHD');




		 return $pedidos;


	}
	public function scopepedienvi()
	{
		 $pedidos =DB::table('pedidos')

		->leftjoin('envios as envios',function($join){
							$join->on('pedidos.id','=','envios.id_pedido');
					})
		->leftjoin('users as users',function($join){
							$join->on('pedidos.id_usuario','=','users.id');
					})
		->leftjoin('usershd as usershd',function($join){
							$join->on('envios.id_usuarioHD','=','usershd.id');
					})

		->where('envios.estatus', '=' , 'entregado')
		->where('pedidos.estatus', '=' , 'pagada')
		->select('users.nombre as usuariotasty','users.apellidos as apellidostasty','usershd.nombre as usuariohd',
			'usershd.apellidos as apellidoshd','pedidos.id as pedidosid','pedidos.caracteristica as caracteristicas',
			'pedidos.total as totalpedido','pedidos.domicilio as domicilio');

		return $pedidos;

	}


}