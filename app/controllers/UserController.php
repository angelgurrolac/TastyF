<?php

class UserController extends \BaseController {
	
			
	public function alimentos()
	{			
			date_default_timezone_set('America/Mexico_City');
			$hora = date('H:i:s');
			$alimentos=Productos::alimentosUser($hora);			
				
			return json_encode($alimentos);		
	}
	public function bebidas()
	{
		
			date_default_timezone_set('America/Mexico_City');
			$hora = date('H:i:s');
			$bebidas=Productos::bebidasUser($hora);			
			return json_encode($bebidas);				
	}
	public function restaurantes()
	{
			
		$restaurantes=Restaurantes::all();
		return json_encode($restaurantes);
		
	}
	public function pedidos(){
		
		$usuario = User::where('username','=',Input::get('username'))->get();

		$producto = Input::get('nombre');
		$cantidad = Input::get('cantidad');
        $caracteristica = Input::get('caracteristica');
		$restaurante = Input::get('restaurante');
		$productos = json_decode($producto);
		$cantidades = json_decode($cantidad);
		$usuario{0}->direccion = Input::get('direccion');
		$usuario{0}->save();
		
			
		$pedido = new Pedidos;
		$pedido->domicilio = Input::get('direccion');
        $pedido->caracteristica = $caracteristica;
		$pedido->total = Input::get('costo');
		$pedido->id_restaurante = $restaurante;
		$pedido->id_usuario = $usuario{0}->id;
		$pedido->estatus = "pendiente";
        $pedido->tipo = 'pendiente';
		$pedido->save();
		$restaurantes = Restaurantes::find($restaurante)->first();    
        $restaurantes->contador = $restaurantes->contador + 1 ;
        $restaurantes->save();
		for ($x = 0; $x < count($productos); $x++) {
			$detalles = new DetallesPedidos;
			$detalles->id_pedido = $pedido->id;
			$detalles->id_producto = $productos[$x];
			$detalles->cantidad = $cantidades[$x];
			$detalles->subtotal = Input::get('costo');
			$detalles->save();
		}
		return Response::json($pedido->id);
			

	}







    public function EstatusP(){

        $usuario = User::where('username','=',Input::get('username'))->first();
        $resultado = Pedidos::EnviosUser($usuario->id)->take(1)->get();
    
       //      return Response::json($pedido);
       //  }
        
        
  // $validacion = usuariosHD::whereRaw('id = (select max(`id`) from usersHD)')->get();
        return json_encode($resultado);
    }


	public function reservaciones(){
		
		$usuario = User::where('username','=',Input::get('username'))->get();

		$producto = Input::get('nombre');
		$cantidad = Input::get('cantidad');
		$restaurante = Input::get('restaurante');

        $date= Input::get('date');
		$productos = json_decode($producto);
		$cantidades = json_decode($cantidad);			
		$reservacion = new Reservaciones;
		$reservacion->mesa = Input::get('mesa');
		$reservacion->hora = Input::get('hora');
        $reservacion->fecha = $date;
		$reservacion->id_restaurante = $restaurante;
		$reservacion->id_usuario = $usuario{0}->id;
		$reservacion->estatus = "pendiente";
		$reservacion->save();
		
		for ($x = 0; $x < count($productos); $x++) {
			$detalles = new DetallesReservaciones;
			$detalles->id_reservacion = $reservacion->id;
			$detalles->id_producto = $productos[$x];
			$detalles->cantidad = $cantidades[$x];			
			$detalles->save();
		}
		return Response::json($reservacion->id);
			

	}
    public function paymentR(){
        Conekta::setApiKey("key_U7qsxjuAzRny1F5ogKXFyw");
        Conekta::setLocale('ES');
        $reservacion = Reservaciones::find(Input::get('id'));
        $card = Input::get('conektaTokenId');
        $monto = 5 * 100;

        $restaurantes = Restaurantes::find($reservacion->id_restaurante)->first();              
        $user =  $usuario = User::where('id','=',$reservacion->id_usuario)->first();
     
      
        try {
        
            $charge = Conekta_Charge::create(array(
            
            "description" => "Conekta tastyfoods",
            "amount" => $monto,
            "currency" => "MXN",
           "reference_id"=> "orden_de_id_interno",
           "card" => $card,
           'details'=> array(
                'name'=> $user->nombre,                
                'email'=> $user->username,
                'customer'=> array(
                  'corporation_name'=> 'Conekta Inc.',
                  'logged_in'=> true                  
                    ),
                    'line_items'=> array(
                      array(
                        'name'=> 'cobro de reservacion',
                        'description'=> 'Conekta tastyfoods',
                        'unit_price'=> $monto,
                        'quantity'=> 1,
                        'sku'=> 'cohb_s1',
                        'type'=> 'food'
                      )
                    )
                )
            ));
        } catch (Conekta_Error $e) {

           return Response::json($e->getMessage());

        }
            $reservacion->estatus = 'pagada';
            $reservacion->save();
            $restaurantes->confirmadas = $restaurantes->confirmadas + 1 ;
            $restaurantes->save();
       
            return Response::json($charge->status);
        
    }
	public function factura(){
		$usuario = User::where('username','=',Input::get('username'))->first();
		$factura = new Facturas;
		$factura->id_usuario = $usuario->id;
		$factura->nombreF = Input::get('nombredelafactura');
		$factura->nombreUsuario =  Input::get('nombre_factura');
		$factura->Domicilio =  Input::get('domiciliofiscal');
		$factura->rfc = Input::get('rfc');
		$factura->correo = Input::get('correo_factura');

		$factura->save();
		return Response::json($factura->id);
	}
	public function tarjeta(){
		$usuario = User::where('username','=',Input::get('username'))->first();
		$tarjeta = new Tarjetas;
		$tarjeta->id_usuario = $usuario->id;
		$tarjeta->nombre_tarjeta = Input::get('nombredelatarjeta');
		$tarjeta->nombreUsuario =  Input::get('nombretarjetahabiente');
		$tarjeta->tarjeta = Input::get('tarjeta');
		$tarjeta->month =  Input::get('month');
		$tarjeta->year =  Input::get('year');
		$tarjeta->tipo = Input::get('tipo');
		$tarjeta->save();
		return Response::json('success');
	}

