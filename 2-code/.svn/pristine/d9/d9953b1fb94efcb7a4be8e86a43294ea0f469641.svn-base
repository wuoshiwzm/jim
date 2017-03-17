<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/26 0026
 * Time: 15:38
 */
class ProductBrand
{
    /**
     * @param $data
     * @return bool
     * 验证品牌
     */
    static function validatorBrand( $data )
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
     * 添加品牌
     */
    static function addBrand( $data )
    {

        $res = Source_Product_ProductBrand::create( $data );
        if( $data['logo'] )
        {
            //上传图片
            (new Upload())->uploadProductImage( $res->id, $data['logo'], 'brand' );
        }

        if( $data['extension'] )
        {
            //上传图片
            (new Upload())->uploadProductImage( $res->id, $data['extension'], 'brand' );
        }
        return $res;
    }

    static function editBrand( $data, $id )
    {
        //编辑品牌图片
        $oldLogo = $data['editlogo'];
        if( $oldLogo != $data['logo'] )
        {
            //上传图片
            (new Upload())->uploadProductImage( $id, $data['logo'], 'brand' );
            //删除原始图
            (new Upload())->delImg( 'brand', $id, $oldLogo );

        }
        //编辑推广图片
        $oldExtension = $data['editextension'];
        if( $oldExtension != $data['extension'] )
        {
            //编辑品牌
            //上传图片
            (new Upload())->uploadProductImage( $id, $data['extension'], 'brand' );
            //删除原始图
            (new Upload())->delImg( 'brand', $id, $oldExtension );

        }
        $Input = array_except( $data, ['editextension','editlogo'] );
        return Source_Product_ProductBrand::where('id',$id)->update( $Input );
    }
}