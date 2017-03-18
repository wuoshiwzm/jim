<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/29
 * Time: 13:11
 */
class MemberFilter{

    public function filter($route, $request){
    $member = Session::get('member');

    if(isset($member['id'])){

        //登录了
    }else {

        //获取当前url(不含主页部分)
        $url=Request::getRequestUri();
//        dd($url);
        return Redirect::to('member/login/'.encode($url));
        //未登录
    }

    }

}