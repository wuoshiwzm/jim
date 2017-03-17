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
        return Source_Product_ProductBrand::create( $data );
    }
}