<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/26 0026
 * Time: 16:58
 */
class keepAndOrderAndCart
{
    static function keep( $data )
    {
        $where['user_id'] = Session::get('member')->id;
        $where['entity_id'] = decode($data['entity_id']);
        $user = Source_User_UserInfoCollect::where($where)->first();
        if( $user == false )
        {
            $res = new Source_User_UserInfoCollect();
            $res->user_id = $where['user_id'];
            $res->entity_id = $where['entity_id'];
            $res->is_show = 1;
            $res->entity_name = $data['entity_name'];
            $res->price = $data['price'];
            $res->sku = $data['sku'];
            $res->shop_id = 0;
            $res->save();
            return $res;
        }else
        {
            return true;
        }
    }

    static function cart( $data, $user )
    {

        $where['user_id'] = $user->id;
        $where['product_id'] = $data['id'];
        Source_Cart_CartItem::where($where)->first();
    }
}