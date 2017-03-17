<?php
/**
 * Author:Tonychang
 * Date: 2016-12-18
 * Time: 18:39
 * DES:
 */
class Source_Shipping_ShippingModel extends \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='shipping_model';
    protected $guarded = ['id'];

    public function ShippingCode()
    {
        return $this->belongsTo( 'Source_Shipping_Code', 'Ship_code_id', 'code' );
    }

}