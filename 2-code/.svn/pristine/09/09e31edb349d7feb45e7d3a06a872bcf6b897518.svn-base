<?php

/**
 * Class HomeController
 * 后台产品eav控制器
 */
class ProductEavController extends CommonController
{

	public function __construct()
	{
		parent::__construct();
	}



	/**
	 * ------------------------------------------------------------------------
	 *
	 *  属性集
	 *
	 * ------------------------------------------------------------------------
	 */

	/**
	 * @return mixed
	 * 产品属性基列表
	 */
	public function attributeBaseIndex()
	{
		$sql = Source_Eav_AttrbuteSet::orderBy('id','desc');
		$name = trim(Input::get('name'));
		if( $name )
		{
			if( $name == '%' )
			{
				$name = ' ';
			}
			$sql->where('attribute_name','like','%'.addslashes($name).'%');
		}
		$setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
		$data = $sql->paginate( $setPage );
		$set['name'] = $name;
		$set['setpage'] = $setPage;
		$this->view('admin.producteav.absindex',compact('data','set'));
	}

	/**
	 * 添加页面
	 */
	public function attributeBaseCreate()
	{
		return View::make('admin.producteav.abscreate');
	}

	/**
	 *  添加属性集
	 */
	public function attributeBaseStore()
	{
		$Input = trimValue( Input::all() );
		$validator = ProductEav::validatorAbs( $Input );
		if( $validator === true )
		{
			$res = ProductEav::addAbs( $Input );
			if ( $res )
			{
				//添加成功
				return "<script>parent.layer.msg('添加成功',{icon: 1});parent.window.location.href='/admin/product/attribute_base_index';var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index)</script>";

			}else
			{
				//添加失败
				return "<script>parent.layer.msg('添加失败',{icon: 2});</script>";
			}

		}else
		{
			return "<script>parent.layer.msg('验证失败',{icon: 2});</script>";
		}
	}


	/**
	 *  编辑属性集页面和保持数据
	 */
	public function attributeBaseEdit()
	{

		$methodType = Request::method();
		//编辑页面
		if( $methodType == 'GET' )
		{
			$id = decode(trim( Input::get('id') ));
			$data = Source_Eav_AttrbuteSet::findOrFail( $id );
			return View::make('admin.producteav.absedit',compact('data'));

		}
		//编辑保存数据
		if( $methodType == 'POST' )
		{
			$id = decode(trim( Input::get('id') ));
			$data = trimValue( Input::all() );
			$Input = array_except( $data, ['id'] );
			if( Source_Eav_AttrbuteSet::where( $Input )->count() )
			{
				//修改失败
				return "<script>parent.layer.msg('修改失败',{icon: 2});var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>";
			}
			$res = Source_Eav_AttrbuteSet::where( 'id', $id )->update( $Input );
			if ( $res )
			{
				//修改成功
				return "<script>parent.layer.msg('修改成功',{icon: 1});parent.window.location.href='/admin/product/attribute_base_index';var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>";

			}else
			{
				//修改失败
				return "<script>parent.layer.msg('修改失败',{icon: 2});var index = parent.layer.getFrameIndex(window.name);parent.layer.close(index);</script>";
			}
		}
	}