	public function platilloEsp(){
			date_default_timezone_set('America/Mexico_City');
			$hora = date('H:i:s');
			$id = Input::get('id');
			$alimentos=Productos::platilloEsp($hora,$id);			
				
			return json_encode($alimentos);
	}
	public function addPlatillo(){
			date_default_timezone_set('America/Mexico_City');
			$hora = date('H:i:s');
			$producto=Productos::find(Input::get('id'));
			$alimentos=Productos::moreAli($hora,$producto->id_restaurante);			
				
			return json_encode($alimentos);
	}

	public function payment() {
       
        Conekta::setApiKey("key_U7qsxjuAzRny1F5ogKXFyw");
        Conekta::setLocale('ES');
		$pedido = Pedidos::find(Input::get('id'));
        $card = Input::get('conektaTokenId');
        $monto = $pedido->total;

        $restaurantes = Restaurantes::find($pedido->id_restaurante)->first();              
        $user =     $usuario = User::where('id','=',$pedido->id_usuario)->first();
     
      
        try {
        
            $charge = Conekta_Charge::create(array(
            
            "description" => "Conekta tastyfoods",
            "amount" => $monto * 100,
            "currency" => "MXN",
           "reference_id"=> "orden_de_id_interno",
           "card" => $card,
           'details'=> array(
                'name'=> $user->nombre,                
                'email'=> $user->username,
                'customer'=> array(
                  'corporation_name'=> 'Conekta Inc.',
                  'logged_in'=> true                  
                    ),
                    'line_items'=> array(
                      array(
                        'name'=> 'pedido de comida',
                        'description'=> 'Conekta tastyfoods',
                        'unit_price'=> $monto,
                        'quantity'=> 1,
                        'sku'=> 'cohb_s1',
                        'type'=> 'food'
                      )
                    )
                )
            ));
        } catch (Conekta_Error $e) {

           return Response::json($e->getMessage());

        }
            $pedido->estatus = 'pagada';
            $pedido->tipo = 'tarjeta';
            $pedido->save();
            $restaurantes->pagadas = $restaurantes->pagadas + 1 ;
            $restaurantes->save();
            if($user->reg_id != ""){


                      PushNotification::app('Tasty')
                            ->to($user->reg_id)
                            ->send('Califica el sabor de los platillos que acabas de consumir!');
                    }
        	return Response::json($charge->status);
        
    }
    public function getPubli()
    {	
    	
    	$publicidad = Publicidad::actual()->get();
    	return Response::json($publicidad);
    	
    }

    public function categorias()
    {
    	$categoria = Input::get('id');
    	$productos = Productos::porCategoria($categoria)->get();
    	return Response::json($productos);
    }

     public function tarjetasP()
    {
    	$usuario = User::where('username','=',Input::get('username'))->first();
    	$tarjetas = Tarjetas::where('id_usuario','=',$usuario->id)->get();    	
    	return Response::json($tarjetas);
    }

