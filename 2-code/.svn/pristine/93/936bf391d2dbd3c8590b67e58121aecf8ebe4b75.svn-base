<?php
/**
 * Class ProductBrandController
 * 产品品牌类
 */
class ProductBrandController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *  产品品牌列表
     */
    public function  index()
    {
        $sql = Source_Product_ProductBrand::orderBy('id','desc');
        $name = trim(Input::get('name'));
        if( $name )
        {
            $sql->where('name','like','%'.$name.'%');
        }
        $data = $sql->paginate(self::$adminPage);
        $this->view('admin.pbrand.index',compact('data','name'));
    }

    /**
     * @return mixed
     * 添加页面
     */
    public function create()
    {
        $guser = Source_User_SupplierInfo::get();
        $this->view('admin.pbrand.create',compact('guser'));
    }


    /**
     * @param
     * 添加
     */
    public function store()
    {

        $Input = trimValue( Input::all() );
        $validator = ProductBrand::validatorBrand( $Input );
        if( $validator === true )
        {
            $res = ProductBrand::addBrand( $Input );
            if ( $res )
            {
                //添加成功
                return Redirect::to('admin/product/brand')->with('msg','添加成功');

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
        $data = Source_Product_ProductBrand::findOrFail( $id );
        $this->view('admin.pbrand.edit',compact('data'));
    }

    /**
     * @param
     * @param $id
     * 修改数据
     */
    public function update( $id )
    {
        $Input = trimValue( Input::all() );
        $validator = ProductBrand::validatorBrand( $Input );
        $id = decode( trim($id) );
        if( $validator === true )
        {

            $Input = array_except( $Input, ['_token','_method'] );
            $res = Source_Product_ProductBrand::where('id',$id)->update( $Input );
            if ( $res )
            {
                //修改成功
                return Redirect::to('admin/product/brand')->with('msg','修改成功');

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
        $id = decode( trim($id) );
        $res = Source_Product_ProductBrand::find( $id );
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
