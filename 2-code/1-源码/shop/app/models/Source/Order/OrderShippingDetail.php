<?php

/**
 * Author:Tonychang
 * Date: 2016-11-06
 * Time: 15:47
 * DES:
 */
class Source_Order_OrderShippingDetail extends \Eloquent
{
    protected $primaryKey = 'id';
    protected $table = 'order_shipping_detail';
    public $timestamps = false;
    protected $guarded = ['id'];


    /**
     * @return mixed
     */
    public function item()
    {
        return $this->belongsTo('Source_Order_OrderItem', 'item_id');
    }

}