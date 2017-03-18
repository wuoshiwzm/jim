<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/10 0010
 * Time: 14:23
 */
class LinkController extends CommonController
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 首页
     */
    public function getIndex()
    {
        $sql = Source_FriendshipLink_Link::orderBy('id','desc');
        $pid = trim(Input::get('pid'));
        if( $pid )
        {
            $sql->where('pid',$pid);
        }
        $setPage = Input::get('setpage')?Input::get('setpage'):self::$adminPage;
        $data = $sql->with('linkToCategory')->paginate($setPage);
        $set['pid'] = $pid;
        $set['setpage'] = $setPage;
        $category = Source_Product_ProductCategory::where('status',1)->select('id','name')->get();
        $this->view('admin.friendshiplink.index',compact('data','set','category'));
    }


    /**
     *  添加页面
     */
    public function getCreate()
    {
        $category = Source_Product_ProductCategory::where('status',1)->select('id','name')->get();
        $this->view('admin.friendshiplink.create',compact('category'));
    }


    /**
     * @return mixed
     * 添加提交数据
     */
    public function postAdd()
    {
        $Input = trimValue( Input::all() );
        $res = FriendshipLink::addLink( $Input );
        if ( $res )
        {
            //添加成功
            Cache::section( 'link' )->flush();
            return Redirect::to('/admin/link/index')->with('msg','添加成功');

        }else
        {
            //添加失败
            return Redirect::back()->with('msg','添加失败');
        }
    }

    /**
     * @param $id
     * 修改页面
     */
    public function getEdit($id)
    {
        $category = Source_Product_ProductCategory::where('status',1)->select('id','name')->get();
        $data = Source_FriendshipLink_Link::find( decode($id) );
        $this->view('admin.friendshiplink.edit',compact('data','category'));
    }


    /**
     * @return mixed3
     * 修改提交数据
     */
    public function postUpdate()
    {
        $Input = trimValue( Input::all() );
        $res = FriendshipLink::updateLink( $Input );
        if ( $res )
        {
            //修改成功
            Cache::section( 'link' )->flush();
            return Redirect::to('/admin/link/index')->with('msg','修改成功');
        }else
        {
            //修改失败
            return Redirect::back()->with('msg','修改失败');
        }
    }


    /**
     * @return string
     * 删除
     */
    public function postDel()
    {
        $id = Input::get('id');
        $id = decode( trim($id) );
        $res = Source_FriendshipLink_Link::find( $id );
        if( $res )
        {
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

        }else
        {
            $obj = new stdClass();
            $obj->ststus = 1;
            $obj->msg = '未查询到';
            return json_encode($obj);
        }
    }
}