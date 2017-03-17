<?php
/**
 * Author:Tonychang
 * Date: 2016-12-27
 * Time: 11:03
 * DES:后台用户表
 */
class Source_User_AdminUser extends  \Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'admin_user';
    protected $primaryKey = 'user_id';
    public $timestamps = true;
    protected $guarded = ['user_id'];

    public function group()
    {
        return $this->belongsTo('Source_User_Suite',"group_id","group_id");
    }
    public function log()
    {
        return $this->hasMany('Source_User_AdminLog',"admin_id","user_id");
    }

}
