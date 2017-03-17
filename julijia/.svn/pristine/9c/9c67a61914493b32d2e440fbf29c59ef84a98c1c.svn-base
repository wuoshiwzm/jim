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
		$name = trim(Input::get('name'));
		if( $name )
		{
			$sql->where('name','like','%'.$name.'%');
		}
		$username = trim(Input::get('username'));
		if( $username )
		{
			$sql->where('lianxiren','like','%'.$username.'%');
		}
		$phone = trim(Input::get('phone'));
		if( $phone )
		{
			$sql->where('phone','like','%'.$phone.'%');
		}
		$user = $sql->paginate(self::$adminPage);

		$this->view('admin.supplier.index',compact('user','name','username','phone'));
	}

	/**
	 * @return mixed
	 * 添加页面
	 */
	public function create()
	{
		$this->view('admin.supplier.create');
	}


	/**
	 * @param Request $request
	 * 添加
	 */
	public function store()
	{
		$Input = trimValue( Input::all() );
		$validator = User::validatorSupplier( $Input );
		if( $validator === true )
		{
            $res = User::addSupplier( $Input );
			if ( $res )
			{
				//添加成功
                return Redirect::to('admin/user/supplier')->with('msg','添加成功');

			}else
			{
				//添加失败
				return back()->with('msg','添加失败');
			}

		}else
		{
			return back()->withErrors($validator);
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
		return view('admin.supplier.edit',compact('user'));
	}


	/**
	 * @param Request $request
	 * @param $id
	 * 修改数据
	 */
	public function update( $id )
	{
		$Input = trimValue( Input::all() );
		$validator = User::validatorSupplier( $Input );
		if( $validator === true )
		{
			$res = User::editSupplier( $Input, $id );
			if ( $res )
			{
				//修改成功
				return Redirect::to('admin/user/supplier')->with('msg','修改成功');

			}else
			{
				//修改失败
				return back()->with('msg','修改失败');
			}

		}else
		{
			return back()->withErrors($validator);
		}
	}

	/**
	 * @param $id
	 * @return string
	 * 删除
	 */
	public function destroy( $id )
	{
		$res = Source_User_SupplierInfo::find( $id );
		if( $res )
		{
			if( $res->delete() )
			{
				return 'success';
			}else
			{
				return 'fail';
			}
		}

		return 'fail';
	}

}
