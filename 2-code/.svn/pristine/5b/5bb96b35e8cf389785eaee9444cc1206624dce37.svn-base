<?php

/**
 * Class HomeController
 * 供应商控制器
 */

class SupplierController extends CommonController
{

	public function __construct()
	{
		parent::__construct();
	}
	/**
	 *  @return mixed
	 *  供应商人员列表
	 */
    public function  index()
	{
		$sql = Source_User_SupplierInfo::orderBy('id','desc');
		//供应商名称
		$name = trim(Input::get('name'));
		if( $name )
		{
			$sql->where('name','like','%'.$name.'%');
		}
		//联系人
		$username = trim(Input::get('username'));
		if( $username )
		{
			$sql->where('lianxiren','like','%'.$username.'%');
		}
		//联系电话
		$phone = trim(Input::get('phone'));
		if( $phone )
		{
			$sql->where('phone','like','%'.$phone.'%');
		}
		$setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
		$user = $sql->paginate( $setPage );
		$set['name'] = $name;
		$set['username'] = $username;
		$set['phone'] = $phone;
		$set['setpage'] = $setPage;
		$this->view('admin.supplier.index',compact('user','set'));
	}

	/**
	 * @return mixed
	 * 添加页面
	 */
	public function create()
	{
		$province = Source_Area_Province::get();
		$this->view('admin.supplier.create',compact('province'));
	}


	/**
	 * @param Request $request
	 * 添加
	 */
	public function store()
	{
		$Input = trimValue( Input::all() );
		$validator = Supplier::validatorSupplier( $Input );
		if( $validator === true )
		{
            $res = Supplier::addSupplier( $Input );
			if ( $res )
			{
				//添加成功
                return Redirect::to('admin/user/supplier')->with('msg','添加成功');

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
	 *  @param $id
	 *  @return mixed
	 *  修改页面
	 */
	public function edit( $id )
	{
        $id = decode( trim($id) );
		$user = Source_User_SupplierInfo::findOrFail( $id );
		$this->view('admin.supplier.edit',compact('user'));
	}


	/**
	 * @param Request $request
	 * @param $id
	 * 修改数据
	 */
	public function update( $id )
	{
		$id = decode( trim($id) );
		$res = Supplier::editSupplier( Input::get('status'), $id );
		if ( $res )
		{
			//修改成功
			return Redirect::to('admin/user/supplier')->with('msg','修改成功');

		}else
		{
			//修改失败
			return Redirect::back()->with('msg','修改失败');
		}
	}

	/**
	 * @param $id
	 * @return string
	 * 删除
	 */
	public function destroy( $id )
	{
		$id = decode( trim($id) );
		$res = Source_User_SupplierInfo::find( $id );
		if( $res )
		{
			$pCount = Source_Product_ProductFlat::where( 'supplier',$res->id )->count();
			if( $pCount )
			{
				$obj = new stdClass();
				$obj->ststus = 1;
				$obj->msg = '供应商已添加产品不可删除';
				return json_encode($obj);
				
			}

			if( $res->delete() )
			{
                $res->supplierToBrand()->delete();
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
			$obj->msg = '删除失败';
			return json_encode($obj);
		}
	}
}
