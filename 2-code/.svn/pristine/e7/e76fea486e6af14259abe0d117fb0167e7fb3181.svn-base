<?php

/**
 * 供应商
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/1 0001
 * Time: 15:06
 */
class Supplier
{
    /**
     * @param $data
     * @return mixed
     * 供应商用户验证
     */
    static function validatorSupplier( $data )
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
     * 添加服务商用户
     */
    static function addSupplier( $data )
    {
        return Source_User_SupplierInfo::create( $data );
    }

    /*
     * @param $data
     * @param $id
     * 修改数据
     */
    static  function editSupplier( $data, $id )
    {
        $res = Source_User_SupplierInfo::find( $id );
        if( $res )
        {
            $res->status = $data;
            if( $res->save() )
            {
                return true;
            }else
            {
                return false;
            }

        }else
        {
            return false;
        }
    }
}