        public function facturasP()
    {
    	$usuario = User::where('username','=',Input::get('username'))->first();
    	$facturas = Facturas::where('id_usuario','=',$usuario->id)->get();    	
    	return Response::json($facturas);
    }


     public function modTarjetas()
    {
    	$tarjeta = Tarjetas::where('id','=',Input::get('id'))->first();
		$tarjeta->nombre_tarjeta = Input::get('nombredelatarjeta');
		$tarjeta->cvc =  Input::get('cvc');
		$tarjeta->tarjeta =  Input::get('tarjeta');		
		$tarjeta->save();
		return Response::json('success');
    }

      public function modFacturas()
    {
    	$factura = Facturas::where('id','=',Input::get('id'))->first();
		$factura->nombreF = Input::get('nombredelafactura');
		$factura->nombreUsuario =  Input::get('nombre_factura');
		$factura->Domicilio =  Input::get('domiciliofiscal');
		$factura->rfc = Input::get('rfc');
		$factura->correo = Input::get('correo_factura');
		$factura->costo = Input::get('costo');
		$factura->save();
		return Response::json('success');
    }

    	public function chaPass()
    {
    	$usuario = User::where('username','=',Input::get('username'))->first();
    	$antiguo = Input::get('antiguo');
    	$nuevo = Input::get('nuevo');
    	

    	if(Hash::check($antiguo,$usuario->password))
    	{
    		$usuario->password = Hash::make($nuevo);
    		$usuario->save();
    		return Response::json('Password cambiado');
    	}
    	else
    	{
    		return Response::json('El password actual no coincide');
    	}

    }
    public function delTarjeta()
    {
    	$tarjeta = Tarjetas::where('id','=',Input::get('id'))->first();
    	$tarjeta->delete();
    	return Response::json('Tarjeta eliminada');

    }
        public function delFactura()
    {
    	$factura = Facturas::where('id','=',Input::get('id'))->first();
    	$factura->delete();
    	return Response::json('Factura eliminada');

    }

     public function valoracion()
    {
    	$id_detalle = Input::get('id_detalle');
    	$id_producto = Input::get('id_producto');
    	$detalle = DetallesPedidos::find($id_detalle);
    	$producto = Productos::find($id_producto);
    	$dulce = Input::get('dulce');
    	$salado = Input::get('salado');
    	$picoso = Input::get('picoso');
    	$acido = Input::get('acido');
    	$estrellas = Input::get('estrellas');
        $likedulce = Input::get('likedulce');
        $likesalado = Input::get('likesalado');
        $likepicoso = Input::get('likepicoso');
        $likeacido = Input::get('likeacido');
    	$detalle->dulce = $dulce;
    	$detalle->salado = $salado;
    	$detalle->picoso = $picoso;
    	$detalle->acido = $acido;
    	$detalle->estrellas = $estrellas;
        $detalle->likedulce = $likedulce;
        $detalle->likepicoso = $likepicoso;
        $detalle->likesalado = $likesalado;
        $detalle->likeacido  = $likeacido    ;
    	$detalle->save();

    	if($producto->dulce == 0.0){
    
    		$producto->dulce = $dulce;
    	}
    	else
    	{
    		$producto->dulce = ($producto->dulce + $dulce)/2;
    	}
    	if($producto->salado == 0.0){
    		$producto->salado = $salado;
    	}
    	else
    	{
    		$producto->salado = ($producto->salado + $salado)/2;
    	}
    	if($producto->picoso == 0.0){
    		$producto->picoso = $picoso;
    	}
    	else
    	{
    		$producto->picoso = ($producto->picoso + $picoso)/2;	
    	}
    	if($producto->acido == 0.0){
    		$producto->acido = $acido;
    	}
    	else
    	{
    		$producto->acido = ($producto->acido + $acido)/2;
    	}
    	if($producto->estrellas == 0){
    		$producto->estrellas = $estrellas;
    	}
    	else
    	{
    		$producto->estrellas = ($producto->estrellas + $estrellas)/2;
    	}
    	
    

    	
    	
    	$producto->save();

    	return Response::json('exito');

    }

