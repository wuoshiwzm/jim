<?php
/**
 * Author:Tonychang
 * Date: 2016-12-18
 * Time: 18:39
 * DES:
 */
class Source_Shipping_FreeShippingTiaoJian extends \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='shipping_freeshipp_tiaojian';
    protected $guarded = ['id'];

    public function ShippingCode()
    {
        return $this->belongsTo( 'Source_Shipping_Code', 'shipping_code', 'code' );
    }
}