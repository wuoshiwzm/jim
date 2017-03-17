<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/22 0022
 * Time: 15:46
 * 运费
 */
class Freight
{

    public static $cache;
    public function __construct()
    {
        self::$cache = Config::get('tools.homeCache');
    }

    /**
     * @param $tempID 模板id
     * @param $weight 重量
     * @param $bulk 体积
     * @param int $num 个数
     * @param null $region 区域
     * $type 是否免运费
     * @return stdClass
     * 前台调取运费
     */
     static function DetailFreight( $tempID, $weight, $bulk, $num=1, $type, $region=null )
     {
         if( $type )
         {
             //免运费
             $arrObj = ipToCity();
             $city = isset($arrObj->city)?$arrObj->province.$arrObj->city:'定位失败';
             $obj = new stdClass();
             $obj->name = '免运费';
             $obj->price = 0.00;
             $obj->city = $city;
             return $obj;
         }
         //查询地址
         if( $region == false )
         {
             $arrObj = ipToCity();
             $city = isset($arrObj->city)?$arrObj->city:'';
             if( $city )
             {
                 $region = Source_Area_City::cacheTags('city')->remember( self::$cache )->where('city','like',"%".$city."%")->pluck('cityID');
             }
         }
         //查询模板
         $temp = Source_Shipping_ShippingTemplete::find( trim($tempID) );
         if( $temp )
         {
             if( $temp->is_freeshipping )
             {
                 //包邮
                 return  Freight::freeFreight( $temp, $weight, $bulk, $num, $region );
             }else
             {
                 //不包邮
                 return  Freight::notFreeFreight( $temp, $weight, $bulk, $num, $region );
             }

         }else
         {
             //默认运费
            return  Freight::defaultFreight( $weight );
         }
     }


    /**
     * @param $weight
     * @return stdClass
     * 默认运费
     */
    static function defaultFreight( $weight )
    {
        //调取默认运费
        $default = Source_Shipping_ShippingTemplete::cacheTags('shippingtemp')->remember( self::$cache )->where('is_xitong',1)->first();
        if( $default == false )
        {
            $arrObj = ipToCity();
            $city = isset($arrObj->city)?$arrObj->province.$arrObj->city:'定位失败';
            $obj = new stdClass();
            $obj->name = '暂无信息';
            $obj->price = 0.00;
            $obj->city = $city;
            return $obj;
        }
        $model = Source_Shipping_ShippingModel::cacheTags('shippingmodel')->remember( self::$cache )->where('pid',$default->id)->first();
        //判断计算
        if( $model->FirstWeight >= $weight )
        {
            //没有超出重量
            $price = $model->FirstAmount;
        }else
        {
            //超出重量
            $beyondWeight = number_format($weight-$model->FirstWeight,2,'.','');
            $price = number_format($model->FirstAmount+($beyondWeight/$model->SecondWeight*$model->SecondAmount),2,'.','');
        }


        //结果
        $arrObj = ipToCity();
        $city = isset($arrObj->city)?$arrObj->province.$arrObj->city:'定位失败';
        $obj = new stdClass();
        $obj->name = $default->name;
        $obj->price = $price;
        $obj->city = $city;
        return $obj;
    }


    /**
     * @param $temp 主表数据
     * @param $weight 重量
     * @param $bulk 体积
     * @param $num 商品数量
     * @param $region 区域
     * @return stdClass
     * 免费模板
     */
    static function freeFreight( $temp, $weight, $bulk, $num, $region )
    {
        $free = Source_Shipping_FreeShippingTiaoJian::cacheTags('shippingtiaojian')->remember( self::$cache )->whereRaw( 'shipping_id = ? and city like ? or shipping_id = ? and region like ?', array( $temp->id, "%".$region."%", $temp->id, "%".$region."%") )->orderBy('price','asc')->first();
        if( count($free) )
        {
            //判断运费条件
            switch ( $temp->jifei_model )
            {
                case '1': //按件
                    return  Freight::typeFreight( $temp, $free, 'pie_no', $num, $weight );
                    break;
                case '2': //按重量
                    return  Freight::typeFreight( $temp, $free, 'weight_no', $weight, $weight );
                    break;
                case '3': //按体积
                    return  Freight::typeFreight( $temp, $free, 'bulk_no', $bulk, $weight );
                    break;
            }
        }else
        {
            //默认运费
            return  Freight::defaultFreight( $weight );
        }

    }


    /**
     * @param $temp
     * @param $weight
     * @param $bulk
     * @param $num
     * @param $region
     * 不免运费
     */
    static function notFreeFreight( $temp, $weight, $bulk, $num,$region  )
    {
        $notFree = Source_Shipping_ShippingModel::cacheTags('shippingmodel')->remember( self::$cache )->whereRaw( 'pid = ? and City like ? or pid = ? and Region like ?', array( $temp->id, "%".$region."%", $temp->id, "%".$region."%") )->orderBy('FirstPiece','asc')->first();
        if( count($notFree) )
        {
            //判断运费条件
            switch ( $temp->jifei_model )
            {
                case '1': //按件
                    return  Freight::typeNotFreight( $temp, $notFree, 'FirstPiece', $num, 'SecondPiece' );
                    break;
                case '2': //按重量
                    return  Freight::typeNotFreight( $temp, $notFree, 'FirstWeight', $weight, 'SecondWeight' );
                    break;
                case '3': //按体积
                    return  Freight::typeNotFreight( $temp, $notFree, 'FirstBulk', $bulk, 'SecondBulk' );
                    break;
            }
        }else
        {
            //默认运费
            return  Freight::defaultFreight( $weight );
        }
    }


    /**
     * @param $default 模板主表数据
     * @param $model 附表信息
     * @param $name 分类字段名称
     * @param $value 要比较的值
     * @param $weight 产品重量
     * @return stdClass 返回对象
     * 免费类型计算
     */
    static function typeFreight( $default, $model, $name, $value, $weight  )
    {
        //判断计算
        if( $model->$name >= $value )
        {
            //没有超出
            $price = $model->price;
        }else
        {
            //超出
            return  Freight::defaultFreight( $weight );
        }

        //结果
        $arrObj = ipToCity();
        $city = isset($arrObj->city)?$arrObj->province.$arrObj->city:'定位失败';
        $obj = new stdClass();
        $obj->name = $default->name;
        $obj->price = $price;
        $obj->city = $city;
        return $obj;
    }


    /**
     * @param $default 主表数据
     * @param $model 查询的数据
     * @param $name  分类字段名称
     * @param $value 要比较的值
     * @param $second 续字段名称
     * @return stdClass
     * 不免费类型计算
     */
    static function typeNotFreight( $default, $model, $name, $value,$second  )
    {
        //判断计算
        if( $model->$name >= $value )
        {
            //没有超出
            $price = $model->FirstAmount;

        }else
        {
            //超出
            $beyond= $value-$model->$name;
            $price = number_format($model->FirstAmount+($beyond/$model->$second*$model->SecondAmount),2,'.','');
        }

        //结果
        $arrObj = ipToCity();
        $city = isset($arrObj->city)?$arrObj->province.$arrObj->city:'定位失败';
        $obj = new stdClass();
        $obj->name = $default->name;
        $obj->price = $price;
        $obj->city = $city;
        return $obj;
    }
}