    public function allCat()
    {
    	$categorias = Categorias::where('activa','=','1')->get();
    	return Response::json($categorias);
    }
    public function ultPedido()
    {
    	$usuario = User::where('username','=',Input::get('username'))->first();
    	$pagado = Pedidos::userPagado($usuario->id)->first();
    	$total = count($pagado);
    	if($total>0){
    		$pedido = Pedidos::ultPedido($usuario->id,$pagado->id)->get();
    		return Response::json($pedido);
    	}
    	
    	
    }
    public function productos()
    {
    		date_default_timezone_set('America/Mexico_City');
			$hora = date('H:i:s');
			$productos=Productos::productos($hora);			
				
			return json_encode($productos);		
    }
    public function buscar()
    {
    	date_default_timezone_set('America/Mexico_City');
			$hora = date('H:i:s');
    	$texto = Input::get('palabra');
    	
    	$productos = Productos::buscar($texto,$hora)->get();
    	return Response::json($productos);
    }

     public function buscarA()
    {
    	date_default_timezone_set('America/Mexico_City');
		$hora = date('H:i:s');
    	$texto = Input::get('palabra');
    	
    	$productos = Productos::buscarA($texto,$hora)->get();
    	return Response::json($productos);
    }

    public function buscarR()
    {
    	date_default_timezone_set('America/Mexico_City');
	
    	$texto = Input::get('palabra');
    	
    	$restaurantes = Restaurantes::buscarR($texto)->get();
    	return Response::json($restaurantes);
    }
    public function facturarR()
    {

        $factura = Input::get('id_factura');
        $restaurante = Input::get('id_restaurante');
        $costo = Input::get('costo');
        $FacturaR = new FacturarR;
        $FacturaR->id_factura = $factura;
        $FacturaR->id_restaurante = $restaurante;
        $FacturaR->costo = $costo;
        $FacturaR->estatus = 'pendiente';
        $FacturaR->save();
        return Response::json('exito');
    }
    public function estatus()
    {
        $pedido = Pedidos::where('id','=',Input::get('id'))->first();

        if($pedido->estatus == 'sinPagar' )
        {
            return Response::json('confirmada');
        }
        elseif ($pedido->estatus == 'declinada') {
            return Response::json('declinada');
        }
        else
        {
            return Response::json('sinConfirmar');
        }
    }
    public function borrarP()
    {
        $pedido = Pedidos::where('id','=',Input::get('id'))->first();
        $pedido->estatus = 'noAtendida';
        $pedido->save();
        return Response::json('success');
    }
        public function estatusR()
    {
        $reservacion = Reservaciones::where('id','=',Input::get('id'))->first();

        if($reservacion->estatus == 'confirmada' )
        {
            return Response::json('confirmada');
        }
        elseif ($reservacion->estatus == 'declinada') {
            return Response::json('declinada');
        
}        else
        {
            return Response::json('sinConfirmar');
        }
    }
    public function borrarR()
    {
        $reservacion = Reservaciones::where('id','=',Input::get('id'))->delete();
        $detalles = DetallesReservaciones::where('id_reservacion','=',Input::get('id'))->delete();
        return Response::json('success');
    }
    public function aumentarD()
    {
        $restaurante = Restaurantes::where('id','=',Input::get('id'))->first();
        $restaurante->con_direccion = $restaurante->con_direccion + 1;
        $restaurante->save();
        return Response::json('success');
    }
    public function aumentarT()
    {
        $restaurante = Restaurantes::where('id','=',Input::get('id'))->first();
        $restaurante->con_telefono = $restaurante->con_telefono + 1;
        $restaurante->save();
        return Response::json('success');
    }
       public function aumentarP()
    {
        $publicidad = Publicidad::where('id','=',Input::get('id'))->first();
        $publicidad->contador = $publicidad->contador + 1;
        $publicidad->save();
        return Response::json('success');
    }
         public function cerrar()
    {
        $usuario = User::where('username','=',Input::get('username'))->first();
        $usuario->estatus = 0;
        $usuario->save();
        return Response::json('success');
    }
    public function efectivo(){
        $pedido = Pedidos::find(Input::get('id'));
        $pedido->estatus = 'pagada';
        $pedido->tipo = 'efectivo';
        $pedido->save();
        $restaurantes = Restaurantes::find($pedido->id_restaurante)->first();
        $restaurantes->pagadas = $restaurantes->pagadas + 1 ;
        $restaurantes->save();
        return Response::json('success');
    }

    public function ultphd()
    {
        $usuario = User::where('username','=',Input::get('username'))->first();
        $pedido = Pedidos::ultphd($usuario)->take(1)->get();
        return json_encode($pedido);
    }

    public function envres()
    {

        if (Input::get('si'))
        {
        $envios = Envios::find(Input::get('id'));
        $envios->estatus = 'recibido';
        $envios->save();
        return Response::json('success si');
        }
        if (Input::get('no')) {
        $envios = Envios::find(Input::get('id'));
        $envios->estatus = 'confirmado';
        $envios->save();
        return Response::json('success no');
        }
    }
}