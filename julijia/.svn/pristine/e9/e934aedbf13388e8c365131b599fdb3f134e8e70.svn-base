<?php

/**
 * Class ProductController
 * 产品分类控制器
 */
class CategoryController extends CommonController
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
        $sql = Source_Product_ProductCategory::orderBy('id','desc');
        $name = trim(Input::get('name'));
        if( $name )
        {
            $sql->where('name','like','%'.$name.'%');
        }
        $data = $sql->paginate(self::$adminPage);
        $this->view('admin.pcategory.index',compact('data','name'));
    }


    /**
     * @return mixed
     * 添加页面
     */
    public function create()
    {
        $type = ProductCategory::getCategoryRelation();
        $this->view('admin.pcategory.create',compact('type'));
    }

    /**
     * @param
     * 添加
     */
    public function store()
    {
        $Input = trimValue( Input::all() );
        $validator = ProductCategory::validatorCategory( $Input );
        if( $validator === true )
        {
            $res = ProductCategory::addCategory( $Input );
            if ( $res )
            {
                //添加成功
                return Redirect::to('admin/product/category')->with('msg','添加成功');

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
        $data = Source_Product_ProductCategory::findOrFail( $id );
        $type = ProductCategory::getCategoryRelation();
        $this->view('admin.pcategory.edit',compact('data','type'));
    }


    /**
     * @param
     * @param $id
     * 修改数据
     */
    public function update( $id )
    {
        $Input = trimValue( Input::all() );
        $validator = ProductCategory::validatorCategory( $Input );
        $id = decode( trim($id) );
        if( $validator === true )
        {
            $Input = array_except( $Input, ['_token','_method'] );
            $res = Source_Product_ProductCategory::where('id',$id)->update( $Input );
            if ( $res )
            {
                //修改成功
                return Redirect::to('admin/product/category')->with('msg','修改成功');

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

        $res = Source_Product_ProductCategory::find( $id );
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
