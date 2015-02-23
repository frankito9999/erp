<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function __construct(){


	}

	public function index()
	{
		//if(!$this->autorizado) return Redirect::to('/login');
		return View::make('modules.home');
	}

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function getClientes()
	{
	   $clientes = DB::table("clientes")->get();
	    return Response::json(array(
	        "clientes"        =>        $clientes
	    ));
	}

	public function postClientes()
	{
		$cliente = Cliente::create(Input::all());
		$cliente_id = $cliente->id;

		return Response::json(array(
			'success' => true,
			'id'	  => $cliente_id
		));
	}

	public function editarCliente($id){
		$input = Input::all();

  		Cliente::find($id)->update($input);
	}

	public function borrarCliente($id)
	{
    	Cliente::destroy($id);
	}

 //=================
 // Productos

	public function getProductos()
	{
	   $productos = DB::table("productos")->get();
	    return Response::json(array(
	        "productos"        =>        $productos
	    ));
	}

	public function postProductos()
	{
		$producto = Producto::create(Input::all());
		$producto_id = $producto->id;

		return Response::json(array(
			'success' => true,
			'id'	  => $producto_id
		));
	}

	public function editarProducto($id)
	{
		$input = Input::all();

  		Producto::find($id)->update($input);
	}

	public function borrarProducto($id)
	{
		Producto::destroy($id);
	}

	//Categoria

	public function getCategorias()
	{
	   $categorias = DB::table("categorias")->get();
	    return Response::json(array(
	        "categorias"        =>        $categorias
	    ));
	}

	public function postCategoria()
	{
		$categoria =  Categoria::create(Input::all());
		$categoria_id = $categoria->id;

		return Response::json(array(
			'success' => true,
			'id'	  => $categoria_id
		));
	}

	public function editarCategoria($id)
	{

		$input = Input::all();

  		Categoria::find($id)->update($input);
	}

	public function borrarCategoria($id)
	{
		Categoria::destroy($id);
	}

	//Distribuidor

	public function getDistribuidores(){
		$distribuidores = DB::table("distribuidores")->get();
	    return Response::json(array(
	        "distribuidores"        =>        $distribuidores
	    ));

	}
    public function postDistribuidor(){

    	$distribuidor = Distribuidor::create(Input::all());
    	$distribuidor_id = $distribuidor->id;

		return Response::json(array(
			'success' => true,
			'id'	  => $distribuidor_id
		));

    }
    public function editarDistribuidor($id){

		$input = Input::all();

  		Distribuidor::find($id)->update($input);
    }
    public function borrarDistribuidor($id){

    	Distribuidor::destroy($id);

    }
		//Pedidos

		public function postPedido(){

			$pedido =  Pedido::create(Input::all());
			$pedido_id = $pedido->id;

			return Response::json(array(
				'success' => true,
				'msg'			=> "Venta realizada satisfactoriamente",
				'id'	  => $pedido_id
			));
		}
		public function postPedidoDetalle(){

			$input = Input::all();
			// $detalle2 = '';
			// foreach($input as $key => $value){
			//   $detalle2 =	$value[$key];
			// }

			$pedidoDetalle =  Detalle::create($input);
			$pedidoDetalle_id = $pedidoDetalle->id;

			return Response::json(array(
				'success' => true,
				'msg'			=> "Venta realizada satisfactoriamente",
				'detalle' => $input,
				//'detalle2'=> $detalle2,
				// 'id'	  => $pedidoDetalle_id
			));
		}



    //Orden

	//public function getOrdenes(){
		// $distribuidores = DB::table("distribuidores")->get();
	 //    return Response::json(array(
	 //        "distribuidores"        =>        $distribuidores
	 //    ));

	// }
  //   public function postOrden(){

    	// $distribuidor =  Distribuidor::create(Input::all());
  		// $distribuidor_id = $distribuidor->id;

		// return Response::json(array(
		// 	'success' => true,
		// 	'id'	  => $distribuidor_id
		// ));
    // }
    // public function editarOrden($id){

		// $input = Input::all();

  // 		Distribuidor::find($id)->update($input);
    // }
    // public function borrarOrden($id){

    	// Distribuidor::destroy($id);

    // }








}
