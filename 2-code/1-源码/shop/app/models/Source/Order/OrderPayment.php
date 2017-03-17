<?php

/**
 * Author:Tonychang
 * Date: 2016-12-04
 * Time: 19:46
 * DES:
 */
class Source_Order_OrderPayment extends \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='order_payment';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->belongsTo("Source_Order_OrderInfo","order_id");
    }
}
