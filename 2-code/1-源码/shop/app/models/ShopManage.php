<?php
/**
 * Class Product|
 * 店铺后台业务处理
 * dingfeng0509@vip.qq.com
 */
class ShopManage
{

    /**
     * @param $data
     * @return bool
     * 验证门店信息
     */
    static function validatorShop( $data )
    {
        $rules =  [];
        $message = [];
        $validator = Validator::make( $data, $rules, $message );
        if( $validator->passes() )
        {
            return true;

        }else
        {
            return $validator;
        }
    }

    /**
     * @param $data
     * @return mixed
     * 添加店铺
     */
    static function addShop( $data )
    {
        $res = Source_User_ShopInfo::create( $data );
        if( $data['ico'] )
        {
            //上传图片
            (new Upload())->uploadProductImage( $res->id, $data['ico'], 'shop' );
        }
        return $res;
    }


    /**
     * @param $data
     * @param $id
     * @return mixed
     * 修改店铺
     */
    static function editShop( $data, $id )
    {
        $oldIco =  $data['editico'];
        if( $oldIco != $data['ico'] )
        {
            //上传图片
            (new Upload())->uploadProductImage( $id, $data['ico'], 'shop' );
            //删除原始图
            (new Upload())->delImg( 'shop', $id, $oldIco );
        }
        $Input = array_except( $data, ['editico'] );
        return Source_User_ShopInfo::where('id',$id)->update( $Input );
    }

}