<?php

class ProductController extends CommonController
{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sql = Source_Product_ProductFlat::orderBy('id','desc');
		$status = trim(Input::get('status'));
		if( $status )
		{
			$sql->where('status', $status );
	    }
		$sku = trim(Input::get('sku'));
		if( $sku )
		{
			$sql->where('sku', $sku );
		}
		$data = $sql->paginate(self::$adminPage);
		$this->view('admin.pbrand.index',compact('data','status','sku'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//$setID = decode( trim('setid') );
		$data = Source_Product_ProductEav::where('attbute_set_id',5)->with('productEavToEav')->get();

		//var_dump(count($data));
		$this->view('admin.product.create',compact('data'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 *
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
