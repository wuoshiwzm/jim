<?php
/**
 * Author:Tonychang
 * Date: 2016-12-27
 * Time: 11:03
 * DES:后台用户表
 */
class Source_User_AdminLog extends  \Eloquent
{
    protected $table = 'admin_log';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function adminuser()
    {
        return $this->belongsTo('Source_User_AdminUser',"admin_id","user_id");
    }

}
