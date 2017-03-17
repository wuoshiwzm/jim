<?php
/**
 * Author:Tonychang
 * Date: 2016-12-18
 * Time: 18:39
 * DES:
 */
class Source_Shipping_ShippingTemplete extends \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='shipping_templete';
    protected $guarded = ['id'];

    /**
     * ----------------------------------
     *  一对一关联产品eav表关联eav属性值表
     * ----------------------------------
     */
    public function FreeShip()
    {
        return $this->hasMany( 'Source_Shipping_FreeShippingTiaoJian', 'shipping_id', 'id' );
    }
    public function  ModelShip(){
        return $this->hasMany( 'Source_Shipping_ShippingModel', 'pid', 'id' );
    }


}