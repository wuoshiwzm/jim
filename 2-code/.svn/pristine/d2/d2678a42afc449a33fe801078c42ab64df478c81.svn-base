<?php

/**
 * Author:Tonychang
 * Date: 2016-12-27
 * Time: 9:40
 * DES:用户登陆控制器
 */
class UserController extends \Controller
{
    /**
     * 登陆页
     */
    public function login()
    {
        return View::make("admin.user.login");
    }

    /**
     * 登陆验证
     */
    public function loginVerify()
    {
        //用户名
        $username = trim(Input::get('name'));
        //密码
        $password = Input::get('password');
        $admin_user = AdminUser::allowLogin($username,$password);
        if (! empty($admin_user)) {
            // 存入session
            Session::put('admin_user', $admin_user->toArray());

            /*获取所在用户组的权限并缓存*/
            $group_id = $admin_user["group_id"];
            $user_id = $admin_user["user_id"];
            $privileges = Privilege::getPrivilege($group_id);

            //用户权限放置到缓存中去
            $key = "privileges_".$user_id;
            MyRedis::set($key,serialize($privileges));
            //跳转
            return Redirect::action("IndexController@getIndex");
        }
        return Redirect::back()->with('msg', '登录失败')->withInput();
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        //清空会话
        Session::flush();
        //跳转至登录页
        return Redirect::to("admin/login");
    }

}