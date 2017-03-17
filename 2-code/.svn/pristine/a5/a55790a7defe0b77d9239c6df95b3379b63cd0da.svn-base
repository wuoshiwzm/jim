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
        $sql = Source_Product_ProductCategory::orderBy('sort','desc');
        $name = trim(Input::get('name'));
        if( $name )
        {
            $sql->where('name','like','%'.$name.'%');
        }
        $data = $sql->get();
        $data = ProductCategory::getTree( $data,0 );
        $set['name'] = $name;
        $this->view('admin.pcategory.index',compact('data','set'));
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
                //清理缓存
                Event::fire('admin.operational.data',array(2));
                //添加成功
                return Redirect::to('admin/product/category')->with('msg','添加成功');

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
            if( $Input['icon'] != $Input['oldicon'] && $Input['icon'] )
            {
                //上传图片
                (new Upload())->uploadProductImage( $id, $Input['icon'], 'category' );
                //删除原始图
                (new Upload())->delImg( 'category', $id, $Input['oldicon'] );

            }
            $Input = array_except( $Input, ['_token','_method','oldicon'] );
            $res = Source_Product_ProductCategory::where('id',$id)->update( $Input );
            if ( $res )
            {
                //清理缓存
                Event::fire('admin.operational.data',array(2));
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
            $treeCount = Source_Product_ProductCategory::where('parent_id',$res->id)->count();
            if( $treeCount )
            {
                $obj = new stdClass();
                $obj->ststus = 1;
                $obj->msg = '此分类下面已有子分类不可删除';
                return json_encode($obj);

            }else
            {
                $pCount = Source_Product_ProductFlat::where( 'category_id',$res->id )->count();
                if( $pCount )
                {
                    $obj = new stdClass();
                    $obj->ststus = 1;
                    $obj->msg = '此分类已添加产品不可删除';
                    return json_encode($obj);

                }
                if( $res->delete() )
                {
                    //清理缓存
                    Event::fire('admin.operational.data',array(2));
                    //删除上传的图片
                    (new Upload())->delDir( 'category', $id );
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

        }else
        {
            $obj = new stdClass();
            $obj->ststus = 1;
            $obj->msg = '未查询到次分类';
            return json_encode($obj);
        }
    }

}