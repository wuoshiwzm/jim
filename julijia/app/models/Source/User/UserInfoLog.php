<?php

class Source_User_UserInfoLog extends \Eloquent
{
    protected $table = 'userinfo_log';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = ['id'];



}
