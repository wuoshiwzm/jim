<?php
/**
 * Author:Tonychang
 * Date: 2016-11-20
 * Time: 14:34
 * DES:
 */
class Source_Order_OrderBack extends \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='order_back';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo("Source_Order_OrderInfo","order_id");
    }
    public function item()
    {
        return $this->belongsTo("Source_Order_OrderItem","order_item_id");
    }

}