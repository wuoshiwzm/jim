<?php

/**
 * Author:Tonychang
 * Date: 2016-11-06
 * Time: 15:47
 * DES:
 */

class Source_Order_OrderItem extends  \Eloquent
{
    protected $primaryKey = 'id';
    protected $table='order_item';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function belongsToUser()
    {
        return $this->belongsTo("Source_User_UserInfo",'user_id');
    }
    public function item()
    {
        return $this->hasMany( 'Source_Salerule_FavoutableRule', 'rule_id');
    }

}