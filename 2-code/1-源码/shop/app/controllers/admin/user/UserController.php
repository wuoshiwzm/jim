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
            $log =   Source_User_AdminLog::where('admin_id',$admin_user->user_id)->orderBy('created_at','desc')->first();
             $logo = new Source_User_AdminLog();
             $logo->admin_id = $admin_user->user_id;
             $logo->admin_user = $admin_user->account;
             $logo->option = 1;
             $logo->ip_address = clientIP();
             $logo->content =$admin_user->account.'登录' ;
             $logo->created_at =TimeTools::getFullTime() ;
             $logo->save() ;
            if($admin_user->is_login ==Session::getId()){
                return Redirect::to("/admin/index/index");
             }else{
                $admin_user->is_login=Session::getId();
                $admin_user->save();
                return Redirect::to('/admin/index/index')->with('msg','您已经在：'.$log->ip_address.'登录,请确认是否本人登录');
            }

        }
        return Redirect::back()->with('msg', '登录失败')->withInput();
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        $user =  Source_User_AdminUser::find(Session::get('admin_user')['user_id']);
        $user->is_login=null;
        $user->save();
        //清空会话
        Session::flush();
        //跳转至登录页
        return Redirect::to("admin/login");
    }

}