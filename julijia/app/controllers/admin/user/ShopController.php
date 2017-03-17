<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/4 0004
 * Time: 16:48
 * 门店控制器
 */
class ShopController extends CommonController
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     *  产品分类列表
     */
    public function  index()
    {
        $sql = Source_User_ShopInfo::orderBy('id','desc');
        $name = trim(Input::get('name'));
        if( $name )
        {
            $sql->where('m_name','like','%'.$name.'%');
        }
        $setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
        $data = $sql->paginate($setPage);
        $set['name'] = $name;
        $set['setpage'] = $setPage;
        $this->view('admin.shop.index',compact('data','set'));
    }


    /**
     * @return mixed
     * 添加页面
     */
    public function create()
    {
        $province = Source_Area_Province::get();
        $this->view('admin.shop.create',compact('province'));
    }

    /**
     * @param
     * 添加
     */
    public function store()
    {
        $Input = trimValue( Input::all() );
        $validator = ShopManage::validatorShop( $Input );
        if( $validator === true )
        {
            $res = ShopManage::addShop( $Input );
            if ( $res )
            {
                //添加成功
                return Redirect::to('admin/user/shop')->with('msg','添加成功');

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
        $data = Source_User_ShopInfo::findOrFail( $id );
        $province = Source_Area_Province::get();
        $city = Source_Area_City::where('parent',$data->province)->get();
        $this->view('admin.shop.edit',compact('data','province','city'));
    }


    /**
     * @param
     * @param $id
     * 修改数据
     */
    public function update( $id )
    {
        $Input = trimValue( Input::all() );
        $validator = ShopManage::validatorShop( $Input );
        $id = decode( trim($id) );
        if( $validator === true )
        {
            $Input = array_except( $Input, ['_token','_method'] );
            $res = ShopManage::editShop( $Input, $id );
            if ( $res )
            {
                //修改成功
                return Redirect::to('admin/user/shop')->with('msg','修改成功');

            }else
            {
                //修改失败
                return Redirect::back()->with('msg','修改失败');
            }

        }else
        {
            return Redirect::back()->withErrors($validator);
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
        $res = Source_User_ShopInfo::find( $id );
        if( $res )
        {
            $pCount = Source_Product_ProductFlat::where( 'shop',$res->id )->count();
            if( $pCount )
            {
                $obj = new stdClass();
                $obj->ststus = 1;
                $obj->msg = '门店已添加产品不可删除';
                return json_encode($obj);

            }
            if( $res->delete() )
            {
                //删除上传的图片
                (new Upload())->delDir( 'shop', $id );
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