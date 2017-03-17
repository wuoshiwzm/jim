<?php

/**
 * Author:Tonychang
 * Date: 2016-12-24
 * Time: 16:01
 * DES:权限检测
 */
class AuthorizeFilter
{
    public function filter($route, $request)
    {
        if (! Privilege::authentication()) {
            /*如果是ajax请求*/
            if (Request::ajax()) {
                return Response::json(array("status" => 0,"msg" => "您没有操作权限!"));
            }else {
                dd("你没有操作权限");
                //todo 跳转至提示没有权限提示页，返回之前操作界面 需要前端提供
            }
            exit();
        }
    }
}