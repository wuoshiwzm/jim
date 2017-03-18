<?php

/**
 * Author:Tonychang
 * Date: 2016-12-24
 * Time: 16:13
 * DES:登陆认证
 */
class AuthenticateFilter
{
    public function filter()
    {
        $admin_user = Session::get('admin_user');
        if(! isset($admin_user["user_id"])){
            return Redirect::to("admin/login");
        }

//        //获取所在用户组的权限并缓存
//        Privilege::getPrivilege($admin_user["group_id"]);
//        //获取用户所在菜单
//        Privilege::getMenu($admin_user["group_id"]);
//        exit();
    }
}