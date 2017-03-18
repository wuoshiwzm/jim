<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/25 0025
 * Time: 12:28
 *  产品分类业务类
 */
class ProductCategory
{
    /**
     * @param $data
     * @return bool
     * 验证产品分类
     */
    static function validatorCategory( $data )
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
     * 添加分类
     */
    static function addCategory( $data )
    {
        return Source_Product_ProductCategory::create( $data );
    }

    /**
     *  获取分类层级
     */
    static function getCategoryRelation()
    {
        $data = Source_Product_ProductCategory::where('status',1)->select('parent_id','name','id')->get();
        return (new ProductCategory())->getTree( $data );
    }


    /**
     * @param $data
     * @return array
     * 获取分类
     */
    public function getTree( $data )
    {
         $arr = array();
         foreach ( $data as $k=>$row )
         {
             if( $row->parent_id == 0 )
             {
                 $data[$k]['pix'] = '&nbsp;';
                 $arr[] = $data[$k];
                 foreach ( $data as $i=>$j )
                 {
                     if( $j->parent_id == $row->id )
                     {
                         $data[$i]['pix'] = '&nbsp;&nbsp;&nbsp;&nbsp;';
                         $arr[] = $data[$i];
                     }
                 }
             }
         }
        return $arr;
    }
}