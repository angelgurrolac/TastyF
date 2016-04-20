<?php

class UserController extends \BaseController {
	
			
	public function alimentos()
	{			
			
            $usuario = User::where('username','=',Input::get('username'))->first();
            date_default_timezone_set('America/Mexico_City');
			$hora = Input::get('hora');
			$alimentos=Productos::alimentosUser($hora);
			return json_encode($alimentos);		
	}
	public function bebidas()
	{
		
			$usuario = User::where('username','=',Input::get('username'))->first();
            date_default_timezone_set('America/Mexico_City');
			$hora = Input::get('hora');
			$bebidas=Productos::bebidasUser($hora);			
			return json_encode($bebidas);				
	}
	public function restaurantes()
	{
        $usuario = User::where('username','=',Input::get('username'))->first();
        $hora = Input::get('hora');
		$restaurantes=Restaurantes::RestaurantesA($hora)->get();
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
		$pedido->coordenadas = Input::get('coordenadas');
        $pedido->hora_pedido = Input::get('hora_pedido');
        $pedido->caracteristica = $caracteristica;
		$pedido->total = Input::get('costo');
        $pedido->dispositivo = Input::get('dispositivo');
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

    public function estatuspedido()
    {

        $usuario = User::where('username','=', Input::get('username'))->first();
        $resultado = Pedidos::EnviosUser($usuario->username)->take(1)->get();
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
        $reservacion->total = Input::get('total');
		$reservacion->hora = Input::get('hora');
        $reservacion->hora_reservacion = Input::get('hora_res');
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
        $total = Input::get('total');
        $monto = 5 + $total;


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
            $reservacion->total = $monto;
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
			$hora = Input::get('hora');
			$id = Input::get('id');
			$alimentos=Productos::platilloEsp($hora,$id);			
				
			return json_encode($alimentos);
	}
	public function addPlatillo(){
			date_default_timezone_set('America/Mexico_City');
			$hora = Input::get('hora');
			$producto=Productos::find(Input::get('id'));
			$alimentos=Productos::moreAli($hora,$producto->id_restaurante);			
				
			return json_encode($alimentos);
	}

	public function payment() {
       
        Conekta::setApiKey("key_U7qsxjuAzRny1F5ogKXFyw");
        Conekta::setLocale('ES');
        $reg = Input::get('reg_id');
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
            date_default_timezone_set('America/Mexico_City');
            $hora = date('Y-m-d H:i:s');
            // $nuevamas = strtotime ( '+2 minute' , strtotime ( $notificacion ) ) ;
            // $nuevamas = date ( 'Y-m-d H:i:s' , $nuevamas );
            // if($reg != ""){


            //           PushNotification::app('Tasty')
            //                 ->to($reg)
            //                 ->send('Califica el sabor de los platillos que acabas de consumir!');
            //         }
            // return Response::json($charge->status);
        
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
    	$pedidos = Pedidos::find(Input::get('id_pedido'));
        $pedidos->estatus = 'completado';
        $pedidos->save();
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
        $usuario = User::where('username','=',Input::get('username'))->first();
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
        $usuario = User::where('username','=',Input::get('username'))->first();
    		date_default_timezone_set('America/Mexico_City');
			$hora = Input::get('hora');
			$productos=Productos::productos($hora);			
				
			return json_encode($productos);		
    }
    public function buscar()
    {
    	date_default_timezone_set('America/Mexico_City');
			$hora = Input::get('hora');
    	$texto = Input::get('palabra');
    	
    	$productos = Productos::buscar($texto,$hora)->get();
    	return Response::json($productos);
    }

     public function buscarA()
    {
    	date_default_timezone_set('America/Mexico_City');
		$hora = Input::get('hora');
    	$texto = Input::get('palabra');
    	
    	$productos = Productos::buscarA($texto,$hora)->get();
    	return Response::json($productos);
    }

    public function buscarR()
    {
    	date_default_timezone_set('America/Mexico_City');
	
    	$texto = Input::get('palabra');

        $hora = Input::get('hora');
    	
    	$restaurantes = Restaurantes::buscarR($texto,$hora)->get();
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

    public function contalimento()
    {
        $alimento = Productos::where('id','=',Input::get('id_producto'))->first();
        $alimento->contador_v = $alimento->contador_v + 1;
        $alimento->save();
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
        $pedido = Pedidos::ultphd($usuario->username)->take(1)->get();
        return json_encode($pedido);
    }

    public function envres()
    {
        $usuario = User::where('username','=',Input::get('username'))->first();
        $estado = UsuariosHD::where('id','=',Input::get('id_usuarioHD') )->first();
        $id_envio = Input::get('id');
        $confirmacion = Input::get('confirmacion');
        $pedido = Pedidos::where('id','=',$id_envio->id_restaurante);
        $reg = Input::get('reg_id');
        if ($confirmacion == 'si')
        {
        $envios = Envios::find(Input::get('id'));
        $envios->estatus = 'recibido';
        $envios->save();
        $estado->estatus_u = 'disponible';
        $estado->save();
        $pedido->estatus = 'valorar';
        $pedido->save();
        return Response::json('success si');
        }
        elseif ($confirmacion == 'no')
         {
        $envios = Envios::find(Input::get('id'));
        $envios->estatus = 'confirmado';
        $envios->save();
        $estado->estatus_u = 'noatendida';
        $estado->save();
        return Response::json('success no');
        }
        else
        {
            return Response::json('error');
        }
    }

    public function allen ()
    {
        $restaurante = Restaurantes::where('id','=',Input::get('id_restaurante'))->get();
        $envios = Envios::todosenvios($restaurante->id)->get();
        return json_encode($envios);
    }

    public function ultEnv()
    {
        $restaurante = Restaurantes::where('id','=',Input::get('id_restaurante'))->get();
        $envios = Envios::ultimoenvio($restaurante->id)->take(1)->get();
        return json_encode($envios);
    }

    public function Pednoaten()
    {
        // $pedido = Pedidos::where('id','=',Input::get('id_pedido'))->get();
        $pedidos = Pedidos::find(Input::get('id_pedido'));
        $pedidos->estatus = 'noAtendida';
        $pedidos->save();
        return Response::json('success');


    }

       public function Resnoaten()
    {
        // $pedido = Pedidos::where('id','=',Input::get('id_pedido'))->get();
        $reservacion = Reservaciones::find(Input::get('id_reservacion'));
        $reservacion->estatus = 'noAtendida';
        $reservacion->save();
        return Response::json('success');


    }

    public function PedPen()
    {
        // $pedido = Pedidos::where('id','=',Input::get('id_pedido'))->get();
        $pedidos = Pedidos::find(Input::get('id_pedido'));
        $pedidos->estatus = 'pendiente';
        $pedidos->save();
        return Response::json('success');

    }

     public function ResPen()
    {
        // $pedido = Pedidos::where('id','=',Input::get('id_pedido'))->get();
        $reservacion = Reservaciones::find(Input::get('id_reservacion'));
        $reservacion->estatus = 'pendiente';
        $reservacion->save();
        return Response::json('success');

    }

    public function timevaloracion()
    {
        $reg = Input::get('reg_id');


        if($reg != ""){
                $valor = PushNotification::Message('¡Valora tu pedido!',array(
                    'valor' => 1,
                    'sound' => 'example.aiff',
                 'actionLocKey' => 'Action button title!',
    'locKey' => 'localized key',
    'locArgs' => array(
        'localized args',
        'localized args',
    ),
    'launchImage' => 'image.jpg',

    'custom' => array('custom data' => array(
        'we' => 'want', 'send to app'
    ))
));

                PushNotification::app('Tasty')
                ->to($reg)
                ->send($valor);
            }

            return Response::json('1');

    }


    public function correo()
    {

        $usuario = User::where('username','=',Input::get('username'))->first();
        $usuario->correo = Input::get('correo');
        $usuario->save();
        return Response::json('success');

    }

    public function CambioTel()
    {
        $usuario = User::where('username','=',Input::get('username'))->first();
        $usuario->telefono = Input::get('telefono');
        $usuario->save();
        return Response::json('success');


    }

    public function upreg()
    {
        $usuario = User::where('username','=',Input::get('username'))->first();
        $usuario->reg_id = Input::get('reg_id');
        $usuario->save();
        return Response::json('success');
    }

    public function pedidouser()
    {
        $usuario = User::where('username','=',Input::get('username'))->first();
        $ultimo = Pedidos::ultimopedido($usuario->username)->take(1)->get();
        return Response::json($ultimo);

    }

    public function estatusn()
    {
        $usuario = User::where('username','=',Input::get('username'))->first();
        $pedido = Pedidos::last($usuario->username)->take(1)->get();
        return Response::json($pedido);
    }


}