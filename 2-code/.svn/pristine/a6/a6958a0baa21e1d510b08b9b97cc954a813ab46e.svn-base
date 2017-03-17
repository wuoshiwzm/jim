<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/29
 * Time: 13:11
 */
class MemberFilter{

    public function filter($route, $request){
    $member = Session::get("user");

    if(isset($member['id'])){

        //登录了
    }else {
        return Redirect::to('user/login');
        //未登录
    }

    }

}