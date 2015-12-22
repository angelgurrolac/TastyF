
<?php

class RepartidorController extends \BaseController {
	public function Enviada(){
		//$envios = Pedidos::where('estatus','=','pendiente')->get();
		//return json_encode($envios);

		$usuario = User::where('username','=',Input::get('username'))->first();
    	$confirmacion = Pedidos::Confirmada($usuario->id)->first();
    	$total = count($confirmacion);
    	if($total>0){
    		$pedido = Pedidos::ultPedido2($usuario->id,$confirmacion->id)->get();
    		return Response::json($pedido);
    	}
    	
	}	
	public function enviarA(){
		$envio = Envios::find(Input::get('idEnvio'))->first();
		$coordenadas = Input::get('coordenadas');
		$envio->coordenadasA = $coordenadas;
		$envio->save();
		return Response::json('modificacion registrada con exito');
	}
	public function marcarE()
	{
			$envio = Envios::find(Input::get('idEnvio'))->first();
			$envio->estatus = 'entregado';
			$envio->save();
			return Response::json('success');
	}
}