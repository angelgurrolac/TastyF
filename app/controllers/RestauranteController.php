	<?php

class RestauranteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$pedidos = Pedidos::pedidos(Auth::user()->id_restaurante);
		$detalles = Pedidos::consulta()->get();
		$restaurante = Restaurantes::find(Auth::user()->id_restaurante);
		$reservaciones = Reservaciones::res(Auth::user()->id_restaurante);
		$publicidad = Publicidad::cuentasp(Auth::user()->id_restaurante)->get();
		$detallesR = Reservaciones::consulta()->get();
		return View::make('Restaurante.hogar',compact('pedidos','detalles','reservaciones','detallesR','restaurante','publicidad'));
	}


	public function hogarPedidos(){
		
		$pedido = Pedidos::find(Input::get('idpedido'));
		$user = $usuario = User::where('id','=',$pedido->id_usuario)->first();
	
		if(Input::has('Confirmar'))
		{

			$pedido->estatus = 'sinPagar';
			$pedido->save();
			$envios = new Envios();
			$envios->estatus = 'pendiente';
			$envios->id_pedido = $pedido->id;
			$envios->id_restaurante = $pedido->id_restaurante;
			$envios->save();
			return Redirect::to('/')->with('success','Orden Aceptada Con Exito');

		}
		elseif (Input::has('Declinar')) 
		{
			$pedido->estatus = 'declinada';
			$pedido->save();
			return Redirect::to('/')->with('success','Orden Cancelada Con Exito');
		}
	}
	public function rescon()
	{
		$reservacion = Reservaciones::find(Input::get('idreservacion'));
		$user =    	$usuario = User::where('id','=',$reservacion->id_usuario)->first();
		$restaurantes = Restaurantes::find($reservacion->id_restaurante)->first();
		if(Input::has('Confirmar'))
		{

			$reservacion->estatus = 'confirmada';
			$reservacion->save();
			$restaurantes->confirmadas = $restaurantes->confirmadas + 1;
			$restaurantes->save();
			return Redirect::to('/')->with('success','reservacion Aceptada Con Exito');

		}
		elseif (Input::has('Declinar')) 
		{
			$reservacion->estatus = 'declinada';
			$reservacion->save();
			return Redirect::to('/')->with('success','reservacion Cancelada Con Exito');
		}
	}
	public function alimentos()
	{
		
		$alimentos=Productos::misP(Auth::user()->id_restaurante)->get();
		return View::make('Restaurante.alimentos',compact('alimentos'));
		
	}
	public function bebidas()
	{
		$bebidas=Productos::misB(Auth::user()->id_restaurante)->get();
		return View::make('Restaurante.bebidas',compact('bebidas'));
		
	}
	public function editar(){
		
		if(Input::has('Editar'))
		{

			$producto = Productos::find(Input::get('producto_id'));
			$cat =  Categorias::find($producto->id_categoria);
			$cat2 =  Categorias::find($producto->id_categoria2);
	    	$categorias = Categorias::where('activa','=','1')->lists('nombre','id');		
			return View::make('Restaurante.editarProducto',compact('producto','cat','cat2','categorias'));

		}
		elseif (Input::has('Eliminar')) 
		{
			$producto = Productos::find(Input::get('producto_id'));
			$producto->delete();
			return Redirect::to('/restaurante/alimentos')->with('success','Alimento eliminado con éxito');
		}
	}

	public function editarB(){
		
		if(Input::has('Editar'))
		{

			$producto = Productos::find(Input::get('producto_id'));
			$cat =  Categorias::find($producto->id_categoria);
			$cat2 =  Categorias::find($producto->id_categoria2);
	    	$categorias = Categorias::where('activa','=','1')->lists('nombre','id');		
			return View::make('Restaurante.editarProductoB',compact('producto','cat','cat2','categorias'));

		}
		elseif (Input::has('Eliminar')) 
		{
			$producto = Productos::find(Input::get('producto_id'));
			$producto->delete();
			return Redirect::to('/restaurante/bebidas')->with('success','Bebida eliminada con éxito');
		}
	}


	public function saveChanges()
	{	$producto = Productos::find(Input::get('id'));
		$image = Input::file('imgFile');
		$cat = Input::get('categoria1');
		$cat2 = Input::get('categoria2');
		if($image!=null){
			$producto->imagen = $image_final;
			$name_image = $image -> getClientOriginalName();	
			$image_final = 'productos/' .$name_image;
			$image -> move('productos', $name_image );
		}
			
	
		$producto->nombre = Input::get('nombre');
		$producto->descripcion = Input::get('descripcion');
		$producto->precio = Input::get('precio');
		$producto->iva = Input::get('comision');
		$producto->costo_unitario = Input::get('costo_unitario');
		$producto->id_restaurante = Auth::user()->id_restaurante;
		$producto->id_sabor = Input::get('sabor');
		if($cat != 0){
			$producto->id_categoria = $cat;
		}
		if($cat2 != 0){
			$producto->id_categoria2 = $cat2;
		}
		$producto->hora_inicio = Input::get('hora_inicio'); 
		$producto->hora_fin = Input::get('hora_fin');
		
		$producto->save();

		return Redirect::to('restaurante/alimentos')->with('message','Cambios con exito');
	}

	public function saveChanges2()
	{	$producto = Productos::find(Input::get('id'));
		$image = Input::file('imgFile');
		$cat = Input::get('categoria1');
		$cat2 = Input::get('categoria2');
		if($image!=null){
			$producto->imagen = $image_final;
			$name_image = $image -> getClientOriginalName();	
			$image_final = 'productos/' .$name_image;
			$image -> move('productos', $name_image );
		}
			
	
		$producto->nombre = Input::get('nombre');
		$producto->descripcion = Input::get('descripcion');
		$producto->precio = Input::get('precio');
		$producto->iva = Input::get('comision');
		$producto->costo_unitario = Input::get('costo_unitario');
		$producto->id_restaurante = Auth::user()->id_restaurante;
		$producto->id_sabor = Input::get('sabor');
		if($cat != 0){
			$producto->id_categoria = $cat;
		}
		if($cat2 != 0){
			$producto->id_categoria2 = $cat2;
		}
		$producto->hora_inicio = Input::get('hora_inicio'); 
		$producto->hora_fin = Input::get('hora_fin');
		
		$producto->save();

		return Redirect::to('restaurante/bebidas')->with('message','Cambios con exito');
	}
	public function agregarA()
	{
		$categorias = Categorias::where('activa','=','1')->lists('nombre','id');
		return View::make('Restaurante.agregarA')->with('categorias', $categorias);
	}

	public function agregarB()
	{
		$categorias = Categorias::where('activa','=','1')->lists('nombre','id');
		return View::make('Restaurante.agregarB')->with('categorias', $categorias);
	}
	public function addA()
	{
		$image = Input::file('imgFile');
		$producto = new Productos;
		if($image!=null){
			
			$name_image = $image -> getClientOriginalName();	
			$image_final = 'productos/' .$name_image;
			$producto->imagen = $image_final;
			$image -> move('productos', $name_image );
		}
		$nombre = Input::get('nombre');
		
		if($nombre==null){
			$nombre = 'Sin Nombre';
		}
	
		$producto->nombre = $nombre;
		$producto->descripcion = Input::get('descripcion');
		$producto->precio = Input::get('precio');
		$producto->iva = Input::get('comision');
		$producto->costo_unitario = Input::get('costo_unitario');
		$producto->tipo = "alimento";
		$producto->id_restaurante = Auth::user()->id_restaurante;		
		$producto->id_categoria = Input::get('categoria1');
		$producto->id_categoria2 = Input::get('categoria2');
		$producto->hora_inicio = Input::get('hora_inicio'); 
		$producto->hora_fin = Input::get('hora_fin');
		$producto->save();

		return Redirect::to('restaurante/alimentos')->with('message','Cambios con exito');

	}
	public function addB()
	{
		$image = Input::file('imgFile');
		$producto = new Productos;
		if($image!=null){
	
			$name_image = $image -> getClientOriginalName();	
			$image_final = 'productos/' .$name_image;
		$producto->imagen = $image_final;
		$image -> move('productos', $name_image );
		}
			
	
		$producto->nombre = Input::get('nombre');
		$producto->descripcion = Input::get('descripcion');
		$producto->precio = Input::get('precio');
		$producto->iva = Input::get('comision');
		$producto->costo_unitario = Input::get('costo_unitario');
		$producto->tipo = "bebida";
		$producto->id_restaurante = Auth::user()->id_restaurante;
		$producto->id_sabor = Input::get('sabor');
		$producto->id_categoria = Input::get('categoria1');
		$producto->id_categoria2 = Input::get('categoria2');
		$producto->hora_inicio = Input::get('hora_inicio'); 
		$producto->hora_fin = Input::get('hora_fin');
		$producto->save();

		return Redirect::to('restaurante/bebidas')->with('message','Cambios con exito');

	}
	public function pedidos()
	{
		$pedidos = Pedidos::pedidosDos(Auth::user()->id_restaurante);
			$detalles = Pedidos::consulta()->get();
		return View::make('Restaurante.pedidos',compact('pedidos','detalles'));
	}	
		public function noAtendidas()
	{
		$pedidos = Pedidos::pedidosCuatro(Auth::user()->id_restaurante);
			$detalles = Pedidos::consulta()->get();
		return View::make('Restaurante.noAtendidas',compact('pedidos','detalles'));
	}	
		public function declinadas()
	{
		$pedidos = Pedidos::pedidosTres(Auth::user()->id_restaurante);
			$detalles = Pedidos::consultaDos()->get();
		return View::make('Restaurante.declinadas',compact('pedidos','detalles'));
	}			
	public function informes()
	{
		$id= Auth::user()->id_restaurante;
		$pedidos=Pedidos::pagadas($id)->count();
		$pedidos=Pedidos::pagadasSemana($id)->count();
		$pedidos=Pedidos::pagadasMes($id)->count();

		
		$VT = Pedidos::pagadas($id)->sum('total');
		$VT2 = Pedidos::pagadasSemana($id)->sum('total');
		$VT3 = Pedidos::pagadasMes($id)->sum('total');
		$IVA = Pedidos::pagadas($id)->sum('iva');
		$IVA2 = Pedidos::pagadasSemana($id)->sum('iva');
		$IVA3 = Pedidos::pagadasMes($id)->sum('iva');
		$IMPORTE = $VT-$IVA;
		$IMPORTE2 = $VT2-$IVA2;
		$IMPORTE3 = $VT3-$IVA3;
		$NuOrdenes = Pedidos::pagadas($id)->count();
		$NuOrdenes2 = Pedidos::pagadasSemana($id)->count();
		$NuOrdenes3 = Pedidos::pagadasMes($id)->count();
		$OM = Pedidos::pagadas($id)->max('total');
		$OM2 = Pedidos::pagadasSemana($id)->max('total');
		$OM3 = Pedidos::pagadasMes($id)->max('total');
		$MO = Pedidos::pagadas($id)->min('total');
		$MO2 = Pedidos::pagadasSemana($id)->min('total');
		$MO3 = Pedidos::pagadasMes($id)->min('total');
		$OP = Pedidos::pagadas($id)->avg('total');
		$OP2 = Pedidos::pagadasSemana($id)->avg('total');
		$OP3 = Pedidos::pagadasMes($id)->avg('total');
	
		return View::make('Restaurante.informes',compact('VT','IMPORTE','NuOrdenes','OM','MO','OP',
			'VT2','IMPORTE2','NuOrdenes2','OM2','MO2','OP2',
			'VT3','IMPORTE3','NuOrdenes3','OM3','MO3','OP3'));
		
	}
	public function datos()
	{
		$restaurante=Restaurantes::find( Auth::user()->id_restaurante);
		return View::make('Restaurante.datos',compact('restaurante'));
	}


	public function estadisticas() 
	{
		
		$id= Auth::user()->id_restaurante;
		$restaurante = Restaurantes::find(Auth::user()->id_restaurante);
		$restaurantes = Pedidos::estadisticasRestaurante($id)->get(); 
		$restaurantes2 = Pedidos::estadisticasRestauranteE($id)->get();
		$publicidad = Publicidad::cuentasp(Auth::user()->id_restaurante)->get();
		// $pedidos=Pedidos::pagadas($id)->count();
		// $credito = Estadisticas::where('id_restaurante', '=', $id)->where('tipo', '=','tarjeta')->get();
		// $efectivo = Estadisticas::where('id_restaurante', '=', $id)->where('tipo', '=','efectivo')->get();
		// $restaurante = Restaurantes::find(Auth::user()->id_restaurante);
		// if($pedidos==0){
 	// 		return View::make('Restaurante.estadisticas2');	
 	// 	}
 	// 	else{		
 			
 	// 		$cantidad = Pedidos::cantidad()->get();
 		
		return View::make('Restaurante.estadisticas',compact('restaurante','restaurantes','restaurantes2','publicidad'));
		
	}



	public function guardarTarjeta()
	{
			$rules = array(			
			'cuenta'	       => 'required'			
	
			);
		$validator = Validator::make(Input::all(), $rules);

        // process the login
		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
			$restaurante=Restaurantes::find( Auth::user()->id_restaurante);
			$restaurante->cuenta = Input::get('cuenta');
			$restaurante->save();
			return Redirect::back()->with('message','cuenta guardada con éxito');
		}
	}
	public function imgPerfil()
	{

			$rules = array(			
			
		'imgFile' => 'mimes:jpeg,bmp,png'		
	
			);
		$validator = Validator::make(Input::all(), $rules);

        // process the login
		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {
				$restaurante=Restaurantes::find(Auth::user()->id_restaurante);
				$image = Input::file('imgFile');
				if($image!=null){				
					$name_image = $image -> getClientOriginalName();	
					$image_final = 'restaurantes/' .$name_image;
					$restaurante->imagenR = $image_final;
					$image -> move('restaurantes', $name_image );											
					$restaurante->save();
					return Redirect::back()->with('message','cuenta guardada con éxito');
			}
		}
	}
	public function facturas()
	{	
	
		$Facturas = FacturarR::propias(Auth::user()->id_restaurante)->get();
	
		return View::make('Restaurante.facturas',compact('Facturas'));

	}
	public function factura($id)
	{
		$factura = FacturarR::unica($id)->get();
		return View::make('Restaurante.FacturaA',compact('factura'));
	}
	public function facturaM()
	{
		$factura = FacturarR::find(Input::get('id'));
		$factura->estatus = 'facturada';
		$factura->save();
		return Redirect::to('restaurante/facturas')->with('message','Factura guardada con éxito');
	}
	public function facturacion()
	{

			$factura = New Facturas;
			$factura->nombreUsuario = Input::get('nombre');
			$factura->Domicilio = Input::get('domicilio');
			$factura->rfc = Input::get('RFC');
			$factura->correo = Input::get('Correo');
												
			$factura->save();
			return Redirect::to('restaurante/hogar')->with('message','factura guardada con éxito');
			
				
	}

	public function enviarhd()
	{
		// $valor = Input::get('id');
		// $pedidos = Pedidos::where('pagoR','=', $valor)->first();
		// $pedidos->estatus = 'sinPagar';
		// $pedidos->save();

        // Envios::where('id_usuarioHD','=',Input::get('id'))->update(['estatus' => 'pendiente']);
		Pedidos::where('pagoR', '=', Input::get('id'))->update(['estatus' => 'sinPagar']); 

		return Redirect::to('restaurante/hogar');


	}


	public function finanzas()
	{

		$pedidos = Pedidos::find(Input::get('id'));
		$pedidos->pagoR2 = 1;
		$pedidos->save();
		$finanzas = new Estadisticas();
		$finanzas->id_restaurante = Input::get('id');
		$finanzas->costo_promedio = Input::get('costo_promedio');
		$finanzas->tipo = Input::get('tipo');
		$finanzas->save();
		return Redirect::to('restaurante/estadisticas')->with('message','Pago guardado');

	}


	public function pedenviados()
	{
		$penvios = Pedidos::pedienvi()->get();
		return View::make('Restaurante.enviados',compact('penvios'));
	}


}
