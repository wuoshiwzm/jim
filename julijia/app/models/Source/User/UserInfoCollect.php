<?php

class Source_User_UserInfoCollect extends \Eloquent
{
    protected $table = 'userinfo_collect';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo('Source_Product_ProductFlat','entity_id','entity_id');
    }
}
