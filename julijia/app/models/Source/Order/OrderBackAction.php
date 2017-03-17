<?php
/**
 * Author:Tonychang
 * Date: 2016-12-17
 * Time: 1:42
 * DES:
 */
class Source_Order_OrderBackAction extends \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='order_back_action';
    protected $dates = ['deleted_at'];
    public $timestamps = true;
    protected $guarded = ['id'];

}