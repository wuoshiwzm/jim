<?php

class ProductController extends CommonController
{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * 产品首页
	 * @return Response
	 */
	public function index()
	{
		$sql = Source_Product_ProductFlat::orderBy('id','desc');
		//状态
		$status = trim(Input::get('status'));
		if( $status == '' || $status == '1' )
		{
			$sql->where('status', 1 );

		}else
		{
			$sql->where('status', 0 );
		}

		$name = trim(Input::get('name'));
		if( $name )
		{
			if( is_numeric( $name ) )
			{
				//产品ID
				$sql->where('entity_id', $name );
			}else
			{
				//产品名称
				$sql->where('name','like',"%".$name."%" );
			}
		}
		$attbuteset = trim(Input::get('attbuteset'));
		if(!empty($attbuteset)|| $attbuteset !=''){

			$sql->where('attribute_set_id' ,$attbuteset);
		}

		//分类
		$category_id = trim(Input::get('category_id'));
		if( $category_id )
		{
			$sql->where('category_id', $category_id );
		}

		$setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
		$data = $sql->paginate($setPage);
		$set['status'] = $status;
		$set['name'] = $name;
		$set['category_id'] = $category_id;
		$set['setpage'] = $setPage;
		$set['attbuteset'] = $attbuteset;
		$category = ProductCategory::getTree( Source_Product_ProductCategory::orderBy('sort','desc')->get(), 0 );
		$this->view('admin.product.index',compact('data','set','category'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$abs =  Source_Eav_AttrbuteSet::get();
		$category = Source_Product_ProductCategory::where(['parent_id'=>0,'status'=>1])->get();
		$this->view('admin.product.create',compact('abs','category'));
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
		$eID = time();
		$res = Product::addGoods( $Input, $eID );
		if ( $res )
		{
			//添加成功
			//清理缓存
			Event::fire('admin.operational.data',array(1));
			return Redirect::to('/admin/product/goodsimg/'.$eID.'?attribute_set_id='.$Input['attribute_set_id']);

		}else
		{
			//添加失败
			return Redirect::back()->with('msg','添加失败');
		}
	}

	/**
	 *  @param $id
	 *  @return mixed
	 *  修改页面
	 */
	public function edit( $id )
	{
		$id = decode( trim($id) );
		$setID = trim(decode(Input::get('setid')));
		//供应商
		$supplier = Source_User_SupplierInfo::get();
		//线下门店
		$shop = Source_User_ShopInfo::get();
		//品牌
		$brand = Source_Product_ProductBrand::get();
		$data = Product::getProductFrom( $setID );
		//查询表
		$flat = Source_Product_ProductFlat::where( 'entity_id', $id )->with('productFlatToFlatDetail')->first();
		$this->view('admin.product.edit',compact('data','shop','supplier','id','setID','flat','brand'));
	}

	/**
	 * @param
	 * @param $id
	 * 修改数据
	 */
	public function update( $id )
	{
		$id = decode( trim($id) );
		$Input = Input::all();
		$res = Product::editGoods( $Input, $id );
		if ( $res )
		{
			//修改成功
			//清理缓存
			Event::fire('admin.operational.data',array(1));
			return Redirect::to('/admin/product/goods?status=0');

		}else
		{
			//添加失败
			return Redirect::back()->with('msg','修改失败');
		}
	}


	/**
	 * @param $id
	 * @return string
	 * 删除产品
	 */
	public function destroy( $id )
	{
		$id = trim($id);
		$res = Source_Product_ProductFlat::where('entity_id', $id )->first();
		if( $res )
		{
			$row = Product::delGoods( $id );
			if( $row )
			{
				//清理缓存
				Event::fire('admin.operational.data',array(1));
				$obj = new stdClass();
				$obj->ststus = 0;
				$obj->msg = '删除成功';
				return json_encode($obj);

			}else
			{
				$obj = new stdClass();
				$obj->ststus = 1;
				$obj->msg = '删除失败';
				return json_encode($obj);
			}

		}else
		{
			$obj = new stdClass();
			$obj->ststus = 1;
			$obj->msg = '检索失败';
			return json_encode($obj);
		}
	}

	/**
	 * @param $pid
	 * @return mixed
	 * 查询分类
	 */
	public function getCategory( $pid )
	{
		return Source_Product_ProductCategory::orderBy('sort','desc')->where(['parent_id'=>$pid,'status'=>1])->get()->toJson();
	}

	/**
	 * 添加产品
	 */
	public function add()
	{
		$methodType = Request::method();
		//编辑页面
		if( $methodType == 'GET' )
		{
			return Redirect::to('/admin/product/goods/create');
		}
		$setID = decode( trim(Input::get('setid')) );
		$categoryName = trim(Input::get('categoryName'));
		$categoryID = trim(Input::get('categoryID'));
		//供应商
		$supplier = Source_User_SupplierInfo::get();
		//线下门店
		$shop = Source_User_ShopInfo::get();
		//品牌
		$brand = Source_Product_ProductBrand::get();
		$data =  Product::getProductFrom( $setID );
		$this->view('admin.product.add',compact('data','categoryName','categoryID','supplier','shop','setID','brand'));
	}


	/**
	 * 产品下架
	 * @return string
	 */
	public function status()
	{
		
		$result = DB::transaction(function() {
			$status = trim(Input::get('status'));
			$entity_id = trim(Input::get('entity_id'));
			$aID = Source_Eav_Attrbute::where('name', 'status')->pluck('id');
			Source_Product_ProductEntityInt::whereRaw('entity_id = ? and attbute_id = ? ', array($entity_id, $aID))->update(['value'=> $status]);
			Source_Product_ProductFlat::where('entity_id', $entity_id)->update(['status' => $status]);
		});
		if( is_null( $result ) )
		{
		    Event::fire('product.changeStatus',array(Input::get('entity_id'),Input::get('status')));
			//清理缓存
			Event::fire('admin.operational.data',array(1));
			$obj = new stdClass();
			$obj->ststus = 0;
			$obj->msg = '操作成功';
			return json_encode($obj);
		}else
		{
			$obj = new stdClass();
			$obj->ststus = 1;
			$obj->msg = '操作失败';
			return json_encode($obj);
		}
	}


	/**
	 * @return mixed
	 * 批量修改产品状态
	 */
	public function statusAll()
	{
		$status = trim(Input::get('status'));
		$result = DB::transaction(function() use ( $status )
		{
			$entity_id = Input::get('check');
			foreach ( $entity_id as $row )
			{
				Event::fire('product.changeStatus',array($row,$status));
				$aID = Source_Eav_Attrbute::where('name', 'status')->pluck('id');
				Source_Product_ProductEntityInt::whereRaw('entity_id = ? and attbute_id = ? ', array( $row, $aID) )->update(['value'=> $status]);
				Source_Product_ProductFlat::where('entity_id', $row)->update(['status' => $status]);
			}
		});

		$status = $status?0:1;
		if( is_null( $result ) )
		{
			//清理缓存
			Event::fire('admin.operational.data',array(1));
			return Redirect::to('/admin/product/goods?status='.$status)->with('msg','操作成功');
		}else
		{
			return Redirect::to('/admin/product/goods?status='.$status)->with('msg','操作失败');
		}
	}
}
