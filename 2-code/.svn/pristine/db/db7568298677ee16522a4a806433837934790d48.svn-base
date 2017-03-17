<?php

class Source_Order_OrtderFavoutable extends  \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='order_favoutable';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function  order()
    {
        return $this->belongsTo('Source_Order_OrderInfo', 'order_id');
    }

}