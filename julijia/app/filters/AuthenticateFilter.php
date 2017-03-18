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
    }
}