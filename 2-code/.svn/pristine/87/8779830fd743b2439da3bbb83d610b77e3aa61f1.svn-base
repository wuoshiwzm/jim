<?php
/**
 * Author:Tonychang
 * Date: 2016-11-27
 * Time: 11:54
 * DES:
 */
class Source_Order_OrderReview extends  \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='order_review';
    public $timestamps = true;
    protected $guarded = ['id'];

    /**
     * 用户关联
     */
    public function user()
    {
        return $this->belongsTo("Source_User_UserInfo","user_id","id");
    }

    /**
     * 商品关联
     */
    public function item()
    {
        return $this->belongsTo("Source_Order_OrderItem","item_id","id");
    }

    /**
     * 订单关联
     */
    public function order()
    {
        return $this->belongsTo("Source_Order_OrderInfo","order_id","id");
    }
}