	/**
	 * 删除属性集
	 */
	public function attributeBaseDel( )
	{
		$id = decode( trim( Input::get('id') ));
		$is_connection = ProductEav::getRavTypeCount( $id, 'attbute_set_id' );
		if( $is_connection )
		{
			$obj = new stdClass();
			$obj->ststus = 1;
			$obj->msg = '属性集已关联属性不可删除';
			return json_encode($obj);
		}else
		{
			$res = Source_Eav_AttrbuteSet::find($id);
			if( $res->delete() )
			{
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
		}
	}


	/**
	 * ------------------------------------------------------------------------
	 *
	 *  属性
	 *
	 * ------------------------------------------------------------------------
	 */

	/**
	 * @return mixed
	 * 产品属性列表
	 */
	public function attributeIndex()
	{
		//$sql = Source_Eav_Attrbute::where('is_system',0)->orderBy('is_system','asc');
		$sql = Source_Eav_Attrbute::orderBy('is_system','asc');
		$name = trim(Input::get('name'));
		if( $name )
		{
			if( $name == '%' )
			{
				$name = ' ';
			}
			$sql->where('name','like','%'.$name.'%');
		}
		$setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
		$data = $sql->paginate($setPage);
		$set['name'] = $name;
		$set['setpage'] = $setPage;
		$this->view('admin.producteav.abindex',compact('data','set'));
	}

	/**
	 * 添加页面
	 */
	public function attributeCreate()
	{
		$this->view('admin.producteav.abcreate');
	}


	/**
	 * @return mixed
	 * 保存属性数据
	 */
	public function attributeStore()
	{
		$Input = trimValue( Input::all() );
		$validator = ProductEav::validatorAb( $Input );
		if( $validator === true )
		{
			$res = ProductEav::addAb( $Input );
			if ( $res )
			{
				//清理缓存
				Event::fire('admin.operational.data',array(4));
				//添加成功
				return Redirect::to('admin/product/attribute_index')->with('msg','添加成功');

			}else
			{
				//添加失败
				return Redirect::back()->with('msg','添加失败');
			}

		}else
		{
			return Redirect::back()->withErrors($validator);
		}
	}


	/**
	 *
	 * 
	 *  删除属性
	 */
	public function attributeDel( )
	{
		$id = decode( trim( Input::get('id') ));
		$is_connection = ProductEav::getRavTypeCount( $id, 'attbute_id' );
		if( $is_connection )
		{
			$obj = new stdClass();
			$obj->ststus = 1;
			$obj->msg = '属性已关联属性集不可删除';
			return json_encode($obj);
		}else
		{
			$res = Source_Eav_Attrbute::find($id);
			if( $res == false )
			{
				$obj = new stdClass();
				$obj->ststus = 1;
				$obj->msg = '未查询到数据，刷新重试';
				return json_encode($obj);
			}
			if( $res->delete() )
			{
				//清理缓存
				Event::fire('admin.operational.data',array(4));
				$res->ButeToButeValue()->delete();
				//删除上传的图片
				(new Upload())->delDir( 'attribute', $id );
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
		}
	}

	/**
	 *  修改属性
	 */
	public function attributeEdit()
	{
		$methodType = Request::method();
		//编辑页面
		if( $methodType == 'GET' )
		{
			$id = decode(trim( Input::get('id') ));
			$data = Source_Eav_Attrbute::with('ButeToButeValue')->findOrFail( $id );
			$this->view('admin.producteav.abedit',compact('data'));

		}

		//编辑保存数据
		if( $methodType == 'POST' )
		{
			$id = decode(trim( Input::get('id') ));
			$data = Input::all();
			$res = ProductEav::editAb( $data, $id  );
			if ( $res )
			{
				//清理缓存
				Event::fire('admin.operational.data',array(4));
				//修改成功
				return Redirect::to('admin/product/attribute_index')->with('msg','修改成功');

			}else
			{
				//修改失败
				return Redirect::back()->with('msg','修改失败');
			}
		}
	}

	/**
	 * 查询挂靠好的属性
	 * @return array
	 */
	public function attributeGetData()
	{
		$setId = decode(trim( Input::get('setid') ));
		$data = ProductEav::getAdsToAd( $setId );
		return $data;
	}

	/**
	 * 查询属性
	 * @return string
	 */
	public function  attributeGetCusonterData()
	{
		$setId = decode(trim( Input::get('setid') ));
		$data = ProductEav::getAdsGetCustomerData( $setId );
		return $data;
	}

	/**
	 * @return mixed
	 * 属性集关联属性
	 */
	public function absToAb()
	{

		$methodType = Request::method();
		//编辑页面
		if( $methodType == 'GET' )
		{
			$setId = decode(trim( Input::get('setid') ));
			//可配置属性
			$attrbute = Source_Eav_Attrbute::where('is_fiter',1)->whereIn('front_input',['checkbox','select'])->get();
			$fiterlist  = Source_Product_ProductEav::where('attbute_set_id',$setId)->where('is_fiter',1)->lists('attbute_id');
			$this->view('admin.producteav.abstoab',compact('setId','attrbute','fiterlist'));
		}

		//编辑保存数据
		if( $methodType == 'POST' )
		{
			$data = Input::get('data');
			$fiter = Input::get('fiter');
			$res = ProductEav::AdsToAdSave( $data,$fiter );
			if ( $res )
			{
				//修改成功
				return 1;

			}else
			{
				//修改失败
				return 0;
			}
		}
	}


	/**
	 * @return int|string
	 * 关系挂载
	 */
	public function  absToAbSave()
	{
		try{
			$data = Input::get('data');
			$setid = Input::get('setid');
			Source_Product_ProductEav::where('attbute_set_id',decode($setid))->delete();
			foreach ($data as $val)
			{

				$model   = new Source_Product_ProductEav();
				$model->attbute_set_id=decode($val['setid']);
				$model->attbute_id=$val['id'];
				if($val['parent'] == "基本"){
					$model->group=1;
				}
				if($val['parent']== "价格"){
					$model->group=2;
				}
				if($val['parent'] == "seo"){
					$model->group=3;
				}
				if($val['parent']== "图片"){
					$model->group=4;
				}
				if($val['parent'] == "描述"){
					$model->group=5;
				}
				$model->save();
			}
		} catch (Exception $e)
		{
			return  '0';
		}
		return 1;
	}
	
}