<?php

/**
 * 操作产品控制器
 * Class GoodsController
 */
class GoodsController extends \Controller
{
    
    /**
     * 收藏
     */
    public function keep()
    {
        $ajax = Request::ajax();
        if( $ajax )
        {
             //判断用户session是不存在
            $user = Session::get('member');
            if( $user == false )
            {
                return 'no';
            }
            //判断token
            $data = Input::get('data');
            $token = Session::token();
            if( $token != $data['token'] )
            {
                return 'fail';
            }
            $res = KeepAndOrderAndCart::keep( $data );
            return $res?'success':'fail';
        }
        return 'fail';
    }


    public function shoppingCart()
    {
        $user = Session::get('member');
        if( $user )
        {
            $data = Input::all();
            KeepAndOrderAndCart::cart( $data, $user);
        }else
        {
            return Redirect::to('/member/login');
        }
    }
}