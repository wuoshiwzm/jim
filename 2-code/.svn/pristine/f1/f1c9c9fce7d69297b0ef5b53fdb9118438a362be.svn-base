<?php
// use 	Illuminate\

class CartController extends CommonController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{


		$cart = Cart::getContent();
		// dd(Session::get('cart.main'));
		return $this->view('admin.cart.index',compact('cart'));

	}

	//delete the item you choose
	public function deleteItem($rowid){
		Cart::remove($rowid);
	}

	public function addItem(){
		//createRow($rowId, $id, $shop_id, $name, $qty, $price, $options)
		Cart::add('293ad', 'shopid','Product 1', 1, 9.99, array('size' => 'smallss'));
		echo 'add successful!';

		return ;

		$input = Input::all();
		if(empty($input['id']))
		App::abort(403, 'no product id,should pass with name: id.');

		if(empty($input['shop_id']))
		App::abort(403, 'no shop id,should pass with name: shop_id.');

		if(empty($input['name']))
		App::abort(403, 'no product name,should pass with name: name.');

		if(empty($input['qty']))
		App::abort(403, 'no product quantity,should pass with name: qty.');

		if(empty($input['price']))
		App::abort(403, 'no product price,should pass with name: price.');

		if(!is_array($input['options']))
		App::abort(403, '$input["options"],should be array like size=>small color=>blue.');

		Cart::add('293ad', 'shopid','Product 1', 1, 9.99, array('size' => 'smallss'));

	}


	public function update(){
			$input = Input::all();

			if(empty($input['rowid']))
			App::abort(403, 'no rowid ');

			if(empty($input['attr']))
			App::abort(403, 'no attr, should be a number if you want to change the quantity, or a array for mutiple attributes as quantity,price or options
			should name it as "qty", "price", "options" ');

			Cart::update($input['rowid'], $input['attr']);
	}




}
