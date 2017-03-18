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
			$sql->where('attribute_name','like','%'.$name.'%');
		}
        $data = $sql->paginate(self::$adminPage);
		$this->view('admin.producteav.absindex',compact('data'));
	}

	/**
	 * 添加页面
	 */
	public function attributeBaseCreate()
	{
		$this->view('admin.producteav.abscreate');
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
				return Redirect::to('admin/product/attribute_base_index')->with('msg','添加成功');

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
			$this->view('admin.producteav.absedit',compact('data'));

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
				return Redirect::back()->with('msg','修改失败');
			}
			$res = Source_Eav_AttrbuteSet::where( 'id', $id )->update( $Input );
			if ( $res )
			{
				//修改成功
				return Redirect::to('admin/product/attribute_base_index')->with('msg','修改成功');

			}else
			{
				//修改失败
				return Redirect::back()->with('msg','修改失败');
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
			return $obj;
		}else
		{
			$res = Source_Eav_AttrbuteSet::find($id);
			if( $res->forceDelete() )
			{
				$obj = new stdClass();
				$obj->ststus = 0;
				$obj->msg = '删除成功';
				return $obj;
			}else
			{
				$obj = new stdClass();
				$obj->ststus = 1;
				$obj->msg = '删除失败';
				return $obj;
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
	 * 产品属性基列表
	 */
	public function attributeIndex()
	{
		$sql = Source_Eav_Attrbute::orderBy('id','desc');
		$name = trim(Input::get('name'));
		if( $name )
		{
			$sql->where('name','like','%'.$name.'%');
		}
		$data = $sql->paginate(self::$adminPage);
		$this->view('admin.producteav.abindex',compact('data'));
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
			$res = Product::addAb( $Input );
			if ( $res )
			{
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
			return $obj;
		}else
		{
			$res = Source_Eav_Attrbute::find($id);
			if( $res->forceDelete() )
			{
				$obj = new stdClass();
				$obj->ststus = 0;
				$obj->msg = '删除成功';
				return $obj;
			}else
			{
				$obj = new stdClass();
				$obj->ststus = 1;
				$obj->msg = '删除失败';
				return $obj;
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
			$data = Source_Eav_Attrbute::findOrFail( $id );
			$this->view('admin.producteav.abedit',compact('data'));

		}

		//编辑保存数据
		if( $methodType == 'POST' )
		{
			$id = decode(trim( Input::get('id') ));
			$data = trimValue( Input::all() );
			$Input = array_except( $data, ['id'] );
			$res = Source_Eav_Attrbute::where( 'id', $id )->update( $Input );
			if ( $res )
			{
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
			$data = ProductEav::getAdsToAd( $setId );
			$pEav = $data->pEav;
			$eav = $data->eav;
			$this->view('admin.producteav.abstoab',compact('pEav','eav','setId'));
		}

		//编辑保存数据
		if( $methodType == 'POST' )
		{
			$setId = decode(trim( Input::get('setid') ));
			$data = trimValue( Input::get('aid') );
			$res = ProductEav::AdsToAdSave( $setId, $data );
			if ( $res )
			{
				//修改成功
				return Redirect::to('admin/product/attribute_base_index')->with('msg','修改成功');

			}else
			{
				//修改失败
				return Redirect::back()->with('msg','修改失败');
			}
		}
	}
}