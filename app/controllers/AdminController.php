<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function pedidos()
	{

		$pedidos= Pedidos::Admin();		
		return View::make('Admin.pedidos',compact('pedidos'));
	}
    public function publicidad()
	{	
		date_default_timezone_set('America/Mexico_City');
		$fecha = date('Y-m-d');
		$publicidad = Publicidad::where('dia','>=',$fecha)->get();
		$restaurantes = Restaurantes::where('id', '>', 0)->get();
		$publicidad2 = Publicidad::where('dia','>=',$fecha)->first();
		$nombre = Publicidad::nombre($publicidad2->id_restaurante)->get();
		return View::make('Admin.publicidad',compact('publicidad','restaurantes','nombre'));
		//return View::make('Admin.publicidad');
	}

	public function alimentos()
	{
		
		// $alimentos=Productos::where('tipo','=','alimento')->get();
		$alimentos=Productos::alimentos()->get();
		$mensaje = 0;
		return View::make('Admin.alimentos',compact('alimentos','mensaje'));
		
	}
	public function bebidas()
	{
		// $bebidas=Productos::where('tipo','=','bebida')->get();
		$bebidas=Productos::bebidas()->get();
		$mensaje = 0;
		return View::make('Admin.bebidas',compact('bebidas','mensaje'));
		
	}
	public function restaurantes()
	{
		$restaurantes= Restaurantes::where('validado','=','1')->get();
		$mensaje=0;
		return View::make('Admin.restaurantes',compact('restaurantes','mensaje'));
	}		
	public function informes()
	{
		
		$id= Auth::user()->id_restaurante;
		$pedidos=Pedidos::PagadasAdmin()->count();
		$pedidos2=Pedidos::PagadasAdminSemana()->count();
		$pedidos3=Pedidos::PagadasAdminMes()->count();
		
		// if($pedidos==0){
 	// 	return View::make('Admin.informes2');	
 	//  	}
 	// 	if($pedidos2==0){
 	// 		return View::make('Admin.informes2');	
 	// 	}

 		// else{
		$VT = Pedidos::PagadasAdmin()->sum('total');
		$VT2 = Pedidos::PagadasAdminSemana()->sum('total');
		$VT3 = Pedidos::PagadasAdminMes()->sum('total');
		$NuOrdenes = Pedidos::PagadasAdmin()->count();
		$NuOrdenes2 = Pedidos::PagadasAdminSemana()->count();
		$NuOrdenes3 = Pedidos::PagadasAdminMes()->count();
		$OM = Pedidos::PagadasAdmin()->max('total');
		$OM2 = Pedidos::PagadasAdminSemana()->max('total');
		$OM3 = Pedidos::PagadasAdminMes()->max('total');
		$MO = Pedidos::PagadasAdmin()->min('total');
		$MO2 = Pedidos::PagadasAdminSemana()->min('total');
		$MO3 = Pedidos::PagadasAdminMes()->min('total');
		$OP = Pedidos::PagadasAdmin()->avg('total');
		$OP2 = Pedidos::PagadasAdminSemana()->avg('total');
		$OP3 = Pedidos::PagadasAdminMes()->avg('total');
	
		return View::make('Admin.informes',compact('IMPORTE','VT3','NuOrdenes3','OM3','MO3','OP3','VT','NuOrdenes','OM','MO','OP','VT2','NuOrdenes2','OM2','MO2','OP2'));
		// }
	}

	
	public function usuarios()
	{
		$usuarios = Usuarios::where('id_nivel', '!=', 1)->get();
		$numero = Usuarios::where('id_nivel', '!=', 1)->count();
		$pedidos = Pedidos::UserMas()->get();
		return View::make('Admin.usuarios',compact('usuarios','numero','pedidos'));
	}


	public function estadisticas()
	{
		$restaurantes = Pedidos::estadisticasT()->get(); 
		$restaurantes2 = Pedidos::estadisticasE()->get(); 
		$publicidad = Publicidad::pagos()->get();
		// // $nuevafecha = date('Y-m-d', strtotime('+7 day'));//arreglo para días 
		// $cantidad = Pedidos::cantidad()->get();
		// $credito = Estadisticas::where('tipo', '=','tarjeta')->get();
		// $efectivo = Estadisticas::where('tipo', '=','efectivo')->get();		
		
	
		return View::make('Admin.estadisticas',compact('restaurantes','restaurantes2','publicidad'));
		 	 
	}



	
	public function candidatos(){
		$candidatos = Restaurantes::where('validado','=','0')->get();
		return View::make('Admin.candidatos',compact('candidatos'));
	}

	public function candidato($id)
	{
		$candidato=Restaurantes::where('id','=',$id)->get();
		$candidato = $candidato[0];

		return View::make('Admin.candidato',compact('candidato'));
		
	}
	public function validar()
	{	

		$rules = array(			
			'password'	       => 'required',
			'user'				=> 'required'
	
			);
		$validator = Validator::make(Input::all(), $rules);

        // process the login
		if ($validator->fails()) {

			return Redirect::back()->withErrors($validator)->withInput(Input::all());
		} else {

			$candidato=Restaurantes::where('id','=',Input::get('id'))->get();
			$candidato[0]->validado = 1;
			$candidato[0]->save();

			$usuario=new User;
			$usuario->username 	=	Input::get('user');
			$usuario->password 	=	Hash::make(Input::get('password'));
			$usuario->id_nivel = 2;
			$usuario->id_restaurante = Input::get('id') ;
			$usuario->save();
			$hd=new hd;
			$hd->id_restaurante = Input::get('id');
			$hd->decision = 1;
			$hd->save();

			return Redirect::to('admin/candidatos')->with('message','Restaurante aceptado con éxito');
		}

	}
	public function borrar_candidato()
	{
			$candidato=Restaurantes::where('id','=',Input::get('id'))->get();
			$candidato[0]->delete();
			return Redirect::to('admin/candidatos')->with('message','Restaurante eliminado con éxito');
	}
	public function categorias()
	{
		$categorias = Categorias::All();

		return View::make('Admin.categorias',compact('categorias'));

	}


	public function activar()
	{	dd(Input::All());
		// $valor = Input::get('activar');
		// $activa = Input::get('opt');
		// $categoria = Categorias::find($valor);
		// $categoria->activa = $activa;
		// $categoria->save();
		// 	return Redirect::back()->with('message','Cambios con exito');
	}


	public function publicar()
	{
		$publicidad = new Publicidad;
		$image = Input::file('imagen');
		if($image!=null){
			
				$name_image = $image -> getClientOriginalName();	
				$image_final = 'publicidad/' .$name_image;
				$publicidad->imagen = $image_final;
				$image -> move('publicidad', $name_image );
			}
		// $date = DateTime::createFromFormat('d/m/Y', Input::get('date1'));
		// $date=$date->format('Y-m-d');
		
		$publicidad->descripcion = Input::get('descripcion');
		$publicidad->id_restaurante = Input::get('restaurante');
		$publicidad->dia = Input::get('date1');
		$publicidad->hora_inicio = Input::get('hora_inicio');
		$publicidad->hora_fin = Input::get('hora_fin');
		$publicidad->save();
		return Redirect::back()->with('message','Publicidad subida correctamente');
	}
	public function vistos()
	{
		$alimentos=DetallesPedidos::vistos()->get();
		$mensaje = 1;
		return View::make('Admin.alimentos',compact('alimentos','mensaje'));
	}
	public function maspedidos()
	{
		$alimentos=DetallesPedidos::vistos()->get();

		$mensaje = 2;
		return View::make('Admin.alimentos',compact('alimentos','mensaje'));
	}
	public function precios()
	{
		// $alimentos=Productos::where('tipo','=','alimento')->orderBy('costo_unitario','DSC')->get();
		$alimentos=Productos::alimentos2()->get();
		$mensaje = 0;
		return View::make('Admin.alimentos',compact('alimentos','mensaje'));
	}
	public function porcategoria()
	{

		$alimentos=Productos::alimentos()->get();
		$categorias = Categorias::All();
		return View::make('Admin.alimentos2',compact('alimentos','categorias'));
	}

		public function vistos2()
	{
		$bebidas=DetallesPedidos::vistos2()->get();
		$mensaje = 1;
		return View::make('Admin.bebidas',compact('bebidas','mensaje'));
	}
	public function maspedidos2()
	{
		$bebidas=DetallesPedidos::vistos2()->get();

		
		$mensaje = 2;
		return View::make('Admin.bebidas',compact('bebidas','mensaje'));
	}
	public function precios2()
	{
		// $bebidas=Productos::where('tipo','=','bebida')->orderBy('costo_unitario','DSC')->get();
		$bebidas=Productos::bebidas2()->get();
		$mensaje = 0;
		return View::make('Admin.bebidas',compact('bebidas','mensaje'));
	}
	public function porcategoria2()
	{

		$bebidas=Productos::bebidas()->get();
		$categorias = Categorias::All();
		return View::make('Admin.bebidas2',compact('bebidas','categorias'));
	}
		public function vistos3()
	{
		$restaurantes=DetallesPedidos::vistos3()->get();
		$mensaje = 1;
		return View::make('Admin.restaurantes',compact('restaurantes','mensaje'));
	}
		public function ordenes()
	{
		$variable=Pedidos::pedidas()->get();
		$restaurantes= Restaurantes::where('validado','=','1')->get();	
	    $mensaje = 2;
		return View::make('Admin.restaurantes2',compact('restaurantes','variable','mensaje'));
	}
		public function reservaciones()
	{
		$variable=Reservaciones::reservadas()->get();
		$restaurantes= Restaurantes::where('validado','=','1')->get();			
		$mensaje = 3;
		return View::make('Admin.restaurantes2',compact('restaurantes','variable','mensaje'));
	}
		public function ventas()
	{
		$variable=Pedidos::total()->get();
		$restaurantes= Restaurantes::where('validado','=','1')->get();	
		$mensaje=4;		
		return View::make('Admin.restaurantes2',compact('restaurantes','variable','mensaje'));
	}
		public function productos()
	{
		$variable=Productos::rest()->get();
		$restaurantes= Restaurantes::where('validado','=','1')->get();			
		$mensaje=5;
		return View::make('Admin.restaurantes2',compact('restaurantes','variable','mensaje'));
	}
		public function op()
	{
		$variable=Pedidos::oP()->get();
		$restaurantes= Restaurantes::where('validado','=','1')->get();			
		$mensaje=6;
		return View::make('Admin.restaurantes2',compact('restaurantes','variable','mensaje'));
	}




	public function editar(){

		if(Input::has('Editar'))
		{	
			$publicidad = Publicidad::find(Input::get('publicidad_id'));
		    $restaurante = Restaurantes::where('id','=',$publicidad->id_restaurante);
		    return View::make('Admin.publicidad2',compact('publicidad','restaurante'));

		}
		if(Input::has('Eliminar'))
		{	
		$publicidad=Publicidad::where('id','=',Input::get('publicidad_id'))->get();
			$publicidad[0]->delete();
			return Redirect::to('admin/publicidad')->with('message','Publicidad eliminada con éxito');
        }

	
	}

	public function savechanges(){
		$publicidad = Publicidad::find(Input::get('id'));
		// $date1 = DateTime::createFromFormat('d/m/Y', Input::get('date'));
		// $date1=$date1->format('Y-m-d');
		
		$publicidad->descripcion = Input::get('descripcion');
		// $publicidad->dia = $date1;
		
		$publicidad->hora_inicio = Input::get('hora_inicio');
		$publicidad->hora_fin = Input::get('hora_fin');
		$publicidad->save();
		return Redirect::to('admin/publicidad')->with('message','Cambios con éxito');
			
	}

	public function editarA()
	{
		if(Input::has('Editar'))
		{

			$producto = Productos::find(Input::get('id_producto'));
			$cat =  Categorias::find($producto->id_categoria);
			$cat2 =  Categorias::find($producto->id_categoria2);
	    	$categorias = Categorias::where('activa','=','1')->lists('nombre','id');		
			return View::make('Admin.editarproductoA',compact('producto','cat','cat2','categorias'));

		}
		elseif (Input::has('Eliminar')) 
		{
			$producto = Productos::find(Input::get('id_producto'));
			$producto->delete();
			return Redirect::to('/admin/alimentos')->with('success','Alimento eliminado con éxito');
		}
	}

	public function guardarA()
	{
		$producto = Productos::find(Input::get('id'));
		$image = Input::file('imgFile');
		if($image!=null){

			    $name_image = $image -> getClientOriginalName();	
				$image_final = 'productos/' .$name_image;
				$producto->imagen = $image_final;
				$image -> move('productos', $name_image );
		}
			
	
		$producto->nombre = Input::get('nombre');
		$producto->descripcion = Input::get('descripcion');
		$estado = Input::get('estado');
			if($estado==1){
				$producto->estado = 1;
			}
			else
			{
				$producto->estado = 0;
			}

		
		$producto->save();

		return Redirect::to('admin/alimentos')->with('message','Cambios con exito');
	}

	public function editarB()
	{
		if(Input::has('Editar'))
		{

			$producto = Productos::find(Input::get('id_producto'));
			$cat =  Categorias::find($producto->id_categoria);
			$cat2 =  Categorias::find($producto->id_categoria2);
	    	$categorias = Categorias::where('activa','=','1')->lists('nombre','id');		
			return View::make('Admin.editarproductoB',compact('producto','cat','cat2','categorias'));

		}
		elseif (Input::has('Eliminar')) 
		{
			$producto = Productos::find(Input::get('id_producto'));
			$producto->delete();
			return Redirect::to('/admin/bebidas')->with('success','Bebida elimnada con éxito');
		}
	}

	public function guardarB()
	{
		$producto = Productos::find(Input::get('id'));
		$image = Input::file('imgFile');
		if($image!=null){
			 $name_image = $image -> getClientOriginalName();	
				$image_final = 'productos/' .$name_image;
				$producto->imagen = $image_final;
				$image -> move('productos', $name_image );
		}
			
	
		$producto->nombre = Input::get('nombre');
		$producto->descripcion = Input::get('descripcion');
		$estado = Input::get('estado');
			if($estado==1){
				$producto->estado = 1;
			}
			else
			{
				$producto->estado = 0;
			}

		
		$producto->save();

		return Redirect::to('admin/bebidas')->with('message','Cambios con exito');
	}

	public function agregarc()
	{
		return View::make('Admin.nuevac');
	}

	public function nuevac()
	{

		$categoria = new Categorias;
		$categoria->nombre = Input::get('nombre');
		$categoria->descripcion = Input::get('descripcion');
		$estado = Input::get('estado');
		if ($estado == 1) {
			$categoria->activa = 1;
		}
		else{
			$categoria->activa = 0;
		}
		$categoria->save();
		return Redirect::to('admin/categorias')->with('message','Categoría subida correctamente');

	}

		public function editarc(){

		if(Input::has('Editar'))
		{	
			$categoria = Categorias::find(Input::get('cat_id'));
		    return View::make('Admin.categorias2',compact('categoria'));

		}
		if(Input::has('Eliminar'))
		{	
		 	$categoria = Categorias::where('id','=',Input::get('cat_id'))->get();
			$categoria[0]->delete();
			return Redirect::to('admin/categorias')->with('message','Categoría eliminada con éxito');
        }

	
	}

	public function savec()
	{

		$categorias = Categorias::find(Input::get('id'));
		$categorias->descripcion = Input::get('descripcion');
		$categorias->nombre = Input::get('nombre');
		$estado = Input::get('estado');
		if ($estado == 1) {
			$categorias->activa = 1;
		}
		else{
			$categorias->activa = 0;
		}
		$categorias->save();
		return Redirect::to('admin/categorias')->with('message','Cambios con éxito');

	}

	public function finanzas()
	{
		$pedidos = Pedidos::find(Input::get('id'));
		$pedidos->pagoR = 1;
		$pedidos->save();
		$finanzas = new Estadisticas();
		$finanzas->id_restaurante = Input::get('id');
		$finanzas->costo_promedio = Input::get('costo_promedio');
		$finanzas->tipo = Input::get('tipo');
		$finanzas->save();
		return Redirect::to('admin/estadisticas')->with('message','Pago guardado');

	}

	public function finanzasPu()
	{
		$restaurantes = Restaurantes::find(Input::get('id'));
		$restaurantes->con_telefono = 0;
		$restaurantes->con_direccion = 0;
		$restaurantes->save();
		// $publicidad = Publicidad::where('id_restaurante','=',Input::get('id'))->first();
		Publicidad::where('id_restaurante', '=', Input::get('id'))->update(['contador' => 0]); 
		// $publicidad->contador = 0;
		// $publicidad->save();
		return Redirect::to('admin/estadisticas')->with('message','Pago guardado');

	}

	public function editarR()
	{
		if(Input::has('Editar'))
		{

			$restaurantes = Restaurantes::find(Input::get('id_restaurante'));
			return View::make('Admin.editarR',compact('restaurantes'));

		}
		elseif (Input::has('Eliminar')) 
		{
			$restaurantes = Restaurantes::find(Input::get('id_restaurante'));
			$restaurantes->delete();
			return Redirect::to('/admin/restaurantes')->with('success','Restaurante eliminado con éxito');
		}
	}

	public function guardarR()
	{
		$restaurante = Restaurantes::find(Input::get('id'));
		$image = Input::file('imgFile');
		if($image!=null){

			    $name_image = $image -> getClientOriginalName();	
				$image_final = 'restaurantes/' .$name_image;
				$restaurante->imagenR = $image_final;
				$image -> move('restaurantes', $name_image );
		}

			$restaurante->nombre 	=Input::get('nombre');
			$restaurante->telefono = Input::get('telefono');
			$restaurante->coordenadas = Input::get('coordenadas');
			$restaurante->direccion=Input::get('direccion');
			$restaurante->hora_inicio=Input::get('hora_inicio');
			$restaurante->hora_fin=Input::get('hora_fin');
			$restaurante->save();
			return Redirect::to('/admin/restaurantes')->with('success','Restaurante guardado con éxito');



	}


		public function facturas()
	{	
	
		$Facturas = FacturarR::All();
		return View::make('Admin.facturaA',compact('Facturas'));

	}


		public function nuevafac()
	{
		return View::make('Admin.facturas');
	}

		public function facturaM()
	{
		$factura = FacturarR::find(Input::get('id'));
		$factura->estatus = 'facturada';
		$factura->save();
		return Redirect::to('/admin/facturas')->with('message','Factura guardada con éxito');
	}
	public function facturacion()
	{

			$factura = New Facturas;
			$factura->nombreUsuario = Input::get('nombre');
			$factura->Domicilio = Input::get('domicilio');
			$factura->rfc = Input::get('RFC');
			$factura->correo = Input::get('Correo');
			$factura->save();
			$FacturarR = New facturarr;
			$FacturarR->id_restaurante = Auth::user()->id_restaurante;
			$FacturarR->estatus = 'pendiente';
			$FacturarR->costo = Input::get('Costo');
			$FacturarR->save();
			return Redirect::to('/admin/facturas')->with('message','factura guardada con éxito');
			
				
	}



}
