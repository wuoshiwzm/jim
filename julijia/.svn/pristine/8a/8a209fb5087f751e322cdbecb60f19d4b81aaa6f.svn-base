<?php

class ProductImgController extends CommonController
{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create( $id )
	{
		$id = trim( $id );
		$attribute_set_id = Input::get('set_id');
		$data = Source_Product_ProductImage::where('entity_id',$id)->with('getImgToProductFlat')->get()->toArray();
		$this->view('admin.product.goodsimg',compact('id','data','attribute_set_id'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 *
	 */
	public function store()
	{
		$Input = Input::all();
	    $res = Product::addImg( $Input );
		if ( $res )
		{
			$attribute_set_id = $Input['attribute_set_id'];
			if( $Input['setid'] )
			{
				//修改成功
				return Redirect::to('/admin/product/goodsimg/'.$Input['entityID'].'?setid='.$Input['setid'])->with('msg','操作成功');
			}else
			{
				return Redirect::to('/admin/product/goodsimg/show/'.$Input['entityID'].'?aid='.$attribute_set_id);
			}

		}else
		{
			//添加失败
			return Redirect::back()->with('msg','添加失败');
		}
	}


	/**
	 * @param $id
	 * 添加完成页面
	 */
	public function show( $id )
	{
		$aid = Input::get('aid');
		$this->view('admin.product.productend',compact('id','aid'));
	}
}
