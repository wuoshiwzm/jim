<?php

/**
 * Author:Tonychang
 * Date: 2016-12-27
 * Time: 13:18
 * DES:后台用户控制器
 */
class ManageController extends  CommonController
{

    /**
     * 用户首页
     */
    public function  getIndex()
    {
        //$user =  Source_User_AdminUser::where("user_id",">","0")->restore();
        //每页显示个数
        $setPage = (int)Input::get("setpage",self::$adminPage);
        $keyword = trim(Input::get("keyword"));
        $fullname = trim(Input::get("full_name"));
        $number = AdminUser::getCount();
        $users = AdminUser::getUserByWhere($keyword,$fullname,$setPage);

        $set['keyword'] = $keyword;
        $set['setpage'] = $setPage;
        $set['fullname'] = $fullname;
        $this->view("admin.manage.index",compact("users","set","number"));
    }

    /**
     * 编辑页面
     */
    public function getAdd()
    {
        //获取所有的用户组
        $groups  = Suite::getAll();
        $this->view("admin.manage.add",compact("groups"));
    }

    /**
     *保存便捷和添加
     */
    public function postSave()
    {
        //用户id
        $user_id = (int)Input::get("user_id");
        $account = Input::get("account");
        //邮箱
        $email = Input::get("email");
        //密码
        $password = encode(Input::get("password"));
        //组id
        $group_id = Input::get("group");
        //是否启用
        $status = Input::get("status");
        //姓名
        $fullname = Input::get("fullname");

        if (empty($user_id)) {
            //添加
            $admin_user = new Source_User_AdminUser;
            $admin_user->account = $account;
            $admin_user->email = $email;
            $admin_user->password = $password;
            $admin_user->group_id = $group_id;
            $admin_user->status = $status;
            $admin_user->fullname = $fullname;
            $result = $admin_user->save();
        }else {
            //编辑
            $admin_user =  Source_User_AdminUser::find($user_id);
            $admin_user->email = $email;
            $admin_user->group_id = $group_id;
            $admin_user->status = $status;
            $admin_user->fullname = $fullname;
            $result = $admin_user->save();
        }
        if ($result){
            return Redirect::action("ManageController@getIndex")->with('msg','添加成功');;
        }else {
            return Redirect::back()->with('msg','添加失败');
        }
    }

    /**
     *编辑
     */
    public function getEdit()
    {
        //获取所有的用户组
        $groups  = Suite::getAll();
        $user_id = (int) Input::get("user_id");
        $user = Source_User_AdminUser::find($user_id);
        $this->view("admin.manage.edit",compact("user","groups"));
    }

    /**
     * 删除操作
     */
    public function postDelete()
    {
        try{
            //定义返回状态
            $result = array(
                'status' => 1, //0：有误，1：成功
            );
            $user_id =(int)Input::get("user_id");
            //执行删除操作
            if ($user_id != 0 ) {
                $user_admin = Source_User_AdminUser::find($user_id);
                $user_admin->delete();
            } else{
                throw  new RuntimeException("参数异常");
            }
        }catch(Exception $e) {
            $msg = $e->getMessage();
            $result["status"] = 0;
            $result['msg'] = $msg;
        }
        return Response::json($result);
    }

    /**
     * 修改密码
     */
    public function postModify()
    {
        try{
            //定义返回状态
            $result = array(
                'status' => 1, //0：有误，1：成功
            );
            $user_id =(int)Input::get("user_id");
            $password = encode(trim(Input::get("password")));
            //修改密码操作
            if ($user_id != 0 || empty($password)) {
                $user_admin = Source_User_AdminUser::find($user_id);
                $user_admin->password = $password;
                $user_admin->save();
            } else{
                throw  new RuntimeException("参数异常");
            }
        }catch(Exception $e) {
            $msg = $e->getMessage();
            $result["status"] = 0;
            $result['msg'] = $msg;
        }
        return Response::json($result);
    }


}